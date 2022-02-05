<?php 

namespace Models {

                require_once("Model.php");

                class Connexion extends Model
                {
                    public function checkuser($login) // Est ce que l'utilisateur existe ? 
                        {
                            $req = "SELECT login FROM utilisateurs WHERE login = :login";
                            $result = $this->pdo->prepare($req);
                            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
                            $result->execute();
                            $fetch = $result->fetch(\PDO::FETCH_ASSOC);
                            if ($fetch) {
                                return false;
                            } else {
                                echo "Ce compte n'existe pas";
                                return true;
                            }
                        }
                }
            
            }
            
        
