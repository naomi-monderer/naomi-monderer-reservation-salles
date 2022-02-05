<?php

namespace Controller;

// require_once($Http);
// require_once($session);
// LE CHEMIN EST EN FONCTION DE LA OU TAPPELLES LA FONCTION GROSSE MERDE
require_once("../libraries/Models/Model.php");
require_once("../libraries/Models/Inscription.php");
require_once("../libraries/Http.php");
class Inscription 
{
    public $login = "";
    public $password = "";
   
    public function register($login, $password, $confirm_password)
    {
        $this->login = $login;
        $this->password = $password;




        if (!empty($login) && !empty($password) && !empty($confirm_password)) { 
            
            $login_length = strlen($login);
            $password_length = strlen($password);
            $confirm_password_length = strlen($confirm_password);
            $model = new \Models\Model();
            $result=$model->ifDoesntExist($login);
            var_dump($result);
            if (!$result) {
                if (($login_length >= 2) && ($password_length  >= 5) && ($confirm_password_length >= 5)) { // limite minimum de caractere

                    if (($login_length <= 30) && ($password_length  <= 255) && ($confirm_password_length <= 255)) { // limite maximum de caractere

                        $modelInscription= new \Models\Inscription();
                        $return = $modelInscription->ifDoesntExist($login); // l'utilisateur existe-t-il ?

                        if (!$return) {

                            if ($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                            {
                                $securedlogin=$model->secure($login);
                                $securedpassword=$model->secure($password);
                                $cryptedpass = password_hash($securedpassword, PASSWORD_BCRYPT);
                                ;// CRYPTED
                                $modelInscription->insert($securedlogin, $cryptedpass);
                                $Http = new \Http();
                                $Http->redirect('connexion.php?reg_err=success'); 
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
            return 'caca';
        }
        
    }
//    $caca=new Inscription();
//    $caca->register('azerty','azertyu','azertyu');

