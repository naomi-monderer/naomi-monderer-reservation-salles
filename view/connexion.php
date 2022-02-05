<?php
$title = 'Connexion';
require_once 'header.php';
if (isset($_POST['register'])) {
            
    $newUser = new \Controller\Connexion(); 
    $newUser->connect($_POST['login'], $_POST['password']);
}
var_dump($_POST)
?>

<body>
    <div class="login-form">
        <form action="connexion.php" method="POST">
            <h2 class="text-center">Connexion</h2>
                <div class="form-group">
                    <label name="login">login</label>
                    <input type="text" id="ConnexionLogin" name="login">                
                </div>
                <div class="form-group">
                    <label name="password">password</label>
                    <input type="password" id="ConnexionPassword" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" id="ConnexionSubmit" value="register" name="register"> 
                </div>
        </form>
        <?php
        
        ?>
        <p class="text-center"><a href="inscription.php">Inscription</a></p>
        <p class="text-center"><a href="https://github.com/sofiane-ziri/modul-connexion">Github</a></p>

    </div>
</body>
<?php
require_once 'header.php';
?>