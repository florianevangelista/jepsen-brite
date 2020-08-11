 <?php
session_start();
    try
    {
        $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=iaj0d3bfcqdzn9jm", 'pec75srf9evxqr4q', 'vaaj2gywif3r1p6h', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
 
if(isset($_GET['Personid']) AND $_GET['Personid'] > 0) { 
    $deleteId = $_SESSION['Personid'];
	$delete = $bdd->prepare("DELETE FROM persons WHERE Personid = ?");
	$delete->execute(array($deleteId));
	
    header('Location: page-signup.php');
        }
?>