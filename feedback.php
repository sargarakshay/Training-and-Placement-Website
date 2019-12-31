<?php
session_start();
// the message
$msg = $_POST['Info'];
$name = $_POST['Name'];
$Email = $_POST['Email'];
$Head = "Name : ".$name." && Email : ".$Email;
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,100);
// send email
mail("adeshkochar123@gmail.com",$Head,$msg);
mail("gulechabhavesh@gmail.com",$Head,$Email);
mail("akshaygomare007@gmail.com",$Head,$Email);
header('Location:contactus.php?Sent=yes');
?>