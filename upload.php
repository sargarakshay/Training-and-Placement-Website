<?php
session_start();
$Who = "";
$who = $_GET['who'];
$cv = "";
$cv = $_GET['cv'];
if($who != "tpo"){
if($_SESSION['security']!="aniwbfaybfylasfl fcoah fclohfuh afu chr")
	header('Location:index.php?login=false');
include_once 'dbconnect.php';
		$name=$_FILES["file"]["name"];		//it gives name of uploaded file
		$type=$_FILES["file"]["type"];
		$size=$_FILES["file"]["size"];
		$tmp_name=$_FILES["file"]["tmp_name"];
		$error=$_FILES["file"]["error"];
		$allowedExts = array(
    "jpg", 
    "png", 
    "jpeg"
);
$allowedMimeTypes = array( 
  'image/gif',
  'image/jpeg',
  'image/png'
);
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if(! (in_array($extension, $allowedExts ) ))
		{
			//echo"Invalid File Type";
			header("location:edits.php?nofile=true");
		}
		else
		{
			if($size<5000000&&$size>20000)
			{
				if($error>0)
				{
					//echo"!!!!Error!!!!";
					header("location:edits.php?filesize=true");
				}
				else
				{
					if(file_exists("upload/".$name))
					{
						//echo"The File Already Exists.";
						$loc = "upload/".$name;
						move_uploaded_file($tmp_name,$loc);
						$Student = $_SESSION['user'];
						$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$Student'";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_assoc($result);
						$Id = $row['id'];
						$sql = "UPDATE `student` SET `pic` = '$loc' WHERE `student`.`id` = $Id";
						echo "<br/>".$sql;
						if ($con->query($sql) === TRUE){
							mysqli_close($con);
							header("location:edits.php?yesfile=true");
						}
						else{
							mysqli_close($con);
							echo "error uploading file<br/><a href = 'edits.php'>Try again</a>";
						}
					}
					else
					{
						$loc = "upload/".$name;
						move_uploaded_file($tmp_name,$loc);
						$Student = $_SESSION['user'];
						$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$Student'";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_assoc($result);
						$Id = $row['id'];
						$sql = "UPDATE `student` SET `pic` = '$loc' WHERE `student`.`id` = $Id";
						echo "<br/>".$sql;
						//echo $sql;
						if ($con->query($sql) === TRUE)
						{	
							mysqli_close($con);
							header("location:edits.php?up=true");
						}
						else{
							mysqli_close($con);
							echo "error uploading file<br/><a href = 'edits.php'>Try again</a>";
						}
					}	
				}	
			}
			else
			{
				//echo"Please Check The Size Of File... ";
				header("location:edits.php?filesize=true");
			}	
		}
	}
	else if($who == "tpo"){
		if($_SESSION['security']!="aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr")
			header('Location:index.php?login=false');
		include_once 'dbconnect.php';
		$name=$_FILES["file"]["name"];		//it gives name of uploaded file
		$type=$_FILES["file"]["type"];
		$size=$_FILES["file"]["size"];
		$tmp_name=$_FILES["file"]["tmp_name"];
		$error=$_FILES["file"]["error"];
		$allowedExts = array(
    "jpg", 
    "png", 
    "jpeg",
	"pdf",
	"doc",
	"txt",
	"xls"
);
		$extension = end(explode(".", $_FILES["file"]["name"]));
			if($size<5000000&&$size>20000)
			{
				if($error>0)
				{
					//echo"!!!!Error!!!!";
					header("location:tpohomepage.php?filesize=true");
				}
				else
				{
					if(file_exists("tpoupload/".$name))
					{
						//echo"The File Already Exists.";
						$loc = "tpoupload/".$name;
						move_uploaded_file($tmp_name,$loc);
						$sql = "SELECT * FROM `docs` WHERE `File` LIKE '$loc'";
						if ($con->query($sql) === TRUE){
							mysqli_close($con);
							header("location:tpohomepage.php?yesfile=true");
						}
					}
					else
					{
						$loc = "tpoupload/".$name;
						move_uploaded_file($tmp_name,$loc);
						$Student = $_SESSION['user'];
						$sql = "INSERT INTO `docs` (`id`, `File`) VALUES (NULL, '$loc')";
						echo "<br/>".$sql;
						//echo $sql;
						if ($con->query($sql) === TRUE)
						{	
							mysqli_close($con);
							header("location:tpohomepage.php?up=true");
						}
						else{
							mysqli_close($con);
							echo "error uploading file<br/><a href = 'tpohomepage.php'>Try again</a>";
						}
					}	
				}	
			}
			else
			{
				//echo"Please Check The Size Of File... ";
				header("location:tpohomepage.php?filesize=true");
			}	

	}
?>