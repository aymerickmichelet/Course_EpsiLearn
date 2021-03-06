<?php
session_start();
$titre="Sign in";
include("idbdd.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>EpsiLearn</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php
            if($_SESSION["loggedin"]!=1)
            {
                echo '<li class="buy-tickets"><a href="register_form.php" method="post">Register</a></li>';
                echo '<li class="buy-tickets"><a href="login_form.php" method="post">Log in</a></li>';
            }
            else
            {
                echo '<li class="buy-tickets"><a href="logout.php" method="post">Log out</a></li>';
                echo '<li class="buy-tickets"><a href="dashboard.php" method="post">Dashboard</a></li>';
                echo '<li class="buy-tickets"><a href="profil.php" method="post">'.$_SESSION['loggedin_name'].'.'.$_SESSION['loggedin_lastname'].'</a></li>'; /*profil.php*/
            }
        ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Profil</h2>
        </div>
        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-md-6">
              <input name="name" type="text" class="form-control" readonly value="<?php 
                                                                                    echo $_SESSION['loggedin_name'];
                                                                                  ?>"/>
            </div>
            <div class="form-group col-md-6">
              <input name="lastname" type="text" class="form-control" readonly value="<?php 
                                                                                        echo $_SESSION['loggedin_lastname'];
                                                                                      ?>"/>
            </div>
            <div class="form-group col-md-6">
              <input name="password" type="password" class="form-control" readonly value="aaaaaaaaaaaaaaaaaaaaa"/>
            </div>
            <div class="form-group col-md-6">
              <input name="email" type="email" class="form-control" readonly value="<?php 
                                                                                        echo $_SESSION['loggedin_email'];
                                                                                    ?>"/>
            </div>
            <div class="form-group col-md-6">
              <input name="class" type="text" class="form-control" readonly value="<?php
              switch($_SESSION['loggedin_class']){
                case 1:
                  echo "Bachelor 1";
                  break;
                case 2:
                  echo "Bachelor 2";
                  break;
                case 3:
                  echo "Bachelor 3";
                  break;
                case 4:
                  echo "Engineer 1";
                  break;
                case 5:
                  echo "Engineer 2";
                  break;
              }
            ?>"/>
            </div>
            <div class="col-md-6">
              <input name="name" type="text" class="form-control" readonly value="<?php


              $request = $db->query('SELECT COUNT(fk_userid_file) FROM file WHERE fk_userid_file = "'.$_SESSION['loggedin_id'].'"');
              $request = $request->fetchColumn();
              echo 'You upload: '.$request.' file(s)';
            ?>"/>
            </div>
            </div>
          </div>
        </form>
      </div>
    </section><!-- #contact -->

  <main id="main">

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>
