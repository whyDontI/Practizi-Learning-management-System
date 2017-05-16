<?php

require '../includes/connect.php';
if(isset($_POST['ass_submit'])){
		error_reporting(0);
		$ass_allowed_file=array("PDF", "pdf", "DOCX", "docx", "DOC", "doc", "TXT", "txt");
		$ext_file=end(explode('.', $_FILES['ass_browse']['name']));
		$end_reg=end(explode('b', $reg_no));

		if(isset($_POST['ass_select_sub'])){ //checking if subname is set 
			$subName= $_POST['ass_select_sub'];
			$sub_query = $db->query(" SELECT * FROM subject WHERE subName='$subName'");
				while($row=$sub_query->fetch_assoc()){
				$subId=$row['subId']; //getting subject-id of selected subject
				$tId=$row['tId'];
				$tName = $row['tName'];
				}
		}
		else{
			$error=$error." Please select a subject";
		}

		if($_POST['assNum']>0){$assNum=$_POST['assNum'];}
		else{
			$error=$error."Enter proper assignment number";
		}
		
		$date_query=$db->query("SELECT * FROM ass_notice1 WHERE assNum='$assNum' && subId='$subId' && tId='$tId'");
		if($date_query->num_rows){
			while($row1=$date_query->fetch_assoc()){
				$dueDate=$row1['dueDate'];
			}
		} else{ $error=$error." There is no assignment with this assignment number.";}

		if(in_array($ext_file, $ass_allowed_file)){
			$assFile=$end_reg."_".$assNum."_".$subId."_".$_FILES['ass_browse']['name']; //storing for database
			move_uploaded_file($_FILES['ass_browse']['tmp_name'], "../assignment/".$end_reg."_".$assNum."_".$subId."_".$_FILES['ass_browse']['name']); //in file server
		} else{ $error=$error." Please upload files with proper extensions, like 'pdf' or 'docx'"; }

		$assn_query=$db->query("SELECT * FROM assignment WHERE assNum='$assNum' && sReg_no='$reg_no' && subId='$subId'");
		if($assn_query->num_rows==0){
			
		} else{ $error= $error." You have already submitted an assignment with same data";  }

		$curr=date("d-m-Y");

		$expire= new DateTime($dueDate);
		$now= new DateTime($curr);
		// $dueDate->diff($curr)
		$diff=date_diff($expire,$now);
		$diff->format("%R%a days");

		if($date_query->num_rows==1 && empty($error)){
			if($diff->format("%R%a days")<0 || $expire = $curr && empty($error)){
				$assDate=date("Y-m-d"); 
				$late = '';
				} else { 
					$late = "Late";
				}	

				$ass_insert=$db->query("INSERT INTO assignment (assId, sReg_no, sYear, sBatch, subId, subName, tId, tName, assNum, assFile, assDate, marks, late) VALUES ('', '$reg_no', '$sYear', '$sBatch', '$subId', '$subName', '$tId', '$tName','$assNum', '$assFile', '$assDate', '', '$late')");
				if($ass_insert){?>
					<div class="card-panel teal">
			          <span class="white-text"><?php echo "Successfully submitted your assignment" ?>
			          </span>
			        </div>
				<?php } else{ ?>
					<div class="card-panel teal">
			          <span class="white-text"><?php echo $error=$error." Can't submit your assignment contact admin" ?>
			          </span>
			        </div>
				<?php } ?>

		} else{ ?>
			<div class="card-panel teal">
	          <span class="white-text"><?php echo $error ?>
	          </span>
	        </div>
		<?php }

		// $date=date("F j, Y, g:i a");
	}