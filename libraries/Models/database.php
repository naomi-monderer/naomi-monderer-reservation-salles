<?php 

//connexion à la base de donnée
class DataBase
{
    //Methode permettant la connexion à la BDD
    protected function connect()
    {
        try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=moduleconnexion;charset=utf8", "root", "root");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    }
}
