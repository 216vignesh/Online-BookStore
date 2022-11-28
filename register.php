<?php

session_start();
// Username is root
$user = 'admin';
$password = 'Fit4M0Re!';
 

$database = 'BookStore';
// Server is localhost with
// port number 3306
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);


// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}


?>

<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>rhino</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
<body>
  <body class="main-layout">
     <!-- loader  -->
     <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
     </div>
     <!-- end loader -->
     <!-- header -->
     <header class="full_bg">
        <!-- header inner -->
        <div class="header">
           <div class="header_top">
              <div class="container">
                 <div class="row">
                    <div class="col-md-3">
                       <ul class="contat_infoma">
                          <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +01 12345678909</li>
                       </ul>
                    </div>
                    <div class="col-md-6">
                       <ul class="social_icon_top text_align_center  ">
                          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                       </ul>
                    </div>
                    <div class="col-md-3">
                       <ul class="contat_infoma text_align_right">
                          <li><a href="Javascript:void(0)"> <i class="fa fa-phone" aria-hidden="true"></i> demo@gmail.com</a></li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
           <!-- <div class="container">
              <div class="row">
                 <div class="col-md-12">
                    <div class="header_bottom">
                       <div class="row">
                          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                             <div class="full">
                                <div class="center-desk">
                                   <div class="logo">
                                      <a href="index.html">Rhino</a>
                                   </div>
                                </div>
                             </div>
                          </div> -->
                          <!-- <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                             <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                   <ul class="navbar-nav mr-auto">
                                      <li class="nav-item active">
                                         <a class="nav-link" href="index.html">Home</a>
                                      </li>
                                      <li class="nav-item">
                                         <a class="nav-link" href="about.html">About</a>
                                      </li>
                                      <li class="nav-item">
                                         <a class="nav-link" href="project.html">Contact Us</a>
                                      </li>
                                      <li class="nav-item">
                                         <a class="nav-link" href="staff.html">staff</a>
                                      </li>
                                      <li class="nav-item">
                                         <a class="nav-link" href="contact.html">Login/Register</a>
                                      </li>
                                   </ul>
                                </div>
                                <ul class="search">
                                   <li><a href="Javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                </ul>
                             </nav>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div> -->
        <div>
        <div class="row">
           <div class="col-md-6 padding_right0">
              <form  action = "reg_details.php" id="request" class="main_form" method="post">
                 <div class="row">
                    <div class="col-md-12 ">
                       <input class="contactus" placeholder="Name" type="type" name="Name">
                    </div>
                    <div class="col-md-12">
                       <input class="contactus" placeholder="Phone" type="type" name="Phone">
                    </div>
                    <div class="col-md-12">
                       <input class="contactus" placeholder="Email" type="type" name="Email">
                    </div>
                    <div class="col-md-12">
                       <input class="contactus" placeholder="Password" type="type" name="Password"> <!-- <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea> -->
                    </div>
                    <div class="col-md-12">
                      <textarea class="textarea" placeholder="Shipping Address" type="type" name="Address">Shipping Address</textarea>
                    </div>
                    <div class="col-md-12">
                      <a href="http://localhost/project/Online-BookStore/login.php"><p>Already a User?, click here</p></a>
                       <button type="submit" name="submit" class="send_btn">Register</button>
                    </div>
                 </div>
              </form>
            </div>
           </div>


   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class=" col-lg-3 col-md-6">
                  <a class="logo_bottom"><img src="images/logo_bottom.png" alt="#"/></a>
                  <p class="many">
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou
                  </p>
               </div>
               <div class="col-lg-2 offset-lg-1 col-md-6">
                  <h3>QUICK LINKS</h3>
                  <ul class="link_menu">
                     <li><a href="index.html">Home</a></li>
                     <li><a href="about.html"> About</a></li>
                     <li><a href="project.html">Projects</a></li>
                     <li><a href="staff.html">Staff</a></li>
                     <li><a href="contact.html">Contact Us</a></li>
                  </ul>
               </div>
               <div class=" col-lg-3 col-md-6">
                  <h3>INSTAGRAM FEEDS</h3>
                  <ul class="insta text_align_left">
                     <li><img src="images/inst1.png" alt="#"/></li>
                     <li><img src="images/inst2.png" alt="#"/></li>
                     <li><img src="images/inst3.png" alt="#"/></li>
                     <li><img src="images/inst4.png" alt="#"/></li>
                  </ul>
               </div>
               <div class=" col-lg-3 col-md-6 ">
                  <h3>SIGN UP TO OUR NEWSLETTER </h3>
                  <form class="bottom_form">
                     <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                     <button class="sub_btn">Sign Up</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>
