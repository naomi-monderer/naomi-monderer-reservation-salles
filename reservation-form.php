<?php
session_start();
require_once('Class/Reservation.php');
$id_user = $_SESSION['userId'];

$reservation = new Reservation();
if(isset($_POST['submit']))
{  
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
   

$reservation->insert_event($titre,$description,$debut,$fin,$id_user);
}

echo "on veut push mais ca marche aps";

?>
<main>
    <h2>Faites votre réservation</h2>
    <p>Vous devez reserver la salle avec des créneaux en heures plaines.</p>
    <form action="" method="post">
        <label for="titre">Titre du film:</label>
        <input type="text" name="titre" placeholder="ex:Die Hard 3" >

        <label for="description">Pitch:</label>
        <textarea name="description"></textarea>

        <label for="debut">De:</label>
        <input type="datetime-local" name="debut">

        <label for="fin">Jusqu'à</label>
        <input type="datetime-local" name="fin">

        <input type="hidden" name="id_utilisateur"> 


        <input type="submit" name="submit" value="Réserver">

    </form>

</main>
<?php

   
require 'Include/footer.php';
?>
