<?php
// date();
//time();
//datetime();
//timestamp ();
//date(w) lundi = 1 et samedi = 6

require_once('Class/User.php');

 class Reservation
 {

    protected $id;
    public $titre;
    public $description;
    public $debut;
    public $fin;
    public $id_utilisateurs;
    private $bdd;

    // pas besoin de déclarer $bdd car elle est instanciée dans ma class User
    public function __construct()
    {

        try
        {
            $options =
            [   
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]; 
            $DB_SDN ='mysql:host=localhost;dbname=reservationsalles';
            $DB_USER = 'root';
            $DB_PASS ='root'; 
            
            //on va instancier donc créer un objet PDO
            $this->bdd = new PDO($DB_SDN, $DB_USER, $DB_PASS, $options);
            
        }
        catch(PDOException $exception)
        {
            echo 'ERREUR :'.$exception->getMessage();
        }
    }

   
    public function insert_event($titre,$description,$debut,$fin,$id_utilisateurs)
    // Permet d'insérer de nouveaux evènements en base de données
    // reservation-form.php
    {  
        //definir un creneau d'une heure. 
        $date_debut = strtotime($debut);
        $date_fin = strtotime($date_debut . "+1hour");
        var_dump(strtotime($date_debut . "+1hour"));
        var_dump($date_fin);
        if(strtotime($debut . "+1hour")== strtotime($fin))
        {
            $id_utilisateurs = $_SESSION['userId'];

       
       
            $query2="INSERT INTO reservations (titre, description,debut,fin,id_utilisateurs) VALUES (:titre, :description, :debut, :fin, :id_utilisateurs)";
            $result2=$this->bdd->prepare($query2);
            $result2->execute(array(
                    ':titre'=>$titre,
                    ':description'=>$description,
                    ':debut'=>$debut,
                    ':fin'=>$fin,
                    ':id_utilisateurs'=>$id_utilisateurs
                ));
                echo 'ok';
        }
        else
        {
            echo "veuillez resrver un crenau d'1h";
        }
       


       $now = $_SERVER['REQUEST_TIME'];
   
                    
        

          
        

       
    }

    public function getDebut($date_debut)
    {   
    // je récupère     
        
        $query = "SELECT * FROM reservations WHERE `debut` = :debut ";
        $result = $this->bdd->prepare($query);
        $result->execute(array(":debut" => $date_debut));
        $getDebut= $result->fetchAll(PDO :: FETCH_ASSOC);
        // var_dump($getDebut);
        return   $getDebut;

    }
    

    public function showResa($date_debut)
    {
    // affiche le titre de la réservation et le nom de l'utilisateur  dans le planning
    // planning.php

        $query="SELECT reservations.id, reservations.titre , reservations.description, reservations.id_utilisateurs,
        utilisateurs.login
                FROM reservations
                INNER JOIN utilisateurs
                ON reservations.id_utilisateurs = utilisateurs.id
                where debut = :debut"
                ;
         $result = $this->bdd->prepare($query);
         $result->bindValue(":debut", $date_debut);
         $result->execute();
         $resultResa = $result->fetchAll(PDO::FETCH_ASSOC);

         return $resultResa;        
    }

   
    public function formatDate($days, $week = 0)
    {
        $format = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatFrench = new DateTime("Monday this week +$days days +$week weeks");
        return $format->format( $formatFrench);
    }

    public function displayReservation()
    {
        if(isset($_GET['id'])){
            $id_reserv = $_GET['id'];
        }
        $query = "SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, 
        reservations.fin, utilisateurs.login
        FROM reservations 
        INNER JOIN utilisateurs
        ON reservations.id_utilisateurs = utilisateurs.id
        WHERE reservations.id = :id";
        $result = $this->bdd->prepare($query);
        $result->execute(array('id'=> $id_reserv));
        $displayResa = $result->fetchAll(PDO::FETCH_ASSOC);

        var_dump($displayResa);
        var_dump($_GET['id']);
        
        return $displayResa;
        
    }

     public function getIdResa()
    {
        $id_resa = $_GET["id_resa"];

        $sql_resa = "SELECT * FROM reservations WHERE id= $id_resa";
        $result=$this->bdd->prepare($sql_resa);
        $result->execute();
        $resultIdResa = $result->fetchAll(PDO::FETCH_ASSOC);

        return $resultIdResa;
    }

    public function PlageHoraire($debut,$fin)
    {
        
    }
}
 



?>