<?php


namespace Controller;
require_once("../libraries/Models/Model.php");
require_once("../libraries/Models/connexion.php");
require_once("../libraries/Http.php");


class Connexion
{
    public $login;
    public $password;

    public function connect($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
      

        if (!empty($login) && !empty($password)) { // il faut remplir les champs sinon $errorLog
            $modelConnection = new \Models\Connexion();

            $login = $modelConnection->secure($login);
            $password = $modelConnection->secure($password);

            $data = $modelConnection->ifDoesntExist($login); // savoir si le compte existe pour etre connecté
            if ($data) {
                $passwordSql = $modelConnection->passwordVerifySql($login);

                if (password_verify($password, $passwordSql['password'])) {
                    session_start();
                    $_SESSION['connected'] = true;
                    $utilisateur = $modelConnection->findAll($login); 
                    $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION
                   
                    $Http = new \Http();
                    $Http->redirect('profil.php'); 
                    die();
                } else {
                    header('Location: ../view/connexion.php?login_err=password');
                    die();
                }
            } else {
                header('Location: ../view/connexion.php?login_err=login');
                die();
            }
        } else {
            header('Location: ../view/connexion.php?login_err=already');
            die();
        }
    } 
} 