<?php 

namespace Models {

                require_once("Model.php");

                class Connexion extends Model
                {
                    public function checkuser($login) // si l'utilisateur n'existe pas déjà return true
                    {
                        $check = $bdd->prepare('SELECT login, id, password FROM utilisateurs WHERE login = ?');
                        $check->execute(array($login));
                        $data = $check->fetch();
                        $row = $check->rowCount();
                        
                        if ($row > 0) {
                            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                                    $_SESSION['user'] = $data;
                                    header('Location:../view/profil.php');
                                    die();           
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
                }