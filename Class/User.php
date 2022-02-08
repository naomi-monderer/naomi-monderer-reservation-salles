<?php
class User
{
    private $id;
    public $login;
    public $password;
    private $bdd;

    public function __construct()
    {
        try
        {
            $options =
            [   
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]; 
            $DB_SDN ='mysql:host=localhost;dbname=reservationsalles';
            $DB_USER = 'root';
            $DB_PASS ='root'; 
            
            //on va instancier donc créer un objet PDO
            $this->bdd = new PDO($DB_SDN, $DB_USER, $DB_PASS, $options);
            
        }
        catch(PDOException $exception)
        {
            echo 'ERREUR :'.$exception->getMessage();
        }
    }

    public function register($login,$password,$passwordConfirm)
    {
        

      
        $_login = htmlspecialchars($login);
        $_password = htmlspecialchars($password);
        $_passwordConfirm = htmlspecialchars($passwordConfirm);


      
        $login = trim($_login);
        $passwordConfirm = trim($_passwordConfirm);
        $password = trim($_password);
     

        if (!empty($login) && !empty($password) && !empty($passwordConfirm)) 
        {
          
                
                $infos = "SELECT * FROM utilisateurs WHERE login = :login ";
                $result = $this->bdd->prepare($infos);
                $result->bindvalue(':login',$login);
                $result->setFetchMode(PDO:: FETCH_ASSOC);// j'utilise fetch_assoc pour récuperer les key d'un tableau associatif 
                $result->execute();
                $userData = $result->fetchAll();

                var_dump($infos);

                if ((count($userData)) === 0)
                    {
                         if ($password == $passwordConfirm) 
                        {
                            
                            $cost = ['cost' => 12];
                            $password = password_hash($password,PASSWORD_BCRYPT);
                             
                    
                            $query = "INSERT INTO utilisateurs(login, password)
                            VALUES(:login, :password)";
                            $result=$this->bdd->prepare($query);
                            $result->bindvalue(':login', $login);
                            $result->bindvalue(':password', $password);
                            $result->execute(array(
                                ":login" => $login,
                                ":password" => $password,
                            
                            ));
                            header('Location:connexion.php');
                           
                        
                        }
                            return $userData;
                    }

        }
    }
    public function connect($login,$password){
        $_login = htmlspecialchars($login);
        $_password = htmlspecialchars($password);
      
        $login = trim($_login);
        $password = trim($_password);
     

            if (!empty($login) && !empty($password)) 
            {
               
                $infos = "SELECT * FROM utilisateurs WHERE login = :login ";
                $result = $this->bdd->prepare($infos);
                
                $result->setFetchMode(PDO:: FETCH_ASSOC);// j'utilise fetch_assoc pour récuperer les key d'un tableau associatif 
                $result->execute(array(
                    ":login"=> $login,
                    
                ));

                $userData = $result->fetchAll();
                
                
                if(password_verify($password,$userData[0]['password']))
                        {
                            session_start();
                                $_SESSION["user"] = [
                                    $this->id = $userData[0]["id"],
                                    $this->login = $userData[0]["login"],
                                    $this->password = $userData[0]["password"],
                                
                                ];
                              
                                echo '<pre>';
                                var_dump($_SESSION['user']);
                                echo '</pre>';
                                // header('Location:profil.php');
                                // exit();
                        }
                                return $userData;
            }

        }
    
    public function disconnect()
    {
        session_destroy();
        header('Location: connexion.php');
    }

}
