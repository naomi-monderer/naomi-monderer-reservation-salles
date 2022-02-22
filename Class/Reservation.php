<?php
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

    public function __construct()
    {

        try {
            $options =
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ];
            $DB_SDN = 'mysql:host=localhost;dbname=reservationsalles';
            $DB_USER = 'root';
            $DB_PASS = 'root';

            //on va instancier donc créer un objet PDO
            $this->bdd = new PDO($DB_SDN, $DB_USER, $DB_PASS, $options);
        } catch (PDOException $exception) {
            echo 'ERREUR :' . $exception->getMessage();
        }
    }

    public function insert_event($titre, $description, $debut, $fin, $id_utilisateurs)
    // Permet d'insérer de nouveaux evènements en base de données -agit sur la page reservation-form
   
    { $this->id_utilisateurs = $id_utilisateurs;
        //definir un creneau d'une heure. 
        $date_debut = strtotime($debut);
        $date_fin = strtotime($date_debut . "+1hour");
        if (strtotime($debut . "+1hour") == strtotime($fin)) 
        {
            $id_utilisateurs = $_SESSION['user']['id'];
            $query2 = "INSERT INTO reservations (titre, description,debut,fin,id_utilisateurs) VALUES (:titre, :description, :debut, :fin, :id_utilisateurs)";
            $result2 = $this->bdd->prepare($query2);
            $result2->execute(array(
                ':titre' => $titre,
                ':description' => $description,
                ':debut' => $debut,
                ':fin' => $fin,
                ':id_utilisateurs' => $id_utilisateurs
            ));
            echo 'ok';
        } else {
            echo "Veuillez réserver un creneau d'1 heure";
        }
        $now = $_SERVER['REQUEST_TIME'];
       
    }

    public function getDebut($date_debut)
    // je récupère la date de début de ma reservation en bdd  
    {
        $query = "SELECT * FROM reservations WHERE `debut` = :debut ";
        $result = $this->bdd->prepare($query);
        $result->execute(array(":debut" => $date_debut));
        $getDebut = $result->fetchAll(PDO::FETCH_ASSOC);
        return   $getDebut;
    }

    public function showResa($date_debut)
    // Afficher la réservation avec le titre et le nom de l'utilisateur sur la page planning dans la td correspondante
    {
        $query = "SELECT reservations.id, reservations.titre , reservations.description, reservations.id_utilisateurs,
        utilisateurs.login
                FROM reservations
                INNER JOIN utilisateurs
                ON reservations.id_utilisateurs = utilisateurs.id
                where debut = :debut";
        $result = $this->bdd->prepare($query);
        $result->bindValue(":debut", $date_debut);
        $result->execute();
        $resultResa = $result->fetchAll(PDO::FETCH_ASSOC);

        return $resultResa;
    }

    public function formatDate($days, $week = 0)
    // Affiche la date dans le planning au format "LUNDI 2 DECEMBRE 2022"
    {
        $format = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatFrench = new DateTime("Monday this week +$days days +$week weeks");
        return $format->format($formatFrench);
    }

    
    public function displayReservation()
    // Afficher l'intégralité des infos de la réservation + le nom du user correspondant sur la page reservation.php
    {
        if (isset($_GET['id'])) {
            $id_reserv = $_GET['id'];
        }
        $query = "SELECT reservations.id, reservations.titre, reservations.description, reservations.debut, 
        reservations.fin, utilisateurs.login
        FROM reservations 
        INNER JOIN utilisateurs
        ON reservations.id_utilisateurs = utilisateurs.id
        WHERE reservations.id = :id";
        $result = $this->bdd->prepare($query);
        $result->execute(array('id' => $id_reserv));
        $displayResa = $result->fetchAll(PDO::FETCH_ASSOC);

        return $displayResa;
    }

    public function getClickInfosReserv()
    // Permet d'insérer une date au bon format en bdd
    {
        $query = "SELECT reservations.id,`titre`, `description`, 
                  DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') AS `debut`, 
                  DATE_FORMAT(fin,'%d/%m/%Y à %Hh%imin%ss') AS `fin`, `id_utilisateurs`,`login` 
                  FROM `reservations` 
                  INNER JOIN utilisateurs 
                  ON reservations.id_utilisateurs = utilisateurs.id 
                  ORDER BY debut";
        $result = $this->bdd->prepare($query);
        $result->execute();
        $getClick = $result->fetchAll(PDO::FETCH_ASSOC);
        
    }
}
