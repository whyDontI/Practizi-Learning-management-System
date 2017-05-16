<?php
  session_start();

  if(!isset($_SESSION['reg_no'])){
    header("location: signup_login.php");
  }
  else{
    require '../includes/connect.php';
    $login_reg_no=$_SESSION['reg_no'];
    $select_query= $db->query("SELECT * FROM admin_login WHERE reg_no='$login_reg_no'");

    while($row = $select_query->fetch_assoc()){
      $reg_no = $row['reg_no'];
      $year = $row['year'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title><?php $reg_no ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php require '../includes/profile_navbar.php'; ?>
<div class="row">
    <div class="col s12 m2">
      <div class="card horizontal">
        <div class="card-stacked">                
            <div class="card-content brown-text">
              <span class="card-title">Filter</span>    

              <form action="stud_search.php" method="get" enctype="multipart/form-data">

              <div class="input-field col s12">
                <?php $sub_query1 = $db->query("SELECT * FROM subject WHERE subYear=$year"); ?>
                <select name="srchSub">
                  <option value="" disabled selected>Choose subject</option>                  
                  <?php
                  while($row3=$sub_query1->fetch_assoc()){
                     $subName=$row3['subName'];
                     $subId=$row3['subId'];
                     ?>
                     <option value='<?php echo $subId ?>'><?php echo $subName ?></option>

                   <?php } ?>
                </select>  
                <label>Subject</label>     
              </div>                  
            
            </div>

            <div class=" input-field card-action">
              <button class="btn waves-effect waves-light" type="submit" name="show">Show
                <i class="material-icons right">send</i>
              </button>
            </div>
              </form>
        </div>
      </div>
    </div>
    
    <div class="row col s12 m10" style="margin-top: 10px;">
      <div class="col s12">
        <ul class="tabs teal-text">
          <li class="tab col s3"><a href="#pracs" class="active">Practicals</a></li>
          <li class="tab col s3"><a href="#assgs">Assignments</a></li>
        </ul>
      </div>
      <div id="pracs" class="col s12">
        <div class="col s12 m12">
          <div class="card-panel teal">
            <span class="white-text">
            Practicals
            </span>
          </div>
          <table class="striped highlight responsive-table">
            <thead>
              <tr>
                  <th data-field="prac_no">Prac.No</th>
                  <th data-field="subject">Subject</th>
                  <th data-field="input">Input</th>
                  <th data-field="output">Output</th>
                  <th data-field="marks">Marks</th>
                  <th data-field="date">Date</th>
              </tr>
            </thead>

            <tbody>
            <?php $sub_query = $db->query("SELECT * FROM practical WHERE sReg_no='$reg_no'");
                while($row=$sub_query->fetch_assoc()){
                $subId=$row['subId'];
                $subName=$row['subName'];
                $pracNum=$row['pracNum'];
                $code=$row['code'];
                $codeOp=$row['codeOp'];
                $ckt=$row['ckt'];
                $cktOp=$row['cktOp'];
                $pDate=$row['pDate'];
                $marks = $row['marks'];

                // $sub_query2 = $db->query("SELECT * FROM subject WHERE subId='$subId'");
                // while($row1=$sub_query2->fetch_assoc()){ 
                //   $subName=$row1['subName'];
                
                ?>
            
              <tr>
                <td><?php echo $pracNum ?></td>
                <td><?php echo $subName ?></td>
                <?php if(empty($code)){ ?>
                  <td><?php echo $ckt ?></td>
                  <td><?php echo $cktOp ?></td> 
                <?php } else{ ?>
                  <td><?php echo $code ?></td>
                  <td><?php echo $codeOp ?></td>
                <?php } ?>
                
                <td><?php echo $marks ?></td>
                <td><?php echo $pDate ?></td>
              </tr>

              <?php //}
               }?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="assgs" class="col s12">
        <div class="col s12 m12">
          <div class="card-panel teal">
            <span class="white-text">
            Assignments
            </span>
          </div>
          <table class="striped highlight responsive-table">
            <thead>
              <tr>
                  <th data-field="ass_no">No.</th>
                  <th data-field="subject">Subject</th>
                  <th data-field="file">File</th>
                  <th data-field="date">Date</th>
                  <th data-field="remark">Remark</th>
              </tr>
            </thead>

            <tbody>

            <?php $sub_query = $db->query("SELECT * FROM assignment WHERE sReg_no='$reg_no'");
                while($row=$sub_query->fetch_assoc()){
                $subId=$row['subId'];
                $assNum=$row['assNum'];
                $assFile=$row['assFile'];
                $assDate=$row['assDate'];
                $late=$row['late'];

                // $sub_query2 = $db->query("SELECT * FROM subject WHERE subId='$subId'");
                // while($row1=$sub_query2->fetch_assoc()){ 
                //   $subName=$row1['subName'];
                
                ?>
            
              <tr>
                <td><?php echo $assNum ?></td>
                <td><?php echo $subName ?></td>
                <td><?php echo $assFile ?></td>
                <td><?php echo $assDate ?></td>
                
                <?php
                if(!empty($late)){?>

                <td><font style="color: red;"><?php echo $late ?></font></td>
                
               <?php } else { ?>

               <td><?php echo "In time" ?></td>

               <?php }
                ?>
              </tr>

              <?php //}
               }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/fixed_button.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>  
  <!-- <script src="../js/materialize.min.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

<?php } ?>