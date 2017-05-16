<?php

  session_start();



  if(!isset($_SESSION['tEmail'])){

    header("location: fac_login.php");

  }

  else{

    require '../includes/connect.php';

    $login_tEmail=$_SESSION['tEmail'];

    $select_query= $db->query("SELECT * FROM teacher WHERE tEmail='$login_tEmail'");



    while($row=$select_query->fetch_assoc()){

      $tEmail=$row['tEmail'];

      $tId=$row['tId'];

    }

?>



<!DOCTYPE html>

<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  <title>Submit Notices</title>



  <!-- CSS  -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->

  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>

<body>



	<?php require '../includes/profile_navbar.php'; ?>

	<div class="container">



	<div class="row">

		<!-- Notice starts here-->

	    <div class="col s12 m6">

		    <div class="card">

		        <div class="card-content">

		          <span class="card-title">Send Notices</span>

		          <?php require '../includes/notice_validation.php' ?>

		          <form method="post" enctype="multipart/form-data">

		          <div class="row">			    

			        <div class="input-field col s12">

			        <i class="material-icons prefix">mode_edit</i>

			        <textarea id="textarea" class="materialize-textarea" name="notice"></textarea>

			        <label for="textarea">Enter your notice here</label>

			        </div>

			        <!-- <div class="input-field col s12">

			          <button class="waves-effect waves-light btn">Upload a file</button>

			        </div> -->	



			        <!-- file input starts here -->

			        <div class="file-field input-field col s12">

				      <div class="btn">

				        <span>File</span>

				        <input type="file" name="nFile" >

				      </div>

				      <div class="file-path-wrapper">

				        <input class="file-path validate" type="text">

				      </div>

				    </div>

				    <!-- file input ends here -->



			        <div class="input-field col s12">

		                <select name="nYear">

		                  <option value="" disabled selected>Choose Year</option>

		                  <option value="2">2</option>

		                  <option value="3">3</option>

		                  <option value="4">4</option>

		                </select>

	              	</div>		      

				  </div>

		        </div>

		        <div class="card-action">

		          <button class="btn waves-effect waves-light" type="submit" name="send">Send

				    <i class="material-icons right">send</i>

				  </button>

		        </div>

		        </form>

		    </div>

	    </div>



	    <div class="col s12 m6">

	    <div class="card-panel">

          <span class="bold">Past Notices

          </span>

        </div>

		  <?php

		  $sub_query = $db->query("SELECT * FROM notices WHERE tId='$tId' ORDER BY nDate");

		          while($row1=$sub_query->fetch_assoc()){ 

		          $notice=$row1['notice'];

		          $tId=$row1['tId'];

		          $nDate=$row1['nDate'];

                  $year=$row1['sYear'];

                  

		          $sub_query2 = $db->query("SELECT * FROM teacher WHERE tId='$tId'");

		          while($row1=$sub_query2->fetch_assoc()){    

		          $tName=$row1['tName'];

		          }

		             ?>



				<div class="col s12 m12">

		          <div class="card">

		            <div class="card-content">

		              <span class="card-title left-align"><?php echo $tName ?></span><p class="right-align"><?php echo $nDate ?><p><br>

                      Year = <?php echo $year; ?><hr>

		              <p><?php echo $notice;?></p>

		            </div>

		          </div>

		    </div>

		    <?php }?>

		  	</div>

		<!-- Notice ends here -->

  	</div>



  	</div>



	<?php require '../includes/fixed_button.php'; ?>



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