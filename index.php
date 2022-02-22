<?php
session_start();
$title = "Accueil";
require('Include/header.php');
?>


    <main class="main-index">
        <section>
            <article>
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
                                Ici, vou pouvez réserver un salle de vidéo-projection.
                                Il vous suffi de choisir un créneau sur le planning
                                et de remplir le formulaire de réservation.
                                La salle est disponible toute la semaine de 08h à 19h sauf les week-end.
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</body>
<?php
require('Include/footer.php');
?>