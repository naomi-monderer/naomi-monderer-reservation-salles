<?php
session_start();
require('Include/header.php');
require('Class/User.php');
require('Class/Reservation.php');

$test = new Reservation();

//afficher un lien dans un td vers le form 

?>


<table>
    <thead>
        <th></th>
        <?php for($i=0;$i<7; $i++): ?>
            <th><?= date("d-m-y",strtotime("Monday this week +" .$i. "days"))?></th>


        <?php endfor; ?>    
    </thead>
    <tbody>
        <?php for ($j = 8; $j <=19; $j++ ): ?>
            <tr>
                <td><?= $j. ":00"?></td>
           
            <?php
                for ($i=0; $i < 7;$i++)
                {
                    
                  $reservations= $test->getDatas(date('Y-m-d',strtotime('Monday this week +'.$i.'days')).' '.$j.':00:00');
                    
                    var_dump($reservations);

                    if (!empty($reservations))
                    {
                        
                        
                        echo '<td style="background:purple";>Créneau Reservé </td>';
                    }
                    else
                    {
                        echo '<td style ="background:green";>
                        <form action="reservation-form.php">
                           <button></button>
                        </form>
                        </td>';
                    }
                }   
                ?>
                
            </tr>
        <?php endfor;?>
                
</table>
