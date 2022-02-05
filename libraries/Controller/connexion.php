<?php

namespace Controller;


class Connexion
{
    public $login = "";
    public $password = "";

    public function connect($login, $password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
      

        if (!empty($login) && !empty($password)) { // il faut remplir les champs sinon $errorLog

            $modelConnection = new \Models\Connexion();

            $login = $modelConnection->secure($login);
            $password = $modelConnection->secure($password);

            $data = $modelConnection->checkuser($login); // savoir si le compte existe pour etre connecté
            if ($data) {
                $passwordSql = $modelConnection->passwordVerifySql($login);

                if (password_verify($password, $passwordSql['password'])) {
                    $_SESSION['connected'] = true;
                    $utilisateur = $modelConnection->findAll($login);
                    $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION
                    header('Location:../view/profil.php');
                    die();
                } else {
                    header('Location: ../view/connexion.php?login_err=password');
                    die();
                }
            } else {
                header('Location: ../view/connexion.php?login_err=email');
                die();
            }
        } else {
            header('Location: ../view/connexion.php?login_err=already');
            die();
        }
    } 
} 