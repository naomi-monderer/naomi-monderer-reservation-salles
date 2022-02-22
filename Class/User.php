<?php

class User
{
    private $id;
    public $login;
    public $password;
  

    public function __construct()
    {   $this->error = "";
        try {
            $options =
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ];
            $DB_SDN = 'mysql:host=localhost;dbname=reservationsalles';
            $DB_USER = 'root';
            $DB_PASS = '';

            //on va instancier donc créer un objet PDO
            $this->bdd = new PDO($DB_SDN, $DB_USER, $DB_PASS, $options);
        } catch (PDOException $exception) {
            echo 'ERREUR :' . $exception->getMessage();
        }
    }

    public function register($login, $password, $passwordConfirm)
    // Enregistré l'utilisateur en bdd
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
            $result->bindvalue(':login', $login);
            $result->setFetchMode(PDO::FETCH_ASSOC); // j'utilise fetch_assoc pour récuperer les key d'un tableau associatif 
            $result->execute();
            $userData = $result->fetchAll();

            if ((count($userData)) === 0)
            {
                if ($password == $passwordConfirm)
                {
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT);


                    $query = "INSERT INTO utilisateurs(login, password)
                            VALUES(:login, :password)";
                    $result = $this->bdd->prepare($query);
                    $result->bindvalue(':login', $login);
                    $result->bindvalue(':password', $password);
                    $result->execute(array(
                        ":login" => $login,
                        ":password" => $password,

                    ));
                    header('Location:connexion.php?reg_err=success');
                }
                else
                {
                    header('Location: inscription.php?reg_err=password');
                    die();
                }
            }
            else
            {
                header('Location: inscription.php?reg_err=already');
                die();
            }
        }
    }

    public function connect($login, $password)
    // permet d'ouvrir une session à l'utilisateur 
    {
        $_login = htmlspecialchars($login);
        $_password = htmlspecialchars($password);

        $login = trim($_login);
        $password = trim($_password);

        if (!empty($login) && !empty($password))
        {
            $infos = "SELECT * FROM utilisateurs WHERE login = :login ";
            $result = $this->bdd->prepare($infos);
            $result->setFetchMode(PDO::FETCH_ASSOC); // j'utilise fetch_assoc pour récuperer les key d'un tableau associatif 
            $result->execute(array(
                ":login" => $login,
            ));

            $userData = $result->fetchAll();

            if (password_verify($password, $userData[0]['password']))
            {
                session_start();
                $_SESSION["user"] = $userData[0];
             

                header('Location:profil.php');
               
            }
            else
            {
                header('Location: connexion.php?login_err=password');
            
            }
        }
    }

    public function disconnect()
    {
        session_start(); // demarrage de la session
        session_destroy(); // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
        header('Location: connexion.php');
        die();
    }

    public function updatelogin($login)
    {
       
       

        if (isset($_SESSION['user']) && isset($login))
        {
            $this->login = $login;

            $infos2 = "SELECT * FROM utilisateurs WHERE login = :login ";
            $result2 = $this->bdd->prepare($infos2);
            $result2->setFetchMode(PDO::FETCH_ASSOC);
            $result2->execute(array(
                ":login" => $login,
            ));

            $verifyLogin = $result2->fetchAll();


            if (!$verifyLogin)
            {
                $update = "UPDATE utilisateurs SET login= :login  WHERE id = :id ";
                $result = $this->bdd->prepare($update);

                $result->execute(array(
                    ":id" => $_SESSION['user']['id'],
                    ":login" => $login,
                ));
            }
            if ($login !== $_SESSION['user']['login']) {
                $update = "UPDATE utilisateurs SET login= :login  WHERE id = :id ";
                $result = $this->bdd->prepare($update);
                $result->execute(array(
                    ":id" => $_SESSION['user']['id'],
                    ":login" => $login,
                ));
                $_SESSION['user']['login'] = $login;

                     $_SESSION['error'] = "<p> les informations de l'utilisateurs ont bien été modifiées.</p>";
              
            }
            else
            {
                $_SESSION['error'] = "<p>Vous ne pouvez pas utiliser ce login, car c'est votre login actuel.</p>";
            }
        }
        
    }


    public function updatepassword($password, $passwordConfirm)
    {


            if ($password == $passwordConfirm)
            {
                $cryptedpass = password_hash($passwordConfirm, PASSWORD_BCRYPT);
                $update = "UPDATE utilisateurs SET password= :password WHERE id = :id ";
                $result = $this->bdd->prepare($update);

                $result->execute(array(
                    ":id" => $_SESSION['user']['id'],
                    ":password" => $cryptedpass,
                ));
                $_SESSION['error'] = "les informations de l'utilisateurs ont bien été modifiées";
            }
            else
            {
                $_SESSION['error'] = "Les mots de passes doivent être identiques.";
            }
        }
        
    public function getAllInfos()
    {
        $id = $_SESSION['user']['id'];
        // var_dump($id);
        $query = "SELECT reservations.id,titre, description,debut, fin, id_utilisateurs,login 
                FROM utilisateurs 
                INNER JOIN reservations 
                ON utilisateurs.id = reservations.id_utilisateurs 
                WHERE utilisateurs.id = :id
                ORDER BY debut DESC";
        $result = $this->bdd->prepare($query);
        $result->bindValue(":id", $id);
        // var_dump($result);

        $result->execute();
        // var_dump($result);

        $getAllInf = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($getAllInf);

        echo "<table class='table'>";
        echo '<tr>' . '<th scope="row">' . 'Titre' . '</th>';
        echo '<th scope="row">' . 'Description' . '</th>';
        echo '<th scope="row">' . 'Date' . '</th>';
        echo '<th scope="row">' . 'Début' . '</th>';
        echo '<th scope="row">' . 'Fin' . '</th>' . '</tr>';
        foreach ($getAllInf as $AllInf) {
            echo '<tr>' . '<td>' . $AllInf['titre'] . '</td>';
            echo '<td>' . $AllInf['description'] . '</td>';
            echo '<td>' . date_format(date_create($AllInf['debut']), 'd/m/Y') . '</td>';
            echo '<td>' . date_format(date_create($AllInf['debut']), 'H:i') . '</td>';
            echo '<td>' . date_format(date_create($AllInf['fin']), 'H:i') . '</td>';
        }
        echo '</table>';
    }
}   