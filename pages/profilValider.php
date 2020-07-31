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
            $getid = intval($_GET['Personid']);
            $requser = $bdd->prepare('SELECT * FROM persons WHERE Personid = ?');
            $requser->execute(array($getid));
            $userinfo = $requser->fetch();

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Landrick - Saas & Software Landing Page Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Shreethemes" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="../images/favicon.ico">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->               
        <link rel="stylesheet" href="../css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="../css/owl.theme.default.min.css"/> 
        <!-- Main css -->
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/styleProfil.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="../index.php">Jepsen-brite<span class="text-primary">.</span></a>
                </div>                 
                <!-- End Logo container-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <section class="bg-half bg-light">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <div class="page-next-level">
                                    <h4 class="title"> Account Setting </h4>
                                    <ul class="page-next d-inline-block bg-white shadow p-2 pl-4 pr-4 rounded mb-0">
                                        <li><a href="index.html" class="text-uppercase font-weight-bold text-dark">Home</a></li>
                                        <li><a href="#" class="text-uppercase font-weight-bold text-dark">Pages</a></li> 
                                        <li><a href="#" class="text-uppercase font-weight-bold text-dark">Account</a></li> 
                                       
                                    </ul>
                                </div>
                            </div>  <!--end col-->
                        </div><!--end row-->
                    </div> <!--end container-->
                </div>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Profile Setting Start -->

        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-4 rounded shadow">
                            <h5 class="text-md-left text-center">Personal Detail :</h5>

                            <div class="mt-3 text-md-left text-center d-sm-flex">
                                <img src="../images/client/05.jpg" class="avatar float-md-left avatar-medium rounded-pill shadow mr-md-4" alt="">
                                
                                <div class="mt-md-4 mt-3 mt-sm-0" id="iconPageProfile">
                                    <a href="profilValideEdit.php" class="rounded-pill bg-dark"><i class="mdi mdi-tools" title="Edit Profile"></i>Edit Profile</a>
                                    <a href="deconnexion.php" class="rounded-pill bg-dark"><i class="fas fa-sign-out-alt"></i>Logout</a>
                                </div>
                            </div>

                    
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>First Name</label>
                                            <div><i class="mdi mdi-account icons"></i></div>
                                        <p class="nameUser marginUserInfo">
                                            <?php echo $userinfo['FirstName']; ?>
                                        </p>
                                        
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Last Name</label>
                                            <i class="mdi mdi-account-plus icons"></i>
                                            <p class="lastNameUser marginUserInfo"><?php echo $userinfo['LastName']; ?></p>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Your Email</label>
                                            <i class="mdi mdi-email icons"></i>
                                            <p class="mailUser marginUserInfo"><?php echo $userinfo['Email']; ?></p>
                                        </div> 
                                    </div><!--end col-->
                                    <?php
                                        if(isset($_SESSION['Personid']) AND $userinfo['Personid'] == $_SESSION['Personid']) {
                                    ?>

                                    
                                </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile Setting End -->

        
        <?php
        }
        ?>
        <hr>
        <?php include("footer.php");?>


        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/scrollspy.min.js"></script>
        <!-- SLIDER -->
        <script src="../js/owl.carousel.min.js "></script>
        <script src="../js/owl.init.js "></script>
        <!-- Main Js -->
        <script src="../js/app.js"></script>
    </body>
</html>
<?php   
}else{
    header('Location: page-signup.php');
}
?>