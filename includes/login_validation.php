<?php
    
    require '../includes/connect.php';
    
    if(isset($_POST['submit'])){
      // validation for reg_no starts here
      if (empty($_POST['reg_no'])) {
        $error= 'Please enter your Registration Number';
      } else if (strlen($_POST['reg_no'])<11) {
        $reg_no=mysqli_reaL_escape_string($db ,$_POST['reg_no']);
      } else{
        $error= 'Enter a valid Registration Number';
      }
      // validation for reg_no ends here

      // validation for pass starts here
      if (empty($_POST['pass'])) {
        $error= 'Please enter your Registration Number';
      } else if (ctype_alpha('pass')) {
        $pass=mysqli_reaL_escape_string($db ,$_POST['pass']);
      } else{
        $error = 'Enter a valid Registration Number';
      }
      // validation for pass ends here

      if(empty($error)){
        $result= $db->query("SELECT * FROM admin_login WHERE reg_no='$reg_no' AND pass='$pass'");
        if( $result->num_rows ==1 ){
          while($row= $result->fetch_assoc()){
            $_SESSION['reg_no']=$row['reg_no'];
            header('Location:../pages/stud_profile.php');
          }

          // $_SESSION['reg_no']=$reg_no;
          // echo "<script>window.open('../pages/stud_profile.php', '_self')</script>";
        } else {?>
          <div class="card-panel teal">
            <span class="white-text"><?php echo "The Reg Number or Password is incorrect, plese try again or signUp"; ?>
            </span>
          </div>
        <?php }
      }
      else{?>
        <div class="card-panel teal">
          <span class="white-text"><?php echo $error.", please try again"; ?>
          </span>
        </div>
      <?php }
    }
  ?>