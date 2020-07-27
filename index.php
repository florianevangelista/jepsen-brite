
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
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="index.php">Jepsen-Brite<span class="text-primary">.</span></a>
                </div>                 
                <!-- Navigation Menu-->   
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
                        <li class="has-submenu">
                            <form action="" method="POST">
                            <select id="category" name="previous_category">
                                <option value="" disable select>Previous Event Categories</option>
                                <option value="Concert">Previous Concert</option>
                                <option value="Festival">Previous Festival</option>
                                <option value="Exhibition">Previous Exhibition</option>
                                <option value="Conferences">Previous Conferences</option>
                                <option value="Random">Previous Random</option>
                            </select>
                            <input type="submit" value="Search">
                            </form>
                        </li>

                        <?php 
                        
                        if (isset($_POST['category']))
                        {
                            $ChosenCategory = $_POST['category'];
                        }

                        if (isset($_POST['previous_category']))
                        {
                            $ChosenPreviousCategory = $_POST['previous_category'];
                        }

                        ?>


                        <li><a href="pages/page-login.php">Login</a></li>
                    </ul>
                    <!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        <!-- Hero Start -->
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
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!--end section-->
        <!-- Hero End --> 



        <!-- Courses Start -->
        <section class="section" id="courses">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Explore Our Upcoming Events</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Jepsen-Brite can provide everything you need to generate awareness and bring people together to your event.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                 <div class="row">  <!-- This is the container for the collection-->

                      <!--ADD-->     
                      <a href="pages/page-login.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                            <img src="https://img.icons8.com/all/500/add.png" style="width: 70%; "> 
                      </a>
                    <!--end ADD-->
                    
                     <!--start collection-->
                     <?php 

                    $bdd = new PDO("mysql:host=localhost;dbname=event_manager;charset=utf8", "root", "");


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
                                        <li>
                                            <form action="" method="POST">
                                                <input placeholder="Comments here" type="text" name="comment" data-UserId="<?php echo $row["EventId"]?>" data-Personid="<?php echo $row["Personid"]?>" >
                                                <input type="submit" value="Validate">
                                            </form>
                                            <?php 
                                            
                                            if (isset($_POST['comment']))
                                            {
                        
                                            $CommentTableQuery = "INSERT INTO `comments` (`id`, `comment`, `user_LastName`, `user_FirstName`, `event_Title`, `event_dt`)
                                                        VALUES(?, ?, ?, ?, ?, ?)";
                                            $stmt = $bdd->prepare($CommentTableQuery);
                                            $stmt->execute(array(NULL, $_POST['comment'], 'a definir', 'a definir', 'a definir', '2020-10-28 10:10:10'));
                                            }

                                            $_POST['comment'] = NULL;

                                            ?>
                                        </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }

                    ?>
                    


                    <div class="col-12 mt-4 pt-2 text-center">
                        <a href="pages/page-login.html" class="btn btn-primary">Launch an event <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div><!--end row-->
            </div><!--end container-->

      

    
        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- Magnific Popup -->
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

