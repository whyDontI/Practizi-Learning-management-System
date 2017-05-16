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
      $year=$row['year'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Notices</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

	<?php require '../includes/profile_navbar.php'; ?>
  <div class="row">
    <div class="col s12 m6">
        <div class="card-panel teal">
            <span class="white-text">Practical's notices</span>
          </div>
      <?php
        $sub_query = $db->query("SELECT * FROM notices WHERE sYear='$year' ORDER BY nDate DESC");
              while($row=$sub_query->fetch_assoc()){ 
              $notice=$row['notice'];   
              $n_tId=$row['tId'];  
              $nFile=$row['nFile'];
              $nDate=$row['ndate'];
              $sub_query2 = $db->query("SELECT * FROM teacher WHERE tId='$n_tId'");
              while($row=$sub_query2->fetch_assoc()){    
              $tName=$row['tName'];
              }       
                 ?>

        <!-- <div class="col s12 m12"> -->

          <?php if(empty($nFile)){ ?>
            <div class="card ">
              <div class="card-content black-text">
                <span class="card-title left-align"><?php echo $tName ?></span><p class="right-align"><?php echo $nDate ?><p><hr>
                <p><?php echo $notice;?></p>
              </div>
            </div>
          <?php } else { ?>
            <div class="card ">
              <div class="card-content black-text">
                <span class="card-title left-align"><?php echo $tName ?></span><p class="right-align"><?php echo $nDate ?><p><hr>
                <p><?php echo $notice;?></p>
                <a class="btn waves-effect waves-light" href="../noticefiles/<?php echo $nFile ?>" download><?php echo $nFile?>  <i class="medium material-icons">file_download</i></a>
              </div>
            </div>
           <?php } ?>
               
        <!-- </div> -->
      <?php }?>
    </div>

    <div class="col s12 m6">
        <div class="card-panel teal">
          <span class="white-text">Assignment's notices</span>
        </div>
      <?php
        $sub_query3 = $db->query("SELECT * FROM ass_notice1 WHERE sYear='$year'");
              while($row1=$sub_query3->fetch_assoc()){
              $ass_subId=$row1['subId'];
              $assNum=$row1['assNum']; 
              $ass_notice=$row1['notice'];   
              $ass_tId=$row1['tId'];  
              $ass_nFile=$row1['nFile'];
              $ass_dueDate=$row1['dueDate'];
              $assDate=$row1['assDate'];

              $sub_query4 = $db->query("SELECT * FROM teacher WHERE tId='$ass_tId'");
              while($row1=$sub_query4->fetch_assoc()){    
              $ass_tName=$row1['tName'];
              }

              $sub_query5 = $db->query("SELECT * FROM subject WHERE tId='$ass_tId'");
              while($row3=$sub_query5->fetch_assoc()){    
              $ass_subName=$row3['subName'];     
              }
                 ?>

        <!-- <div class="col s12 m12"> -->

          <?php if(empty($ass_nFile)){ ?>
            <div class="card ">
              <div class="card-content black-text">
                <span class="card-title left-align"><?php echo $ass_tName ?></span><p class="right-align"><?php echo $assDate ?><p><hr>
                <p>
                Subject = <?php echo $ass_subName ?><br>
                Assignment no. = <?php echo $assNum ?><br>
                <?php echo $ass_notice;?></p><hr>
                <p>To be completed before <?php echo $ass_dueDate ?></p>
              </div>
            </div>
          <?php } else { ?>
            <div class="card ">
              <div class="card-content black-text">
                <span class="card-title left-align"><?php echo $ass_tName ?></span><p class="right-align"><?php echo $assDate ?><p><hr>
                <p>
                Subject = <?php echo $ass_subName ?><br>
                Assignment no. = <?php echo $assNum ?><br>
                <?php echo $ass_notice;?></p>
                <a class="btn waves-effect waves-light" href="../ass_notice/<?php echo $nFile ?>" download><?php echo $ass_nFile?>  <i class="medium material-icons">file_download</i></a><hr>
                <p>To be completed before <?php echo $ass_dueDate ?></p>
              </div>
            </div>
           <?php } ?>
               
        <!-- </div> -->
      <?php }?>
    </div>
  </div>


	<?php require '../includes/fixed_button.php'; ?>

  <?php require '../includes/footer.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>

<?php } } ?>