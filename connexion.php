<?php

require('Include/header.php');
require('Class/User.php');
$title= 'connexion';

$userData = new User();
if(isset($_POST['submit']))
{var_dump($_POST['password']);

    $userData->connect($_POST['login'],$_POST['password']);
    var_dump("caca");
}
?>
<main>    
    <section>
        <div>
            <h3>CONNEXION</h3>
            <form method="post">
                <input type="text" name="login" placeholder="identifiant">
                
                <input type="password" name="password" placeholder="MDP">
                
                <input type="submit" name="submit" value="se connecter">
        </div>                
        </form> 
    </section>
</main>
<?php
require('Include/footer.php');
?>