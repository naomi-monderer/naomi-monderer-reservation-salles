<?php

namespace Models {

    require_once("Model.php");

    class Inscription extends Model
    {
        public function insert($login, $password) //insertion dans la bdd
        {
            $cost = ['cost' => 12];
            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
            $insert = $bdd->prepare('INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (:login, :prenom, :nom, :password)');
            $insert->execute(array(
            'login' => $email,
            'nom' => $nom,
            'prenom' => $prenom,
            'password' => $password,));
            header('Location:../connexion.php?reg_err=success');
        }
    }  
}