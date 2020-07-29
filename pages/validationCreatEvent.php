<?php

try
{
        $bdd = new PDO("mysql:host=localhost;dbname=event_manager;charset=utf8", "root", "");

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$requete = $bdd->prepare('INSERT INTO event(autor, category, message) VALUES(?, ?)'); 

$requete->execute(array($_POST['autor'], $_POST['message']));


header('Location: page-creatEvent.html');
?>