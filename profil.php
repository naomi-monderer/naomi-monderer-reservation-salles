<?php
session_start();

// require('Include/header.php');
require('Include/header.php');
require('Class/User.php');
require('Class/Reservation.php');

echo '<pre>';
// var_dump($_SESSION['user']);
echo '</pre>';

// echo '</pre>';

$userData = new User();
$getUserInfos = new User();
$userReser = new Reservation();
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
        <section>
        <h2>Mes réservations</h2>
            <?php 
            // $userReser->displayReservation();($_SESSION['user']['login']);
            $getUserInfos->getAllInfos();
        //    var_dump($a);
            // echo '<input type="submit" name="supprimer" value="supprimer" class = " validation ">';
            // if(isset($_POST['supprimer'])){
            //     $user->suppression($_SESSION['user']['id']);
            // }
            ?> 
        </section>
    </main>
</body>
<?php
require('Include/footer.php');