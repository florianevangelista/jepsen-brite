<?php

try
{
   $bdd = new PDO('mysql:host=localhost;dbname=event_manager;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_GET['delete']) AND !empty($_GET['delete'])) {
      $delete = (int) $_GET['delete'];
      $req = $bdd->prepare('DELETE FROM persons WHERE Personid = ?');
      $req->execute(array($delete));
   }

if(isset($_GET['delete']) AND !empty($_GET['delete'])) {
      $delete = (int) $_GET['delete'];
      $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
      $req->execute(array($supprime));
   }

$persons = $bdd->query('SELECT * FROM persons ORDER BY Personid DESC');
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
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="index.html">Landrick<span class="text-primary">.</span></a>
                </div>                 
                <div class="buy-button">
                    <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary">Buy Now</a>
                </div><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)">Landing</a><span class="menu-arrow"></span>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="index-saas.html">Saas</a></li>
                                        <li><a href="index-agency.html">Agency</a></li>
                                        <li><a href="index-apps.html">Application</a></li>
                                        <li><a href="index-studio.html">Studio</a></li>
                                        <li><a href="index-business.html">Business</a></li>
                                        <li><a href="index-modern-business.html">Modern Business</a></li>
                                        <li><a href="index-hotel.html">Hotel</a></li>
                                        <li><a href="index-marketing.html">Marketing</a></li>
                                        <li><a href="index-enterprise.html">Enterprise </a></li>
                                        <li><a href="index-coworking.html">Coworking</a></li>
                                        <li><a href="index-cloud-hosting.html">Cloud Hosting</a></li>
                                        <li><a href="index-event.html">Event</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="index-course.html">Course </a></li>
                                        <li><a href="index-personal.html">Personal </a></li>
                                        <li><a href="index-single-product.html">Product </a></li>
                                        <li><a href="index-portfolio.html">Portfolio </a></li>
                                        <li><a href="index-services.html">Service </a></li>
                                        <li><a href="index-payments.html">Payments </a></li>
                                        <li><a href="index-crypto.html">Cryptocurrency </a></li>
                                        <li><a href="index-software.html">Software </a></li>
                                        <li><a href="index-job.html">Job <span class="badge badge-danger rounded"> v1.6 </span> </a></li>
                                        <li><a href="index-customer.html">Customer <span class="badge badge-danger rounded"> v1.6 </span> </a></li>
                                        <li><a href="index-onepage.html">Saas <span class="badge badge-warning rounded ml-2">Onepage</span></a></li>
                                        <li><a href="index-rtl.html">RTL Version <span class="badge badge-primary rounded ml-2">RTL</span></a></li>
                                    </ul>
                                </li>   
                            </ul>
                        </li>
        
                        <li class="has-submenu">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="page-aboutus.html"> About Us</a></li>
                                <li><a href="page-services.html">Services</a></li>
                                <li><a href="page-pricing.html">Pricing</a></li>
                                <li><a href="page-team.html"> Team</a></li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Account <span class="badge badge-danger rounded"> v1.6 </span></a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-profile.html">Profile <span class="badge badge-primary rounded">New</span></a></li>
                                        <li><a href="page-profile-edit.html">Account Setting <span class="badge badge-primary rounded">New</span></a></li>
                                        <li><a href="page-invoice.html">Invoice <span class="badge badge-primary rounded">New</span></a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Careers <span class="badge badge-success rounded"> Added </span></a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-jobs.html">Jobs</a></li>
                                        <li><a href="page-job-detail.html">Job Detail</a></li>
                                        <li><a href="page-job-apply.html">Job Apply</a></li>
                                        <li><a href="page-job-company.html">Company <span class="badge badge-success rounded"> New </span></a></li>
                                        <li><a href="page-job-candidate.html">Candidate <span class="badge badge-success rounded"> New </span></a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Blog</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-blog.html">Blog Grid</a></li>
                                        <li><a href="page-blog-sidebar.html">Blog with Sidebar</a></li>
                                        <li><a href="page-blog-detail.html">Blog Detail</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Works</a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-work.html">Works Grid</a></li>
                                        <li><a href="page-work-detail.html">Work Detail</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> User </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-signup.html">Signup</a></li>
                                        <li><a href="page-recovery-password.html">Recovery Password</a></li>
                                        <li><a href="page-cover-login.html">Login 2</a></li>
                                        <li><a href="page-cover-signup.html">Signup 2</a></li>
                                        <li><a href="page-cover-re-password.html">Recovery Password 2</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-terms.html">Terms of Services</a></li>
                                        <li><a href="page-privacy.html">Privacy Policy</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-comingsoon.html">Coming Soon</a></li>
                                        <li><a href="page-comingsoon2.html">Coming Soon Two </a></li>
                                        <li><a href="page-maintenance.html">Maintenance</a></li>
                                        <li><a href="page-error.html">Error</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu"><a href="javascript:void(0)"> Contact </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="page-contact-detail.html">Contact Detail </a></li>
                                        <li><a href="page-contact-one.html">Contact One </a></li>
                                        <li><a href="page-contact-two.html">Contact Two </a></li>
                                        <li><a href="page-contact-three.html">Contact Three </a></li>
                                    </ul>  
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)">Docs</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="documentation.html">Documentation </a></li>
                                <li><a href="changelog.html">Changelog </a></li>
                                <li><a href="components.html">Components</a></li>
                                <li><a href="widget.html">Widget <span class="badge badge-success rounded"> Added </span></a></li>
                            </ul>
                        </li>
                    </ul><!--end navigation menu-->
                    <div class="buy-menu-btn d-none">
                        <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary">Buy Now</a>
                    </div><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <section class="bg-profile" style="background: url('../images/account/bg.jpg') center center;">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="public-profile position-relative p-4 bg-white overflow-hidden rounded shadow" style="z-index: 1;">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 text-md-left text-center">
                                            <img src="../images/client/05.jpg" class="avatar avatar-medium rounded-pill shadow d-block mx-auto" alt="">
                                        </div><!--end col-->

                                        <div class="col-lg-10 col-md-9">
                                            <div class="row align-items-center">
                                                <div class="col-md-7 text-md-left text-center mt-4 mt-sm-0">
                                                    <h3 class="title mb-0">Krista Joseph</h3>
                                                    <small class="text-muted h6 mr-2">Administrateur</small>
                                                </div><!--end col-->
                                                <div class="col-md-5 text-md-right text-center">
                                                    <ul class="list-unstyled profile-icons mb-0 mt-4">
                                                        <li class="list-inline-item"><a href="page-profile-edit.html" class="rounded-pill bg-dark"><i class="mdi mdi-tools text-light" title="Edit Profile"></i></a></li>
                                                    </ul><!--end icon-->
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
                            <h5 class="mt-4 pt-2">Members :</h5>
                            <div class="text-center">
                                <a href="javascript:void(0)"><img src="../images/client/01.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Calvin" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/02.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Meriam" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/03.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Janelia" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/04.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Cristino" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/05.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Rukshar" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/06.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Rambo" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/07.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Beardo" alt=""></a>
                                <a href="javascript:void(0)"><img src="../images/client/08.jpg" class="avatar avatar-small rounded-pill mt-3" data-toggle="tooltip" data-placement="top" title="Gogo" alt=""></a>
                            </div>
                            
                            <h5 class="mt-4 pt-2">Commentaire :</h5>
                            <div class="row mt-4">
                                <div class="col-6 text-center">
                                    <p class="text-muted mb-0">Les 5 derniers commentaires</p>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-8 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="ml-lg-3">
                            <div class="border-bottom pb-4">
                                <h5>Gestion des Membres</h5>
                                <ul>
                                    <?php while($user = $persons->fetch()) { ?>
                                    <li><?= $user['Personid'] ?> : <?= $user['FirstName'] ?>
                                        <a href="admin.php?userType=user&delete=<?= $user['Personid'] ?>">Supprimer</a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            
                            <div class="border-bottom pb-4">
                              <h5>Gestion des commentaires</h5>
                              <ul> 
                                <?php while($comment = $comments->fetch()) { ?>
                                  <li><?= $comment['Personid'] ?> : <?= $comment['comment'] ?>
                                    <a href="admin.php?userType=comment&delete=<?= $comment['comment'] ?>">Supprimer</a></li>
                                  <?php } ?>
                              </ul>
                              
                            </div>

                            <div class="border-bottom pb-4">
                              <h5>Creer un nouvelle admin</h5>
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