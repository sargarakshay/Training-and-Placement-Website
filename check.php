<?php
session_start();
    include_once 'dbconnect.php';
    $name=$_POST["sname"];
    $pass=$_POST["Pass"];
    $sql = "SELECT * FROM `login` WHERE `username` LIKE '$name'";
    $result = mysqli_query($con, $sql) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
    $temp=$row["password"];
	$role=$row['role'];
    if($pass===$temp){
        $_SESSION['login']='true';
        $_SESSION['username']=$name;
		$_SESSION['role']=$row['Role'];
		if($role==="Student")
		{
			mysqli_close($con);
			$_SESSION['security']="aniwbfaybfylasfl fcoah fclohfuh afu chr";
			$_SESSION['user'] = $name;
			mysqli_close($con);
			header('Location:shomepage.php');
		}
		else if($role === "Company"){
			$_SESSION['security']="aniwbfaybfylasfl fcnhrtbhyjehrheybrtjbdoah fclohfuh afu chr";
			$_SESSION['user'] = $name;
			mysqli_close($con);
			header('Location:chomepage.php');
		}
		else if($role === "admin" ){
			$_SESSION['security']="aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr";
			mysqli_close($con);
			header('Location:tpohomepage.php');
		}
    }else {
		mysqli_close($con);
        header('Location:login.php?login=false');
    }
?>