<?php

require ('header.php');
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

<main>

<section>
        <form class="block" method="POST" action="">
        <h2>Inscription</h2>

            <label name="login">Login</label>
            <input type="text" id="inscriptionLogin" name="login"><br />

            <label name="password">Password</label>
            <input type="password" id="inscriptionPassword" name="password"><br />

            <label name="confirm_password">Confirm password</label>
            <input type="password" id="inscriptionConfirm_password" name="confirm_password"><br />

            <input style="margin-bottom:30px;" type="submit" id="inscriptionSubmit" value="register" name="register">
        </form>
    <?php

    if (isset($_POST['register'])) {
        $newUser = new \Controller\Inscription(); // prend pas le bon
        $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password']);
        }

    ?>
</section>
</main>
<?php
require ('footer.php');
?>