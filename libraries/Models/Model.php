<?php

namespace Models;

require_once('database.php');
//require_once($session);

 class Model // <3
{
    protected $bdd;
    protected $login;
    protected $password;

    public function __construct()
    {
        $bdd= new \DataBase();
        $this->bdd = $bdd->connect();// initialisation de la connexion pour toutes les fonctions
    }

    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function ifDoesntExist($login) // Est ce que l'utilisateur existe ? 
    {
        $req = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->bdd->prepare($req);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
  
    public function passwordVerifySql($login) 
    {
        $req = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $result = $this->bdd->prepare($req);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function findAll($login) // on repere un utilisateur et on prends toutes ses données
    {
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $result = $this->bdd->prepare($req);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
}
