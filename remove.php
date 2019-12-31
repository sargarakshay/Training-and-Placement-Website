<?php
session_start();
include_once('dbconnect.php');
if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
	mysqli_close($con);
	header('Location:login.php?login=false');
}
$id = $_GET['id'];
$File = $_GET['File'];						
$sql = "DELETE FROM `docs` WHERE `docs`.`id` = $id";
if ($con->query($sql) === TRUE){
	unlink($File);
	mysqli_close($con);
	header('Location:tpohomepage.php');
}
?>