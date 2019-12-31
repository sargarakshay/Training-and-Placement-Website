<?php
session_start();
include_once('dbconnect.php');
if($_SESSION['security'] != "aniwbfaybfylasfl fcnhrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
	header('Location:login.php?login=false');
}

error_reporting(0);

$get = $_GET['Sname'];
$User = $_SESSION['user'];
$Ids = $_GET['Id'];

$Student = $_GET['Student'];

$sql = "SELECT * FROM `applied` WHERE `company` LIKE '$User' AND `student` LIKE '$Student'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$Id = $row['id'];

$sql1 = "SELECT * FROM `student` WHERE `Username` LIKE '$Student'";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$Id1 = $row1['id'];

echo $get." ".$User;

if($get == $User){
	$Flag = 0;
	$Com = " ";
}
else{
	$Flag = 1;
	$Com = $User;
}
//echo "<br/>".$Com;

$sql = "UPDATE `student` SET `Company` = '$Com' WHERE `student`.`id` = $Id1";
echo "<br/>".$sql;
if ($con->query($sql) != TRUE){
	echo "Error: " . $sql . "<br>" . $con->error;
}

//echo "<br/>Id ".$Id;

$sql = "UPDATE `applied` SET `flag` = '$Flag' WHERE `applied`.`id` = $Id";
echo "<br/>".$sql;
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	header('Location:showstud.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}
?>