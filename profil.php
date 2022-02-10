<?php
require('Include/header.php');
require('Class/User.php');

session_start();
echo 'fgdfg';echo '<pre>';
var_dump($_SESSION['user']);
echo '</pre>';

// echo '</pre>';

$userData = new User();
if(isset($_POST['submit']))
{
    $userData->update($_POST['login'],$_POST['password'],$_POST['passwordConfirm']);
}


?>
<body>
        <main>    
            <section>
                <h3>PROFIL</h3>
                <form method="post">
                    <input type="text" name ="login" value="<?= $_SESSION['user']['login']; ?>" placeholder="Identifiant">
                    <input type="password" name ="password" value="" placeholder="Mot de passe">
                    <input type="password" name ="passwordConfirm" value="" placeholder="Mot de passe">

                    <input type="submit" name="submit" value="mise à jour du profil">
                               
                </form> 
            </section>
        </main>
</body>
<?php
require('Include/footer.php');