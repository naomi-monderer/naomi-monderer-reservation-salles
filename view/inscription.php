<?php
$title = 'Inscription';
require_once 'header.php';

// REQUIRE TA CLASS QUAND TU L'APPELLES
require_once('../libraries/Controller/Inscription.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="shortcut icon" href="https://img.icons8.com/ios-filled/50/000000/share-2.png" type="image/x-con">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="public/CSS/style.css" rel="stylesheet">
            <link rel="shortcut icon" href="https://img.icons8.com/ios/50/000000/connectdevelop.png" type="image/x-con">
            <link href="../public/CSS/style.css" rel="stylesheet">
            <link rel="shortcut icon" href="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-User-essential-collection-bearicons-glyph-bearicons.png" type="image/x-con">
    </head>
    <header>
    </header>
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
            <label name="login">Login</label>
            <input type="login" name="login" class="form-control" placeholder="login" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <label name="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <label name="confirm_password">Confirm password</label>
            <input type="password" name="password_retype" class="form-control" placeholder="Validez le mot de passe" required="required" autocomplete="off">
            </div>
            <input style="margin-bottom:30px;" type="submit" id="inscriptionSubmit" value="register" name="register">

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

