<?php
    include 'includes/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom style with Bootstrap core CSS imported -->
    <!--<link rel="stylesheet" href="CSS/style.css"> -->
    <link rel="stylesheet" href="CSS/stylesforHome.css">
    <link rel="stylesheet" href="CSS/stylesforCountries.css">
    <link rel="stylesheet" href="CSS/stylesforContact.css">
    <link rel="stylesheet" href="CSS/stylesforCompare.css">
    <link rel="stylesheet" href="CSS/stylesforAbout.css">
    <title>
        <?php    
            echo "$title";
        ?>
    </title>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  </head>
<body data-spy="scroll" data-target="#navScrollspy">
      <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    	<!--<nav class="navigation"></nav> -->    
    
  <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto" id="navScrollspy">
                <li class="nav-item
                <?php
                        if($title == "Gamma: Home"){ echo 'active';}
                    ?>
                ">
                <a class="nav-link" href="index.php">Home <span class="sr-only"(current)</span></a>
                </li>

                <li class="nav-item
                <?php
                        if($title == "Gamma: Countries"){ echo 'active';}
                    ?>
                ">
                  <a class="nav-link" href="Countries.php">Countries</a>
                </li>
                <li class="nav-item
                <?php
                        if($title == "Gamma: Comparison"){ echo 'active';}
                    ?>
                ">
                  <a class="nav-link" href="Compare.php">Comparison</a>
                </li>

                <li class="nav-item
                <?php
                        if($title == "Gamma: Contact"){ echo 'active';}
                    ?>
                ">
                  <a class="nav-link" href="Contact.php">Contact</a>
                </li>
                <li class="nav-item
                <?php
                        if($title == "Gamma: About Us"){ echo 'active';}
                    ?>
                ">
                  <a class="nav-link" href="About.php">About Us</a>
                </li>
                <li class="nav-item
                <?php
                        if($title == "Gamma: Lend A Hand"){ echo 'active';}
                    ?>                
                ">
                    <a class="nav-link" href="HowYouCanHelp.php">Lend A Hand</a>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['currentuser'])){
                            echo "Welcome ".$_SESSION['currentuser'];
                        }
                    ?>
                </li>
              </ul>
              </div>
              <div>
                      <!-- Button trigger login modal -->
                      <?php
                      if(isset($_SESSION['currentuser'])){
                          echo '<a href="includes/logout.php"><button type="button" class="btn btn-primary">Logout</button></a>'; 
                          }
                        else{
                          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</button>';
                        }
                      ?>
                      <!-- Button trigger register modal -->
                      <?php
                      if(isset($_SESSION['currentuser'])){
                          $currentuser = $_SESSION['currentuser'];
                          echo '<button type="button" class="btn btn-primary" id="getUser" data-toggle="modal" data-id="'.$currentuser.'" data-target="#updateModal"><i class="fas fa-eye"></i> Account</button></a>';
                          }
                          else{
                              echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal"> Register </button>';
                      }
                      ?>
                      
                    </div>
      
      </nav>