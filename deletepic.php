<?php
session_start();
include_once('dbconnect.php');
if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
	mysqli_close($con);
	header('Location:login.php?login=false');
}
$id = $_GET['id'];
$pic = $_GET['pic'];	
$Type = $_GET['type'];
if($Type == "prof"){
	$A = "def";
	$sql = "UPDATE `student` SET `pic` = '$A' WHERE `student`.`id` = $id";
}
else{
	$A = "";
	$sql = "UPDATE `student` SET `cv` = '$A' WHERE `student`.`id` = $id";
}
if ($con->query($sql) === TRUE){
	unlink($pic);
	mysqli_close($con);
	header('Location:edits.php');
}
else 
	echo "Error: " . $sql . "<br>" . $con->error;
mysqli_close($con);