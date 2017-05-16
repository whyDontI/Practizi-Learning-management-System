<?php
session_start();

if(isset($_SESSION['reg_no'])){
  header("location: stud_profile.php");
}
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>LogIn SignUp</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <?php require '../includes/navbar.php'; ?>
    <div class="container">  

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- myad2 -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-3541301813538831"
         data-ad-slot="5447545106"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
      
        <div class="row">
        <!-- login form starts here-->
          <div class="col s12 m6">
          <?php require '../includes/login_validation.php'; ?>
            <div class="card transparent darken-1">
              <div class="card-content black-text">
              <form method="post" enctype="multipart/form-data">
                <span class="card-title">LogIn</span>
              	<div class="row">		
  				          <div class="input-field col s6 m6">
  			              <input id="reg_no" type="text" class="validate" name="reg_no" required>
  			              <label for="reg_no" data-error="wrong" data-success="right">Registration Number</label>
  			            </div>

      		          <div class="input-field col s6 m6">
      	              <input id="pass" type="password" class="validate" name="pass" required>
      	              <label for="pass" data-error="wrong" data-success="right">Password</label>
      	            </div>    	          
  	        	  </div>
              </div>
              <div class="card-action">
                <button class="waves-effect waves-light btn" name="submit" type="submit">LogIn</button>
              </div>            
            </div>
          </div>
          </form>

          <!-- SignUp form starts here-->
          <div class="col s12 m6">
          <?php require '../includes/signup_validation.php'; ?>
            <div class="card darken-1">
              <div class="card-content black-text">
              <form method="post" enctype="multipart/form-data">
                <span class="card-title">SignUp</span>
                <div class="row">
                  <div class="input-field col s12 m12">
                    <input id="name" type="text" class="validate" name="su_name" required>
                    <label for="name" data-error="wrong" data-success="right">First Name</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="l_name" type="text" class="validate" name="su_l_name" required>
                    <label for="l_name" data-error="wrong" data-success="right">Last Name</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="reg_no" type="text" class="validate" name="su_reg_no" required>
                    <label for="reg_no" data-error="wrong" data-success="right">Registration Number</label>
                  </div>

                  <!-- <div class="input-field col s12 m12">
                    <input id="batch" type="text" class="validate" name="su_batch" required>
                    <label for="batch" data-error="wrong" data-success="right">Batch letter</label>
                  </div> -->

                  <div class="input-field col s12" >
                    <select class="validate" name="su_batch" required>
                      <option value="A" selected>A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                    </select>
                    <label>Batch</label>
                  </div>

                  <div class="input-field col s12" >
                    <select name="su_year" required>
                      <option value="" disabled selected class="text-white">Choose your option</option>
                      <option value="2">Second year</option>
                      <option value="3">Third year</option>
                      <option value="4">Fourth year</option>
                    </select>
                    <label>Academic Year</label>
                  </div>

                  <!-- <div class="input-field col s12 m12">
                    <input id="reg_no" type="text" class="validate" name="su_branch" required>
                    <label for="reg_no" data-error="wrong" data-success="right">Branch</label>
                  </div> -->

                  <div class="input-field col s12 m12">
                    <input id="cEmail" type="email" class="validate" name="su_cEmail" required>
                    <label for="cEmail" data-error="wrong" data-success="right">College Email-Id</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="phNum" type="number" maxlength="10" class="validate" name="su_phNum" required>
                    <label for="phNum" data-error="wrong" data-success="right">Phone Number</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="pass" type="password" class="validate" name="su_pass" required>
                    <label for="pass">Password</label>
                  </div>

                  <div class="input-field col s12 m12">
                    <input id="cPass" type="password" class="validate" name="su_cPass" required>
                    <label for="cPass" data-error="wrong" data-success="right">Confirm Password</label>
                  </div>                
                </div>
              </div>
              <div class="card-action">
                <button class="waves-effect waves-light btn" name="su_submit" type="submit">SignUp</button>
              </div>            
            </div>
          </div>
          </form>
        </div>
      </div> 
      <!-- login form ends here--> 

      <?php require '../includes/footer.php'; ?>

    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
  
</body>
</html>

<?php } ?>