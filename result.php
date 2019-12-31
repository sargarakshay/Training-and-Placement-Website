<?php
	session_start();
	session_destroy();
	include_once('dbconnect.php');
	$today = getdate();
?>

<br/>

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
                <a class="navbar-brand topnav" href="index.php">TPO homepage</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
					<a href = "info.php">Info</a>
                    </li>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
					<h3>
					Show results
					<br/>
					<h3/>
                    <table class="table">
							<?php
								$sql = "SELECT * FROM `applied`";						
								$result = mysqli_query($con, $sql);
								if(! $result ){
									echo '<span style = "color:red">Error fetching data</span>';
								}
								else{
									$num_rows = mysqli_num_rows($result);
									//echo "$num_rows Rows\n";
									if($num_rows==0){
										echo "No Students selected right now";
									}
									else{
										echo '<tr class = "success"><td>Branch</td><td>Company Name</td><td>Selected Student</td></tr>';
										while($row = mysqli_fetch_array($result)) {
											$Name = $row['student'];
											$Comp = $row['company'];
											$Flag = $row['flag'];
											if($Flag == 1){
												$sql1 = "SELECT * FROM `student` WHERE `Username` LIKE '$Name'";
												$result1 = mysqli_query($con, $sql1) or die(mysqli_error());
												$row1 = mysqli_fetch_assoc($result1);
												$Name = $row1['Name'];
												$Branch = $row1['Field'];
												$Selected = $row1['Blocked'];
												if($Selected == 0){
													echo '<tr class = "active"><td>'.$Branch.'</td><td>'.$Comp.'</td><td>'.$Name.'</td></tr>';
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
	</div>		
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