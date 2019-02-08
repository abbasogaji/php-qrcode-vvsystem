<?php if(isset($_POST['generate_text']) & !empty($_POST['generate_text']))
{ include('qrlib.php'); 
$text=$_POST['qr_text']; 
$folder="images/"; 
$file_name=$text. ".png"; 
$file_name=$folder.$file_name; 
QRcode::png($text,$file_name); 
//To Display Code Without Storing 
QRcode::png($text); }


?> 