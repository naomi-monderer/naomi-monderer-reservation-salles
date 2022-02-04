<?php
$title = 'Connexion';
require_once 'header.php';
?>

<body>
    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <?php
                if (isset($_GET['reg_err'])) {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch ($err) {
                        case 'success':
                ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                            break;
                    }
                }
                if (isset($_GET['login_err'])) {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch ($err) {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                            break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                            break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                <?php
                            break;
                    }
                }
                ?>
                <div class="form-group">
                    <label name="login">login</label>
                    <input type="text" id="ConnexionLogin" name="login">                </div>
                <div class="form-group">
                    <label name="password">password</label>
                    <input type="password" id="ConnexionPassword" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" id="ConnexionSubmit" value="register" name="register"> 
                </div>
                <?php
        if (isset($_POST['register'])) {
            
            $newUser = new \Controller\Connexion(); 
            $newUser->connect($_POST['login'], $_POST['password']);
        }
        
        ?>
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
        <p class="text-center"><a href="https://github.com/sofiane-ziri/modul-connexion">Github</a></p>

    </div>
</body>
<?php
require_once 'header.php';
?>