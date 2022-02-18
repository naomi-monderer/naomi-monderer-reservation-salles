
<?php

session_start();
$title = "Reservation";
require_once('Class/Reservation.php');
require_once('Class/User.php');
require('Include/header.php');
$oneResa = new Reservation();
$oneReservation = $oneResa->displayReservation();
<<<<<<< HEAD:naomi-monderer-reservation-salles/reservation.php


=======
>>>>>>> 5b61d34b53cab4d6101282b791d6380429a9f05b:reservation.php
?>

<h1>Réservé par <?= $oneReservation[0]['login'] ?> </h1>
    <p>TITRE -  <?= $oneReservation[0]['titre'] ?></p>
    <p>DESCRIPTION - <?= $oneReservation[0]['description'] ?></p>
    <p>DEBUT - <?= $oneReservation[0]['debut'] ?></p>
    <p>FIN - <?= $oneReservation[0]['fin'] ?></p>
