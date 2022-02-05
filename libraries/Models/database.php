<?php 

//connexion à la base de donnée
class DataBase
{
    //Methode permettant la connexion à la BDD
    function connect()
    {
        try 
    {
         $bdd = new PDO("mysql:host=localhost;dbname=reservationsalles;charset=utf8", "root", "root");
         return $bdd;
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    }
}
