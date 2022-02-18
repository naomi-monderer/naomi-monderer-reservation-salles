<?php

session_start();
$title = "Reservation";
require_once('Class/Reservation.php');
require_once('Class/User.php');
require('Include/header.php');
$oneResa = new Reservation();
$oneReservation = $oneResa->displayReservation();

?>
<main>
    <section class="res-container">
        <article>
            <h1>Réservé par <?= $oneReservation[0]['login'] ?> </h1>
            <h3>Pour le <?= date_format(date_create($oneReservation[0]['debut']), 'd/m/Y') ?> </h3>
        </article>
        <article class="res-box">
            <h2 class="res-titres">TITRE -</h2>
            <p> <?= $oneReservation[0]['titre'] ?></p>
            <h2 class="res-titres">DESCRIPTION -</h2>
            <p> <?= $oneReservation[0]['description'] ?></p>
            <h2 class="res-titres">DEBUT - </h2>
            <p><?= date_format(date_create($oneReservation[0]['debut']), 'H:i') ?></p>
            <h2 class="res-titres">FIN - </h2>
            <p><?= date_format(date_create($oneReservation[0]['fin']), 'H:i') ?></p>
        </article>
    </section>
</main>
<?php
require('Include/footer.php');
?>