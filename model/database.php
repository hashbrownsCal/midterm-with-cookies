<?php
    $dsn = 'mysql:host=acw2033ndw0at1t7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=ixelpa2xu14pnvg5';
    $username = 'co1ocsg01l91sqy8';
    $password = 'gmrkdygccsw10nch';

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
