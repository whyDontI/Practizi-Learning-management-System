<?php
  session_start();

  if(!isset($_SESSION['tEmail'])){
    header("location: fac_login.php");
  }
  else{
    include("../includes/connect.php");
    $login_tEmail=$_SESSION['tEmail'];
    $select_query= $db->query("SELECT * FROM teacher WHERE tEmail='$login_tEmail'");

    while($row=$select_query->fetch_assoc()){
      $tEmail=$row['tEmail'];
      $tId=$row['tId'];
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
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

    <?php require '../includes/profile_navbar.php'; ?>

    <div class="row">

    <!-- search column starts here -->
      <div class="col s12 m3">        
          <div class="card horizontal">
            <div class="card-stacked">
              
              <div class="card-content brown-text">
              <span class="card-title">Search</span>    

              <form action="fac_search.php" method="GET" enctype="multipart/form-data">

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
                while($row=$sub_query->fetch_array()){
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
                <input id="srchPNum" type="number" name="srchPNum" class="validate">
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

<?php if(isset($_GET['search'])){
  $srchYear=$_GET['srchYear'];
  $srchSub=$_GET['srchSub'];
  $srchBatch=$_GET['srchBatch'];
  $srchPNum=$_GET['srchPNum'];
?>
      <div class="col s12 m5">
          <div class="card-panel teal">
              <span class="white-text">Showing results for<br>
              year= <?php echo $_GET['srchYear']?><br>
              subject= <?php echo $_GET['srchSub']?><br>
              batch= <?php echo $_GET['srchBatch']?><br>
              practical number= <?php echo $_GET['srchPNum']?><br>
              </span>
          </div><br>
          <div class="row"> 
<?php

        $sub_query = $db->query("SELECT * FROM practical WHERE sYear='$srchYear' && subId='$srchSub' && sBatch='$srchBatch' && pracNum='$srchPNum'");
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
?>
              <!-- display -->
              <div class="card blue-grey darken-1 col s12 m6" styel="padding-right: 10px;">
                <div class="card-content white-text">
                  <span class="card-title"><?php echo $reg_no ?></span>
                  <p>
                  <?php
                    if(empty($code)){
                     echo $ckt."<br>". $cktOp;
                    }
                    else{
                    echo $code."<br>". $codeOp; 
                    }
                  ?>
                  </p>
                </div>
                <div class="card-action">
                <a class="btn waves-effect waves-light" type="submit" name="Search" href="show_more_prac.php?id=<?php echo $pracId ?>" >Show more<i class="material-icons right">send</i></a>                 
              
                </div>
              </div>

              <?php } }
                else{ ?>

                <div class="card-panel teal">
                    <span class="white-text">
                    No results found..!!
                    </span>
                </div>

                <?php  } ?>
       </div>  
      </div>



    <!-- display column ends here -->
    
    <!-- </div>status column starts here -->
      <div class="col s12 m3">
          
      </div>
    <!-- status column starts here   -->
</div>
    <?php require '../includes/fixed_button.php'; ?>
    <?php require '../includes/footer.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

<?php } ?>