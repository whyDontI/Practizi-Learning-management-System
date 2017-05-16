<?php
require '../includes/connect.php';

if(isset($_POST['send'])){
	if(!empty($_POST['nYear'])){$nYear=$_POST['nYear'];}

	if(!empty($_POST['ass_notice'])){$nAssNotice=$_POST['ass_notice'];}

	if(!empty($_POST['assNum'])){$assNum=$_POST['assNum'];}

	if(!empty($_POST['subId'])){$subId=$_POST['subId'];}

	$sub_query = $db->query("SELECT * FROM subject WHERE subId = '$subId'");
	while($row=$sub_query->fetch_assoc()){
		$subName = $row['subName'];
	}
	$tName;
	$nFile=$_FILES['nFile']['name'];
	$nDate=date("d-m-Y");
	$dueDate=$_POST['dueDate'];
	move_uploaded_file($_FILES['nFile']['tmp_name'], "../ass_notice/".$_FILES['nFile']['name']);

	// check
	// echo $tId." ".$tName." ".$subId." ".$subName." ".$assNum." ".$nYear." ".$nAssNotice." ".$nFile." ".$dueDate." ".$nDate;



	$dummy=$db->query ("INSERT INTO `ass_notice1` (`tId`, `tName`, `subId`, `subName`, `assNum`, `sYear`, `notice`, `nFile`, `dueDate`, `assDate`)
	 VALUES ('$tId', '$tName', '$subId', '$subName', '$assNum', '$nYear', '$nAssNotice', '$nFile', '$dueDate', '$nDate')
	");
	
	if($dummy){ ?>
		<div class="card-panel teal">
          <span class="white-text"><?php echo "Successfully sent your assignment to students of year ".$nYear; ?>
          </span>
        </div>
	<?php }
	else{ ?>
		<div class="card-panel teal">
          <span class="white-text"><?php echo $error="Some error occured please contact admin"; ?>
          </span>
        </div>
	<?php }
}
?>