<?php
  session_start();
  require '../includes/connect.php';
  if(!isset($_SESSION['tEmail'])){
    header("location: fac_login.php");
  }
  else{
    
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
  <title><?php $tEmail ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" media="screen,projection">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

    <?php require '../includes/profile_navbar.php'; ?>

    <div class="row">

    <!-- search column starts here -->
      <div class="col s12 m2">

        <div class="card-panel teal">

          <span class="white-text">Practical's here</span>

        </div><br>

          <div class="card horizontal">

            <div class="card-stacked">

              

        <div class="card-content brown-text">

            <span class="card-title">Search</span>    



            <form action="fac_search.php" method="get" enctype="multipart/form-data">



              <div class="input-field col s12">

                <select name="srchYear">

                  <option value="" disabled selected>Choose Year</option>

                  <option value="2">2</option>

                  <option value="3">3</option>

                  <option value="4">4</option>

                </select>

              </div>            



              <div class="input-field col s12">

                <select name="srchSub">

                <option value="" disabled selected>Choose Subject</option>

                <?php  

                $sub_query = $db->query("SELECT * FROM subject WHERE tId='$tId'");

                while($row=$sub_query->fetch_assoc()){

                   $subName=$row['subName'];

                   $subId=$row['subId'];

                   $count=0;

                   ?>



                   <option value="<?php echo $subId ?>"><?php echo $subName ?></option> 



                 <?php } ?>

               </select>

              </div>              



              <div class="input-field col s12">

                <select name="srchBatch">

                  <option value="" disabled selected>Choose Batch</option>

                  <option value="A">A</option>

                  <option value="B">B</option>

                  <option value="C">C</option>

                  <option value="D">D</option>

                </select>

              </div>    



              <div class="input-field col s12">

                <input id="srchPNum" type="number" name="srchPNum" class="validate" required>

                <label for="srchPNum">Practical number</label>

              </div>          

            

        </div>

              <div class="card-action">

                <button class="btn waves-effect waves-light" type="submit" name="search">Search

                  <i class="material-icons right">send</i>

                </button>

              </div>

            </form>

            </div>

          </div>

      </div>
    <!-- search column ends here --> 

    <!-- display column starts here -->


  

  
    <!-- display column ends here -->
    <div class="col s12 m8" style="margin-top: 10px;">
    
    <div class="col s12 m12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#practical">Practical</a></li>
        <li class="tab col s3"><a href="#assignment">Assignment</a></li>
      </ul>
    </div>

    <div id="practical" class="col s12 m12">
        <div class="col s12 m12">
          <?php 
          if(isset($_GET['reg_search'])){
            // if(!empty($_GET['sreg_no']) && strlen($_GET['sreg_no'])==10){$sreg_no=$_GET['sreg_no'];}
            //else{?>
              <!-- <div class="card-panel teal">
                <span class="white-text"><?php //echo $error= 'Enter a valid registration number'; ?>
                </span>
              </div> --> 
            <?php //die();}
            $sreg_no = $_GET['sreg_no'];
          ?>
              <div class="card-panel teal">
                  <span class="white-text">Showing practicals of<br>
                  Reg No. = <?php echo $sreg_no ?>
                  </span>
              </div><br>
              <div class="row"> 
              <?php $sub_query = $db->query("SELECT * FROM practical WHERE sReg_no LIKE '%$sreg_no%'"); 
              if($sub_query->num_rows > 0){?>
            <table class="responsive-table striped">
              <thead>
                <tr>
                    <th data-field="pracNum">Sr No.</th>
                    <th data-field="subName">Subject</th>
                    <th data-field="practical">Practical</th>
                    <th data-field="output">Output</th>
                    <th data-field="marks">Marks</th>
                    <th data-field="show">Show</th>                    
                </tr>
              </thead>
              <tbody>
        <?php

              while($row=$sub_query->fetch_assoc()){
                  $pracId=$row['pracId'];
                  $reg_no=$row['sReg_no'];
                  $year=$row['sYear'];
                  $batch=$row['sBatch'];
                  $subId=$row['subId'];
                  $pracNum=$row['pracNum'];
                  $code=$row['code'];
                  $codeOp=$row['codeOp'];
                  $ckt=$row['ckt'];
                  $cktOp=$row['cktOp'];
                  $marks=$row['marks'];

                  $subject_query=$db->query("SELECT * FROM subject WHERE subId='$subId'");
                  if($subject_query->num_rows){
                    while($row1=$subject_query->fetch_assoc()){
                      $subName=$row1['subName'];
                    }
                  }
                  
        ?>

                  <tr>
                    <td><?php echo $pracNum?></td>
                    <td><?php echo $subName?></td>
                    <?php
                    if(empty($code)){ ?>
                      <td><?php echo $ckt ?></td>
                      <td><?php echo $cktOp;?></td>
                    <?php }
                    else{?>
                      <td><?php echo $code ?></td>
                      <td><?php echo $codeOp;?></td>
                    <?php }
                    ?>
                    <td><?php echo $marks;?></td>
                    <td><a class="btn waves-effect waves-light" type="submit" name="Search" href="show_more_prac.php?id=<?php echo $pracId ?>"><i class="material-icons right">send</i></a></td>
                  </tr>

                  <?php } ?>
                  </tbody>
                </table>

        <?php }else{ ?>

        <div class="card-panel teal">
          <span class="white-text"><?php echo $error= 'No result found'; ?>
          </span>
        </div>

          <?php } } ?>
           </div>  
      </div>
    </div>

    <div id="assignment" class="col s12 m12">
            <div class="col s12 m12">
          <?php 
          if(isset($_GET['reg_search'])){
            if(!empty($_GET['sreg_no'])){$sreg_no=$_GET['sreg_no'];}
            else{?>
              <div class="card-panel teal">
                <span class="white-text"><?php echo $error= 'Enter a valid registration number'; ?>
                </span>
              </div>
            <?php }
          ?>
              <div class="card-panel teal">
                  <span class="white-text">Showing assignments of<br>
                  Reg No. = <?php echo $sreg_no ?>
                  </span>
              </div><br>
              <div class="row"> 
              <?php $sub_query2 = $db->query("SELECT * FROM assignment WHERE sReg_no LIKE '%$sreg_no%' ORDER BY subId"); 
              if($sub_query2->num_rows > 0){?>
            <table class="responsive-table striped">
              <thead>
                <tr>
                    <th data-field="assNum">Sr.No</th>
                    <th data-field="subName">Subject</th>
                    <th data-field="assFile">File</th>
                    <th data-field="assDate">Date</th>
                    <th data-field="marks">Marks</th>
                    <th data-field="download">Download</th>                    
                </tr>
              </thead>
              <tbody>
        <?php

              while($row=$sub_query2->fetch_assoc()){
                  $assNum=$row['assNum'];
                  $subId=$row['subId'];
                  $assFile=$row['assFile'];
                  $assDate=$row['assDate'];
                  $marks=$row['marks'];

                  $subject_query1=$db->query("SELECT * FROM subject WHERE subId='$subId'");
                  if($subject_query1->num_rows){
                    while($row2=$subject_query1->fetch_assoc()){
                      $subName=$row2['subName'];
                    }
                  }
                  
        ?>

                  <tr>
                    <td><?php echo $assNum?></td>
                    <td><?php echo $subName?></td>
                    <td><?php echo substr($assFile, 0, 5).".."; //echo $assFile;?></td>
                    <td><?php echo $assDate;?></td>
                    <td><?php echo $marks;?></td>
                    <td><a class="btn waves-effect waves-light" href="<?php echo "../assignment/".$assFile; ?>"><i class="material-icons right">file_download</i></a></td>
                    </tr>

                  <?php } ?>
                  </tbody>
                </table>

        <?php }else{ ?>

        <div class="card-panel teal">
          <span class="white-text"><?php echo $error= 'No result found'; ?>
          </span>
        </div>

          <?php } } ?>
           </div>  
        </div>
    </div>

    </div>
    
    <!-- </div>status column starts here -->
      <div class="col s12 m2">

        <form action="fac_srch_rn.php" method="get" enctype="multipart/form-data">

          <div class="card">

            <div class="card-content black-text">

            <span class="card-title">Search by Reg No.</span>

              <div class="input-field">

                <input id="reg_no" type="text" name="sreg_no" class="validate">

                <label for="reg_no">Reg No.</label>

              </div>

            </div>

            <div class="card-action">

              <button class="btn waves-effect waves-light" type="submit" name="reg_search">Search

                <i class="material-icons right">send</i>

              </button>

            </div>

          </div>

        </form>

      </div>
    <!-- status column starts here   -->
</div>
    <?php require '../includes/fixed_button.php'; ?>
    <?php require '../includes/footer.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <!-- <script src="../js/materialize.js"></script> -->
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

<?php }  ?>