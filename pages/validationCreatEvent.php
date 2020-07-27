<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $requete = $bdd->prepare('INSERT INTO evenements (Title, dt, hr, Img, Dsc, Category, Personid) VALUES(?, ?, ?, ?, ?, ?)'); 
    $requete->execute(array($_POST['title'], $_POST['start-event'], $_POST['startTime'], $_POST['image'], $_POST['description'], $_POST['event'], 1));

    header('location : page-creatEvent.html');
?>