<?php
session_start();
$title = "Profil";
require('Include/header.php');
require('Class/User.php');

$userData = new User();
$getUserInfos = new User();
if(isset($_POST['submit']))
{
    $userData->updatelogin($_POST['login']);
}
?>

<main>

    <body>
        <section class="Profil">
            <article>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="login" value="" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info" value="mise à jour du login">
                        </div>
                    </form>
                </div>
            </article>

            <?php
            $userData = new User();
            if (isset($_POST['register'])) {
                $userData->updatepassword($_POST['password'], $_POST['passwordConfirm']);
            }
            ?>
            <article>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <input type="password" name="password" value="" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwordConfirm" value="" placeholder="passwordConfirm">
                        </div>
                        <button type="register" name="register" class="btn btn-info" value="mise à jour du password">Mise à jour du password</button>
                    </form>
                </div>
            </article>
        </section>


        <section>
            <article>
                <h2 class="Profil">Mes réservations</h2>
                <table> <?php $getUserInfos->getAllInfos(); ?></table>
            </article>
        </section>
</main>

<?php
require('Include/footer.php');
?>