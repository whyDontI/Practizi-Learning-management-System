<!-- Dropdown Structure -->
<?php if(empty($tId)){ ?>

  <!-- for students -->

  <ul id="nav_drop" class="dropdown-content">
    <li><a href="../pages/stud_profile.php">Home</a></li>
    <li><a href="../pages/submit.php">Submit</a></li>
    <li><a href="../pages/show_notices.php">Notices</a></li>
    <li><a href="../pages/pass_change.php">Change password</a></li>
    <li><a href="../pages/forum.php">Forum</a></li>
    <li class="divider"></a></li>
    <li><a href="../pages/logout.php">LogOut</a></li>
  </ul>

 <!--  <ul id="slide-out" class="side-nav">
    <li><a href="../pages/stud_profile.php">Home</a></li>
    <li><a href="../pages/submit.php">Submit</a></li>
    <li><a href="../pages/show_notices.php">Notices</a></li>
    <li><a href="../pages/forum.php">Forum</a></li>
    <li class="divider"></a></li>
    <li><a href="../pages/logout.php">LogOut</a></li>
  </ul> -->



  <?php }
  else {?>

  <!-- for faculty -->

  <ul id="nav_drop" class="dropdown-content">
    <li><a href="../pages/fac_profile.php">Home</a></li>
    <!-- <li><a href="../pages/submit.php">Submit</a></li> -->
    <li><a href="../pages/notice_sub.php">Notices</a></li>
    <li><a href="../pages/notice_ass.php">Assignment Notice</a></li>
    <li><a href="../pages/forum.php">Forum</a></li>
    <li class="divider"></a></li>
    <li><a href="../pages/logout.php">LogOut</a></li>
  </ul>

  <!-- 
    <ul id="slide-out" class="side-nav">
      <li><a href="../pages/fac_profile.php">Home</a></li> -->
      <!-- <li><a href="../pages/submit.php">Submit</a></li> -->
      <!-- <li><a href="../pages/notice_sub.php">Notices</a></li>
      <li><a href="../pages/notice_ass.php">Assignment Notice</a></li>
      <li><a href="../pages/forum.php">Forum</a></li>
      <li class="divider"></a></li>
      <li><a href="../pages/logout.php">LogOut</a></li>
    </ul> -->


  <?php } ?>

  <nav class="transparent">
    <div class="nav-wrapper teal-text" style="padding-left: 10px;">
      <!-- <a href="#" data-activates="slide-out" class="button-collapse teal-text"><i class="material-icons">menu</i></a> -->
      <a href="../" class="brand-logo teal-text">Practizi</a>
      <ul class="right hide-on-med-and-down">
        <!-- Dropdown Trigger -->
        <!-- <li><a href="../pages/submit.php">Submit</a></li> -->
        <li><a class="dropdown-button teal-text" href="#!" data-activates="nav_drop">

        <?php 

        if(empty($reg_no)){
          echo $tEmail; 
        } else{
          echo $reg_no;
        }       

        ?><i class="material-icons right">arrow_drop_down</i></a></li>

      </ul>
    </div>
  </nav>