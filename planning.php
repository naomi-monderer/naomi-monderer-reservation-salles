<?php
<<<<<<< HEAD
$title = 'Planning';
?>
<body>
    <?php include 'assets/include/header.php'; ?>
</body>
=======
session_start();
require('Include/header.php');
require('Class/User.php');
require('Class/Reservation.php');

$getData = new Reservation();


// echo '<pre>';
// var_dump($result);
// echo '</pre>';
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
           
            <?php
                for($i=0; $i < 7;$i++)
                {
                    $getData->getDatas(date("Y-m-d",strtotime("Monday this week +" .$i. "days")).' '.$j.'00');
                    // $reservation = $getDatas->getDatas(date("Y-m-d",strtotime("Monday this week +" .$i. "days")).' '.$j.'00');
                    echo '<td>';
                    var_dump($getData);
                    // var_dump($reservation);
                    echo '<td>';
                }
            ?>
                
            </tr>
        <?php endfor; ?>

    </tbody>
</table>
>>>>>>> a28c3e20422f29f0d9ac4311c454ff2b9293c989
