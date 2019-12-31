<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
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
                </button>
                <a class="navbar-brand topnav" href="tpohomepage.php">TPO homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
						<a href = "tresult.php">Results</a>			
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
			<a href = "addc.php"><button type="button" class="btn">Add Company</button></a>
			<a href = "adds.php"><button type="button" class="btn btn-info">Add Student</button></a>
			<a href = "editr.php"><button type="button" class="btn btn-info">Edit rules</button></a>
			<a href = "showallcomp.php"><button type="button" class="btn btn-danger">Show all companies</button></a>
			<a href = "showallstud.php"><button type="button" class="btn btn-warning">Show all students</button></a>
                <div class="col-lg-12">
                    <div class="intro-message">
						<div class="container" >
						<div class="row">
							<div class="col-xs-2 col-md-4"></div>
							<div class="col-xs-8 col-md-4">
							<form class="form-signin" action = "adds2.php" method="post">
								<?php 
									error_reporting(0);
									if($_GET['exist']==='true')
									echo "Company already exist";
								?>
								<div class="box-header">
								<h2>Information</h2>
								</div>
								<label for="username">Username
								<input class="form-control" type="text" name="Name" id="Name" placeholder="Username" required autofocus/></label>
								<br/>
								<label for="password">Password
								<input class="form-control" type="password" name="Pass" id="Pass" placeholder="Password" required autofocus/></label>
								<br/>
								<label for="Grno">Grno
								<input class="form-control" type="text" name="Grno" id="Grno" placeholder="Grno" required autofocus/></label>
								<br/>
								<label for="Branch">Branch
								<select class="form-control" name="Branch" id="Branch" required><span style="color:red"></span>
								<option value="Comp" selected>Comp</option>
								<option value="IT">IT</option>
								<option value="Elex">Elex</option>
								<option value="Mech">Mech</option>
								<option value="Indus">Indus</option>
								<option value="Prod">Prod</option>
								</select></label><br/>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Add Student</button>
							</form>
							</div>
							<div class="col-xs-2 col-md-4"></div>
						</div>
						</div><br/>
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