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
            <section>
                <h3>PROFIL</h3>
                <form method="post">
                    <input type="text" name ="login" value="<?= $_SESSION['user']['login']; ?>" placeholder="Identifiant">
                    <input type="submit" name="submit" class="btn btn-info" value="mise à jour du login">
                </form> 
               
<?php
$userData = new User();
if(isset($_POST['register']))
{
    $userData->updatepassword($_POST['password'],$_POST['passwordConfirm']);
}
?>
                <form method="post">     
                   <input type="password" name ="password" value="" placeholder="password">
                   <input type="password" name ="passwordConfirm" value="" placeholder="passwordConfirm">
                   <button type="register" name="register" class="btn btn-info" value="mise à jour du password">Mise à jour du password</button>
                </form>
               
            </section>
            <section>
        <h2>Mes réservations</h2>
            <?php 
            $getUserInfos->getAllInfos();
     
            ?> 
        </section>
        </main>
        
<?php
require('Include/footer.php');
?>