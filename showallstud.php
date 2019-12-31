<?php
	session_start();
	error_reporting(0);
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasflhnfbysgnrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	$Branch = "Comp";
	$Temp = $_GET['field'];
	if($Temp != ""){
		$Branch = $Temp;
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
                <div class="intro-message">
					<h3>All Students</h3><br/>
					<a href = "showallstud.php?field=Comp"><button type="button" class="btn btn-default">Comp</button></a>
					<a href = "showallstud.php?field=IT"><button type="button" class="btn btn-default">IT</button></a>
					<a href = "showallstud.php?field=Mech"><button type="button" class="btn btn-default">Mech</button></a>
					<a href = "showallstud.php?field=Elex"><button type="button" class="btn btn-default">Elex</button></a>
					<a href = "showallstud.php?field=Indus"><button type="button" class="btn btn-default">Indus</button></a>
					<a href = "showallstud.php?field=Prod"><button type="button" class="btn btn-default">Prod</button></a>
					<br/><br/>
							<?php
							$sql = "SELECT * FROM `student` WHERE `Field` LIKE '$Branch'";
							$result = mysqli_query($con, $sql);
							if(!$result ){
								echo '<span style = "color:red">Error fetching data</span>';
							}
							else{
								$num_rows = mysqli_num_rows($result);
								if($num_rows == 0){
									echo "No students right now";
								}
								else{
									echo '<table class="table">';
									echo '<tr><td><h4>Student Name</h4></td><td><h4>Brach</h4></td><td><h4>Seelected Company Name</h4></td><td><h4>Remove student</h4></td><td><h4>Block Student</h4></td></tr>';
									while($row = mysqli_fetch_array($result)){
										$Name = $row['Name'];
										$Brach = $row['Field'];
										$Comp = $row['Company'];
										$User = $row['Username'];
										echo '<tr><td>'.$Name.'</td><td>'.$Brach.'</td><td>'.$Comp.'</td><td>';
										echo '<a href = "deletes.php?Name='.$User.'"><span style="color:#42f495">Remove student</span></a>';
										echo '</td><td>';
										$Selected = $row['Blocked'];
										if($Selected == 0){
											echo '<a href = "block.php?Name='.$User.'"><span style="color:#42f495">Block student</span></a>';
										}
										else{
											echo '<a href = "block.php?Name='.$User.'"><span style="color:#42f495">Unblock student</span></a>';
										}
										echo '</td></tr>';
									}
								}
							}
								echo '</table>';
							?>
				</div><br/>
            </div>
        </div>
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