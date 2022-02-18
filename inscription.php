<?php
$title = "Incscription";
require('Include/header.php');
require('Class/User.php');
?>
<main>
    <section>
        <div class="login-form">
            <form method="post">
                <h2 class="text-center">Inscription</h2>
                <div class="form-group">
                    <?php
                    if (isset($_GET['reg_err'])) {
                        $err = htmlspecialchars($_GET['reg_err']);

                        $userData = new User();
                        if (isset($_POST['submit'])) {
                            $Datas = $userData->register($_POST['login'], $_POST['password'], $_POST['passwordConfirm']);
                        }
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
                    <div class="form-group">
                        <label for="InputLogin">Login</label>
                        <input type="text" class="form-control" name="login" placeholder="identifiant">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Password Confirm</label>

                        <input type="password" class="form-control" name="passwordConfirm">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="s'inscrire">S'inscrire</button>
                </div>
            </form>
        </div>
    </section>
</main>
<?php
$userData = new User();
if (isset($_POST['submit'])) {
    $userData->register($_POST['login'], $_POST['password'], $_POST['passwordConfirm']);
}
?>
<?php
require('Include/footer.php');
?>