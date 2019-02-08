<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';
    
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['user']) ) {
        header("Location: index.php");
        exit;
    }
    // select loggedin users detail
    $res=mysql_query("SELECT * FROM staff WHERE userId=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome Home - <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">NIVEVIS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="vehicleReg.php">Register Vehicle</a></li>
            <li class="active"><a href="generateqrcode.php">Generate QR code</a></li>
            <li><a href="verifyCode.php">Verify QR Code</a></li>
            <li><a href="identification.php">Identification</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

    <div class="container" style="background-image: url(./images/NIVEVIS.png); background-size: cover; background-position: center; background-repeat: no-repeat; height: 650px; margin-top: 50px;">

      <div class="page-header">
      <h3 align="center">YOU CAN GENERATE THE QR CODE FOR YOUR VERIFICATION NUMBER HERE</h3>
      </div>
        
        <div class="row">
        <div class="col-lg-12">
        <h3 align="center">ENTER YOUR VERIFICATION NUMBER TO GENERATE YOUR QR CODE</h3><br/><br/>

      <form action="generate_code.php" method="post" target="print_popup" onsubmit="window.open('about:blank','print_popup','width=800,height=800');" style="text-align:center;">

        <input style="border-radius:5px; height: 40px; width: 400px; font-size:20px;" type="text" name="qr_text"><br/><br/>
        <input style="background-color: #337ab7; border-radius:5px; padding: 15px 30px 15px 30px; color: #fff; font-size:20px;" type="submit" value="Generate QR Code" name="generate_text">
            
      </form>

    </div>

     <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>