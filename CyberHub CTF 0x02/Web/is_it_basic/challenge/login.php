<html>

<head>
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="assets/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div id="home" class="header-hero bg_cover" style="background-image: url(assets/images/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="assets/images/header-hero.png" alt="hero">
                        </div> <!-- header hero image --> -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
            <center style="color:black">
        <br /></br><br><br>
        <?php
$FAKE_DATABASE = array ( "admin" => "21232f297a57a5a743894a0e4a801fc3", );
$page = $_GET['page'];
switch ($page) {
  case "login":
  echo "Trying to log in";
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  if ($FAKE_DATABASE[$user] === md5($pass)) {
    session_start();
    session_regenerate_id(True);
    $_SESSION['user'] = $user;
    header("Location: ?page=upload");
    die();
  }
  else {
    header("Location: ?");
  }
  break;
  case "admin_login_help":
  session_start();
  if(!isset($_SESSION['login_code']) ){
    $_SESSION['login_code'] = bin2hex(openssl_random_pseudo_bytes(18));
    echo "";
  }
  else {
    echo "";
  }
  break;
  case "code_submit":
  session_start();
  $code = $_POST['code'];
  if (isset($code) && isset($_SESSION['login_code'])) {
    if ($code === $_SESSION['login_code'] ){
      echo "Flag: ";
      passthru("sudo /bin/cat /etc/flag");
    }
    else {
      echo "Invalid code";
    }
  }
  else {
    echo "<form action='?page=code_submit' method='POST'>Please input the login code:<input name='code'/><input type='submit' value='submit'/></form>";
  }
  break;
  case "upload":
  session_start();
  if (!isset($_SESSION['user'])) {
    header("Location: ?");
  }
  else {
    echo "Welcome ".$_SESSION['user'] ."<br> <br><br><button class='btn btn-danger' style='float:right; margin-right:20%' onclick='document.cookie=\"PHPSESSID=deleted\";location=\"?\"'>Logout</button>";
    echo "<!--<br>flag in /etc/flag<br>-->
          <form action='?page=process_upload' method='post' enctype='multipart/form-data'><input type='file' name='zipfile'/>
          <br><br><input type='submit' name='submit' value='Upload' hidden/></form>";
    }
    break;
    case "process_upload":
    session_start();
    if (isset($_SESSION['user']) && $_FILES['zipfile']['name']) {
      if ($_FILES['zipfile']['size'] > 16000) {
        echo "File above max size of 10kb";
        echo "<a href='?page=upload'>back</a>";
        break;
      }
      $tmp_file = '/var/www/html/TMP/upload_'.session_id();
      exec('mkdir'.$tmp_file);
      exec('unzip -o '.$_FILES['zipfile']['tmp_name']. ' -d '.$tmp_file);
      echo "ZIP Content:";
      passthru("cat $tmp_file/* 2>&1");
      exec("rm -rf $tmp_file");
      echo "<a href='?page=upload'>back</a>";
    }

    break;
    default:

    echo "<form action='?page=login' method='POST'>Username: <input name='user'/><br><br>
      Password: <input type='password' name='pass'/><br><br>
      <input type='submit' value='Log in'/></form>";
    }
?>
    </center>

  




    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!--====== Plugins js ======-->
    <script src="assets/js/plugins.js"></script>
    
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    
    <!--====== wow js ======-->
    <script src="assets/js/wow.min.js"></script>
    
    <!--====== Particles js ======-->
    <script src="assets/js/particles.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
</body>

</html>
