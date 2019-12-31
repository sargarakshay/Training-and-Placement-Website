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

$sql = "SELECT * FROM `login` WHERE `username` LIKE '$User'";
$result = mysqli_query($con, $sql) ;
$row = mysqli_fetch_assoc($result);
$Id1 = $row['id'];

$sql = "SELECT * FROM `applied` WHERE `student` LIKE '$User'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
	$Id2 = $row['id'];
	$sql1 = "DELETE FROM `applied` WHERE `applied`.`id` = $Id2";
	if ($con->query($sql1) != TRUE){
		echo "error deleting student from applied";
	}
}

$sql = "DELETE FROM `student` WHERE `student`.`id` = $Id";
if ($con->query($sql) != TRUE){
	echo "error deleting student from student";
}

$sql = "DELETE FROM `login` WHERE `login`.`id` = $Id1";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:showallstud.php');
}

?>