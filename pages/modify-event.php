<?php

$bdd = new PDO("mysql:host=localhost;dbname=event_manager;charset=utf8", "root", "");


if (isset($_POST['modify-title'])) {
            $modifyEvent = $bdd->prepare("UPDATE evenements SET Title=?, dt=?, hr=?, Img=?, Dsc=?  WHERE EventId = ?");
            $modifyEvent->execute(array($_POST['modify-title'], $_POST['modify-dt'], $_POST['modify-hr'], $_POST['modify-img'], $_POST['modify-dsc'], $_POST['modify-eventid']));
            header('Location: ../index.php');
        }

?>