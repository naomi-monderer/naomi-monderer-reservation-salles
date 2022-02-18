<?php
session_start();
require_once('Class/Reservation.php');
require('Include/header.php');

$id_utilisateurs = $_SESSION['userId'];
// var_dump($_GET);
$i = 0;
$j = 0;
if (!empty($_GET['week'])) {
    $week = $_GET['week'];
} else {
    $week = 0;
}
$temps_anterieur = strtotime(date('Y-m-d h:i:s', strtotime("Monday this week +$i days +$week weeks $j:00:00")));
$error = '';

$reservation = new Reservation();
$testResInfos = $reservation->getClickInfosReserv();

if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $now = date('Y-m-d h:i:s', strtotime("yesterday"));
    var_dump($now);



        $reservation->insert_event($titre,$description,$debut,$fin,$id_utilisateurs);
        
    }
    // elseif($_POST['debut'] <= $now){
    //     var_dump($_POST['debut']);
    //     echo "cela fonctionne";
    // }
  
    
    else
    {
        $error = 'Veuillez remplir tous les champs';
    }


?>
<main>

    <h2><?= $_GET['date'] ?></h2>

    <form action="" method="post">
        <div class="form-group">
            <label for="titre">Titre du film:</label>
            <input type="text" class="form-control" name="titre" placeholder="ex:Die Hard 3">

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="debut">De:</label>
                <?php
                if (isset($_GET['date'])) {
                    $date_debut = date("Y-m-d", strtotime($_GET['date']));
                    $heure_debut = date("H:i", strtotime($_GET['date']));
                    $event_debut = $date_debut . 'T' . $heure_debut;
                    // var_dump($event_debut);
                ?>

                    <input type="datetime-local" class="form-control" name="debut" value="<?= $event_debut ?>">
                <?php } else { ?>
                    <input type="datetime-local" name="debut">
                <?php }
                $date_fin = date("Y-m-d", strtotime($_GET['date']));
                $getDate = $_GET['date'] . "+1hour";
                $heure_fin = date("H:i", strtotime($getDate));
                $event_fin = $date_fin . 'T' . $heure_fin;
                ?>

                <label for="fin">jusqu'à :</label>
                <input type="datetime-local" class="form-control" name="fin" value="<?= $event_fin ?>">
            </div>

            <input type="submit" class="btn btn-primary" name="submit">


    </form>

    <?php echo $error; ?>
</main>
<?php
require 'Include/footer.php';
?>