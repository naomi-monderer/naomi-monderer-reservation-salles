<?php
//2. Quand finit on va lancer le routeur dans la page index 
//3.Crée dans le dossier Models/Model.php (pour contenir les méthodes communes aux autres classes)

require_once('controllers/Router.php');
    //crée variable 
$router = new Router();
    //lance la méthode routereq qui est dans le controller/Router.php
$router->routeReq;
$title = 'Accueil';
include 'assets/include/header.php';
