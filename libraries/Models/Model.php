<?php
namespace Models;
require_once("database.php");

    class Model extends ConnectDb
    {   
        protected $variableDeBdd;
        protected $login;
        protected $password;

        public function __construct()
        {
            $conn= new ConnectDb();
            $this->variableDeBdd = $conn->connect_bdd(); // initialise de la connexion 
        }
        public function verifyLogin($login)
        {
            $infos = "SELECT * FROM utilisateurs WHERE login = :login";
            $tab = $this->variableDeBdd->prepare($infos);
            $tab->bindvalue(':login',$login);
         // $tab->setFetchMode(PDO:: FETCH_ASSOC);// j'utilise fetch_assoc pour récuperer les key d'un tableau associatif 
            $tab->execute();
            $users = $tab->fetchAll(\PDO:: FETCH_ASSOC);
        }

        public function passwordVerifySql($login) 
    {
        $infos = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $tab = $this->pdo->prepare($infos);
        $tab->bindvalue(':login', $login, \PDO::PARAM_STR);
        $tab->execute();
        $fetch = $tab->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function findAll($login) // on repere un utilisateur et on prends toutes ses données
    {
        $infos = "SELECT * FROM utilisateurs WHERE login = :login";
        $tab = $this->pdo->prepare($infos);
        $tab->bindvalue(':login', $login, \PDO::PARAM_STR);
        $tab->execute();
        $fetch = $tab->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    }



    
    
?>