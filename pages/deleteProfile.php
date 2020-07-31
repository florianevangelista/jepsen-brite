 <?php
session_start();
    try
    {
        $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=jmgevcvn8tc1r1u3", 'ppitvzphdz3rrjs4', 'rcsmt0yc25rgs1zj', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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