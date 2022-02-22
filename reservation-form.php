<?php
session_start();
$title = "Réservation";
require_once('Class/Reservation.php');
require('Include/header.php');


$i = 0;
$j = 0;
if (!empty($_GET['week'])) {
    $week = $_GET['week'];
} else {
    $week = 0;
}
$temps_anterieur = strtotime(date('Y-m-d H:i:s', strtotime("Monday this week +$i days +$week weeks $j:00:00")));
$error = '';

$reservation = new Reservation();
$testResInfos = $reservation->getClickInfosReserv();

if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
    $now = date('Y-m-d H:i:s', strtotime("yesterday"));




    if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['debut']) && !empty($_POST['fin'])) {

        $reservation->insert_event($titre, $description, $debut, $fin, $id_utilisateurs);
    } elseif ($_POST['debut'] <= $now) {
        echo "L'";
    } {
        $error = 'Veuillez remplir tous les champs';
    }
}

?>
<main>
    <div class="login-form">
        <form action="" method="post">
            <h2><?= $_GET['date'] ?></h2>
            <div class="form-group">
                <label for="titre">Titre du film:</label>
                <input type="text" class="form-control" name="titre" placeholder="ex:Die Hard 3">
            </div>
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
                ?>

                    <input type="datetime-local" class="form-control" name="debut" value="<?= $event_debut ?>" style="pointer-events: none;">


                <?php } else { ?>
                    <input type="datetime-local" name="debut">
                <?php }
                // permet d'insérer seulement un creneau d'une heure 
                $date_fin = date("Y-m-d", strtotime($_GET['date']));
                $getDate = $_GET['date'] . "+1hour";
                $heure_fin = date("H:i", strtotime($getDate));

                $event_fin = $date_fin . 'T' . $heure_fin;
                ?>

                <label for="fin">jusqu'à :</label>
                <input type="datetime-local" class="form-control" name="fin" value="<?= $event_fin ?>" style="pointer-events: none;">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Réserver" name="submit">
                <?php if (isset($_POST["submit"])) {
                    header('Location: planning.php');
                    die();
                } ?>
            </div>
        </form>
        <?php echo $error; ?>
    </div>
</main>
<?php
require('Include/footer.php');
?>