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
            <th><?= 
                
                // date("d-m-y",strtotime("Monday this week +" .$i. "days"))
                $dateFrench = $test->formatDate($i);
                ?></th>


        <?php endfor; ?>    
    </thead>
    <tbody>
        <?php for ($j = 8; $j <=19; $j++ ): ?>
            <tr>
                <td><?= $j. ":00"?></td>
           
            <?php
                for ($i=0; $i < 7;$i++)
                {
                    
                    
                  $showResa = $test->showResa(date('Y-m-d',strtotime('Monday this week +'.$i.'days')).' '.$j.':00:00'); 

                  if (!empty($showResa))
                    { ?>
 
                        
                    <td style="background:purple";>
                       <a href="reservation.php?id=<?= $showResa[0]['id'] ?>"><?= $showResa[0]['login'].$showResa[0]['titre'] ?> </a> 
                    </td> 
                       <?php  var_dump($showResa) ?>
                        </pre>
                   <?php }
                    else
                    {
                    ?> <td style ="background:green";>
                        <a href="reservation-form.php?id="> LIBRE </a> 

                        <!-- <form action="reservation-form.php">
                           <button style ="background:green">LIBRE</button> -->
                        </form>
                    </td>
                    <?php
                    }
                }  
                // echo '<pre>';
                // var_dump($showResa);
                // echo '</pre>';
               
                // echo '<pre>';
                // var_dump($getDatas);
                // echo '</pre>';
                
                ?>
                
            </tr>
        <?php endfor;?>
                
</table>
