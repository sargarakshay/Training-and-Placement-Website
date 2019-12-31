<?php
session_start();
include_once('dbconnect.php');
if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
	header('Location:login.php?login=false');
}

$User = $_GET['Name'];

$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$User'";
$result = mysqli_query($con, $sql) ;
$row = mysqli_fetch_assoc($result);
$Id = $row['id'];
$Selected = $row['Blocked'];
if($Selected == 1){
	$Flag = 0;
}
else{
	$Flag = 1;
}
$sql = "UPDATE `student` SET `Blocked` = '$Flag' WHERE `student`.`id` = $Id";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:showallstud.php');
}
else{
	echo "error"; 
}

?>