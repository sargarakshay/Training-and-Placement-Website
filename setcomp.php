<?php
session_start();
if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
	header('Location:login.php?login=false');
}
include_once 'dbconnect.php';
$Comp = $_GET['cname'];
$Student = $_SESSION['user'];
$Company = $_GET['Company'];

if($Comp==$Student){
	$sql = "SELECT * FROM `applied` WHERE `company` LIKE '$Company' AND `student` LIKE '$Student'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$Id = $row['id'];
	
	$sql = "DELETE FROM `applied` WHERE `applied`.`id` = $Id";
	if ($con->query($sql) === TRUE){
		mysqli_close($con);
		header('Location:shomepage.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}
else{
	$sql = "INSERT INTO `applied` (`id`, `company`, `student`, `flag`) VALUES (NULL, '$Comp', '$Student', '0')";
	if ($con->query($sql) === TRUE){
		mysqli_close($con);
		header('Location:shomepage.php');
	}
	else{
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>