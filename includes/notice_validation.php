<?php

require "../includes/connect.php";

if(isset($_POST['send'])){
	$nYear=$_POST['nYear'];
	$nNotice=$_POST['notice'];
	$nFile=$_FILES['nFile']['name'];
	$nDate=date("F j, Y, g:i a");
	move_uploaded_file($_FILES['nFile']['tmp_name'], "../noticefiles/".$_FILES['nFile']['name']);

	$something="INSERT INTO `notices` (`tId`, `sYear`, `notice`, `nFile`, `nDate`) VALUES ('$tId', '$nYear', '$nNotice', '$nFile', '$nDate')";

	$insert = $db->query($something);

	// INSERT INTO `notices` (`tId`, `sYear`, `notice`, `nFile`, `nDate`) VALUES ('1', '2', 'this is a test notice..!', 'notice.txt', 'January 13, 2017, 5:34');

	if($insert){ ?>
		<div class="card-panel teal">
          <span class="white-text"><?php echo "Successfully sent your notice to students of year ".$nYear; ?>
          </span>
        </div>
	<?php }	else { ?>
		<div class="card-panel teal">
          <span class="white-text"><?php echo "Some error occured please contact admin"; ?>
          </span>
        </div>
	<?php }
}
?>