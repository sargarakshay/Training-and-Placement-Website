<?php
session_start();
if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
	header('Location:login.php?login=false');
}
include_once 'dbconnect.php';
$Name = $_POST["Name"];
$Pass = $_POST["Pass"];
$DreamC = $_POST["DreamC"];
$role = "Company";
$sql = "SELECT * FROM `company` WHERE `Name` LIKE '$Name'";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows != 0){
	mysqli_close($con);
    header('Location:addc.php?exist=true');
}
$sql = "INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES (NULL, '$Name', '$Pass', '$role')";
if ($con->query($sql) != TRUE){
	echo "Error: " . $sql . "<br>" . $con->error;
	echo "Error adding company in login";
}
$sql = "INSERT INTO `company` (`id`, `Name`, `Email`, `Contact`, `Field1`, `Field2`, `Field3`, `Location`, `Cpi`, `BackNo`, `Info`, `Date` , `DreamC`) VALUES (NULL, '$Name', '', '', '', '', '', '', '', '', '', '', '$DreamC')";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:tpohomepage.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}          
?>