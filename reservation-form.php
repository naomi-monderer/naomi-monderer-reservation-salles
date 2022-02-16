<?php
session_start();
require_once('Class/Reservation.php');
require('Include/header.php');

$id_utilisateurs = $_SESSION['userId'];
$error = '';

$reservation = new Reservation();
$testResInfos = $reservation->getClickInfosReserv();

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
    <p>Vous devez reserver la salle avec des créneaux en heures pleines.</p>
    <form action="" method="post">
        <label for="titre">Titre du film:</label>   
       
        <input type="text" name="titre" value="">
        <?php  
        // var_dump($reservation);  
        var_dump($testResInfos);
        ?>
        <label for="description" value="">Pitch:</label>
        <textarea name="description" ></textarea>

        <label for="debut" value="">De:</label>
        <input type="datetime-local" name="debut">

        <label for="fin" value="">Jusqu'à</label>
        <input type="datetime-local" name="fin">

        <input type="hidden" name="id_utilisateurs" > 

        
        <input type="submit" name="submit" >


    </form>
    <?php echo $error;?>
</main>
<?php

   
require 'Include/footer.php';
?>