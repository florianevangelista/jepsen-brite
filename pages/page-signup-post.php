<?php

try
{
    $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=jmgevcvn8tc1r1u3", 'ppitvzphdz3rrjs4', 'rcsmt0yc25rgs1zj', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['submitSignup'])) {

$FirstName=htmlspecialchars($_POST['FirstName']);
$LastName=htmlspecialchars($_POST['LastName']);
$Email=htmlspecialchars($_POST['Email']);
$Mdp = sha1($_POST['Mdp']);
$confirmationMdp = sha1($_POST['confirmationMdp']);

// on verifie que les cases ne sont pas vide

    if(!empty($_POST['FirstName']) AND !empty($_POST['LastName']) AND !empty($_POST['Email']) AND !empty($_POST['Mdp']) AND !empty($_POST['confirmationMdp'])){
       
        $FistNamelength = strlen($FistName);
        $LastNamelength = strlen($LastName);

            if($FistNamelength <= 255 AND $FistNamelength <= 255) {
                if(filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM persons WHERE Email = ?");
                    $reqmail->execute(array($Email));
                    $mailexist = $reqmail->rowCount();
                        if($mailexist == 0) {
                            if($Mdp == $confirmationMdp) {
                                $insertmbr = $bdd->prepare("INSERT INTO persons(FirstName, LastName, Email, Mdp) VALUES(?, ?, ?, ?)");
                                $insertmbr->execute(array($FirstName, $LastName, $Email, $Mdp));
                                $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                header('location: mail.php');
                            } else {
                                $erreur = "Vos mots de passes ne correspondent pas !";
                            }
                        } else {
                          $erreur = "Adresse mail déjà utilisée !";
                       }
                } else {
                       $erreur = "Votre adresse mail n'est pas valide !";
                    }
            
        } else {
            $erreur = "Votre Prenom et Nom ne doivent pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>



<!-- // $requete = $bdd->prepare('INSERT INTO User (fist_name, last_name, email) VALUES(:fist_name, :last_name, :email)'); 

// $requete->execute(array(
//     'fist_name' => $fist_name,
//     'last_name' => $last_name,
//     'email' => $email

// ));

// echo "page post";
// Puis rediriger vers 
// header('Location: profilValider.php'); -->


