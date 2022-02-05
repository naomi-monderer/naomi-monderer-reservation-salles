<?php

namespace Controller;

require_once($Http);
require_once($utils);

class Inscription // s'appel User
{
    public $login = "";
    public $password = "";
   
    public function register($login, $password, $confirm_password)
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];

        $confirm_password = $_POST['confirm_password'];
        $errorLog = null;
        if (!empty($login) && !empty($password) && !empty($confirm_password)) { // si les champs sont vides alors $errorLog

            $login_length = strlen($login);
            $password_length = strlen($password);
            $confirm_password_length = strlen($confirm_password);
            if ($row == 0) {
                if (($login_length >= 2) && ($password_length  >= 5) && ($confirm_password_length >= 5)) { // limite minimum de caractere

                    if (($login_length <= 30) && ($password_length  <= 255) && ($confirm_password_length <= 255)) { // limite maximum de caractere

                        $modelInscription = new \Models\Inscription();
                        $return = $modelInscription->checkuser($login); // l'utilisateur existe-t-il ? 

                        if (!$return) {

                            if ($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                            {
                                $modelInscription->secure($login);
                                $modelInscription->secure($password);
                                $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                                $modelInscription->insert($login, $cryptedpass);
                                header('Location:../connexion.php?reg_err=success');
                            } else {
                                header('Location: ../view/inscription.php?reg_err=password');
                                die();
                            }
                        } else {
                            header('Location: ../view/inscription.php?reg_err=login');
                            die();
                        }
                    } else {
                        header('Location: ../view/inscription.php?reg_err=info_length');
                        die();
                    }
                } else {
                    header('Location: ../view/inscription.php?reg_err=info_length');
                    die();
                }
            } else {
                header('Location: ../view/inscription.php?reg_err=info_length');
                die();
            }
        } else {
            header('Location: ../view/inscription.php?reg_err=already');
            die();
        }
            echo $errorLog;
        }
        
    }
