<?php
$title = 'Connexion';
require_once 'header.php';
if (isset($_POST['submit'])) {
            
    $newUser = new \Controller\Connexion(); 
    $newUser->connect($_POST['login'], $_POST['password']);
}
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
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
        </form>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
        <p class="text-center"><a href="https://github.com/sofiane-ziri/modul-connexion">Github</a></p>

    </div>
</body>
<?php
require_once 'header.php';
?>


