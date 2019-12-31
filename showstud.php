<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasfl fcnhrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
	<title>Tpo</title>
	
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	
	<style>
		
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="chomepage.php">Homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
					<a href = "editcomp.php">Edit Information</a>
                    </li>
                    <li>
						<a href = "showstud.php">Show All students</a>			
                    </li>
                    <li>
						<a href = "logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class="intro-header">
        <div class="container">
		<header style = "float : left"><img src = "images/vit-logo.png"/></header>	
		<text style = "align : centre">Bansilal Ramnath Agarwal Charitable Trust's<br/>
		<h3>Vishwakarma Institute of Technology</h3><br/>
		(An Autonomous Institute affiliated to Savitribai Phule Pune University)</text>
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
					<h3><br/>Show all students<br/>
					<h3/>
                    <table class="table">
							<?php
								$name = $_SESSION['username'];
								$sql = "SELECT * FROM `applied` WHERE `company` LIKE '$name'";
								$result = mysqli_query($con, $sql);
								$num_rows = mysqli_num_rows($result);
								if($num_rows==0){
									echo "No students present right now";
								}
								else{
									while($row = mysqli_fetch_assoc($result)){
										$Sname = $row['student'];
										$Flag = $row['flag'];
										$sql = "SELECT * FROM `company` WHERE `Name` LIKE '$name'";
										$result2 = mysqli_query($con, $sql);
										$row2 = mysqli_fetch_assoc($result2);
										$DreamC = $row2['DreamC'];
										$sql1 = "SELECT * FROM `student` WHERE `Username` LIKE '$Sname'";
										$result1 = mysqli_query($con, $sql1);
										$num_rows = mysqli_num_rows($result);
										$row1 = mysqli_fetch_assoc($result1);
										$sname = $row1['Name'];
										$Cpi = $row1['Cpi'];
										$Email = $row1['Email'];
										$Contact = $row1['Contact'];
										$Achievement = $row1['Achievements'];
										$Extrac = $row1['ExtraC'];
										$Comp = $row1['Company'];
										$Selected = $row1['Blocked'];
										$Id = $row1['id'];
										if($Selected == 0){
											echo "<tr><td>".$sname;
											echo '</td><td><a href="showstudent.php?Sname='.$Sname.'">Show Student Info</a></td>';
											if($Comp == "" || $Comp == $name || $DreamC == "yes"){
												if($Flag == 0){
													echo '<td><a href="selectstudent.php?Sname='.$Sname.'&Student='.$Sname.'&Id = '.$Id.'">Select Student</a></td></tr>';
												}
												else if($Flag == 1){
													echo '<td><a href="selectstudent.php?Sname='.$name.'&Student='.$Sname.'&Id = '.$Id.'">Student Selected/Remove it</a></td></tr>';
												}
											}
										}
									}
								}
							?>
						</table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
	</div>	
		
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#about">About us</a>
                        </li>
                        <li>
                            <a href="#contact">Contact us</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; VIT 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>