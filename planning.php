<?php
session_start();
require('Include/header.php');
require('Class/User.php');
require('Class/Reservation.php');

$test = new Reservation();
// $showResaUser = $test->showResaUser();

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
                    
               
                  $resaPlanning = $test->resaPlanning(date('Y-m-d',strtotime('Monday this week +'.$i.'days')).' '.$j.':00:00'); 
                   

                    if (!empty($resaPlanning))
                    {
                        // $DateTime = new DateTime();
                        // $z_debut = strtotime($showResa[0]['debut']); 
                        // $z_fin = strtotime($showResa[0]['fin']); 
                        
                        // $debutdebut = date('d/M/Y h:i:s', $z_debut);
                        // $finfin = date('d/M/Y h:i:s', $z_fin);
                        // $result = $DateTime->diff($finfin,$debutdebut);
                        // var_dump($result);
                        // <a href="chemin;php?id=$reservations[0]['id']"></a>
                        
                        echo '<td style="background:purple">
                        <a href="reservation.php?id_resa=$id_resa"></a>'
                        .$resaPlanning[0]['login'].$resaPlanning[0]['titre'].
                        '</td>';
                       
                        
                    }
                    else
                    {
                        echo '<td style ="background:green";>
                        <form action="reservation-form.php">
                           <button style ="background:green">LIBRE</button>
                        </form>
                        </td>';
                    }
                }  
              
                
                ?>
                
            </tr>
        <?php endfor;?>
                
</table>
