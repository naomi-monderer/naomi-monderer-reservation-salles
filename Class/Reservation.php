<?php


 class Reservation
 {
    private $id;
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
            $DB_PASS =''; 
            
            //on va instancier donc créer un objet PDO
            $this->bdd = new PDO($DB_SDN, $DB_USER, $DB_PASS, $options);
            
        }
        catch(PDOException $exception)
        {
            echo 'ERREUR :'.$exception->getMessage();
        }
    }

   
    public function insert_event($titre,$description,$debut,$fin,$id_utilisateurs)
    {
        // var_dump($_SESSION);
       
       
        $query="INSERT INTO reservations (titre, description,debut,fin,id_utilisateurs) VALUES (:titre, :description, :debut, :fin, :id_utilisateurs)";
        $result=$this->bdd->prepare($query);
        $result->execute(array(
                ':titre'=>$titre,
                ':description'=>$description,
                ':debut'=>$debut,
                ':fin'=>$fin,
                ':id_utilisateurs'=>$id_utilisateurs
            ));
            
    }
    public function getDatas($date_debut)
    {   
        $query="SELECT * FROM reservations WHERE debut= :debut";
        $result = $this->bdd->prepare($query);
        $result->bindValue(':debut',$date_debut);
        $result->execute();
        $getDatas= $result->fetchAll();
        return $getDatas;
    }

    public function showResa($date_debut)
    {
        $query = "SELECT reservations.titre, utilisateurs.login, reservations.debut, reservations.fin  
                 FROM reservations 
                 INNER JOIN utilisateurs
                 ON reservations.id_utilisateurs = utilisateurs.id
                 WHERE debut= :debut";
        $result = $this->bdd->prepare($query);
        $result->bindValue(':debut',$date_debut);
        $result->execute();
        $showResa = $result->fetchAll(PDO::FETCH_ASSOC);
        return $showResa;

    }

    public function formatDate($days)
    {
        // http://benjamin.leveque.me/formater-une-date-avec-php-5-3-l10n-partie-2.html
        $format = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatFrench = new DateTime("Monday this week +" .$days. "days");
        return $format->format( $formatFrench);
    }
}
?>