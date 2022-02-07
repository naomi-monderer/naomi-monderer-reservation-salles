<?php

use Models\ConnectDb;

session_start();

require_once('database.php');
$database = new DataBase();
$bdd = $database -> connect();

?>
<table>
    <thead>
        <th></th>
        <?php for($i=0;$i<7; $i++): ?>
            <th><?= date("d-m-y",strtotime("Monday this week +" .$i. "days"))?></th>


        <?php endfor; ?>    
    </thead>
    <tbody>
        <?php for($j = 8; $j <=19; $j++ ): ?>
            <tr>
                <td><?= $j. ":00"?></td>
            </tr>
            <?php
                for($i=0; $i < 7;$i++)
                {
                    echo '<td>'. date("d-m-y",strtotime("Monday this week +" .$i. "days")).' '.$j.'00'.'</td>';
                }
            ?>
                

        <?php endfor; ?>

    </tbody>
</table>