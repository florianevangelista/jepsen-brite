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
if(isset($_POST['submitSignup'])) {

$FirstName=htmlspecialchars($_POST['FirstName']);
$LastName=htmlspecialchars($_POST['LastName']);
$Email=htmlspecialchars($_POST['Email']);
$Mdp = sha1($_POST['Mdp']);
$confirmationMdp = sha1($_POST['confirmationMdp']);

// on verifie que les cases ne sont pas vide

    if(!empty($_POST['FirstName']) AND !empty($_POST['LastName']) AND !empty($_POST['Email']) AND !empty($_POST['Mdp']) AND !empty($_POST['confirmationMdp'])){
       
        $FirstNamelength = strlen($FirstName);
        $LastNamelength = strlen($LastName);

            if($FirstNamelength <= 255 AND $FirstNamelength <= 255) {
                if(filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM persons WHERE Email = ?");
                    $reqmail->execute(array($Email));
                    $mailexist = $reqmail->rowCount();
                        if($mailexist == 0) {
                            if($Mdp == $confirmationMdp) {
                                $insertmbr = $bdd->prepare("INSERT INTO persons(FirstName, LastName, Email, Mdp) VALUES(?, ?, ?, ?)");
                                $insertmbr->execute(array($FirstName, $LastName, $Email, $Mdp));
                                
                                $_SESSION['Email'] = $Email;
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
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Jepsen-Brite</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Shreethemes" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="../images/favicon.png">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Main css -->
        <link href="../css/style.css" rel="stylesheet" type="text/css" />

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
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="../index.php" class="text-white rounded d-inline-block text-center"><i class="mdi mdi-home"></i></a>
        </div>

        <!-- Hero Start -->
        <section class="bg-home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="mr-lg-5">   
                                    <img src="../images/user/signup.png" class="img-fluid d-block mx-auto" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="login_page bg-white shadow rounded p-4">
                                    <div class="text-center">
                                        <h4 class="mb-4">Signup</h4>  
                                    </div>
                                    <form class="login-form" action="" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label for="FirstName">First name <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" placeholder="First Name" name="FirstName" value="<?php if(isset($FirstName)) { echo $FirstName; } ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">                                                
                                                    <label for="LastName">Last name <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" placeholder="Last Name" name="LastName" value="<?php if(isset($LastName)) { echo $LastName; } ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label for="">Your Email <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="email" class="form-control pl-5" placeholder="Email" name="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label for="Mdp">Password <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" placeholder="Password" name="Mdp">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label for="confirmationMdp">Confirm Password <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" placeholder="Confirm Password" name="confirmationMdp">
                                                </div>
                                            </div>
                                    <!--         <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <input class="btn btn-primary w-100" value="Register" type="submit" name="submitSignup">
                                            </div>
                                                
                                            <div class="mx-auto">
                                                <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="page-login.php" class="text-dark font-weight-bold">Sign in</a></p>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                        if(isset($erreur)) {
                                            echo '<font color="red">'.$erreur."</font>";
                                        }
                                    ?>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div> <!--end container-->
                </div>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- javascript -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/scrollspy.min.js"></script>
        <!-- Main Js -->
        <script src="../js/app.js"></script>
    </body>
</html>