<!DOCTYPE html>

<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="PRAACTIZI : A Learning Management System (LMS) used to reduce paper work and submit practicals and assignments online, this project is in action in IT Dept. of SGGSIE&T Nanded">
  <meta name="keywords" content="practizi, SGGSIE&T Nanded, nanded, practical, assigmment, engineering, completion, submission, college, moodle, http://practical.byethost22.com, Nikhil Bhandarkar, PHP, ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="cache-control" content="public">
  <meta property="og:title" content="PRACTIZI | LMS">
  <meta property="og:type" content="non_profit">
  <meta property="og:url" content="http://www.practizi.ml">
  <meta property="og:site_name" content="PRACTIZI">
  <meta property="og:description" content="Practizi : Learning Management System">


  <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
  <meta name="HandheldFriendly" content="true"/>
  <meta name="MobileOptimized" content="320"/>

  <title>Practizi (Learning Management System)</title>



  <!-- CSS  -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  <link href="css/materialize.css" type="text/css" rel="stylesheet"/>

  <link href="css/style.css" type="text/css" rel="stylesheet"/>

</head>

<body>
<?php 

error_reporting(E_ALL); 

require 'includes/connect.php'; 

?>

<nav class="transparent black-text">
      <div class="nav-wrapper container">
          <!-- <a href="/" class="brand-logo brand-logo-small"><img id="header-logo" src="../static/images/logo_22x22@2x.png"> -->
              <span class="bold brand-logo brand-logo-small"> Practizi</span>
          <meta itemprop="url" content="https://gaggle.email/">
          <meta itemprop="name" content="Gaggle Mail">
          <div id="header-mobile-links" class=" row center hide-on-large-only" style="top: 2em; position: relative;">
              <div class="col s4">
                  <a href="#" class="teal-text">About</a>
              </div>
              <div class="col s4">
                  <a href="#" class="teal-text">Blog</a>
              </div>
              <div class="col s4">
              
              <a class="modal-trigger teal-text" href="pages/signup_login.php">Login</a>
              
              </div>
              <div class="col s12 spacer"></div>
          </div>
          <ul class="right hide-on-med-and-down desktop-header-links">
              <li><a href="#" class="teal-text">About</a></li>
              <!-- <li><a href="#pricing" class="teal-text">Pricing</a></li> -->
              <li><a href="#" class="teal-text">Blog</a></li>
              
              <li><a class="modal-trigger teal-text" href="pages/signup_login.php">Login</a></li>
              <?php //require 'includes/login_modal.php'; ?>
          </ul>
      </div>
  </nav>

  

<div style="
    background-position: center center;
    background-size: cover;
    background-image: url('white-desktop.jpg');
    height: 593px;">




    <div class="section no-pad-bot" id="index-banner" >       

    <div class="container">

      <div class="row center">
        <h1 style="font-size: 49px;"><strong class="bold">Practizi</strong>
        <span class="thin">lets you maintain your practicals and assignments paperlessly.</span>
        </h1>

      </div>

      <div class="center-align">

          <a href="pages/signup_login.php" id="download-button" class=" btn btn-large create-list-link hero-btn" style="margin-right: 10px;">Student</a>

          <a href="pages/fac_login.php" id="download-button" class="white teal-text btn btn-large create-list-link hero-btn" style="margin-left: 10px;">Faculty</a>

      </div>

      <br><br>


    </div>

  </div>
  
</div>

  <div class="container">

<!--     <div class="section row" style="height: 593px; padding: 0px !important;">  

      <div class="col s12 m4 white">
        
      </div>
      <div class="col s12 m8" style="border: 5px solid red;">
        <div class="video-container">
          <iframe width="854" height="480" src="https://www.youtube.com/embed/JiQY3NHRnoI" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      
    </div>
 -->

      <!--   Icon Section   -->
    <div class="section">
      <div class="row">

        <div class="col s12 m4">

          <div class="icon-block">

            <h2 class="center thin"><i class="material-icons grey-text">flash_on</i></h2>

            <h5 class="center"><strong class="bold grey-text">Speeds up completion</strong></h5>



            <p class="center light grey-text">

            Definitely it speeds up completion of practicals, because you don't need to write things down,

            you just perform and upload, as simple as that sounds..!!

            </p>

          </div>

        </div>



        <div class="col s12 m4">

          <div class="icon-block">

            <h2 class="center thin"><i class="material-icons grey-text">group</i></h2>

            <h5 class="center"><strong class="bold grey-text">User Experience Focused</strong></h5>

            <p class="center light grey-text">Our developers are also gonna be the users of this product.

            As they'll make the best for them, so for user.</p>

          </div>

        </div>



        <div class="col s12 m4">

          <div class="icon-block">

            <h2 class="center"><i class="material-icons grey-text">settings</i></h2>

            <h5 class="center"><strong class="bold grey-text">Easy to work with</strong></h5>



            <p class="center light grey-text">Made with a great framework based on MATERIAL UI as proposed by GOOGLE.

            It became too easy to work with & user friendly.</p>

          </div>

        </div>

      </div>



    </div>

    <br><br>



    <div class="section">



    </div>

  </div>



  <?php require 'includes/fpage_footer.php' ?>





  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/script.js"></script>

  </body>

</html>

