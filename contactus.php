<?php
	session_start();
	error_reporting(0);
	if($_GET['Sent'] === 'yes'){
		echo '<script>alert("Feedback Sent.");</script>';
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
	
	<style type="text/css">
		.body{
			background-image : url(images/contus.jpeg); 
		}
		.style9{
		width: 95%;
		height: 368px;
		}
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
                </button>
                <a class="navbar-brand topnav" href="index.php">TPO homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
						<a href = "result.php">Results</a>			
                    </li>
                    <li>
						<a href = "login.php">Login</a>
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
			<br/><br/>
			<img alt="About_Us" src="images/contus.jpeg" height="60%" width="80%" /><br/>
			
			<form class = "form-group" action = "feedback.php" method="post">
			<br/><br/>
				<label for="Name">Enter Name
				<input type="text" name="Name" id="Name" class="form-control" placeholder="Name" required autofocus>
				</label><br/>
				<label for="Email">Enter Email
				<input type="text" name="Email" id="Email" class="form-control" placeholder="Email" autofocus>
				</label><br/>
				<label for="Info">Enter Feedback
				<textarea name="Info" id="Info" class="form-control" placeholder="Enter Feedback" autofocus></textarea></label><br/>
				<button type="submit">Submit Feedback</button>
			</form>
			
			
			
			
			</div><br/>
              
    </div>
        <!-- /.container -->
    
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="aboutus.php">About us</a>
                        </li>
                        <li>
                            <a href="contactus.php">Contact us</a>
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