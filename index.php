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
        <link rel="shortcut icon" href="images/favicon.ico">
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
                        <li><a href="index.php">Home</a></li>
                        <li>
                            <form action="" method="POST">
                            <select id="category" name="category">
                                <option value="" disabled select>Event Categories</option>
                                <option value="Concert">Concert</option>
                                <option value="Festival">Festival</option>
                                <option value="Exhibition">Exhibition</option>
                                <option value="Conferences">Conferences</option>
                                <option value="Random">Random</option>
                            </select>
                            <input type="submit" value="Search">
                            </form>
                        </li>
                        <li>
                            <form action="" method="POST">
                            <select id="category" name="previous_category">
                                <option value="" disabled select>Previous Event Categories</option>
                                <option value="Concert">Previous Concert</option>
                                <option value="Festival">Previous Festival</option>
                                <option value="Exhibition">Previous Exhibition</option>
                                <option value="Conferences">Previous Conferences</option>
                                <option value="Random">Previous Random</option>
                            </select>
                            <input type="submit" value="Search">
                            </form>
                        </li>
                        <li style="color: #ccc; position: absolute; top: 0px; left: 0px;"><?php if (isset($_SESSION['FirstName'])) { echo $_SESSION['FirstName'] . "<br>" .  $_SESSION['LastName'] . "<br>" . "connecte" ; }?></li>

                        <li><a href="pages/page-login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->
        
        <!-- First Highlighted Event -->
        <section class="main-slider">
            <ul class="slides"> 
                <li class="bg-slider" style="background-image:url('https://www.amfiweb.net/wp-content/uploads/2016/12/holi-feast-3.jpg')">
                    <div class="home-center">
                        <div class="home-desc-center">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <div class="title-heading text-white mt-4">
                                            <h1 class="display-4 font-weight-bold mb-3">Summer Festival</h1>
                                            <p class="para-desc mx-auto text-light" style="font-size: 24px; font-weight: bold;">Enroll with us for the best summer time of your life !</p>
                                            <div class="mt-4">
                                                <a href="#courses" class="btn btn-primary mt-2 mr-2 mouse-down"><i class="mdi mdi-book-open-variant"></i> More Events</a>
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



        <!-- Event Start -->
        <section class="section" id="courses">
            <div class="container">
                <!-- Texte d'avant section -->
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Explore Our Upcoming Events</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Jepsen-Brite can provide everything you need to generate awareness and bring people together to your event.</p>
                        </div>
                    </div>
                </div>

                <!-- Container pour les events et modals -->
                <div class="row">

                    <!--Add an Event-->     
                    <a href="pages/page-login.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                        <img src="https://img.icons8.com/all/500/add.png" style="width: 70%; "> 
                    </a>

                 
                    
                   
<?php 

$bdd = new PDO("mysql:host=localhost;dbname=event_manager;charset=utf8", "root", "");

if (isset($_POST['category']))
{
$ChosenCategory = $_POST['category'];
}

if (isset($_POST['previous_category']))
{
$ChosenPreviousCategory = $_POST['previous_category'];
}

#FilteredRequest can be the default request or a specific category request


$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE dt>=" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt ASC";

if (isset($ChosenCategory))
{
$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE Category='" . $ChosenCategory . "'" . "AND dt>=" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt ASC";
} 

if (isset($ChosenPreviousCategory)) 
{
$FilteredRequest = "SELECT * FROM persons p INNER JOIN evenements e ON p.Personid = e.Personid WHERE Category='" . $ChosenPreviousCategory . "'" . "AND dt<" . "'" . date("Y-m-d H:i:s") . "'" . "ORDER BY dt DESC";
} 

$EventsTable = $bdd->query("$FilteredRequest");

                    #Code qui va se repeter (Event + Modal pour chaque event)
                    while ($row = $EventsTable->fetch(PDO::FETCH_ASSOC)) {?>
                    
                        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                        <div class="courses-desc position-relative overflow-hidden rounded border">
                            <div class="position-relative d-block overflow-hidden">
                                <img src="https://d22ir9aoo7cbf6.cloudfront.net/wp-content/uploads/sites/2/2016/06/Atlantis-04.jpg" class="img-fluid rounded-top mx-auto" alt="">
                            </div>
                            <div class="content p-3"><br>
                                <h5><a href="javascript:void(0)" class="title text-dark"></a></h5>
                                <div class="fees">
                                    <ul class="list-unstyled mb-0 numbers">
                                        <li><i class="mdi mdi-timer text-muted"></i> <?php echo $row["Title"] . '<br>';?></li><br>
                                        <li><i class="mdi mdi-timer text-muted"></i> <?php echo $row["dt"] . '<br>';?></li>
                                        <li><i class="mdi mdi-city text-muted"></i> <?php echo $row["Category"] . '<br>';?></li><br>
                                        <li><i class="mdi mdi-message-text-outline"></i> <?php echo $row["Description"] . '<br>';?></li><br>
                                        <li><i class="mdi mdi-account-box-outline"></i> <?php echo $row["FirstName"] . " " . $row["LastName"] .'<br>';?></li><br>                                       
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['EventId']?>">
                                        Inserer un commentaire
                                        </button><br><br>
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
        <section class="section pb-0">
            <div class="container">

                <!-- Texte de debut de section -->
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-60">
                            <h4 class="title mb-4">Our Happy Customers</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary font-weight-bold">Jepsen-Brite</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
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
INNER JOiN persons p ON c.person_id = p.Personid");

                    while ($row = $CommentairesTable->fetch(PDO::FETCH_ASSOC)) {?>              
                            <div class="customer-testi mr-2 ml-2 text-center p-4 rounded border">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSU9M7jcv6itu1s10N-TzVLojb3rsmCN699JQ&usqp=CAU" style="height: 100px;width:100px;margin: 0 auto; border-radius:50%;"><br>
                                <p style="color:#777;"><?php echo $row['Title'];?></p>
                                <p class="text-muted mt-4">" <?php echo $row['comment'];?> "</p>
                                <h6 class="text-primary">- <?php echo $row['LastName'] . " " . $row['FirstName']?></h6>
                            </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific.init.js"></script>
        <!-- SLIDER -->
        <script src="js/owl.carousel.min.js "></script>
        <script src="js/owl.init.js "></script>
        <!--FLEX SLIDER-->
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/flexslider.init.js"></script>
        <!-- Counter -->
        <script src="js/counter.init.js "></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>
</html>

