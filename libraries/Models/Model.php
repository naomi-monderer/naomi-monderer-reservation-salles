<?php

namespace Models;

require_once($database);
require_once($session);

abstract class Model // <3
{
    protected $bdd;
    protected $login;
    protected $password;

    public function __construct()
    {
        $this->bdd = connect(); // initialisation de la connexion pour toutes les fonctions
    }

    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function ifDoesntExist($login) // Est ce que l'utilisateur existe ? 
    {
        $sql = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->bdd->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
  
    public function passwordVerifySql($login) 
    {
        $sql = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $result = $this->bdd->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function findAll($login) // on repere un utilisateur et on prends toutes ses données
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = :login";
        $result = $this->bdd->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
}
