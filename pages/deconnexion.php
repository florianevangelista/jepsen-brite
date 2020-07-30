<?php
session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

	$_SESSION = array();
	session_destroy();
	header("Location: page-login.php");
?>