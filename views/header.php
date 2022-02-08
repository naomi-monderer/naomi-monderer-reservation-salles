<?php
$title;

?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="favicon" rel="shortcut icon" href="assets/images/logo/stars-sky.ico" type="image/x-con">
    <link rel="stylesheet" href="assets/styles/reservation-salles.css">
    <title><?php echo $title; ?> </title>
</head>
    <header>
                <li><a href="index.php">Accueil</a></li>
                <?php 
                    //Vérification de la connexion
                    if(isset($_SESSION['user']['login'])){  ?>
                        <!-- //si connecté  -->
                        <li><a href="deconnexion.php">Déconnexion</a></li>
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="reservation.php">Réservation</a></li>
                        <li><a href="reservation-form.php">Réservation de Salle</a></li>
                            <?php }
                      else { ?>
                        <!-- //Non connecté -->
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                <?php } ?>
                <li><a href="planning.php">Planning</a></li>
            <!-- </div> -->
    </header>
</html>