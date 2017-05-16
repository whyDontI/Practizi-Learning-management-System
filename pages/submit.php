<?php
  session_start();

  if(!isset($_SESSION['reg_no'])){
    header("location: signup_login.php");
  }
  else{
    require '../includes/connect.php';
    $login_reg_no=$_SESSION['reg_no'];
    $select_query= $db->query("SELECT * FROM admin_login WHERE reg_no='$login_reg_no'");

    while($row=$select_query->fetch_assoc()){
      $reg_no=$row['reg_no'];
      $sYear=$row['year'];
      $sBatch=$row['batch'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Submit Form</title>

  <!-- CSS  -->
   
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>

<body>

	<?php require '../includes/profile_navbar.php'; ?>
	<div class="row">
	    <div class="col s12" style="margin-top: 10px;">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#test1" class="active">Practicals</a></li>
	        <li class="tab col s3"><a href="#test2">Assignments</a></li>
	      </ul>
	    </div>
    	<div id="test1" class="col s12 m8">
			<div class="card">
		        <div class="container left-align">
				   <?php require '../includes/submit_validation.php'; ?>
		            <form action="submit.php" method="POST" enctype="multipart/form-data">
		            <div class="card-content black-text">
		              <span class="card-title">Submit practicals</span>
		            </div>
		            
				  	<div class="input-field col s6 black-text">
					    <select name="select_sub" class="black-text">	                
			                <?php  
			                $sub_query = $db->query("SELECT * FROM subject WHERE subYear='$sYear'");
			                while($row=$sub_query->fetch_array()){
			                   $sName=$row['subName'];
			                   $sId=$row['subId'];
			                   $count=0;
			                   ?>

			                   <option class="black-text" value="<?php echo $sName ?>"><?php echo $sName ?></option> 

			                 <?php } ?>
			            </select>
					    <label>Choose Subject</label>
				  	</div>
				  	
				  	<div class="input-field col s6">
			          <input id="pracNum" type="number" class="validate black-text" name="pracNum" required>
			          <label for="pracNum">Practical Number</label>
			        </div>
			        <br><br><br>
		            <!--practical file input -->
		            <div class="file-field input-field">
				      <div class="btn">
				        <span>Practical</span>
				        <input type="file" name="ip">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate black-text" type="text" required>
				      </div>
				    </div>
				    <!--practical file input -->

				    <!--output file -->
		            <div class="file-field input-field">
				      <div class="btn">
				        <span>Output</span>
				        <input type="file" name="op" required>
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate black-text" type="text" required>
				      </div>
				    </div>
				    <!--output file -->

				    <div class="input-field">
				    	<button class="waves-effect waves-light btn" type="submit" name="submit" value="Submit">Submit<i class="material-icons right">send</i></button>
				    </div>
					    <br><br>
				</div>
				    </form>
		    </div>
		</div>
	    
	    <div id="test2" class="col s12 m8">
		    <div class="card">
		        <div class="container left-align ">
				   <?php require '../includes/ass_submit_validation.php'; ?>
		            <form action="submit.php" method="POST" enctype="multipart/form-data">

			            <div class="card-content black-text">
			              <span class="card-title">Submit assignments</span>
			            </div>
			            
					  	<div class="input-field col s6 black-text">
						    <select name="ass_select_sub" class="black-text">                
				                <?php  
				                $sub_query = $db->query("SELECT * FROM subject WHERE subYear='$sYear'");
				                while($row=$sub_query->fetch_array()){
				                   $sName=$row['subName'];
				                   $sId=$row['subId'];
				                   $count=0;
				                   ?>

				                   <option class="black-text" value="<?php echo $sName ?>"><?php echo $sName ?></option> 

				                 <?php } ?>
				            </select>
						    <label>Choose Subject</label>
					  	</div>

					  	<div class="input-field col s6 black-text">
				          <input id="assNum" type="text" name="assNum" class="validate" required>
				          <label for="assNum">Number</label>
				        </div>

				        <br><br><br><br>
				        <!--practical file input -->
			            <div class="file-field input-field">
					      <div class="btn">
					        <span>Browse</span>
					        <input type="file" name="ass_browse">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate black-text" type="text" required>
					      </div>
					    </div>
					    <!--practical file input -->

					    <div class="input-field">
					    	<button class="waves-effect waves-light btn" type="submit" name="ass_submit" value="submit">Submit<i class="material-icons right">send</i></button>
					    </div>
						    <br><br>
					</form>
				</div>
				    
		    </div>
		</div>
	</div>

	<?php require '../includes/fixed_button.php' ?>

    <?php require '../includes/footer.php' ?>
  <!--  Scripts -->
  
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
  
</body>
</html>

<?php } ?>