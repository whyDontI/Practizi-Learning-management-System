<?php
   require '../includes/connect.php';
    
  if(isset($_POST['fac_login_submit'])){
    // validation for tEmail starts here
      if (empty($_POST['tEmail'])) { 

        $error= 'Please enter your Email';

           } 
      else if (strlen($_POST['tEmail'])< 40) {

        $tEmail=$_POST['tEmail'];

      } else{
        $error= 'Enter a valid email';
       }
    // validation for tEmail ends here

    // validation for tPass starts here
      if (empty($_POST['tPass'])) {

        $error= 'Please enter your password';

       } else if (ctype_alnum($_POST['tPass'])) {

        $tPass=$_POST['tPass'];
      
      } else{

        $error= 'Enter a valid password';

      }
    // validation for tPass ends here

      if(empty($error)){
        $result=0;
        $result= $db->query("SELECT * FROM teacher WHERE tEmail='$tEmail' AND tPass='$tPass'");
        if($result->num_rows > 0){

          while($row= $result->fetch_assoc()){

            $_SESSION['tEmail']=$row['tEmail'];
            header('Location: ../pages/fac_profile.php');
          }
        } 
        else{?>
          <div class="card-panel teal">
            <span class="white-text"><?php echo "The Email or Password is incorrect, plese try again or signUp" ?>
            </span>
          </div>
        <?php }
      }
      else{?>
        <div class="card-panel teal">
          <span class="white-text"><?php echo $error; ?>
          </span>
        </div>        
      <?php }
  }

?>