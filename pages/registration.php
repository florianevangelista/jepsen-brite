<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    if(isset($_POST['registration'])){
        $Participant = $_GET['Personid'];
        $Eventid = $_GET['Eventid'];
        $alreadyExists = $bdd->query("SELECT Registration_personid, Registration_eventid FROM Registration WHERE Registration_personid = '$Participant' AND Registration_eventid = '$Eventid'");
        $etat = $alreadyExists->rowCount();
        if($etat > 0) {
            echo "You have already registered for this event";
        } else {
            $req = $bdd->prepare('INSERT INTO Registration (Registration_personid, Registration_eventid) VALUES (:nvparticipant, :eventid);');
            $req->execute(array(
                'nvparticipant' => $Participant,
                'eventid' => $Eventid
            ));
            echo 'Ok';
        }
    }

    header('location: ../index.php');
?>