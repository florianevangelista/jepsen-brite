<?php
session_start();
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=jepsenBrite;charset=utf8", "root", "root");

    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


    if (isset($_SESSION['Personid'])) {

        $requser = $bdd->prepare("SELECT * FROM persons WHERE Personid = ?");
        $requser->execute(array($_SESSION['Personid']));
        $userinfo = $requser->fetch();
        
        if(isset($_POST['newFirstName']) AND !empty($_POST['newFirstName']) AND $_POST['newFirstName'] != $userinfo['FirstName']) {
            $newFirstName = htmlspecialchars($_POST['newFirstName']);
            $insertFirstName = $bdd->prepare("UPDATE persons SET FirstName = ? WHERE Personid = ?");
            $insertFirstName->execute(array($newFirstName, $_SESSION['Personid']));
            header('Location: profilValider.php?Personid='.$_SESSION['Personid']);
        }
        if(isset($_POST['newLastName']) AND !empty($_POST['newLastName']) AND $_POST['newLastName'] != $userinfo['LastName']) {
            $newLastName = htmlspecialchars($_POST['newLastName']);
            $insertLastName = $bdd->prepare("UPDATE persons SET LastName = ? WHERE Personid = ?");
            $insertLastName->execute(array($newLastName, $_SESSION['Personid']));
            header('Location: profilValider.php?Personid='.$_SESSION['Personid']);
        }
        if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $userinfo['Email']) {
            $newEmail = htmlspecialchars($_POST['newEmail']);
            $insertEmail = $bdd->prepare("UPDATE persons SET Email = ? WHERE Personid = ?");
            $insertEmail->execute(array($newEmail, $_SESSION['Personid']));
            header('Location: profilValider.php?Personid='.$_SESSION['Personid']);
        }
        if(isset($_POST['newMdp']) AND !empty($_POST['newMdp']) AND isset($_POST['newConfirmationMdp']) AND !empty($_POST['newConfirmationMdp'])) {
            $newMdp = sha1($_POST['newMdp']);
            $newConfirmationMdp = sha1($_POST['newConfirmationMdp']);
                if($newMdp == $newConfirmationMdp) {
                    $insertMdp = $bdd->prepare("UPDATE persons SET Mdp = ? WHERE Personid = ?");
                    $insertMdp->execute(array($newMdp, $_SESSION['Personid']));
                    header('Location: profilValider.php?Personid='.$_SESSION['Personid']);
                } else {
                    $msg = "Vos mots de passe ne correspondent pas !";
                }
        }


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

        <!-- Navbar Start -->
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo -->
                <div>
                    <a class="logo" href="index.php">Jepsen-Brite<span class="text-primary">.</span></a>
                </div>                 
                <!-- Home & Categories-->   
                <div id="navigation">
                    <ul class="navigation-menu" style="align-items:center;">
                        <li><a href="index.php">Accueil</a></li>
                        <li>
                            <form action="" method="POST" name="eventlist">
                            <select style="cursor:pointer; border: none; font-weight: 600; font-family: Nunito;" class="form-control" id="category" name="category" onchange="eventlist.submit();">
                                <option selected disabled>Evénements Futurs</option>
                                <option value="Concert">Concert</option>
                                <option value="Festival">Festival</option>
                                <option value="Exhibition">Exhibition</option>
                                <option value="Conferences">Conférences</option>
                                <option value="Random">Random</option>
                            </select>
                            </form>
                        </li>
                        <li>
                            <form action="" method="POST" name="previouseventlist">
                            <select style="cursor:pointer; border: none; font-weight: 600; font-family: Nunito;" class="form-control" id="category" name="previous_category" title="Evénements Passés" onchange="previouseventlist.submit();">
                                <option selected disabled>Evénements Passés</option>
                                <option value="Concert">Concert</option>
                                <option value="Festival">Festival</option>
                                <option value="Exhibition">Exhibition</option>
                                <option value="Conferences">Conférences</option>
                                <option value="Random">Random</option>
                            </select>
                            </form>
                        </li>
                        
                        <?php if (isset($_SESSION['FirstName']))
                        {?>
                            <li><a href="pages/profilValider.php?Personid=<?=$_SESSION['Personid']?>">Mon Compte</a></li>
                            <li><a href="pages/deconnexion-index.php">Logout <?php echo $_SESSION['FirstName'] ?></a></li>
                        <?php }  else { ?>
                            <li><a href="pages/page-login.php">Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </header>
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

       <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-4 rounded shadow">
                            <h5 class="text-md-left text-center">Personal Detail :</h5>

                        <form method="POST" action="" enctype="multipart/form-data">

                            <div class="mt-3 text-md-left text-center d-sm-flex">
                                <div>
                                    <label>Photo Profile</label>
                                    <img src="<?php echo $userinfo['img'];?>" class="avatar float-md-left avatar-medium rounded-pill shadow mr-md-4" alt="" />
                                </div>
                                
                                
                                <div class="mt-md-4 mt-3 mt-sm-0 width">
                                    <a href="deleteProfile.php?Personid=<?=$_SESSION['Personid']?>" class="btn btn-danger mt-2 ml-2">Delete</a>
                                    <a href="profilValider.php?Personid=<?=$_SESSION['Personid']?>" class="btn btn-dark mt-2"><i class="fas fa-undo-alt"></i></i>return</a>
                                </div>
                            </div>

                           
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>First Name</label>
                                            <i class="mdi mdi-account ml-3 icons"></i>
                                            <input name="newFirstName"  type="text" class="form-control pl-5" placeholder="First Name :" value="<?php echo $userinfo['FirstName']; ?>">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Last Name</label>
                                            <i class="mdi mdi-account-plus ml-3 icons"></i>
                                            <input name="newLastName" type="text" class="form-control pl-5" placeholder="Last Name :" value="<?php echo $userinfo['LastName']; ?>">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Your Email</label>
                                            <i class="mdi mdi-email ml-3 icons"></i>
                                            <input name="newEmail" type="email" class="form-control pl-5" placeholder="Your email :" value="<?php echo $userinfo['Email']; ?>">
                                        </div> 
                                    </div><!--end col-->
                                    
                                </div><!--end row-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" class="btn btn-primary" value="Save Changes">
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->

                            
                             <div class="row">
                                
                                <div class="col-md-6 mt-4 pt-2"> 
                                    <h5>Change password :</h5>
                                    <form method="POST" action="">
                                        <div class="row mt-4">
                                        
                                             <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>New password :</label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" placeholder="New password" name="newMdp" required="">
                                                </div>
                                            </div> <!-- end col -->
        
                                             <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label>Re-type New password :</label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" placeholder="Re-type New password" name="newConfirmationMdp" required="">
                                                </div>
                                            </div><!--  end col -->
        
                                            <div class="col-lg-12 mt-2 mb-0">
                                                <input type="submit" class="btn btn-primary" value="Save password">
                                                
                                            </div> <!-- end col -->
                                         </div> <!--end row-->
                                 </form>
                                 <?php if(isset($msg)) { echo $msg; } ?>
                             </div> <!--end col-->
                          </div> <!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile Setting End -->

        <!-- Footer Start -->
       <?php include 'footer.php'; ?>
        <!-- Footer End -->

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
}
else{
    header('Location: page-login.php');
}
?>