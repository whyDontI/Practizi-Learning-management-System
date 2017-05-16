<?php
session_start();

if(isset($_SESSION['tEmail'])){
  header("location: fac_profile.php");
} else {
  require '../includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Faculty LogIn</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <?php require '../includes/navbar.php'; ?>    

<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="col s12 m6">
      <div class="card transparent darken-1">
        <div class="card-content white-text">
          <span class="card-title black-text">LogIn</span>
        	<div class="row">		
	          <div class="input-field col s6 m6">
              <input id="tEmail" type="text" class="validate black-text" name="tEmail" required>
              <label for="tEmail" data-error="wrong" data-success="right">Email</label>
            </div>

	          <div class="input-field col s6 m6">
              <input id="pass" type="password" class="validate black-text" name="tPass" required>
              <label for="pass" data-error="wrong" data-success="right">Password</label>
            </div>    	          
      	  </div>
        </div>
        <div class="card-action">
          <button class="waves-effect waves-light btn" name="fac_login_submit" type="submit">LogIn</button>
        </div>            
      </div>
    </div>
  </form>
  <?php require '../includes/fac_login_validation.php'; ?>
</div>
<?php require '../includes/footer.php'; ?>


    <!--  Scripts-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89031213-1', 'auto');
  ga('send', 'pageview');
  </script>
  
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script> 
</body>
</html>

<?php } ?>