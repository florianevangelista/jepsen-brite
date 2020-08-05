<?php
require_once('../php/initialize.php');
$page_title = 'Dashboard';
require('../php/head.html');
?>

<?php // IF session ID is set, display page/ ELSE: redirect to Index
if (isset($_SESSION['Personid'])) { ?>

<!-- Navbar Start -->
<header id="topnav" class="defaultscroll sticky bg-white">
    <div class="container">
        <!-- Logo -->
        <div>
            <a class="logo" href="../index.php">Jepsen-Brite<span class="text-primary">.</span></a>
        </div>
        <!-- Home & Categories-->
        <div id="navigation">
            <ul class="navigation-menu" style="align-items:center;">
                <li><a href="../index.php">Accueil</a></li>
                <li>
                    <form action="" method="POST" name="eventlist">
                        <select style="cursor:pointer; border: none; font-weight: 600; font-family: Nunito;" class="form-control" id="category" name="category" onchange="eventlist.submit();">
                            <option selected disabled>Mes évènements</option>
                            <option value="ByMe">Organisé par <?php echo $_SESSION['FirstName'] ?></option>
                            <option value="Concert">Concert</option>
                            <option value="Festival">Festival</option>
                            <option value="Conference">Conférences</option>
                            <option value="Exhibition">Exhibition</option>
                        </select>
                    </form>
                </li>
                <li>
                    <form action="" method="POST" name="previouseventlist">
                        <select style="cursor:pointer; border: none; font-weight: 600; font-family: Nunito;" class="form-control" id="category" name="previous_category" title="Archives" onchange="previouseventlist.submit();">
                            <option selected disabled>Archives</option>
                            <option value="ByMe">Organisé par <?php echo $_SESSION['FirstName'] ?></option>
                            <option value="Concert">Concert</option>
                            <option value="Festival">Festival</option>
                            <option value="Conference">Conférences</option>
                            <option value="Exhibition">Exhibition</option>
                        </select>
                    </form>
                </li>

                <?php if (isset($_SESSION['FirstName']))
                {?>
                    <li><a href="profilValider.php?Personid=<?=$_SESSION['Personid']?>">Mon Compte</a></li>
                    <li><a href="dashboard.php?Personid=<?=$_SESSION['Personid']?>">Dashboard</a></li>
                    <li><a href="deconnexion-index.php">Logout <?php echo $_SESSION['FirstName'] ?></a></li>
                <?php }  else { ?>
                    <li><a href="page-login.php">Login</a></li>
                    <li><a href="page-signup.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
<!-- Navbar End -->


<?php

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

?>

<!-- Event Start -->
<section class="section" id="courses" style="padding-bottom: 0;">
    <div class="container">
        <!-- Texte d'avant section -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Dashboard</h4>
                    <p class="text-muted para-desc mx-auto mb-0"><span class="text-primary font-weight-bold">Le Dashboard</span> réunit tous les évènements auxquels vous êtes inscrits ou dont vous êtes l'organisateur.</p>
                </div>
            </div>
        </div>

        <!-- Container pour les events et modals -->
        <div class="row">

            <?php if (isset($_SESSION['FirstName'])) {?>
                <!--Add an Event-->
                <a href="page-creatEvent.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <img src="https://img.icons8.com/all/500/add.png" style="width: 70%; ">
                </a>
            <?php } else { ?>
                <!--Add an Event-->
                <a href="page-login.php" class="col-lg-4 col-md-6 col-12 mt-4 pt-2 courses-desc" style="cursor: pointer; background-color:rgba(58, 31, 61, 0.02); border: 1px #eee solid; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
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
                                <li><i class="mdi mdi-city text-muted"></i> <?php echo $row["Category"] . ' / <form class="buttonlinkform" action="" method="POST" name="subcateventlist"><button class="buttonlink" id="category" name="subcat" value="' . $row["Subcat"] . '" onclick="subcateventlist.submit();">' . $row["Subcat"] . '</button></form><br>';?></li><br>
                                <li><i class="mdi mdi-message-text-outline"></i> <?php echo $row["Dsc"] . '<br>';?></li><br>
                                <li><i class="mdi mdi-account-box-outline"></i> <?php echo $row["FirstName"] . " " . $row["LastName"] .'<br>';?></li><br>
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
                                echo '<button type="button" class="btn btn-primary" data-toggle="modal" href="page-login.php" >
                                            <a style="text-decoration:none;color: #ffffff;" href="page-login.php">Se connecter pour commenter</a></button><br><br>';
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
                                    <a onclick="return confirm('voulez-vous vraiment supprimer l\'evenement?'" href="delete-event.php?do=delete&EventId=<?php echo $row['EventId']?>" class="btn btn-danger" role="button"  >Supprimer</a>
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
</section>

<?php } else {
    header("Location: ../index.php");
}
?>
<!--Close HTML-->
</body>
</html>