<?php 
session_start();
$title = "Accueil";
require('Include/header.php'); 
?>
<<<<<<< HEAD:naomi-monderer-reservation-salles/index.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<h1>reservation salles </h1>

    <?php if(isset($_SESSION['user']['login'])){  ?>
            <h1>Bienvenue <?php echo $_SESSION['user']['login']; } ?> </h1>
            
            
</body>
</html>
=======
<main class="main-index">
    <section>
        <article >
            <div class="index-conteneur">
                
                <div class="index-box"> 
                
                    <div>
                        <h1>CINEMAX</h1>
                    </div>
                    <div>
                        <h3>Le Cinéma où vous êtes max!</h3>
                    </div>
                    <div class="index-pres">
                        <p> 
                            Choisissez vous-même votre programation de films!
                            Ce site vous permet de réserver un salle de vidéo-projection. 
                            Il vous suffi de choisir un créneau dans le planning 
                            et de remplir le formulaire de réservation sur cette horraire.
                            La salle est disponible toute la semaine de 08h à 19h sauf les week-end. 
                        </p>
                    </div>
                </div> 
            </div> 
        </article>
   </section>
</main>    
<?php
require('Include/footer.php');
?>
>>>>>>> 5b61d34b53cab4d6101282b791d6380429a9f05b:index.php
