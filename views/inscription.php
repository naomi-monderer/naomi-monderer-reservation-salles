<?php
$title = 'Inscription';
require_once 'header.php';
require_once('../libraries/Controller/Inscription.php');
?>
<body>
    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Inscription</h2>
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

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                            break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                <?php

                    }
                }
                ?>
            </div>
            <div class="form-group">
            <input type="login" name="login" class="form-control" placeholder="login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <input type="password" name="password_retype" class="form-control" placeholder="Validez le mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" value="register" name="register">Inscription</button>
            </div>
        </form>
        <p class="text-center"><a href="connexion.php">Connexion</a></p>
        <?php

        if (isset($_POST['register'])) {
        $newUser = new Controller\Inscription();
        $newUser->register($_POST['login'], $_POST['password'], $_POST['password_retype']);

    }

?>
    </div>
</body>

