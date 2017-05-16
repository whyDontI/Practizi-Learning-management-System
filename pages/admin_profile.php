<?php

  {
    require '../includes/connect.php';

    $login_aName=$_SESSION['aName'];

    $select_query= $db->query("SELECT * FROM admin WHERE aName='$login_aName'");

?>



<!DOCTYPE html>

<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

  <title><?php $uName ?></title>



  <!-- CSS  -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>

<body>



    <?php require '../includes/navbar.php'; ?>



    <div class="row">



      <div class="col s12 m7">

        <table class="responsive-table striped">

          <thead>

            <tr>

                <th data-field="id">Id</th>

                <th data-field="name">Name</th>

                <th data-field="reg_no">Reg No.</th>

            </tr>

          </thead>



          <tbody>          

            <?php $sub_query = $db->query("SELECT * FROM admin_login");

            $uId=1; 

              while($row=$sub_query->fetch_assoc()){

                $uRegNo=$row['reg_no'];

                $uName=$row['name'];

                $uLName=$row['last_name'];

                 ?>

              <tr>

                <td><?php echo $uId++ ?></td>

                <td><?php echo $uName." ".$uLName ?></td>

                <td><?php echo $uRegNo ?></td>

              </tr>

               <?php } ?>       

          </tbody>

        </table>

      </div>



      <div class="col s12 m5">

        <?php $sub_query = $db->query("SELECT * FROM feedback ORDER BY fDate DESC");

        while($row1=$sub_query->fetch_assoc()){

          $fDate=$row1['fDate'];

          $fName=$row1['fName'];

          $fMark=$row1['fMark'];

          $fSug=$row1['fSug'];

           ?>

        <div class="card-panel teal">

          <span class="white-text">

            Date= <?php echo $fDate; ?><br>

            Name= <?php echo $fName; ?><br>

            Marks= <?php echo $fMark; ?><br>

            <?php echo $fSug; ?>

          </span>

        </div>

        <?php } ?>

      </div>

            

    </div>



    <?php require '../includes/footer.php'; ?>

  <!--  Scripts-->

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

  <!-- <script src="../js/materialize.js"></script> -->

  <script src="../js/init.js"></script>

  <script src="../js/script.js"></script>

</body>

</html>



<?php } ?>