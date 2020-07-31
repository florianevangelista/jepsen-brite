<?php
session_start();
    try
    {
<<<<<<< HEAD
        $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
=======
        $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=jmgevcvn8tc1r1u3", 'ppitvzphdz3rrjs4', 'rcsmt0yc25rgs1zj', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
>>>>>>> master
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

	$_SESSION = array();
	session_destroy();
	header("Location: page-login.php");
?>