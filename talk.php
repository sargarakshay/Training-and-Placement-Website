<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	$User = $_SESSION['user']; 
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
				<div class="container" >
				<br/><br/><br/><br/>
				<h1>Give Feedback</h1>
					<div class="row">
						<div class="col-xs-2 col-md-4"></div>
						<div class="col-xs-8 col-md-4">
							<form class="form-group" action = "addfeedback.php" method="post">
								<textarea name="Info" id="Info" class="form-control" placeholder="Enter Feedback" autofocus></textarea></label>
								<br/><br/><button class="btn btn-lg btn-primary type="submit">Give Feedback</button>
							</form>
							<br/><br/><br/><br/><br/>
							<?php
								$sql = "SELECT * FROM `talk`";
								$result = mysqli_query($con, $sql);
								if(!$result ){
									echo '<span style = "color:red">Error fetching data</span>';
								}
								else{
									$num_rows = mysqli_num_rows($result);
									if($num_rows == 0){
										echo "No talks right now";
									}
									else{
										echo '<table class="table">';
										echo '<tr><td>Sender</td><td>Selected Company</td><td>Feedback</td><td></tr>';
										while($row = mysqli_fetch_array($result)){
											$Id = $row['id'];
											$Name = $row['Name'];
											$Comp = $row['Company'];
											$Talk = $row['Feedback'];
											echo '<tr><td>'.$Name.'</td><td>'.$Comp.'</td><td>'.$Talk.'</td>';
											if($Name == $User)
												echo "<td><a href='removepost.php?id=".$Id."'><span style='color:#42f495'>Remove Post</span></a></td></tr>";
											else
												echo "</tr>";
										}
										echo '</table>';
									}
								}
							?>
						<div class="col-xs-2 col-md-4"></div>
						</div>
					</div><br/>
					<br/>
                </div>
            </div>
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