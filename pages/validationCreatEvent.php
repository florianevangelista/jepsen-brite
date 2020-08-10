<?php

    session_start();

    include '../Parsedown.php';
    $Parsedown = new Parsedown();

      try
        {
           $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root');
        }
    catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

    if (isset($_SESSION['Personid'])) {
        $req = $bdd->prepare('INSERT INTO evenements(Title, dt, hr, ville, adresse, codePostal Img, Dsc, Category, Personid) VALUES(:Title, :dt, :hr, :ville, :adresse, :codePostal, :Img, :Dsc, :Category, :Personid)');
        $req->execute(array(
            'Title' => $_POST['title'],
            'dt' => $_POST['start-event'],
            'hr' => $_POST['startTime'],
            'ville' => $_POST['ville'],
            'adresse' => $_POST['adresse'],
            'codePostal' => $_POST['codePostal'],
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