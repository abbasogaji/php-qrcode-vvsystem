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

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

        $address = trim($_POST['address']);
        $address = strip_tags($address);
        $address = htmlspecialchars($address);

        $phone = trim($_POST['phone']);
        $phone = strip_tags($phone);
        $phone = htmlspecialchars($phone);

        $occupation = trim($_POST['occupation']);
        $occupation = strip_tags($occupation);
        $occupation = htmlspecialchars($occupation);

        $dlReg = trim($_POST['dlReg']);
        $dlReg = strip_tags($dlReg);
        $dlReg = htmlspecialchars($dlReg);

        $vehicleName = trim($_POST['vehicleName']);
        $vehicleName = strip_tags($vehicleName);
        $vehicleName = htmlspecialchars($vehicleName);

        $vehicleModel= trim($_POST['vehicleModel']);
        $vehicleModel = strip_tags($vehicleModel);
        $vehicleModel = htmlspecialchars($vehicleModel);

        $vehicleReg = trim($_POST['vehicleReg']);
        $vehicleReg = strip_tags($vehicleReg);
        $vehicleReg = htmlspecialchars($vehicleReg);

        $vehicleEngine = trim($_POST['vehicleEngine']);
        $vehicleEngine = strip_tags($vehicleEngine);
        $vehicleEngine = htmlspecialchars($vehicleEngine);

        $vehiclePlate = trim($_POST['vehiclePlate']);
        $vehiclePlate = strip_tags($vehiclePlate);
        $vehiclePlate = htmlspecialchars($vehiclePlate);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}

        $verificationNumber = $vehicleReg . $vehiclePlate;

		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName, userEmail, contact_address, userPhone, occupation, dlicenceReg, vehicle_Name, vehicle_Model, vehicle_regNumber, vehicle_Engine, vehiclePlate, verificationNumber) VALUES('$name','$email', '$address', '$phone', '$occupation', '$dlReg', '$vehicleName', '$vehicleModel', '$vehicleReg', '$vehicleEngine', '$vehiclePlate', '$verificationNumber')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Vehicle Registeration was Successfully";
				unset($name);
				unset($email);
                unset($address);
                unset($phone);
                unset($occupation);
                unset($dlReg);
                unset($vehicleName);
                unset($vehicleModel);
                unset($vehicleReg);
                unset($vehicleEngine);
                unset($vehiclePlate);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to The Registration Page</title>
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
            <li class="active"><a href="vehicleReg.php">Register Vehicle</a></li>
            <li><a href="generateqrcode.php">Generate QR code</a></li>
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


<div class="container" style="background-image: url(./images/NIVEVIS.png); background-size: cover; background-position: center; background-repeat: no-repeat;"><br/><br/>

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Register Vehicle.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?><br>
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo "Your Vehicle Verification Number is "?><font style="font-size: 20px;"><?php echo $verificationNumber; ?></font>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Your Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
            	<input type="text" name="address" class="form-control" placeholder="Enter Your Contact Address" maxlength="40" value="<?php echo $address ?>" />
                </div>
                <span class="text-danger"><?php echo $addressError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            	<input type="text" name="phone" class="form-control" placeholder="Enter Your Phone (starting with 234)" maxlength="40" value="<?php echo $phone ?>" />
                </div>
                <span class="text-danger"><?php echo $phoneError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>
            	<input type="text" name="occupation" class="form-control" placeholder="Enter Your Occupation" maxlength="40" value="<?php echo $occupation ?>" />
                </div>
                <span class="text-danger"><?php echo $occupationError; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
                <input type="text" name="dlReg" class="form-control" placeholder="Enter Your Drivers Licence Registration Number" maxlength="40" value="<?php echo $dlReg ?>" />
                </div>
                <span class="text-danger"><?php echo $dlRegError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
            	<input type="text" name="vehicleName" class="form-control" placeholder="Enter Your Vehicle Name" maxlength="40" value="<?php echo $vehicleName ?>" />
                </div>
                <span class="text-danger"><?php echo $vehicleNameError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-refresh"></span></span>
            	<input type="text" name="vehicleModel" class="form-control" placeholder="Enter Your Vehicle Model" maxlength="40" value="<?php echo $vehicleModel ?>" />
                </div>
                <span class="text-danger"><?php echo $vehicleModelError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
            	<input type="text" name="vehicleReg" class="form-control" placeholder="Enter Your Vehicle Registration Number" maxlength="40" value="<?php echo $vehicleReg ?>" />
                </div>
                <span class="text-danger"><?php echo $vehicleRegError; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" name="vehicleEngine" class="form-control" placeholder="Enter Your Vehicle Engine Number" maxlength="40" value="<?php echo $vehicleEngine ?>" />
                </div>
                <span class="text-danger"><?php echo $vehicleEngineError; ?></span>
            </div>

            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
            	<input type="text" name="vehiclePlate" class="form-control" placeholder="Enter Your Vehicle Plate Number" maxlength="40" value="<?php echo $vehiclePlate ?>" />
                </div>
                <span class="text-danger"><?php echo $vehiclePlateError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
                    
        </div>
   
    </form>
    </div>	

</div>
<br/><br/><br/>
</body>
</html>
<?php ob_end_flush(); ?>