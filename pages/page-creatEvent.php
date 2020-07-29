<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Event</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/styleCreatEvent.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="../images/favicon.png">
	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Icons -->
	<link href="../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Magnific -->
	<link href="../css/magnific-popup.css" rel="stylesheet" type="text/css" />
	<!-- Slider -->               
	<link rel="stylesheet" href="../css/owl.carousel.min.css"/> 
	<link rel="stylesheet" href="../css/owl.theme.default.min.css"/>   
	<!-- FLEXSLIDER -->
	<link href="../css/flexslider.css" rel="stylesheet" type="text/css" />
	<!-- Main css --> 
	<link href="../css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<!-- Navbar STart -->
	<header id="topnav" class="defaultscroll sticky bg-white">
		<div class="container d-flex justify-content-between">
			<!-- Logo container-->
			<div>
				<a class="logo" href="../index.php">Jepsen-brite<span class="text-primary">.</span></a>
			</div>        
			<!-- Navigation Menu-->   
			<div id="navigation">
                    <ul class="navigation-menu" style="align-items:center;">
                        <li><a href="page-login.php">Login</a></li>
                    </ul>
                    <!--end navigation menu-->
			<!-- End Logo container-->
		</div><!--end container-->
	</header><!--end header-->
	<!-- Navbar End -->

	<section class="section">
			<h1>Création de votre évenenement</h1>
			<form class="container" action="validationCreatEvent.php" method="post">
				<div class="form-group">
					<label for="formGroupExampleInput">Titre de l'évenenement</label>
					<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom de l'évenenement" name="title">
				</div>
				<div class="form-group">
					<label for="typeOfEvent">Type d'évenenement</label>
					<select id="typeOfEvent" name="event" class="form-control">
						<option value="concert">Concert</option>
						<option value="festival">Festival</option>
						<option value="conference">Conférence</option>
						<option value="exhibition">Exhibition</option>
					  </select>
				</div>
				<div class="form-group">
					<label for="start">Start date:</label>

					<input type="date" id="start" name="start-event"
					value=""
					min="2020-01-01" max="2022-12-31">
					<input type="time" id="startTime" name="startTime" min="17:00" max="00:00" required>
				</div>
				<div class="form-group">
					<label for="imageUrl">Choisissez une image</label>
					<input type="text" class="form-control" id="imageUrl" placeholder="URL de l'image" name="image">
				</div>
				<div class="form-group">
					<label for="validationTextarea">Description</label>
					<textarea class="form-control" id="validationTextarea" placeholder="écrivez ici" name="description" required></textarea>
				</div>

				<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Valider" >
				<?php 
					if(isset($_GET["req"])){
						if($_GET["req"] == true) {
							echo "<p style='color: #2fc641; margin-top: 15px;'>L'événement a été créé</p>";
						} else {
							echo "<p style='color: #d33434; margin-top: 15px';>Vous n'êtes pas connecté</p>";
						}
					}
				?>
			</form>
	</section>

	<?php include("footer.php");?>

<!-- <h2>Vos évenements</h2>
	<div class="container">
  		<div class="row">
    		<div class="col-sm">
      			<div class="card" style="width: 18rem;">
  					<img src="https://www.bapteme.fr/media/catalog/product/cache/2/image/9df78eab33525d08d6e5fb8d27136e95/2/5/2575001_copier__2.jpg" class="card-img-top" alt="...">
  					<div class="card-body">
	    				<h5 class="card-title">Card title</h5>
	    				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	    				<a href="#" class="btn btn-primary">Go somewhere</a>
  					</div>
				</div>
    		</div>
    		<div class="col-sm">
      			<div class="card" style="width: 18rem;">
  					<img src="https://www.bapteme.fr/media/catalog/product/cache/2/image/9df78eab33525d08d6e5fb8d27136e95/2/5/2575001_copier__2.jpg" class="card-img-top" alt="...">
  					<div class="card-body">
	    				<h5 class="card-title">Card title</h5>
	    				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	    				<a href="#" class="btn btn-primary">Go somewhere</a>
  					</div>
				</div>
    		</div>
    		<div class="col-sm">
      			<div class="card" style="width: 18rem;">
  					<img src="https://www.bapteme.fr/media/catalog/product/cache/2/image/9df78eab33525d08d6e5fb8d27136e95/2/5/2575001_copier__2.jpg" class="card-img-top" alt="...">
  					<div class="card-body">
	    				<h5 class="card-title">Card title</h5>
	    				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	    				<a href="#" class="btn btn-primary">Go somewhere</a>
  					</div>
				</div>
    		</div>
  		</div>
	</div> -->
</body>
</html>