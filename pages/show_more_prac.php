<?php
  session_start();

  if(!isset($_SESSION['tEmail'])){
    header("location: ../index.php");
  }
  else{

    require '../includes/connect.php';
    $login_tEmail=$_SESSION['tEmail'];
    $select_query= $db->query("SELECT * FROM teacher WHERE tEmail='$login_tEmail'");

    while($row=$select_query->fetch_assoc()){
      $tEmail=$row['tEmail'];
      $tId=$row['tId'];
    }

    if(isset($_GET['id'])){

      $pageId=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title><?php $tEmail ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <style type="text/css">
    #my-div
{
    width    : 1000px;
    height   : 800px;
    overflow : hidden;
    position : relative;
    border: 5px solid grey;
}

#my-iframe
{
    position : absolute;
    top      : -100px;
    left     : -200px;
    width    : 1280px;
    height   : 1200px;
}
  </style>
</head>
<body>

    <?php require '../includes/profile_navbar.php'; ?>

    <?php $select_query= $db->query("SELECT * FROM practical WHERE pracId='$pageId'");

    if($select_query->num_rows == 0){
      header('location: ../');
    }

    while($row=$select_query->fetch_assoc()){
      $sReg_no=$row['sReg_no'];
      $sYear=$row['sYear'];
      $sBatch=$row['sBatch'];
      $subId=$row['subId'];
      $pracNum=$row['pracNum'];
      $code=$row['code'];
      $codeOp=$row['codeOp'];
      $ckt=$row['ckt'];
      $cktOp=$row['cktOp'];
      $pDate=$row['pDate'];
      $marks=$row['marks'];
    } 

    $select_query= $db->query("SELECT * FROM admin_login WHERE reg_no='$sReg_no'");

    while($row=$select_query->fetch_assoc()){
      $sName=$row['name'];
    } 

    $select_query= $db->query("SELECT * FROM subject WHERE subId='$subId'");

    while($row=$select_query->fetch_assoc()){
      $subName=$row['subName'];
    } ?>

    <div class="container">

    <div class="card-panel teal">
      <span class="white-text">
      Name = <?php echo $sName ?><br>
      Reg no. = <?php echo $sReg_no ?><br>
      Year = <?php echo $sYear ?><br>
      Batch = <?php echo $sBatch ?><br>
      Practical no. = <?php echo $pracNum ?><br>
      Subject  = <?php echo $subName ?><br>
      </span>
    </div>

    <div class="row">
    <?php if(empty($ckt)){ ?>
      <div class="col s12 m6">
      <code>
        <?php
        $fileIp="../code/input/".$code;
        $myfile = fopen("$fileIp", "r") or die("Unable to open file!");
        // Outputs one line until end-of-file
        while(!feof($myfile)) {
          echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
        ?>
        </code>
      </div>
      <div class="col s12 m6">
        <?php $fileOp="../code/output/".$codeOp; ?>
        <img class="materialboxed" width="650" src=<?php echo $fileOp ?>>
        <!-- <img src=<?php //echo $fileOp ?>> -->
      </div>
     <?php } 

     else {?>

     <div class="col s12 m6">
        <?php $fileIp="../ckt/input/".$ckt; ?>
        <img class="materialboxed" width="650" src=<?php echo $fileIp ?>>
        <!-- <img src=<?php //echo $fileIp ?>> -->
      </div>

      <div class="col s12 m6">
        <?php $fileOp="../ckt/output/".$cktOp; ?>
        <img class="materialboxed" width="650" src=<?php echo $fileOp ?>>
        <!-- <img src=<?php //echo $fileOp ?>> -->
      </div>

     <?php } ?>
    </div>

    <div class="card-panel teal white-text">
    Here you can compile and run above code.<br>
    Just make sure that you enable that interactive mode.
    </div>
    <div id="my-div">
      <iframe id="my-iframe" width="100%" height="100%" src="https://www.jdoodle.com/online-java-compiler" ></iframe>
    </div>

    <div class="card-panel teal">
    <form method="post" action="show_more_prac.php?id=<?php echo $pageId ?>" enctype="multipart/form-data">
    <?php if(empty($marks)){ ?>
      <div class="input-field white-text">
        <input id="marks" type="number" class="validate white-text" name='marks'>
        <label for="marks" class="white-text">Marks</label>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="marks_btn">Submit
        <i class="material-icons right">send</i>
      </button>
    </form>

    <?php 
      if(isset($_POST['marks_btn'])){
        $marks=$_POST['marks'];

        $insert=$db->query("UPDATE practical SET marks='$marks' WHERE pracId='$pageId'");
        if($insert){
          header("Refresh:0");
         } else { ?>
          <span class="white-text">
          Some error occured, please contact admin.
          </span>
        <?php }
      }
    ?>
    <?php } else{ ?>
      <span class="white-text">
      Marks : <?php echo $marks;?> 
      </span>
      <?php } ?>
      
    </div>
    </div>

    <?php require '../includes/fixed_button.php' ?>
    <?php require '../includes/footer.php' ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>

  <script type="text/javascript">
  // for compiler

  var myDiv = document.getElementById('my-div');
    myDiv.onload = function(){
    myIframe.contentWindow.scrollBy(0, 1000);
  };

  // for compiler ends
  </script>
</body>
</html>

<?php }
  else{
    header('location: ../');
  }
 } ?>