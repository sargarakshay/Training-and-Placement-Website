<?php
session_start();
include_once 'dbconnect.php';
if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
	mysqli_close($con);
	header('Location:login.php?login=false');
}
$id = $_GET['id'];
$sql = "DELETE FROM `talk` WHERE `talk`.`id` = $id";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:talk.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}   
mysqli_close($con);       
?>