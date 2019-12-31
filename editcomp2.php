<?php
session_start();
include_once 'dbconnect.php';
$Name = $_SESSION['user'];
$role = "Company";
$Date = $_POST['date'];
$sql = "SELECT * FROM `company` WHERE `Name` LIKE '$Name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$Id = $row['id'];
$sql = "SELECT * FROM `login` WHERE `username` LIKE '$Name'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$Id2 = $row['id'];

$Name = $_POST["Name"];
$Pass = $_POST["Pass"];
$Email = $_POST["Email"];
$Contact = $_POST["Contact"];
$Field1 = $_POST["Field1"];
$Field2 = $_POST["Field2"];
$Field3 = $_POST["Field3"];
$Location = $_POST["Location"];
$Cpi = $_POST["Cpi"];
$BackNo = $_POST["BackNo"];
$Info = $_POST["Info"];

$sql = "UPDATE `login` SET `username` = '$Name', password = '$Pass' WHERE `login`.`id` = $Id2";
echo $sql;
if ($con->query($sql) != TRUE){
	echo "Error: " . $sql . "<br>" . $con->error;
	echo "Error editing company in login";
}

$sql = "UPDATE `company` SET `Name` = '$Name', `Email` = '$Email', `Contact` = '$Contact', `Field1` = '$Field1', `Field2` = '$Field2', `Field3` = '$Field3', `Location` = '$Location', `Cpi` = '$Cpi', `BackNo` = '$BackNo', `Info` = '$Info', `Date` = '$Date' WHERE `company`.`id` = $Id";
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	$_SESSION['user'] = $Name;
	header('Location:chomepage.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}
?>