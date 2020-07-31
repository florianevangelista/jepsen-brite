<?php

$bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=jmgevcvn8tc1r1u3", 'ppitvzphdz3rrjs4', 'rcsmt0yc25rgs1zj', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if (isset($_POST['modify-title'])) {
            $modifyEvent = $bdd->prepare("UPDATE evenements SET Title=?, dt=?, hr=?, Img=?, Dsc=?  WHERE EventId = ?");
            $modifyEvent->execute(array($_POST['modify-title'], $_POST['modify-dt'], $_POST['modify-hr'], $_POST['modify-img'], $_POST['modify-dsc'], $_POST['modify-eventid']));
            header('Location: ../index.php');
        }

?>
