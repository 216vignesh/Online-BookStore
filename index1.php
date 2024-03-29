<<?php  
session_start();  
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
  
?>  

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Online Bookstore</title>
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
   <!-- body -->
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
                           <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +17746667771</li>
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
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="header_bottom">
                        <div class="row">
                           <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                              <div class="full">
                                 <div class="center-desk">
                                    <div class="logo">
                                       <a href="index.html">Online Bookstore</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                              <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                       <div class="collapse navbar-collapse" id="navbarsExample04">
                                       <h1>Welcome <?php  
                                          echo $_SESSION['email'];  
                                       ?> </h1><br>  
                                        


                                       <form id="index" action="index.html" method="POST">
                                       <li class="nav-item active">
                                          <input type="text" name="email1" value="<?php echo $_SESSION['email'] ?>" hidden>
                                          <a class="nav-link" href="javascript:{}" onclick="document.getElementById('index').submit();">Home</a>
                                       </li>
                                       </form>

                                       <form id="about" action="about.php" method="POST">
                                       <li class="nav-item">
                                          <input type="text" name="email2" value="<?php echo $_SESSION['email'] ?>" hidden>
                                          <a class="nav-link" href="javascript:{}" onclick="document.getElementById('about').submit();">About</a>
                                       </li>
                                    </form>

                                       <form id="index2" action="index.html" method="POST">
                                       <li class="nav-item">
                                          <a class="nav-link" href="javascript:{}" onclick="document.getElementById('index2').submit();">Logout</a>
                                       </li>
                                       </form>
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
         </div>
         <!-- end header inner -->
         <!-- end header -->
         <!-- banner -->
         <section class="banner_main">
            <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="carousel-caption  banner_po">
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="build_box">
                                    <h1>One stop for all the books</h1>
                                    <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority<br> There are many variations of passages of</p> -->
                                    <a class="read_more conatct_btn" href="contact.php" role="button">Contact Us</a>
                                    <br>
                                    <br>
                                    <!-- <div class="dropdown">
                                    <a class="read_more conatct_btn" href="search.html" role="button">Search</a> -->
                                    <a class="read_more conatct_btn" href="search.php" role="button">Search</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
               <i class="fa fa-angle-left" aria-hidden="true"></i>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
               <i class="fa fa-angle-right" aria-hidden="true"></i>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </section>
      </header>
      <!-- end banner -->
      <!-- three_box -->
      <div class="three_box">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser1.png" width="200" height="40" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="most_selling.html"><span>Bset Selling Books - Genre</span></a>
                     </li>
                     
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser2.png" width="200" height="20" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="award_winning.php"><span>Award winning books</span></a>
                     </li>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser3.png" width="200" height="40" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="seasonal.php"><span>Seasonal favorites</span></a>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser4.jpg" width="200" height="40" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="publishers.php"><span>Publishing Houses with Award Winning Books</span></a>
                     </li>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser5.png" width="200" height="40" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="authorPopularBooks.php"><span>Best Seller of Authors</span></a>
                     </li>
                  </div>
               </div>
               <div class="col-md-3">
                  <div id="text_hover" class="const text_align_center">
                     <i><img src="images/ser6.jpg" width="200" height="40" alt="#"/></i>
                     <li class="nav-item">
                     <a class="nav-link" href="bestSellingEdition.php"><span>Best Selling Editions</span></a>
                     </li>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end three_box -->
      <!-- about -->
      <div class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>About Our Project</h2>
                     <span>The main objective of the project is to create an online book store that allows users to search and purchase a book based on title, author and subject. The selected books are displayed in a tabular format and the user can order their books online through credit card payment. The Administrator will have additional functionalities when compared to the common user. </span>
                     <a class="read_more" href="Javascript:void(0)"> Read More</a>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                     <figure><img src="images/about.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- projects -->
      <div class="projects">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative3">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img2.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img1.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative3">
                                 <div class="row">
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img2.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="project">
                                          <div class="project_img">
                                             <figure><img src="images/project_img1.png" alt="#"/></figure>
                                          </div>
                                          <div id="pro_ho" class="project_text">
                                             <h3>Reader will be<br> distracted by the readable</h3>
                                             <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#proj" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#proj" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 padding_right0">
                  <form action="con_details.php" id="request" class="main_form" method="post">
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
                           <textarea class="textarea" placeholder="Message" type="type" name="Message">Message</textarea>
                        </div>
                        <div class="col-md-12">
                        <button type="submit" name="submit" class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 padding_left0">
                  <div class="map_main">
                     <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2952.184261833394!2d-71.80885318494711!3d42.27458987919266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e4065910373677%3A0xc6c3218673dc6dad!2sWorcester%20Polytechnic%20Institute!5e0!3m2!1sen!2sus!4v1669581383430!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
                     <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="463" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
            </div>
         </div>
      </div>
      
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-lg-3 col-md-6">
                     <p class="many">
                        Online Book Store
                     </p>
                     <br>
                     <br>
                     <!-- <a class="logo_bottom"><img src="images/logo_bottom.png" alt="#"/></a> -->
                     <p class="many">
                        The main objective of the project is to create an online book store that allows users to search and purchase a book based on title, author and subject. The selected books are displayed in a tabular format and the user can order their books online through credit card payment. The Administrator will have additional functionalities when compared to the common user
                     </p>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-6">
                     <h3>QUICK LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html"> About</a></li>
                        <li><a href="project.html">Projects</a></li>
                        <li><a href="staff.html">Staff</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
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
                  
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <!-- <p>© 2022 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p> -->
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