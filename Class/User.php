<?php

class User
{
    protected $id;
    public $login;
    public $password;
  
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
            $DB_PASS =''; 
            
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
            $result->execute(array('login'=>$login));
            $userData = $result->fetchAll(PDO::FETCH_ASSOC);

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
                    return $userData;
                
                }
                else
                {
                    echo  "Les mots de passe doivent être identiques";
                }
            }
            else
            {
                echo "Ce login est déjà utilisé";
            }
        }
        else
        {
            echo "Tous les champs doivent être remplis.";
        }
    }


    public function connect($login,$password)
    {

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
               
                if (count($userData)===1)
                {
                    if(password_verify($password,$userData[0]['password']))
                    {
                        session_start();
                            $_SESSION["user"]= $userData[0];
                            $_SESSION["userId"] = $userData[0]["id"];
                            $_SESSION["userLogin"]= $userData[0]["login"];
                            $_SESSION["userPassword"] = $userData[0]["password"];
                            // // [
                            //     $_SESSION["user"]= [
                            //     $this->id = $userData[0]["id"],
                            //     $this->login = $userData[0]["login"],
                            //     $this->password = $userData[0]["password"],
                            
                            // ];
                             header('Location:profil.php');
                            exit();
                            return $userData;
                    }
                    else
                    {
                        echo "Les mots de passent doivent être identiques.";
                    }
                            
                }
                else
                {
                    echo "Ce login est incorrect.";
                }
            }
            else
            {
                echo "Tous les champs doivent être remplis.";
            }
    }
    
    public function disconnect()
    {
        session_destroy();
        header('Location: connexion.php');
    }

    public function update($login, $password, $passwordConfirm)
    {
       
        if(isset($_SESSION['user']))
        {       $this->login = $login;
                $this->password = $password;
                

                $infos2 = "SELECT * FROM utilisateurs WHERE login = :login ";
                $result2 =$this->bdd->prepare($infos2);
                $result2->setFetchMode(PDO:: FETCH_ASSOC);  
                $result2->execute(array(
                    ":login"=> $login,
                ));
                $verifyLogin = $result2->fetchAll();
                
                if(!$verifyLogin && $_SESSION['user']['login'])
                {   
                    if($password == $passwordConfirm)
                    {
                        $cryptedpass=password_hash($passwordConfirm,PASSWORD_BCRYPT);
                        $update = "UPDATE utilisateurs SET login = :login , password= :password WHERE id = :id ";
                        $result = $this->bdd->prepare($update);
                        
                        $result->execute(array(
                            ":id"=>$_SESSION['user']['id'],
                           ":login"=> $login,
                           ":password"=> $cryptedpass));
                        $updateProfil = $result->fetchAll();

                    }

                }
           

        
                if(!$result2 && $_SESSION['user'])

           
                var_dump($result2);
            
           
                //$user = $result2->fetchAll();
                $_SESSION["user"]['login'] =$login;
                echo "les informations de l'utilisateurs ont bien été modifiées";
            
            //return $result;
        }
    }
    
    // public function getAllInfos() {
        // $login = $this->login;
        // $query = "SELECT * FROM reservations where login = :login";
        // $result = $this->bdd->prepare($query);
        // $result->bindValue(":login", $login);
        // var_dump($result);
        
        // $result->execute();
        // var_dump($result);
        
        // $getClick = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($getClick);
        
        // var_dump($_SESSION['user']);

//         // $link = $this->_link;
//         $SQL = $link->prepare("SELECT * FROM reservations");
//         $SQL->execute();
//         echo "<table class = 'tableau' >";
//         echo '<tr>' . '<th>' . 'Titre' . '</th>';
//         echo '<th>' . 'Description' . '</th>';
//         echo '<th>' . 'Debut' . '</th>';
//         echo '<th>' . 'Fin' . '</th>' . '</tr>';
//         foreach($SQL as $key){
//          echo '<tr>' . '<td>' . $key['titre'] . '</td>';
//          echo '<td>' . $key['description'] . '</td>';
//          echo '<td>' . $key['debut'] . '</td>';
//          echo '<td>' . $key['fin'] . '</td>' . '</tr>';
        // }
//         echo '</table>';
//       }
        public function getAllInfos() {

//     // $query = "SELECT reservations.id,`titre`, `description`, 
//     // DATE_FORMAT(debut,'%d/%m/%Y à %Hh%imin%ss') AS `debut`, 
//     // DATE_FORMAT(fin,'%d/%m/%Y à %Hh%imin%ss') AS `fin`, `id_utilisateurs`,`login` 
//     // FROM `reservations` 
//     // INNER JOIN utilisateurs 
//     // ON reservations.id_utilisateurs = utilisateurs.id 
//     // ORDER BY debut";
//     // $result = $this->bdd->prepare($query);
//     // $result->execute();
//     // $getClick = $result->fetchAll(PDO::FETCH_ASSOC);
    $id = $this->id;
    $id = $_SESSION['user']['id'];
    var_dump($id);
    $query = "SELECT reservations.id,`titre`, `description`,`debut`, `fin`, `id_utilisateurs`,`login` 
              FROM `utilisateurs` 
              INNER JOIN reservations 
              ON utilisateurs.id = reservations.id_utilisateurs 
              WHERE utilisateurs.id = :id
              ORDER BY `debut` DESC"; 
    $result = $this->bdd->prepare($query);
    $result->bindValue(":id", $id);
    // var_dump($result);

    $result->execute();
    // var_dump($result);

    $getAllInf = $result->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($getAllInf);

    echo "<table>";
    echo '<tr>' . '<th>' . 'Titre' . '</th>';
    echo '<th>' . 'Description' . '</th>';
    echo '<th>' . 'Date' . '</th>';
    echo '<th>' . 'Début' . '</th>';
    echo '<th>' . 'Fin' . '</th>' . '</tr>';
    foreach($getAllInf as $AllInf){
     echo '<tr>' . '<td>' .$AllInf['titre'] . '</td>';
     echo '<td>' . $AllInf['description'] . '</td>';
     echo '<td>' . date_format(date_create($AllInf['debut'] ), 'd/m/Y'). '</td>';
     echo '<td>' . date_format(date_create($AllInf['debut'] ), 'H:i'). '</td>';
     echo '<td>' . date_format(date_create($AllInf['fin'] ), 'H:i'). '</td>';
     }
    echo '</table>';

  }
 
}
