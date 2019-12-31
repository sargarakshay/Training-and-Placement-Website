<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	$User = $_SESSION['user']; 
	$sql = "SELECT * FROM `login` WHERE `username` LIKE '$User'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$Pass = $row['password'];
	$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$User'";
	$result = mysqli_query($con, $sql) ;
	$row = mysqli_fetch_assoc($result);
	$Id = $row['id'];
	$Name = $row['Name'];
	$Cpi = $row['Cpi'];
	$Backlogs = $row['Backlogs'];
	$Extrac = $row['ExtraC'];
	$Achievement = $row['Achievements'];
	$Contact = $row['Contact'];
	$Email = $row['Email'];
	$Activities = $row['Achievements'];	
	$pic = $row['pic'];
	$CV = $row['cv'];
	error_reporting(0);
	if($_GET['up'] === 'true'){
		echo '<script>alert("File uploaded successfully");</script>';
	}
	if($_GET['nofile'] === 'true'){
		echo '<script>alert("invalid File type");</script>';
	}

	if($_GET['yesfile'] === 'true'){
		echo '<script>alert("File already exist");</script>';
	}
	if($_GET['filesize'] === 'true'){
		echo '<script>alert("Check File size");</script>';
	}
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
	<link href="signin.css" rel="stylesheet">
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
                <a class="navbar-brand topnav" href="shomepage.php">Homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
						<a href = "talk.php">Talk</a>			
                    </li>
                    <li>
					<a href = "edits.php">Edit info</a>
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
				<div class="container" >
				<h1>Edit profile</h1>
				<div class="row">
					<div class="col-xs-4 col-md-6">
						<form class="form-group" action="upload.php" method ="post" enctype='multipart/form-data'>
							<span input type="submit" class="button_ask">Upload profile picture(20KB-5000KB)</span>
							<input class="form-control" type='file' name='file'>
							<button class="btn btn-lg btn-primary type="submit">Upload Profile Picture</button>
						</form>
						<?php
							if($pic != "def")
								echo '<br/><br/><a href="deletepic.php?pic='.$pic.'&&id='.$Id.'&&type=prof"><span style="color:#42f495">Delete Pic</span></a>';
						?>
					</div>
					<div class="col-xs-8 col-md-6">
						<form class="form-group" action="uploadcv.php" method ="post" enctype='multipart/form-data'>
							<span input type="submit" class="button_ask">Upload CV(20KB-5000KB)</span>
							<input class="form-control" type='file' name='file'>
							<button class="btn btn-lg btn-primary type="submit">Upload CV</button>
						</form>
						
						<?php
							if($CV != "")
								echo '<br/><br/><a href="deletepic.php?pic='.$CV.'&&id='.$Id.'&&type=cv"><span style="color:#42f495">Delete CV</span></a>';
						?>
					</div>
				</div>
					<div class="row">
					<div class="col-xs-2 col-md-3"></div>
					<div class="col-xs-8 col-md-6">
                    <div class="intro-message">
						<br/><br/>
							<?php
								echo '<form class="form-signin" action = "edits2.php" method="post">';	
								echo '<div class="box-header">
								<h2>Change Information</h2>
								</div>
								<label for="username">Change Username
								<input class="form-control" type="text" name="Username" id="Username" value="'.$User.'"></label>
								
								<label for="password">Change Password
								<input class="form-control" type="password" name="Pass" id="Pass" value="'.$Pass.'"></label>
								<br/>
								<label for="name">Change Name
								<input class="form-control" type="text" name="Name" id="Name" value="'.$Name.'"></label>
								
								<label for="Contact">Change Contact
								<input class="form-control" type="text" name="Contact" id="Contact" value="'.$Contact.'"></label>
								<br/>
								<label for="Email">Change Email
								<input class="form-control" type="text" name="Email" id="Email" value="'.$Email.'"></label>
								
								<label for="Cpi">Change Cpi
								<input  class="form-control" type="text" name="Cpi" id="Cpi" value="'.$Cpi.'"></label>
								<br/>
								<label for="Backlogs">Change No of Backlogs
								<input class="form-control" type="text" name="Backlogs" id="Backlogs" value="'.$Backlogs.'"></label>
								<br/>
								<label for="Extrac">Change Extrac activities
								<textarea class="form-control" name="Extrac" id="Extrac" rows="5" cols="30">'.$Extrac.'</textarea></label>
								
								<label for="Achievements">Change achievements
								<textarea class="form-control" btn-block" class="form-control" name="Achievements" id="Achievements" rows="5" cols="30">'.$Activities.'</textarea>
								</label><br/>';
								echo '<br/><br/><button class="btn btn-lg btn-primary type="submit">Change Info</button>
								<br/>';
								echo '</form>';
							?></div>
							<div class="col-xs-2 col-md-3"></div>
						</div>
						</div><br/>
						<br/>
                    </div>
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