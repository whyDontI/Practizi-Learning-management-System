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
      $batch=$row['batch'];
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
                  <span class="card-title">Search</span>    

                  <form action="stud_search.php" method="get" enctype="multipart/form-data">            

                  <div class="input-field col s12">
                    <select name="srchSub">
                      <option value="" disabled selected>Choose Subject</option>
                      <?php  
                      $sub_query = $db->query("SELECT * FROM subject WHERE subYear='$year'");
                      while($row3=$sub_query->fetch_assoc()){
                         $subName=$row3['subName'];
                         $subId=$row3['subId'];
                         ?>

                         <option value="<?php echo $subId ?>"><?php echo $subName ?></option> 

                       <?php } ?>
                    </select>
                  </div>                       
                  
                </div>
                <div class="card-action">
                  <button class="btn waves-effect waves-light" type="submit" name="show">Show
                    <i class="material-icons right">send</i>
                  </button>
                </div>
                  </form>
            </div>
          </div>
      </div>

      

      

      <div class="col s12 m10" style="margin-top: 10px !important;">
        <ul class="tabs">
          <li class="tab col s3"><a lass="active" href="#practical">Practical</a></li>
          <li class="tab col s3"><a href="#assignment">Assignments</a></li>
        </ul>
      </div>
      <div id="practical" class="col s12 m10">

        <div class="col s12 m10">
        <?php if(isset($_GET['show']) && isset($_GET['srchSub'])){ 
          $subId=$_GET['srchSub'];
          $sub_query2 = $db->query("SELECT * FROM subject WHERE subId='$subId'");
              while($row1=$sub_query2->fetch_assoc()){ 
                $subName=$row1['subName'];
              }
          ?>

          <div class="card-panel teal">
            <span class="white-text">Showing results for practicals of<br>          
            Subject= <?php echo $subName ?><br>
            </span>
          </div><br>

          <table class="striped highlight responsive-table">
          <thead>
            <tr>
                <th data-field="prac_no">Prac.No</th>
                <th data-field="subject">Subject</th>
                <th data-field="input">Input</th>
                <th data-field="output">Output</th>
                <th data-field="date">Date</th>
            </tr>
          </thead>

          <tbody>
          <?php $sub_query = $db->query("SELECT * FROM practical WHERE sReg_no='$reg_no' && sYear='$year' && subId='$subId' && sBatch='$batch'");
              if($sub_query->num_rows){while($row=$sub_query->fetch_assoc()){
              $subId=$row['subId'];
              $pracNum=$row['pracNum'];
              $code=$row['code'];
              $codeOp=$row['codeOp'];
              $ckt=$row['ckt'];
              $cktOp=$row['cktOp'];
              $pDate=$row['pDate'];
              
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
              <td><?php echo $pDate ?></td>
            </tr>

            <?php } } else { ?>
              <div class="card-panel teal">
                <span class="white-text">
                No results found..!!
                </span>
            </div>
             <?php  }?>
          </tbody>
        </table>
         <?php //} } else{ ?>
            <!-- <div class="card-panel teal">
                <span class="white-text">
                No results found..!!
                </span>
            </div> -->
         <?php //} ?>
      
        <?php } else{ ?>
        <div class="card-panel teal">
          <span class="white-text">You need to select a subject.     
          </span>
        </div>
        <?php } ?>
      </div>        

      </div>
      <div id="assignment" class="col s12 m10">

        <div class="col s12 m10">
        <?php if(isset($_GET['show']) && isset($_GET['srchSub'])){ 
          $subId=$_GET['srchSub'];
          $sub_query2 = $db->query("SELECT * FROM subject WHERE subId='$subId'");
              while($row1=$sub_query2->fetch_assoc()){ 
                $subName=$row1['subName'];
              }
          ?>

          <div class="card-panel teal">
            <span class="white-text">Showing results for assignments of<br>          
            Subject= <?php echo $subName ?><br>
            </span>
          </div><br>

          <table class="striped highlight responsive-table">
          <thead>
            <tr>
                <th data-field="ass_no">No.</th>
                <th data-field="subject">Subject</th>
                <th data-field="file">File</th>
                <th data-field="date">Date</th>
            </tr>
          </thead>

          <tbody>
            <?php $sub_query = $db->query("SELECT * FROM assignment WHERE sReg_no='$reg_no' && sYear='$year' && subId='$subId'");
              if($sub_query->num_rows){while($row=$sub_query->fetch_assoc()){
              $subId=$row['subId'];
              $assNum=$row['assNum'];
              $assFile=$row['assFile'];
              $assDate=$row['assDate'];
              $subName=$row['subName'];
              
              
              ?>
          
            <tr>
              <td><?php echo $assNum ?></td>
              <td><?php echo $subName ?></td>
              <td><?php echo $assFile ?></td>
              <td><?php echo $assDate ?></td>
            </tr>

            <?php  ?>
          

            <?php  } } else { ?>
              <div class="card-panel teal">
                <span class="white-text">
                No results found..!!
                </span>
              </div>
            <?php  }?>
          </tbody>
        </table>
         <?php //} } else{ ?>
            <!-- <div class="card-panel teal">
                <span class="white-text">
                No results found..!!
                </span>
            </div> -->
         <?php //} ?>
      
      <?php } else{ ?>
        <div class="card-panel teal">
          <span class="white-text">You need to select a subject.     
          </span>
        </div>
        <?php } ?>
      </div>

      </div>


    </div>
    <?php require '../includes/fixed_button.php'; ?>
    <?php require '../includes/footer.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

<?php } ?>