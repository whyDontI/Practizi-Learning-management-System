<?php
    require '../includes/connect.php';
    
    if(isset($_POST['su_submit'])){

      // validation for su_reg_no starts here
      if (strlen($_POST['su_reg_no'])<11) {
        $su_reg_no=$_POST['su_reg_no'];
      } else{
        $error= 'Enter a valid Registration Number';
      }
      // validation for su_reg_no ends here

      // validation for su_year starts here
      $su_year=$_POST['su_year'];
      // validation for su_year ends here

      // validation for name starts here
        

        if(preg_match("/^[a-zA-Z ]*$/",$_POST['su_name'])){
          $su_name= mysqli_reaL_escape_string($db ,$_POST['su_name']);     
        } else{
          $error="A name should contain only characters and white spaces.";
        }

        if(preg_match("/^[a-zA-Z ]*$/",$_POST['su_l_name'])){
          $su_l_name= mysqli_reaL_escape_string($db ,$_POST['su_l_name']);    
        } else{
          $error="A last name should contain only characters and white spaces.";
        }

        
      // validation for name ends here

      // validation for su_batch starts here
      if (strlen($_POST['su_batch'])==1) {
        $su_batch=mysqli_reaL_escape_string($db ,strtoupper($_POST['su_batch']));
      } else{
        $error= 'Enter a valid batch letter';
      }
      // validation for su_batch ends here

      // validation for su_cEmail starts here
      $end_email=end(explode('@', $_POST['su_cEmail']));
      if($end_email=="sggs.ac.in"){
        $su_cEmail = mysqli_reaL_escape_string($db ,$_POST['su_cEmail']);
      } else {
        $error= 'You need to enter your college email-Id';
      }
      

      // REMOVE THIS COMMENT BEFORE UPLOAD

         //(!filter_var($su_cEmail, FILTER_VALIDATE_EMAIL)) {
           //$error= "Invalid email format"; 
         //} else{
           //$error= 'Enter a valid Email Id';
         //}
        // validation for su_cEmail ends here

      // validation for su_phNum starts here
      if (strlen($_POST['su_phNum'])<11) {
        $su_phNum=mysqli_reaL_escape_string($db ,$_POST['su_phNum']);
      } else{
        $error= 'Enter a valid Phone Number';
      }
      // validation for su_phNum ends here
      $temp_pass = $_POST['su_pass'];
      $temp_cPass=$_POST['su_cPass'];
      // validation for su_pass starts here
      if ($temp_pass==$temp_cPass) {
        $su_pass=$_POST['su_pass'];
        $su_cPass=$_POST['su_cPass'];
      }
      else{
        $error='Your confirm password does not match';
      }
      // validation for su_pass ends here

      if(empty($error)){
        $check="SELECT * FROM admin_login WHERE reg_no='$su_reg_no'";

        $run= $db->query($check);

        if($run->num_rows==0){
          $insert_query="INSERT INTO admin_login (reg_no, batch, year, cEmail, phNum, pass, points, name, last_name) VALUES ('$su_reg_no', '$su_batch', '$su_year','$su_cEmail', '$su_phNum', '$su_pass', '', '$su_name', '$su_l_name')";

          if($db->query($insert_query)){?>
            <div class="card-panel teal">
              <span class="white-text"><?php echo "Successfully Signed Up, now you can LogIn"; ?>
              </span>
            </div>
            <?php } else{?>
            <div class="card-panel teal">
              <span class="white-text"><?php echo "Some error occurred please contact admin"; ?>
              </span>
            </div>
          <?php }
         } else {?>
            <div class="card-panel teal">
              <span class="white-text"><?php echo "Somebody with given credentials already exists, Please contact admin.."; ?>
              </span>
            </div>
        <?php }
      } else { ?>
        <div class="card-panel teal">
          <span class="white-text"><?php echo $error.", please try again.."; ?>
          </span>
        </div>
      <?php } } ?>