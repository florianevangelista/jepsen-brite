<?php 
    $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=iaj0d3bfcqdzn9jm", 'pec75srf9evxqr4q', 'vaaj2gywif3r1p6h', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
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