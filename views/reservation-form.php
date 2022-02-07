<?php
session_start();
require('header.php');
require_once('../libraries/Models/database.php');
$database = new DataBase();
$bdd = $database -> connect();




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
        <input type="date" name="debut">

        <label for="fin">Jusqu'à</label>
        <input type="date" name="fin">

        <input type="hidden" name="id_utilisateur"> 


        <input type="submit" name="submit" value="Réserver">

    </form>

</main>
<?php
if(isset($_POST['submit']))
{
    // 
    $query="INSERT INTO reservations (titre, description,debut,fin,id_utilisateurs) VALUES (:titre, description, :debut, :fin, :id_utilisateurs)";
    $result->prepare();
    $result->execute(array(
                ''
    ));
}
require ('footer.php');
?>
