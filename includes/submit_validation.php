<?php

// dont mess with this script I ran this one for 82 times

	if(isset($_POST['submit'])){

		// validation for file upload starts here
		$date=date("Y-m-d, g:i a");
		$allowed_img=array("JPG", "jpg", "PNG","png", "PJPEG","pjpeg", "GIF","gif", "jpeg"); //allowed extensions array
		$allowed_file=array("C", "c", "CPP", "cpp", "JAVA", "java", "PY", "py", "HTML", "html", "PHP", "php", "CSS", "css"); //allowed extensions array
		$ext_ip=end(explode('.', $_FILES['ip']['name'])); //getting files extension
		$ext_op=end(explode('.', $_FILES['op']['name'])); //getting files extension
		$end_reg=end(explode('b', $reg_no));

		// for subject name starts
		if(isset($_POST['select_sub'])){ //checking if subname is set 
			$subName= $_POST['select_sub'];
			$sub_query = $db->query(" SELECT * FROM subject WHERE subName='$subName'");
				while($row=$sub_query->fetch_assoc()){
				$subType=$row['subType']; //getting subject-code of selected subject
				$subId=$row['subId']; //getting subject-id of selected subject
				$tId=$row['tId'];
				$tName = $row['tName'];
				}
		}
		else{
			$error="Please select a subject" ;
		}

		// for subject name ends

		//for practical number starts
		if($_POST['pracNum']>0){ //checking if practical number is valid
			$pracNum=$_POST['pracNum'];
		}
		else{
			$error="Please enter a valid practical number.";
		}
		////for practical number ends
		if($subType=='code'){ //input for coding subjects

			if(in_array($ext_ip, $allowed_file) && in_array($ext_op, $allowed_img)){
				$codeIp=$end_reg."_".$pracNum."_".$subId."_".$_FILES['ip']['name']; //storing for database
				move_uploaded_file($_FILES['ip']['tmp_name'], "../code/input/".$end_reg."_".$pracNum."_".$subId."_".$_FILES['ip']['name']); //in file server

				$codeOp=$end_reg."_".$pracNum."_".$subId."_".$_FILES['op']['name']; //storing for database
				move_uploaded_file($_FILES['op']['tmp_name'], "../code/output/".$end_reg."_".$pracNum."_".$subId."_".$_FILES['op']['name']); //in file server
			}
			else{
				$error="Please upload files with proper extensions code";
			}

		}
		else{//input for ckt subjects
			if(in_array($ext_ip, $allowed_img) && in_array($ext_op, $allowed_img)){
				$cktIp=$end_reg."_".$pracNum."_".$subId."_".$_FILES['ip']['name']; //storing for database
				move_uploaded_file($_FILES['ip']['tmp_name'], "../ckt/input/".$end_reg."_".$pracNum."_".$subId."_".$_FILES['ip']['name']); //in file server

				$cktOp=$end_reg."_".$pracNum."_".$subId."_".$_FILES['op']['name']; //storing for database
				move_uploaded_file($_FILES['op']['tmp_name'], "../ckt/output/".$end_reg."_".$pracNum."_".$subId."_".$_FILES['op']['name']); //in file server
			}
			else{
				$error="Please upload files with proper extensions";
			}
		}

		// validation for file upload starts here
		if($subType=='code' && empty($error)){
			$check=$db->query("SELECT * FROM practical WHERE sReg_no='$reg_no' AND sYear='$sYear' AND sBatch='$sBatch' AND subId='$subId' AND pracNum='$pracNum'");
			if($check->num_rows==0){
			$insert_query = "INSERT INTO practical (sReg_no, sYear, sBatch, subId, subName, tId, tName,pracNum, code, codeOp, ckt, cktOp, pDate, marks) VALUES ('$reg_no','$sYear','$sBatch','$subId', '$subName','$tId', '$tName','$pracNum','$codeIp','$codeOp','','','$date','')";
			if($db->query($insert_query)){
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="Your practical submitted successfully"; ?>
		          </span>
		        </div>
		        <?php
			}
			else{
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="Sorry some error occured please contact admin"; ?>
		          </span>
		        </div>
		        <?php
				
			}
			}
			else{
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="You have already submitted a practical with same number..!"; ?>
		          </span>
		        </div>
		        <?php
				

			}
		}
		else if(empty($error)){
			$check=$db->query("SELECT * FROM practical WHERE sReg_no='$reg_no' AND sYear='$sYear' AND sBatch='$sBatch' AND subId='$subId' AND pracNum='$pracNum'");
			if($check->num_rows==0){
			$insert_query = "INSERT INTO practical (sReg_no, sYear, sBatch, subId, subName, tId, tName,pracNum, code, codeOp, ckt, cktOp, pDate, marks) VALUES ('$reg_no','$sYear','$sBatch','$subId', '$subName','$tId', '$tName','$pracNum','','','$cktIp','$cktOp','$date','')";
			if($db->query($insert_query)){
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="Your practical submitted successfully" ?>
		          </span>
		        </div>
		        <?php
			}
			else{
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="Sorry some error occured please contact admin" ?>
		          </span>
		        </div>
		        <?php
			}
			}else{
				?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error="You have already submitted a practical with same number..!" ?>
		          </span>
		        </div>
		        <?php
			}
		}
		else{
			?>
				<div class="card-panel teal">
		          <span class="white-text"><?php echo $error; ?>
		          </span>
		        </div>
		        <?php
		}
	}
?>