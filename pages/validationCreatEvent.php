<?php

    session_start();

    include '../Parsedown.php';
    $Parsedown = new Parsedown();

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_SESSION['Personid'])) {
        $req = $bdd->prepare('INSERT INTO evenements(Title, dt, hr, Img, Dsc, Category, Personid, video) VALUES(:Title, :dt, :hr, :Img, :Dsc, :Category, :Personid, :video)');
        $req->execute(array(
            'Title' => $_POST['title'],
            'dt' => $_POST['start-event'],
            'hr' => $_POST['startTime'],
            'Img' => $_POST['image'],
            'Dsc' => $Parsedown->line($_POST['description']),
            'Category' => $_POST['event'],
            'Personid' => $_SESSION['Personid'],
            'video' => $_POST['video']
        ));
    }

    if($req) {
        header('location: page-creatEvent.php?req=true');
    } else {
        header('location: page-creatEvent.php?req');
    }
?>