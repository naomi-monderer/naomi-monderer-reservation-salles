<?php

namespace Models {

    require_once("Model.php");

    class Inscription extends Model
    {
        public function insert($login, $cryptedpass) //insertion dans la bdd
        {
            $req = "INSERT INTO utilisateurs (login, password) VALUES (:login, :password)"; 
            $result = $this->bdd->prepare($req);
            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password', $cryptedpass, \PDO::PARAM_STR);
            $result->execute();
        }
    }
}
