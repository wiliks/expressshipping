<?php

$a="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621";
require_once "admin/functions/db.php";

$sql2 = 'SELECT namez FROM namez';

$query2 = mysqli_query($connection, $sql2);
$result2 = $connection->query($sql2);
$row2=mysqli_fetch_array($query2);
    if (isset($_POST["ID"])) {

      $ID = $_POST["ID"];
    
      $sql = "SELECT * from package WHERE ID='$ID' ";
      $sql2 = "SELECT EXISTS(SELECT * from package WHERE ID=$ID)";
      $query2 = mysqli_query($connection, $sql2);
      $query = mysqli_query($connection, $sql);
      $result = $connection->query($sql);
      $row=mysqli_fetch_array($query);
      $row3=mysqli_num_rows($query);
  
    if ($row3>0) {

      # code...
    }else{
      header('Location:index.php?notfound');
    }
   
    
    
       
    }
    else {
      header('Location:../index.php?packagenotfound');
    }
    

   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $row2["namez"];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v4.3.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php"><?php echo $row2["namez"];?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
  
          <li><a class="getstarted scrollto" href="index.php">Back To Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
    <!-- ======= Contact Section ======= -->
    <div class="inbox-center">
                                          <?php  
                                                          if (isset($_GET['found'])) {
                                                              echo'<div class="alert alert-success" >
                                                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                 <strong>DONE!! </strong><p>Package Found.</p>
                                                                 </div>';
                                                          }    
                                                          elseif (isset($_GET["changed"])) {
                                                          echo 
                                                          '<div class="alert alert-warning" >
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                                               <strong>CHANGED!!! </strong><p> The package location has been successfully changed.</p>
                                                          </div>'
                                                          ;
                                                      }
                                                      elseif (isset($_GET["error"])) {
                                                          echo 
                                                          '<div class="alert alert-danger" >
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                                                               <strong>ERROR!! </strong><p> There was an error during deleting this record. Please try again.</p>
                                                          </div>'
                                                          ;
                                                      }                                                        
                                                      ?>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Package Found!!!</h2>
            <?php
           echo ' <p>Your package left '.$row["firstlocation"]. ' at '.$row["date"].' and is headed for '.$row["destination"].'. See details about its current location below.  </p> ';
         ?>
          </div>
  
          <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="<?php  echo $row["maplocation"]; ?>" frameborder="0" allowfullscreen></iframe>
          </div>
  
          <div class="row mt-5">


  
           

            <div class="col-lg-4">
            
              <div class="info">
                <div class="email">
                    <i class="bi bi-gift"></i>
                    <h4>Name:</h4>
                    <p><?php echo $row["name"];?></p>
                  </div>
                  <div class="email">
                    <i class="bi bi-pen"></i>
                    <h4>ID:</h4>
                    <p><?php echo $row["ID"];?></p>
                  </div><br>
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4> Current Location:</h4>
                  <p><?php echo $row["location"];?></p>
                </div>

  
                <div class="phone">
                  <i class="bi bi-geo"></i>
                  <h4>Package Destination:</h4>
                  <p><?php echo $row["destination"];?></p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0">
  
              <image src="<?php echo "admin/functions/uploads/$ID.png"  ?>" alt="hello" width="50%" height="50%">
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  

 
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>ExpressShipping</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>