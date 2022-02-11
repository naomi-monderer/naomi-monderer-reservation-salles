<?php
require('Include/header.php');
require('Class/User.php');

$userData = new User();
if(isset($_POST['submit']))
{
    $Datas= $userData->register($_POST['login'],$_POST['password'],$_POST['passwordConfirm']);
   
}
var_dump($userData);


?>
<body>
        <main>    
            <section>
                <h3>INSCRIPTION</h3>
                <form method="post">
                    <input type="text" name="login" placeholder="identifiant">
                   
                    <input type="password" name="password" placeholder="MDP">
                    <input type="password" name="passwordConfirm" placeholder="confirmez MDP">

                    <input type="submit" name="submit" value="s'inscrire">
                               
                </form> 
            </section>
        </main>
</body>
<?php
require('Include/footer.php');
?>             