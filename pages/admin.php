<?php
session_start();
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_SESSION['Personid']) AND $_SESSION['Personid'] == 6){

$requser = $bdd->prepare("SELECT * FROM persons WHERE Personid = ?");
        $requser->execute(array($_SESSION['Personid']));
        $userinfo = $requser->fetch();

    if(isset($_GET['delete']) AND !empty($_GET['delete'])) {
          $delete = (int) $_GET['delete'];
          $req = $bdd->prepare('DELETE FROM persons WHERE Personid = ?');
          $req->execute(array($delete));
       }

    if(isset($_GET['delete']) AND !empty($_GET['delete'])) {
          $delete = (int) $_GET['delete'];
          $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
          $req->execute(array($delete));
       }

    if(isset($_GET['delete']) AND !empty($_GET['delete'])) {
          $delete = (int) $_GET['delete'];
          $req = $bdd->prepare('DELETE FROM evenements WHERE EventId = ?');
          $req->execute(array($delete));
       }
} 


// else{
//     exit();
// }

$persons = $bdd->query('SELECT * FROM persons WHERE userType = "user" ORDER BY Personid DESC');
$admins = $bdd->query('SELECT * FROM persons WHERE userType = "admin" ORDER BY Personid DESC');
$events = $bdd->query('SELECT * FROM evenements ORDER BY EventId DESC');
$comments = $bdd->query('SELECT * FROM comments ORDER BY comment DESC');
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
        <section class="bg-profile" style="background-color: #202942; background: center center;">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="public-profile position-relative p-4 bg-white overflow-hidden rounded shadow" style="z-index: 1;">
                                    <div class="row align-items-center">
                    

                                        <div class="col-lg-10 col-md-9">
                                            <div class="row align-items-center">
                                                <div class="col-md-7 text-md-left text-center mt-4 mt-sm-0">
                                                    <h3 class="title mb-0"><?php echo $userinfo['FirstName']; ?></h3>
                                                    <small class="text-muted h6 mr-2">Administrateur</small>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--ed container-->
                </div>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Profile Start -->
        <section class="section mt-60">
            <div class="container mt-lg-3">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="p-4 rounded shadow">
        
        
                <div class="row justify-content-center">
                   
                        
                            <h5 class="text-md-left text-center">Personal Detail :</h5>

                            <div class="mt-3 text-md-left text-center d-sm-flex">
                                <img src="<?php echo $grav_url; ?>" class="avatar float-md-left avatar-medium rounded-pill shadow mr-md-4" alt="" />
                                
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
                                        if(isset($_SESSION['Personid']) AND $userinfo['Personid'] == $_SESSION['Personid']) {}
                                    ?>

                                    
                                </div><!--end row-->
                       
                </div><!--end row-->
            
        
        <!-- Profile Setting End -->

                        </div>
                    </div><!--end col-->
                <div class="col-lg-8 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="ml-lg-3">
                        <div class="border-bottom pb-4">
                            <div class="row">
<?php 
// GRAVATAR
 $email = $user['Email'];
 $size = 150;
 $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;
?>
                                <div class="col-lg-6 mt-4">
                                    <h5>Gestion des Membres</h5>
                                    <ul>
                                    <?php while($user = $persons->fetch()) { ?>
                                    <li><img src="<?php echo $grav_url; ?>" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="<?= $user['FirstName'] ?> <?= $user['LastName'] ?>" alt="">

                                        <a href="admin.php?userType=user&delete=<?= $user['Personid'] ?>">Supprimer</a> 
                                    </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                <div class="col-lg-6 mt-4 pt-2 pt-sm-0">
                                    <h5>
                                    Gestion des Admins
                                    </h5>
                                    <ul>
                                    <?php while($user = $admins->fetch()) { ?>
                                    <li><img src="<?php echo $grav_url; ?>" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="<?= $user['FirstName'] ?> <?= $user['LastName'] ?>" alt="">
                                        <a href="admin.php?userType=admin&delete=<?= $user['Personid'] ?>">Supprimer</a>
                                    </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                          

                            <div class="border-bottom pb-4">
                              <h5>Gestion des Commentaires</h5>
                              <ul> 
                                <?php while($comment = $comments->fetch()) { ?>
                                  <li><?= $comment['comment'] ?>
                                    <a href="admin.php?comment=comment&delete=<?= $comment['id'] ?>">Supprimer</a></li>
                                  <?php } ?>
                              </ul>
                              
                            </div>

                            <div class="border-bottom pb-4">
                              <h5>Gestion des Evenements</h5>
                              <ul> 
                                <?php while($event = $events->fetch()) { ?>
                                  <li><?= $event['Title'] ?> : <?= $event['Category']?>
                                    <a href="admin.php?event=EventId&delete=<?= $event['EventId'] ?>">Supprimer</a></li>
                                  <?php } ?>
                              </ul>
                              
                            </div>
<?php
    if(isset($_POST['submitSignup'])) {

    $FirstName=htmlspecialchars($_POST['FirstName']);
    $LastName=htmlspecialchars($_POST['LastName']);
    $Email=htmlspecialchars($_POST['Email']);
    $Mdp = sha1($_POST['Mdp']);
    $confirmationMdp = sha1($_POST['confirmationMdp']);
    $userType = ($_POST['userType']);

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
                                    $insertmbr = $bdd->prepare("INSERT INTO persons(userType, FirstName, LastName, Email, Mdp) VALUES(?, ?, ?, ?, ?)");
                                    $insertmbr->execute(array($userType, $FirstName, $LastName, $Email, $Mdp));
                                    $_SESSION['Email'] = $Email;
                                    $erreur = "Le compte a bien été crée"; 
                                    echo "<meta http-equiv='refresh' content='0'>";
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
                            <div class="border-bottom pb-4">
                              <h5>Creer d'un nouvel utilisateur</h5>
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
                                                    <select class="box-input" name="userType" id="type" >
                                                        <option value="" disabled selected>Type</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
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
                                    
                                            <div class="col-md-12">
                                                <input class="btn btn-primary w-100" value="Register" type="submit" name="submitSignup">
                                            </div>
                                        </div>
                                    </form>
                                     <?php
                                        if(isset($erreur)) {
                                            echo '<font color="red">'.$erreur."</font>";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile End -->

        <!-- Footer Start -->
        <?php include("footer.php");?>
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