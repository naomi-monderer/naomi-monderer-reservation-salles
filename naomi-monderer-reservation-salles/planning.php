<?php
session_start();
$title = "Planing";
require('Include/header.php');
require('Class/User.php');
require('Class/Reservation.php');
$test = new Reservation();
$now =  date('Y-m-d h:i:s',strtotime("yesterday"));
if(!empty($_GET['week']))
{
    $week = $_GET['week'];
}
else
{   
    $week = 0;
}
?>
<main>
    <section>
            <form action="" method="get">
                <button class="btn btn-info">suivant</button>
                <input type="hidden" value="<?= $week + 1 ?>" name="week">
            </form>
    
            <form action="" method="get">
                <button class="btn btn-info">précédent</button>
                <input type="hidden" value="<?= $week - 1 ?>" name="week">
            </form>         

        <table class="table table-bordered table-dark">
            <thead>
                <th></th>
                <?php 
            
                for($i=0  ;$i<7; $i++): ?>
                    <th><?= $dateFrench = $test->formatDate($i,$week);?></th>
                <?php endfor; ?>
            </thead>

            <tbody>
                <?php for ($j = 8; $j <=19; $j++ ): ?>
                    <tr>
                            <td><?= $j. ":00"?></td>
                        
                        <?php
                            for ($i=0; $i < 7;$i++)
                            {
                                
                                $date_debut = date('Y-m-d h:i:s',strtotime("Monday this week +$i days +$week weeks $j:00:00"));
                                $showResa = $test->showResa(date('Y-m-d',strtotime('Monday this week +'.$i."days +$week weeks")).' '.$j.':00:00'); 
                                
                                if (!empty($showResa))
                                {  ?>
                                    <td >
                                        <a href="reservation.php?id=<?=$showResa[0]['id']?>>">
                                            <?= $showResa[0]['login'].' '.$showResa[0]['titre']?>
                                        </a> 
                                    </td> 
                                <?php
                                }
                                else if ($i > 4 )
                                {
                                    ?>
                                    <td><p>WEEK-END</p></td>
                                <?php
                                }
                                else if($date_debut <= $now )
                                {
                                    ?>
                                 
                                    <td><p>Trop tard</p>
                                    </td>
                                <?php
                                }
                                
                               
                                else
                                {  
                                    ?>
                                 
                                    <td>
                                        <form action="reservation-form.php" method="get">
                                            <button type="submit"  class="btn btn-success" name="date" value="<?=$date_debut?>">SELECT</button>
                                        </form>
                                    </td>
                                <?php
                                }
                            }  
                        ?>
                            
                    </tr>
                <?php endfor;?>
            </tbody>    
        </table>
    </section>
</main> 
