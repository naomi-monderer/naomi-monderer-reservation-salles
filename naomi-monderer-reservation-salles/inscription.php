<?php
$title = "Incscription";
require('Include/header.php');
require('Class/User.php');
?>
<?php
                if (isset($_GET['reg_err'])) {
                    $err = htmlspecialchars($_GET['reg_err']);

$userData = new User();
if(isset($_POST['submit']))
{
    $Datas= $userData->register($_POST['login'],$_POST['password'],$_POST['passwordConfirm']);
   
}
// var_dump($userData);
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

<main>    
    <section>
        <h3>INSCRIPTION</h3>
        <form method="post">
        <div class="form-group">
        <label for="InputLogin">Login</label>
            <input type="text" class="form-control" name="login" placeholder="identifiant">
        </div>
        <div class="form-group">
        <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <div class="form-group">
        <label for="InputPassword1">Password Confirm</label>

            <input type="password" class="form-control" name="passwordConfirm" >
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="s'inscrire">S'inscrire</button>
                            
        </form> 
    </section>
</main>
<?php 
$userData = new User();
if(isset($_POST['submit']))
{
    $userData->register($_POST['login'],$_POST['password'],$_POST['passwordConfirm']);
}
?>
<?php
require('Include/footer.php');
?>             
                    