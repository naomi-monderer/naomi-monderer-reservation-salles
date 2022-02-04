<?php

namespace Models;

Class ConnectDb
{
    public $bdd;
    public function __construct()
    {
        
    }

    function connect_bdd()
    {
    //connexion à la BDD
    $serveur = "localhost";
    $dbname = "classes";
    $username = "root";
    $password = "root";

    try { $bdd = new \PDO ("mysql:host=$serveur;dbname=$dbname", $username, $password);
            $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // echo "connected  successfully";
        $this->bdd = $bdd;

    }catch(\PDOException $e){

        echo "connection failed" . $e->getMessage(); 
    } 
    return $bdd;
    }
}

?>