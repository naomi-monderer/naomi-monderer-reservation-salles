<?php
    //on va récupérer tous les réservations en parcourant la variable reservation créé dans le controlleur
foreach($reservations as $reservation): ?>
    <!-- affichage des données donc getter (cf models/Reservation) -->
<h2><?= $reservation->titre() ?></h2>
<time><?= $reservation->debut() ?></time>
<?php endforeach; ?>
