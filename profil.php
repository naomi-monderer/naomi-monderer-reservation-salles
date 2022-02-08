<?php
require('Include/header.php');
require('Class/User.php');

session_start();
echo '<pre>';
var_dump($_SESSION['user']);
echo '</pre>';

var_dump($userData);
// echo '<pre>';
// var_dump($userData);
// echo '</pre>';
?>