<?php
	require_once "../includes/connect.php";
	
	if(isset($_POST['register'])){
		if(preg_match("/^[a-zA-Z ]*$/",$_POST['f_name'])){
			$first_name= mysqli_reaL_escape_string($db ,$_POST['f_name']);			
		} else{
			$error="A name should contain only characters and white spaces.";
		}


		if(preg_match("/^[a-zA-Z ]*$/",$_POST['l_name'])){
			$last_name= mysqli_reaL_escape_string($db ,$_POST['l_name']);			
		} else {
			$error=$error." A last name should contain only characters and white spaces.";
		}

		$email = test_input($_POST["p_email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $error = $error." Please enter a valid email format.";
		}
		
		if(isset($_POST['college'])){
			$college= mysqli_reaL_escape_string($db ,$_POST['college']);			
		}
		
		if(isset($_POST['city'])){
			$city= mysqli_reaL_escape_string($db ,$_POST['city']);			
		}
		
		if(isset($_POST['p_num'])){
			$phNum= mysqli_reaL_escape_string($db ,$_POST['p_num']);			
		}
		
			$acc= $_POST['acc'];

		$puid=$mdun;

		$check_query=$db->query("SELECT * FROM registration WHERE phNum='$phNum' && first_name='$first_name' && last_name='$last_name'");

		if($check_query->num_rows>0){
			$error = $error." Somebody with given credentials already exists";
		}

		if(empty($error)){
			$insert_query=$db->query("INSERT INTO  registration (first_name, last_name, email, college, city, phNum, accomodation, puid) VALUES ('$first_name', '$last_name', '$email', '$college', '$city', '$phNum', '$acc', $puid)");

			if($insert_query->num_rows){ ?>
				<div class="card-panel teal">
		          <span class="white-text">Thank you for registration.</span>
		        </div>
			<?php }
		} else {?>
			<div class="card-panel teal">
	          <span class="white-text">Please try again. <?php echo $error." please try again"?></span>
	        </div>
		<?php }
		
	}
?>