<?php
$title = "Connexion";
require('Include/header.php');
require('Class/User.php');



?>
<body>
    <?php if (isset($_GET['reg_err'])) {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch ($err) {
                        case 'success':
                ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                            break;
                    }
                }
                if (isset($_GET['login_err'])) {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch ($err) {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> informations incorrect
                            </div>
                        <?php
                            break;

                        
                    }
                }
                ?>
        <main>    
            <section>
                <h3>CONNEXION</h3>
                <form method="post">
                <div class="form-group">
                <label for="InputLogin">Login</label>
                    <input type="text" class="form-control" name="login" placeholder="identifiant">
                    </div>
                    <div class="form-group">
                    <label for="InputPassword1">Password</label>
                    <input type="password" class="form-control"  name="password" placeholder="MDP">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" value="se connecter">Connexion</button>
                               
                </form> 
            </section>
        </main>
        <?php $userData = new User();
if(isset($_POST['submit']) && ($_POST['password']))
{
    $userData->connect($_POST['login'],$_POST['password']);
}?>
</body>
<?php
require('Include/footer.php');
?>             
  