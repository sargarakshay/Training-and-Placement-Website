<?php
session_start();
include_once 'dbconnect.php';
$User = $_SESSION['user'];
$role = "Student";
$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$User'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$Id = $row['id'];
$sql = "SELECT * FROM `login` WHERE `username` LIKE '$User'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$Id2 = $row['id'];

$Username = $_POST['Username'];
$Name = $_POST['Name'];
$Pass = $_POST['Pass'];
$Contact =$_POST['Contact'];
$Email = $_POST['Email'];
$Cpi = $_POST['Cpi'];
$Backlogs = $_POST['Backlogs'];
$Extrac = $_POST['Extrac'];
$Achievements = $_POST['Achievements'];

$sql = "UPDATE `login` SET `username` = '$Username', password = '$Pass' WHERE `login`.`id` = $Id2";
//echo $sql;
if ($con->query($sql) != TRUE){
	echo "Error: " . $sql . "<br>" . $con->error;
	echo "Error editing company in login";
}

$sql = "UPDATE `student` SET `Name` = '$Name', `Username` = '$Username', `Password` = '$Pass', `Cpi` = '$Cpi', `Backlogs` = '$Backlogs', `ExtraC` = '$Extrac', `Achievements` = '$Achievements', `Contact` = '$Contact', `Email` = '$Email' WHERE `student`.`id` = $Id";
//echo $sql;
if ($con->query($sql) === TRUE){
	mysqli_close($con);
	$_SESSION['user'] = $Username;
	header('Location:shomepage.php');
}
else{
	echo "Error: " . $sql . "<br>" . $con->error;
}


?>