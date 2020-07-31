<?php

    session_start();

    include '../Parsedown.php';
    $Parsedown = new Parsedown();

    try {
        $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=jmgevcvn8tc1r1u3", 'ppitvzphdz3rrjs4', 'rcsmt0yc25rgs1zj', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_SESSION['Personid'])) {
        $req = $bdd->prepare('INSERT INTO evenements(Title, dt, hr, Img, Dsc, Category, Personid) VALUES(:Title, :dt, :hr, :Img, :Dsc, :Category, :Personid)');
        $req->execute(array(
            'Title' => $_POST['title'],
            'dt' => $_POST['start-event'],
            'hr' => $_POST['startTime'],
            'Img' => $_POST['image'],
            'Dsc' => $Parsedown->line($_POST['description']),
            'Category' => $_POST['event'],
            'Personid' => $_SESSION['Personid']
        ));
    }

    if($req) {
        header('location: page-creatEvent.php?req=true');
    } else {
        header('location: page-creatEvent.php?req');
    }
?>