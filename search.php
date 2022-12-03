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
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    input[type=submit] {
        padding: 5px 15px;
        background: #99e0b2;
        border: 0 none;
        cursor: pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;
      }
  </style>
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
    <title>Online Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >
   
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
                                    <ul class="navbar-nav mr-auto">
                                       <h5 align="left">Welcome <?php  
                                          echo $_SESSION['email'];  
                                       ?> </h5><br>  


                                  
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


                                    <form id="contact" action="contact.php" method="POST">
                                       <li class="nav-item">
                                          <a class="nav-link" href="javascript:{}" onclick="document.getElementById('contact').submit();">Contact Us</a>
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

    <div class="container mt-5" style="max-width: 555px">
        <div class="card-header alert alert-warning text-center mb-3">
            <h2>Online BookStore</h2>
        </div>
        <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off"
            placeholder="Title Search ...">
        <div id="search_result"></div>
    </div>

    <div class="container mt-5" style="max-width: 555px">
        
        <form id="search_author" action="search_author.php" method="POST">
        <input type="text" class="form-control" name="live_search_author" id="live_search" autocomplete="off"
            placeholder="Search by author name ...">
            <br>

        <input type="submit" name="author" value="Search by author">

        <!-- <li class="nav-item active">
            <a class="nav-link" href="javascript:{}" onclick="document.getElementById('search_author').submit();">Search by author</a>
        </li> -->
      </form>
        <div id="search_result_author"></div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'ajax-live-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            // $("#live_search").focusout(function () {
                            //     $('#search_result').css('display', 'none');
                            // });
                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
    </script>



</body>
</html>