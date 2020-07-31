<?php

$bdd = new PDO("mysql:host=localhost;dbname=event_manager;charset=utf8", "root", "");


if ($_GET['do'] == 'delete') {
        $deleteEvent = $bdd->prepare("DELETE FROM evenements WHERE EventId=? LIMIT 1");
        $deleteEvent->execute(array($_GET['EventId']));
        header('Location: ../index.php');

        // echo $deleteEvent->rowCount();
}