<?php
session_start();
include_once 'dbconnect.php';
if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
	mysqli_close($con);
	header('Location:login.php?login=false');
}
$User = $_SESSION['user'];
$Feedback = $_POST["Info"];
$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$User'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$Comp = $row['Company'];
$sql = "INSERT INTO `talk` (`id`, `Name`, `Company`, `Feedback`) VALUES (NULL, '$User', '$Comp', '$Feedback')";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:talk.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}    
?>