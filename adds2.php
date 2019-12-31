<?php
session_start();
include_once 'dbconnect.php';
if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
	header('Location:login.php?login=false');
}
$Name = $_POST["Name"];
$Pass = $_POST["Pass"];
$Grno = $_POST["Grno"];
$Branch = $_POST["Branch"];
$role = "Student";
$sql = "SELECT * FROM `student` WHERE `Name` LIKE '$Name'";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows != 0){
	mysqli_close($con);
    header('Location:adds.php?exist=true');
}
$sql = "INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES (NULL, '$Name', '$Pass', '$role')";
if ($con->query($sql) != TRUE){
	echo "Error: " . $sql . "<br>" . $con->error;
	echo "Error adding student in login";
}
$sql = "INSERT INTO `student` (`id`, `Name`, `Username`, `Password`, `Grno`, `Field`, `Cpi`, `Backlogs`, `ExtraC`, `Achievements`, `Blocked`, `Contact`, `Company`, `pic`) VALUES (NULL, '', '$Name', '$Pass', '$Grno', '$Branch', '', '', '', '', '', '', '', 'def')";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:tpohomepage.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}          
?>