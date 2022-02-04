<?php

namespace Controller; // une etiquette 

require_once('./Controller.php'); // c'est pour permettre d'extends 
$error= " ";


    class Register extends Controller // fichier.php
    {
        public $login = "";
        public $password = ""; 
        // est ce qu'on a besoin de dire que la variable est = à un string vide 
        // car comme le controller fait le lien avec la view, les strings du user vont remplir la variable?

        public function __construct()
        {
            
        }

        public function register($login,$password,$passwordConfirm)

        {
            $this->login = $_POST['login'];
            $this->password=$_POST['password'];
            $passwordConfirm=$_POST['passwordConfirm'];
            // $passwordhash = password_hash($password, PASSWORD_BCRYPT);

            if (!empty($login) && !empty($password) && !empty($passwordConfirm) && !empty($email) && !empty($firstname) && !empty($lastname))
                {
                    
                    $login_lenght = strlen($login);
                    $password_lenght = strlen($password);
                    $passwordConfirm_lenght = strlen($passwordConfirm);

                    if(($login_lenght >=3) && ($password_lenght >= 5) && ($passwordConfirm_lenght >= 5))//limite minimum de caractères
                    {
                        if(($login_lenght <=25) && ($password_lenght<=25) && ($passwordConfirm_lenght<=25))
                        {
                            $modelsRegister = new \Models\Register();// pourquoi il connait pas ca?
                            // je veux emmener ma fonction register dans la variable $modelsRegister
                            
                            $verifylogin = $modelsRegister->verifylogin($login);//recherche d'un utilisateur dans la bdd
                            
                            if(!$verifylogin)
                            {
                                if($passwordConfirm ==$password)
                                {
                                    $password_hash = password_hash($password,PASSWORD_BCRYPT);
                                    $modelsRegister->register($login,$password_hash);

                                }
                                else
                                {
                                    $error = "Les mots de passent doivent être identiques.";
                                }
                            }
                            else
                            {
                                $error="Ce login est déjà utilisé";
                            }
                        }
                        else
                        {
                            $error ="Le login ou les mots de passent choisis sont trop long";
                        }

                    }
                    else
                    {   
                        $error=" Le login ou les mots passent choisis sont trop court";
                    }
                }
                else
                {
                    $error=" Veuillez remplir tous les champs";
                }
           
        }
    }        

?>