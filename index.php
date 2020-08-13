<?php
// page1.php

session_start();



#Pour le markdown
include 'Parsedown.php';
$Parsedown = new Parsedown();

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
        <link rel="shortcut icon" href="images/favicon.png">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Magnific -->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->               
        <link rel="stylesheet" href="css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="css/owl.theme.default.min.css"/>   
        <!-- FLEXSLIDER -->
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" />
        <!-- Main css --> 
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/artistyle.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,600&display=swap" rel="stylesheet">
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
                                <option value="Conference">Conférences</option>
                                <option value="Exhibition">Exhibition</option>
                            </select>
                            </form>
                        </li>
                        <li>
                            <form action="" method="POST" name="previouseventlist">
                            <select style="cursor:pointer; border: none; font-weight: 600; font-family: Nunito;" class="form-control" id="category" name="previous_category" title="Evénements Passés" onchange="previouseventlist.submit();">
                                <option selected disabled>Evénements Passés</option>
                                <option value="Concert">Concert</option>
                                <option value="Festival">Festival</option>
                                <option value="Conference">Conférences</option>
                                <option value="Exhibition">Exhibition</option>
                            </select>
                            </form>
                        </li>
                        
                        <?php if (isset($_SESSION['FirstName']))
                        {?>

                            <li><a href="pages/profilValider.php?Personid=<?=$_SESSION['Personid']?>">Mon Compte</a></li>
                            <li><a href="dashboard2.php">Dashboard</a></li>
                            <li><a href="pages/deconnexion-index.php">Logout <?php echo $_SESSION['FirstName'] ?></a></li>
                            <li><a href="pages/page-login.php">Login</a></li>
                            <li><a href="pages/page-signup.php">Sign Up</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->





<?php 

try
    {
        $bdd = new PDO("mysql:host=zpfp07ebhm2zgmrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=iaj0d3bfcqdzn9jm", 'pec75srf9evxqr4q', 'vaaj2gywif3r1p6h', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


if (isset($_POST['category'])) { $ChosenCategory = $_POST['category'];}

if (isset($_POST['previous_category'])) { $ChosenPreviousCategory = $_POST['previous_category'];}

if (isset($_POST['subcat'])) { $subCategory = $_POST['subcat']; var_dump($subCategory);}

$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE dt>=" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt ASC";

if (isset($ChosenCategory))
{
$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE Category='" . $ChosenCategory . "'" . "AND dt>=" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt ASC";
} 

if (isset($ChosenPreviousCategory)) 
{
$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE Category='" . $ChosenPreviousCategory . "'" . "AND dt<" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt DESC";
}

if (isset($subCategory))
{
    $FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE Subcat='" . $subCategory . "'" . "AND dt>=" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt ASC";
}

$FirstEvent = $bdd->query("$FilteredRequest LIMIT 1");


    while ($row = $FirstEvent->fetch(PDO::FETCH_ASSOC)) {?>
        
        <!-- First Highlighted Event -->
        <section class="main-slider">
            <ul class="slides"> 
                <li class="bg-slider" style="background-image:url('<?php echo $row['Img']?>')">
                    <div class="home-center">
                        <div class="home-desc-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="title-heading text-white mt-4">
                                            <h1 class="display-4 font-weight-bold mb-3"><?php echo $row["Title"] ?></h1>
                                            <p class="para-desc mx-auto text-light" style="font-size: 24px; font-weight: bold;"><?php echo $row["Dsc"] ?></p>
                                            <div class="mt-4">
                                                <a href="#courses" class="btn btn-primary mt-2 mr-2 mouse-down"><i class="mdi mdi-book-open-variant"></i> Plus d'informations</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <!-- First Highlighted Event --> 

    <?php } ?>

        <!-- Event Start -->
        <section class="section" id="courses" style="padding-bottom: 0;">
            <div class="container">
                <!-- Texte d'avant section -->
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Nos Evenements</h4>
                            <p class="text-muted para-desc mx-auto mb-0"><span class="text-primary font-weight-bold">Jepsen-Brite</span> fournit tout ce qui est necessaire a une bonne reputation afin de rassembler et de toucher un maximum de monde.</p>
                        </div>
                    </div>
                </div>

                <!-- Container pour les events et modals -->
                <div class="row">

                <?php if (isset($_SESSION['FirstName'])) {?>
                     <!--Add an Event-->     
                     <a href="pages/page-creatEvent.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                         <img src="https://img.icons8.com/all/500/add.png" style="width: 70%; "> 
                     </a>
                <?php } else { ?>
                    <!--Add an Event-->     
                    <a href="pages/page-login.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <img src="https://img.icons8.com/all/500/add.png" style="width: 70%; "> 
                    </a>
                <?php } ?>

                 
                    
                   
<?php 


#FilteredRequest can be the default request or a specific category request

$EventsTable = $bdd->query("$FilteredRequest");

                    #Code qui va se repeter (Event + Modal pour chaque event)
                    while ($row = $EventsTable->fetch(PDO::FETCH_ASSOC)) {?>
                    
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="courses-desc position-relative overflow-hidden rounded border">
                            <div class="position-relative d-block overflow-hidden">
                                <img src="<?php echo $row["Img"];?>" class="img-fluid rounded-top mx-auto" alt="">
                            </div>
                            <div class="content p-3"><br>
                                <h5><a href="javascript:void(0)" class="title text-dark"></a></h5>
                                <div class="fees">
                                    <ul class="list-unstyled mb-0 numbers">
                                        <li><i class="mdi mdi-timer text-muted"></i> <?php echo $row["Title"] . '<br>';?></li><br>
                                        <li><i class="mdi mdi-timer text-muted"></i> <?php echo $row["dt"] . '<br>';?></li>
                                        <li><i class="mdi mdi-city text-muted"></i> <?php echo
                                                '<form class="buttonlinkform" action="" method="POST" name="eventlist"><button class="buttonlink" id="category" name="category" value="' . $row["Category"] . '" onclick="eventlist.submit();">' . $row["Category"] . '</button></form>' .
                                                ' / <form class="buttonlinkform" action="" method="POST" name="subcateventlist"><button class="buttonlink" id="category" name="subcat" value="' . $row["Subcat"] . '" onclick="subcateventlist.submit();">' . $row["Subcat"] . '</button></form><br>';?></li><br>                                        <li><i class="mdi mdi-message-text-outline"></i> <?php echo $row["Dsc"] . '<br>';?></li><br>
                                        <li><i class="mdi mdi-account-box-outline"></i> <?php echo $row["FirstName"] . " " . $row["LastName"] .'<br>';?></li><br>
                                        <li><iframe width="425" height="350" src="http://maps.google.fr/maps?q=<?php echo $row["adresse"];?>, <?php echo $row["ville"];?>, <?php echo $row["codepostal"];?>&amp;t=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe></li><br>
                                        <?php if (!empty($_SESSION['Personid'])) {
                                           if ($_SESSION['Personid'] == $row['Personid']) {

                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'. $row["EventId"] . '">
                                            Inserer un commentaire </button><br><br>' . '<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter-modify-'. $row["EventId"] . '">
                                            Modifier l\'evenement </button><br><br>';
                                        } else if ($_SESSION['Personid'] !== $row['Personid']) {
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'. $row["EventId"] . '">
                                            Inserer un commentaire </button><br><br>';
                                        } 
                                        }  else {
                                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" href="pages/page-login.php" >
                                            <a style="text-decoration:none;color: white;" href="pages/page-login.php">Se connecter pour commenter</a></button><br><br>';
                                    }?>                                   
                                       </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modals -->
                    <div class="modal fade" id="exampleModalCenter<?php echo $row['EventId'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Espace Commentaires</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div>
                            <form action="" method="POST" style="display:flex;margin: 3vh; flex-direction:column;align-items:center; justify-content: space-around;">
                                <label style="display:none;" for="EventId">Event ID (hide)</label> 
                                <input style="display:none;" type="text" name="comments_EventId" value="<?php echo $row["EventId"];?>" ><br>
                                <label for="EventTitle">Evenement</label> 
                                <input type="text" disabled value="<?php echo $row["Title"];?>">
                                <label style="display:none;" for="UserId">User ID (hide)</label> 
                                <input style="display:none;" type="text" name="comments_UserId" value="<?php echo $_SESSION["Personid"];?>"><br> 
                                <label for="Username">Auteur</label> 
                                <input disabled type="text" value="<?php echo $_SESSION["FirstName"] . ' ' . $_SESSION["LastName"];?>"><br>
                                <label>Commentaire</label> 
                                <textarea type="textarea" name="comments_comment" style="height:100px;"></textarea><br>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-secondary" value="Cancel" data-dismiss="modal"></input>
                                    <input type="submit" class="btn btn-primary" value="Send" ></input>
                                </div>

                             </form>
                            </div>
                        </div>
                      </div>
                    </div>


                    <!-- Modify  -->
                    <div class="modal fade" id="exampleModalCenter-modify-<?php echo $row['EventId'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modification de l'evenement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div>
                            <form action="pages/modify-event.php" method="POST" style="display:flex;margin: 3vh; flex-direction:column;align-items:center; justify-content: space-around;">
                                
                                    <input style="display: none;" type="text" class="form-control" value="<?php echo $row['EventId']?>" placeholder="Nom de l'évenenement" name="modify-eventid">

                                    <label for="formGroupExampleInput">Titre de l'évenenement</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['Title']?>" placeholder="Nom de l'évenenement" name="modify-title"><br>

                                    <label for="formGroupExampleInput">Categorie (non modifiable)</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" disabled value="<?php echo $row['Category']?>" placeholder="Nom de l'évenenement" name="modify-category"><br>                               
                               
                                    <label for="start">Start date:</label>
                                    <div style="display: flex;">
                                    <input type="date" id="start" name="modify-dt" value="<?php echo $row['dt']?>" required>
                                    <input type="time" id="startTime" name="modify-hr" value="<?php echo $row['hr']?>" required>
                                    </div><br>
                               
                                    <label for="imageUrl">Choisissez une image</label>
                                    <input type="text" class="form-control" id="imageUrl" value="<?php echo $row['Img']?>" placeholder="URL de l'image" name="modify-img" required><br>
                                
                                    <label for="validationTextarea">Description</label>
                                    <textarea class="form-control" id="validationTextarea" placeholder="écrivez ici" name="modify-dsc" required><?php echo $row['Dsc']?></textarea><br>
                                
                          
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Modifier" ></input>
                                    <a onclick="return confirm('voulez-vous vraiment supprimer l\'evenement?'" href="pages/delete-event.php?do=delete&EventId=<?php echo $row['EventId']?>" class="btn btn-danger" role="button"  >Supprimer</a>
                                </div>

                             </form>
                            </div>
                        </div>
                      </div>
                    </div>


                <?php }


#Insert commentaires
if (isset($_POST['comments_comment']))
{

$insertcomments = $bdd->prepare("INSERT INTO `comments` (`id`, `comment`, `evenements_id`, `person_id`) VALUES (?, ?, ?, ?);");
$insertcomments->execute(array(NULL, $Parsedown->line($_POST['comments_comment']) , $_POST['comments_EventId'] , $_POST['comments_UserId']));
}
?>
                    
                
            </div>
        </div>



    <!-- Carousel Commentaires -->
        <section class="section pb-0" style="margin-bottom: 100px;">
            <div class="container">

                <!-- Texte de debut de section -->
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-60">
                            <h4 class="title mb-4">Nos Clients Satisfaits</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Travaillez avec <span class="text-primary font-weight-bold">Jepsen-Brite</span> pour booster votre reputation, l'attention accordee par vos clients et tout ce dont vous avez besoin pour generer du trafic.</p>
                        </div>
                    </div>
                </div>

                <!-- Carousel loop -->
                <div class="row">
                    <div class="col-12">
                        <div id="customer-testi" class="owl-carousel owl-theme">
                            
<?php $CommentairesTable = $bdd->query("SELECT *
FROM comments c
INNER JOIN evenements e ON  c.evenements_id = e.EventId
INNER JOIN persons p ON c.person_id = p.Personid ORDER BY id DESC");

                    while ($row = $CommentairesTable->fetch(PDO::FETCH_ASSOC)) {?>              
                            <div class="customer-testi mr-2 ml-2 text-center p-4 rounded border">
                                <img src="<?php if (!empty($row['img'])) {echo $row['img'];} else { echo 'https://res.cloudinary.com/apilama/image/fetch/f_auto,c_thumb,q_auto,w_300,h_300/https://s3-us-west-2.amazonaws.com/orfium-public/images/profiles/c88175d44b894f3183ed5c7ce816b907.jpg';}?>" style="height: 100px;width:100px;margin: 0 auto; border-radius:50%;"><br>
                                <h6 style="color:#777;"><?php echo $row['LastName'] . " " . $row['FirstName'];?></h6>
                                <p class="text-muted mt-4">" <?php echo $row['comment'];?> "</p><br>
                                <h6 class="text-primary">- <?php echo $row['Title']?></h6>
                            </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container">
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a class="logo-footer" href="../index.php">Jepsen-brite<span class="text-primary">.</span></a>
                        <p class="mt-4">Start working with Jepsen-brite.</p>
                        <ul class="list-unstyled social-icon social mb-0 mt-4">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-instagram" title="Instagram"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-twitter" title="Twitter"></i></a></li>
                        </ul><!--end icon-->
                    </div><!--end col-->
                    
                    <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h4 class="text-light footer-head">Quick link</h4>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="pages/page-creatEvent.php" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Event</a></li>
                            <li><a href="pages/page-login.php" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Login</a></li>
                            <li><a href="pages/page-signup.php" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Signup</a></li>
                            <li><a href="pages/profilValider.php" class="text-foot"><i class="mdi mdi-chevron-right mr-1"></i>Profil</a></li>
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h4 class="text-light footer-head">Newsletter</h4>
                        <p class="mt-4">Sign up and receive the latest tips via email.</p>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="foot-subscribe form-group position-relative">
                                        <label>Write your email <span class="text-danger">*</span></label>
                                        <i class="mdi mdi-email ml-3 icons"></i>
                                        <input type="email" name="email" id="emailsubscribe" class="form-control pl-5 rounded" placeholder="Your email : " required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" id="submitsubscribe" name="send" class="btn btn-primary rounded w-100" value="Subscribe">
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->

        <!-- javascript -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/scrollspy.min.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/magnific.init.js"></script>
        <!-- SLIDER -->
        <script src="../js/owl.carousel.min.js "></script>
        <script src="../js/owl.init.js "></script>
        <!--FLEX SLIDER-->
        <script src="../js/jquery.flexslider-min.js"></script>
        <script src="../js/flexslider.init.js"></script>
        <!-- Counter -->
        <script src="../js/counter.init.js "></script>
        <!-- Main Js -->
        <script src="../js/app.js"></script>
    </body>
</html>

