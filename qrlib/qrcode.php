<?php if(isset($_POST['generate_text']) & !empty($_POST['generate_text']))
{ include('qrlib.php'); 
$text=$_POST['qr_text']; 
$folder="images/"; 
$file_name=$text. ".png"; 
$file_name=$folder.$file_name; 
QRcode::png($text,$file_name); 
//To Display Code Without Storing 
QRcode::png($text); 
}


?> 

<html> 
<body> 
<div id="wrapper">
<a href="/Vehicle%20Validation%20Using%20QR%20code/index.php">Back Home</a> 
<form method="post" action=""> 
<input type="text" name="qr_text">
<input type="submit" name="generate_text" value="Generate"> 
</form> 
</div> 
</body> 
</html>