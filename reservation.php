<?php
session_start();
require_once('Class/Reservation.php');
require_once('Class/User.php');

if(isset($_SESSION['user']))
{
    // $idResaUser=$_GET["idResaUser"];
    $getResaUser = new Reservation();
   $displayResa = $getResaUser->getResaUser();
   

}


?>

<main>
    <section>
        <div>
            <p>
             <   
           <p> Titre:
                <?php ?>
            </p>
            <p>

            </p>   
        </div>
    </section>
</main>