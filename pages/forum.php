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
      }

    } elseif (isset($_SESSION['tEmail'])) {

      $login_tEmail=$_SESSION['tEmail'];

      $select_query= $db->query("SELECT * FROM teacher WHERE tEmail='$login_tEmail'");

      while($row=$select_query->fetch_assoc()){

        $tEmail=$row['tEmail'];

        $tId=$row['tId'];

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

<!-- facebook comments -->

<!-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->

<!-- facebook comments -->

<div class="row">
  <div class="col s12 m2"></div>
  <div class="col s12 m8">
  <div class="card-panel">Here you can discuss</div>
    <!-- <div class="fb-comments " data-href="http://127.0.0.1/nicks_crap/battle/pages/forum.php" data-numposts="5"></div> -->
  
    <!-- disqus comments -->
    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://practizi.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<!-- disqus comments ends -->

  </div>
  <div class="col s12 m2"></div>
</div>
    <?php require '../includes/footer.php'; ?>
    <?php require '../includes/fixed_button.php'; ?>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>   -->
  <script src="../js/materialize.min.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/script.js"></script>
  <script id="dsq-count-scr" src="//practizi.disqus.com/count.js" async></script>
</body>
</html>

<?php } else{
  header("location: ../");
  } 
?>