<?php
  session_start();

  if(isset($_SESSION['reg_no']) || isset($_SESSION['tEmail'])){
    require '../includes/connect.php';

    if(isset($_SESSION['reg_no'])){

      $login_reg_no=$_SESSION['reg_no'];
      $select_query= $db->query("SELECT * FROM admin_login WHERE reg_no='$login_reg_no'");

      while($row = $select_query->fetch_assoc()){
        $reg_no = $row['reg_no'];
        $year = $row['year'];
        $pass = $row['pass'];
      }

    } elseif(isset($_SESSION['tEmail'])){

      $login_tEmail=$_SESSION['tEmail'];

      $select_query= $db->query("SELECT * FROM teacher WHERE tEmail='$login_tEmail'");
      while($row=$select_query->fetch_assoc()){
        $tEmail=$row['tEmail'];
        $tId=$row['tId'];
        $pass = $row['tPass'];
      }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title><?php 
  if(!empty($login_reg_no)){
    echo $reg_no;
  } else {
    echo $tEmail;
  }
  ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <!-- <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php require '../includes/profile_navbar.php'; ?>
<div class="row">

  <div class="col s12 m4"></div>

  <div class="col s12 m4">
    <div class="card transparent darken-1">
        <div class="card-content black-text">
        <form method="post" enctype="multipart/form-data">
          <span class="card-title">Change your password</span>
          <div class="row">   
              <div class="input-field col s12 m12">
                <input id="cur_pass" type="password" class="validate" name="cur_pass" required>
                <label for="cur_pass" data-error="wrong" data-success="right">Current password</label>
              </div>

              <div class="input-field col s12 m12">
                <input id="new_pass" type="password" class="validate" name="new_pass" required>
                <label for="new_pass" data-error="wrong" data-success="right">New Password</label>
              </div>    

              <div class="input-field col s12 m12">
                <input id="new_pass_con" type="password" class="validate" name="new_pass_con" required>
                <label for="new_pass_con" data-error="wrong" data-success="right">Confirm Password</label>
              </div>             
          </div>
        </div>

        <div class="card-action">
          <button class="waves-effect waves-light btn" name="submit" type="submit">Done</button>
        </div>

        </form>       
      </div>
    <?php
    $error = '';
    if(!empty($login_reg_no)){
        if(isset($_POST['submit'])){
          if(isset($_POST['cur_pass'])){
            if( $pass == $_POST['cur_pass'] ){

              if($_POST['new_pass'] == $_POST['new_pass_con']){
                $final_pass = $_POST['new_pass_con'];
              } else {
                $error = $error." Your new password and confirm password is not matching, Please try again.";
              }


            } else {
              $error = $error." The password you entered is not matching with your current password, Please try again.";
            }
          } else{
            $error = $error." You must fill every single field";
          }

          if(empty($error)){

             $update = $db -> query("UPDATE admin_login SET pass='$final_pass' WHERE reg_no = '$reg_no' && year = '$year'");

             if($update){ ?>
              <div class="card-panel teal">
                <span class="white-text"><?php echo "Changed your password successfully."; ?>
                </span>
              </div>
             <?php } else { ?>
              <div class="card-panel teal">
                <span class="white-text"><?php echo "Some error occured please contact admin."; ?>
                </span>
              </div>
              <?php }
          } else { ?>

            <div class="card-panel teal">
              <span class="white-text"><?php echo $error; ?>
              </span>
            </div>

          <?php }
      } 
    } elseif(!empty($tEmail)){

        if(isset($_POST['submit'])){
          if(isset($_POST['cur_pass'])){
            if( $pass == $_POST['cur_pass'] ){

              if($_POST['new_pass'] == $_POST['new_pass_con']){
                $final_pass = $_POST['new_pass_con'];
              } else {
                $error = $error." Your new password and confirm password is not matching, Please try again.";
              }


            } else {
              $error = $error." The password you entered is not matching with your current password, Please try again.";
            }
          } else{
            $error = $error." You must fill every single field";
          }

          if(empty($error)){

             $update = $db -> query("UPDATE teacher SET tPass='$final_pass' WHERE tEmail = '$tEmail'");

             if($update){ ?>
              <div class="card-panel teal">
                <span class="white-text"><?php echo "Changed your password successfully."; ?>
                </span>
              </div>
             <?php } else { ?>
              <div class="card-panel teal">
                <span class="white-text"><?php echo "Some error occured please contact admin."; ?>
                </span>
              </div>
              <?php }
          } else { ?>

            <div class="card-panel teal">
              <span class="white-text"><?php echo $error; ?>
              </span>
            </div>

          <?php }
        }   
    }
  ?>
  </div>

  <div class="col s12 m4"></div>

</div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/fixed_button.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>   -->
  <script src="../js/materialize.min.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

<?php } else{
  header("location: ../");
  } ?>