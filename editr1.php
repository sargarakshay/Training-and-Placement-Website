<?php 
	session_start();
	if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	$Rules = $_POST['Rules'];
	$myfile = fopen("info.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $Rules);
	fclose($myfile);
	header("Location:editr.php");
?>