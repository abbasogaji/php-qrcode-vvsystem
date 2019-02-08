<?php if(isset($_POST['generate_text']) & !empty($_POST['generate_text']))
{ include('./qrlib/qrlib.php'); 
$text=$_POST['qr_name']; 
$email=$_POST['qr_email']; 
$reg=$_POST['qr_regnumber']; 
$folder="images/"; 
$file_name=$text. $email, $reg, $file_name ".png"; 
$file_name=$folder.$file_name; 
QRcode::png($text, $email, $reg, $file_name); 
//To Display Code Without Storing 
QRcode::png($text); }


?>