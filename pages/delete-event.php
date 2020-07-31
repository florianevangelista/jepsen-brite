<?php

$bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=iaj0d3bfcqdzn9jm", 'pec75srf9evxqr4q', 'vaaj2gywif3r1p6h', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if ($_GET['do'] == 'delete') {
        $deleteEvent = $bdd->prepare("DELETE FROM evenements WHERE EventId=? LIMIT 1");
        $deleteEvent->execute(array($_GET['EventId']));
        header('Location: ../index.php');

        // echo $deleteEvent->rowCount();
}