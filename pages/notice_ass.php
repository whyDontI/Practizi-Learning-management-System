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

      $tName = $row['tName'];

    }

?>



<!DOCTYPE html>

<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  <title>Send assignment notice</title>

  <!-- CSS  -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->

  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>

<body>



	<?php require '../includes/profile_navbar.php'; ?>

	



		<div class="row">

			<!-- Notice starts here-->

		    <div class="col s12 m4">

			    <div class="card ">
			    	<?php require '../includes/ass_validation.php' ?>

			        <div class="card-content ">

			          <span class="card-title">Send assignment notice</span>

			          

			          <form method="post" enctype="multipart/form-data">

			          <div class="row">			    

				        <div class="input-field col s12">

					        <i class="material-icons prefix">mode_edit</i>

					        <textarea id="textarea" class="materialize-textarea" name="ass_notice"></textarea>

					        <label for="textarea">Assignment title</label>

				        </div>

				        <!-- <div class="input-field col s12">

				          <button class="waves-effect waves-light btn">Upload a file</button>

				        </div> -->	

				        <div class="input-field col s6">

				          <input id="assNum" type="number" name="assNum" class="validate">

				          <label for="assNum">Assignment Number</label>

				        </div>

				        <!-- file input starts here -->

				        <div class="file-field input-field col s12">

					      <div class="btn ">

					        <span>File</span>

					        <input type="file" name="nFile" >

					      </div>

					      <div class="file-path-wrapper ">

					        <input class="file-path validate " type="text">

					      </div>

					    </div>

					    <!-- file input ends here -->



					    <div class="input-field col s12">

			                <select name="subId">

			                  <option value="" disabled selected>Choose subject</option>

			                  <?php 

			                  $sub=$db->query("SELECT * FROM subject WHERE tId='$tId' ");

			                   while($row1=$sub->fetch_assoc()){

			                   	$subject=$row1['subName'];

			                   	$subId=$row1['subId'];

			                   	?>

			                   	<option value="<?php echo $subId ?>"><?php echo $subject ?></option>

			                   	<?php

			                   }

			                  ?>

			                  

			                </select>

		              	</div>



				        <div class="input-field col s12">

			                <select name="nYear">

			                  <option value="" disabled selected>Choose Year</option>

			                  <option value="2">2</option>

			                  <option value="3">3</option>

			                  <option value="4">4</option>

			                </select>

		              	</div>



		              	<div class="input-field col s12">

			                <input type="date" id="dueDate" name="dueDate" class="datepicker">

			                <label for="dueDate" class="">To be submitted upto</label>

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



		    <div class="col s12 m8">

			    <div class="card-panel">

		          <span class="">Past assignments

		          </span>

		        </div>



		        <table class="striped highlight responsive-table">

			        <thead>

			          <tr>

			              <th data-field="ass_no">No.</th>

                          <th data-field="year">Year</th>

			              <th data-field="subject">Subject</th>

			              <th data-field="notice">Notice</th>

			              <th data-field="file">File</th>

			              <th data-field="final_daet">Final Date</th>

			              <th data-field="date">Date</th>

			          </tr>

			        </thead>



			        <tbody>

					  <?php

					  $query = $db->query("SELECT * FROM ass_notice1 WHERE tId='$tId' ");

					          while($row=$query->fetch_assoc()){ 

					          $assNum=$row['assNum'];

                              $sYear=$row['sYear'];

					          $notice=$row['notice'];

					          $tId=$row['tId'];

					          $file=$row['nFile'];

					          $dueDate=$row['dueDate'];

					          $assDate=$row['assDate'];

					          $subId=$row['subId'];

					          $sub_query2 = $db->query("SELECT * FROM teacher WHERE tId='$tId'");

					          while($row=$sub_query2->fetch_assoc()){    

					          $tName=$row['tName'];  

					          } 



					          $sub_query3 = $db->query("SELECT * FROM subject WHERE subId='$subId'");

					          while($row=$sub_query3->fetch_assoc()){    

					          $subName=$row['subName'];  

					          } 

					             ?>

					    	<tr>

					            <td><?php echo $assNum ?></td>

                                <td><?php echo $sYear ?></td>

					            <td><?php echo $subName ?></td>

					            <td><?php echo $notice ?></td>

					            <td><?php echo $file ?></td>

					            <td><?php echo $dueDate ?></td>

					            <td><?php echo $assDate ?></td>

				          	</tr>

					    <?php } ?>

					    </tbody>

			    </table>

		  	</div>

			<!-- Notice ends here -->

	  	</div>



  	



	<?php require '../includes/fixed_button.php'; ?>



    <?php require '../includes/footer.php'; ?>

  <!--  Scripts-->

  <!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

  <!-- <script src="../js/materialize.js"></script> -->

  <script src="../js/init.js"></script>

  <script src="../js/script.js"></script>

</body>

</html>



<?php } ?>