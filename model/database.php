<?php
    $dsn = 'mysql:host=cis9cbtgerlk68wl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=wwcz3i1wiy4wlvg6';
    $username = 'wetpbw18ehsha32p';
    $password = 'xaliic6plc7ty1wl';

    try {
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e) {
        $error_message = 'Database Error';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
?>
