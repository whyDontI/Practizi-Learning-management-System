<!-- bottom right button starts here-->
  <div class="container" style="z-index: 10000;">
  	<div class="fixed-action-btn vertical click-to-toggle">
  	    <a class="btn-floating btn-large teal">
  	      <i class="large material-icons">menu</i>
  	    </a>
        <?php if(empty($tId)){ ?>
  	    <ul style="z-index: 10000;">
  	      <li style="z-index: 10000;"><a class="btn-floating tooltipped red" href="../pages/logout.php" data-position="left" data-delay="50" data-tooltip="LogOut"> <i class="material-icons">power_settings_new</i></a></li>

          <li style="z-index: 10000;"><a class="btn-floating tooltipped pink" href="../pages/pass_change.php" data-position="left" data-delay="50" data-tooltip="Change password"><i class="material-icons">edit</i></a></li>

          <li style="z-index: 10000;"><a class="btn-floating tooltipped pink" href="../pages/forum.php" data-position="left" data-delay="50" data-tooltip="Forum"><i class="material-icons">forum</i></a></li>
  	      
  	      <li style="z-index: 10000;"><a class="btn-floating tooltipped green" href="../pages/submit.php" data-position="left" data-delay="50" data-tooltip="Submit"> <i class="material-icons">publish</i></a></li>
          <li style="z-index: 10000;"><a class="btn-floating tooltipped yellow" href="../pages/show_notices.php" data-position="left" data-delay="50" data-tooltip="Notices"><i class="material-icons">publish</i></a></li>
  	      <li style="z-index: 10000;"><a class="btn-floating tooltipped blue" href="../pages/stud_profile.php" data-position="left" data-delay="50" data-tooltip="Home"> <i class="material-icons">home</i></a></li>
  	    </ul>
         <?php  }
         else{ ?>
        <ul style="z-index: 10000;">
          <li style="z-index: 10000;"><a class="btn-floating tooltipped red" href="../pages/logout.php" data-position="left" data-delay="50" data-tooltip="LogOut"> <i class="material-icons">power_settings_new</i></a></li>

          <li style="z-index: 10000;"><a class="btn-floating tooltipped orange darken-1" href="../pages/notice_sub.php" data-position="left" data-delay="50" data-tooltip="Notice"> <i class="material-icons">subject</i></a></li>

          <li style="z-index: 10000;"><a class="btn-floating tooltipped pink" href="../pages/forum.php" data-position="left" data-delay="50" data-tooltip="Forum"><i class="material-icons">forum</i></a></li>
          
          <li style="z-index: 10000;"><a class="btn-floating tooltipped green darken-1" href="../pages/notice_ass.php" data-position="left" data-delay="50" data-tooltip="Assignment Notice"> <i class="material-icons">subject</i></a></li>
          <li style="z-index: 10000;"><a class="btn-floating tooltipped green" href="../pages/fac_profile.php" data-position="left" data-delay="50" data-tooltip="Home"><i class="material-icons">home</i></a></li>
          <!-- <li style="z-index: 10000;"><a class="btn-floating tooltipped blue" href="../pages/fac_profile.php" data-position="left" data-delay="50" data-tooltip="Home"> <i class="material-icons">home</i></a></li>
        </ul> -->  
        <?php } ?>
    </div> 	
  </div>
  <!-- bottom right button ends here-->


 <!--  <div class="fixed-action-btn vertical click-to-toggle">
    <a class="btn-floating btn-large teal">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div> -->