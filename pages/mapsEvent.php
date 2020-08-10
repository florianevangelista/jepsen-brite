<?php
  try
        {
           $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root');
        }
    catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

if (isset($_POST['submit_adresse'])){

	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$codePostal = $_POST['codePostal'];
	$adresse = str_replace(' ', '+', $adresse); 
	$ville = str_replace(' ', '+', $ville);
	?>

	<iframe width="425" height="350" src="http://maps.google.fr/maps?q=<?php echo $adresse; ?>, <?php echo $ville; ?>, <?php echo $codePostal; ?>&amp;t=h&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe>

	<?php
}

?>







<form method="POST">
	<p>
		<input type="text" name="adresse" placeholder="adresse">
		<input type="text" name="ville" placeholder="ville">
		<input type="text" name="codePostal" placeholder="codePostal">


	</p>
		<input type="submit" name="submit_adresse">
</form>
