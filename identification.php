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
            <li><a href="generateqrcode.php">Generate QR code</a></li>
            <li><a href="verifyCode.php">Verify QR Code</a></li>
            <li class="active"><a href="identification.php">Identification</a></li>
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


<div class="container" style="background-image: url(./images/NIVEVIS.png); background-size: cover; background-position: center; background-repeat: no-repeat; height: 650px;"><br/><br/><br/><br/><br/><br/>

<?php
          // Make a MySQL Connection
          mysql_connect("localhost", "root", "") or die(mysql_error());
          mysql_select_db("vehicle_reg") or die(mysql_error());
                
                if(isset($_POST['View'])){

                    $verificationNumber = $_POST['verificationNumber'];


                // Get a specific result from the "example" table
                 $result = mysql_query("SELECT * FROM users
                WHERE verificationNumber='$verificationNumber'") or die(mysql_error());  


                // get the first (and hopefully only) entry from the result
                // $row = mysql_fetch_array( $result );
                // Print out the contents of each row into a table 
               
            }
            

        ?>

    <div class="row">
        <div class="col-lg-8">
            <table><font style="font-size: 25px;">
            <?php

                if(isset($result) && !empty($result)){
                // Print out the contents of each row into a table 

                    echo "<strong>Vehicle Details</strong> <br><br>";
                    echo "<table class='table table-stripped'>";
                    // echo "<tr> <th>Name</th> <th>Email Address</th> <th>Contact Address</th> <th>Phone Number</th> <th>Occupation</th> <th>Drivers Licence</th> <th>Vehicle Name</th> <th>Vehicle Model</th> <th>Vehicle Registration Number</th> <th>Vehicle Engine Number</th> <th>Vehicle Plate Number</th> <th>Vehicle verification Number</th> </tr>";
                    while($row = mysql_fetch_array( $result )) {
                        echo "<tr><td>"; 
                        echo "<strong>Name</strong>";
                        echo "</td><td><strong>"; 
                        echo $row['userName'];
                        echo "</strong></td></tr>"; 
                        echo "<tr><td>"; 
                        echo "<strong>Email Number</strong>";
                        echo "</td><td><strong>"; 
                        echo $row['userEmail'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Contact Address</strong>";
                        echo "</td><td><strong>";
                        echo $row['contact_Address'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Phone Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['userPhone'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Occupation</strong>";
                        echo "</td><td><strong>";
                        echo $row['occupation'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Drivers Licence Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['dlicenceReg'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Vehicle Name</strong>";
                        echo "</td><td><strong>";
                        echo $row['vehicle_Name'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Vehicle Model</strong>";
                        echo "</td><td><strong>";
                        echo $row['vehicle_Model'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Vehicle Registration Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['vehicle_regNumber'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Vehicle Engine Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['vehicle_Engine'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>Vehicle Plate Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['vehiclePlate'];
                        echo "</strong></td></tr>";
                        echo "<tr><td>"; 
                        echo "<strong>verification Number</strong>";
                        echo "</td><td><strong>";
                        echo $row['verificationNumber'];
                        echo "</strong></td></tr>";

                    }
                }
                
            ?>

            </font></table>
        </div>
    </div>
        
</div>

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>