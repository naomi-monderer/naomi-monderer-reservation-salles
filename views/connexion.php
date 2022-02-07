<?php
$title = 'Connexion';
require_once 'header.php';
require_once('../libraries/Controllers/connexion.php');
//require_once('../librairies/Models/database.php');

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
            <input type="login" name="login" class="form-control" placeholder="login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary btn-block" value="register" name="register">Connexion</button>
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>

    </div>
</body>
<?php
if (isset($_POST['register'])) { 
    $newUser = new \Controller\Connexion(); 
    $newUser->connect($_POST['login'], $_POST['password']);
}
require_once 'header.php';
?>


