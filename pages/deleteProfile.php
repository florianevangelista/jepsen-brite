 <?php
session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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