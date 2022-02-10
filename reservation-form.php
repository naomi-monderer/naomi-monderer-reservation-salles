<?php
session_start();
require_once('Class/Reservation.php');
require('Include/header.php');

$id_utilisateurs = $_SESSION['userId'];
$error = '';

$reservation = new Reservation();
if(isset($_POST['submit']))
{  
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
  

    if(!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['debut']) && !empty($_POST['fin']))
    {
        $reservation->insert_event($titre,$description,$debut,$fin,$id_utilisateurs);
            
        
    }
    else
    {
        $error = 'Veuillez remplir tous les champs';
    }
}



?>
<main>
    <h2>Faites votre réservation</h2>
    <p>Vous devez reserver la salle avec des créneaux en heures plaines.</p>
    <form action="" method="post">
        <label for="titre">Titre du film:</label>   
        <input type="text" name="titre" placeholder="ex:Die Hard 3">

        <label for="description">Pitch:</label>
        <textarea name="description" ></textarea>

        <label for="debut">De:</label>
        <input type="datetime-local" name="debut">

        <label for="fin">Jusqu'à</label>
        <input type="datetime-local" name="fin">

        <input type="hidden" name="id_utilisateurs" > 

        
        <input type="submit" name="submit" >


    </form>
    <?php echo $error;?>
</main>
<?php

   
require 'Include/footer.php';
?>
