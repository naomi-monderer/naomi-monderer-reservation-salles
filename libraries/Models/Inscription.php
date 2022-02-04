<?php
namespace Models;
class Register extends Model
{     
    private $id; 
    private $login;
    private $password_hash;// est ce que je déclare ma variable de mon mdp haché?
        
    public function __construct()
    {

    }
        
    public function register($login,$password_hash)
    {
        $this->login=$login;
        $this->password=$password_hash;

        $login =  trim($login);
        $password = trim($password_hash);
      
        // $objet = new \Controller\Register; 

        
        $query = "INSERT INTO utilisateurs(login, password)
        VALUES(:login)";
        $result=$this->bdd->prepare($query);
        $result->bindvalue(':login', $login);
        $result->bindvalue(':password', $password_hash);

        $result->execute(array(
            ":login" => $login,
            ":password" => $password,
           
        ));
        
    }
   
}        