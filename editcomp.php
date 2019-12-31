<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasfl fcnhrtbhyjehrheybrtjbdoah fclohfuh afu chr"){
		header('Location:login.php?login=false');
	}
	error_reporting(0);
	$today = getdate();
	$name = $_SESSION['user'];
	$sql = "SELECT * FROM `login` WHERE `username` LIKE '$name'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$Pass = $row['password'];
	$sql = "SELECT * FROM `company` WHERE `Name` LIKE '$name'";
	$result = mysqli_query($con, $sql) ;
	$row = mysqli_fetch_assoc($result);
	$Name = $row['Name'];	
	$Email = $row['Email'];
	$Contact = $row['Contact'];
	$Field1 = $row['Field1'];
	$Field2 = $row['Field2'];
	$Field3 = $row['Field3'];
	$Location = $row['Location'];
	$Cpi = $row['Cpi'];
	$Info = $row['Info'];
	$Date = $row['Date'];
	$BackNo = $row['BackNo'];
	$Comp = "Comp";
	$IT = "IT";
	$Elex = "Elex";
	$Mech = "Mech";
	$Indus = "Indus";
	$Prod = "Prod";
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="">
	<link href="signin.css" rel="stylesheet">
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
						<div class="container" >
						<div class="row">
							<div class="col-xs-2 col-md-4"></div>
							<div class="col-xs-8 col-md-4">
							<?php
								echo '<form class="form-group" action = "editcomp2.php" method="post">';	
								echo '<div class="box-header">
								<h2>Change Information</h2>
								</div>
								<label for="username">Change Username
								<input type="text" name="Name" id="Name" value="'.$Name.'" class="form-control" placeholder="Username" required autofocus>
								</label><br/>
								<label for="password">Change Password
								<input type="password" name="Pass" id="Pass" value="'.$Pass.'" class="form-control" placeholder="Password" required autofocus>
								</label><br/>
								<label for="Contact">Change Contact
								<input type="text" name="Contact" id="Contact" value="'.$Contact.'" class="form-control" placeholder="Contact" autofocus>
								</label><br/>
								<label for="Email">Change Email
								<input type="text" name="Email" id="Email" value="'.$Email.'" class="form-control" placeholder="Email" autofocus>
								</label><br/>
								<label for="Location">Change location
								<input type="text" name="Location" id="Location" value="'.$Location.'" class="form-control" placeholder="Location" required autofocus>
								</label><br/>';
								if($Field1 == ""){
									echo '
									<label for="Field1">Change Field1
									<select class="form-control" name="Field1" id="Field1"><span style="color:red">*</span>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									</select></label><br/>';		
								}
								else{
									echo '
									<label for="Field1">Change Field1
									<select class="form-control" value="'.$Field1.'" name="Field1" id="Field1"><span style="color:red">*</span>
									<option value="'.$Field1.'">'.$Field1.'</option>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									</select></label><br/>';	
								}
								if($Field2 == " " || $Field2 == ""){
									echo '
									<label for="Field2">Change Field2
									<select class="form-control" name="Field2" id="Field2">
									<option value=""></option>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									</select></label>
									<br/>';		
								}
								else{
									echo '
									<label for="Field2">Change Field2
									<select class="form-control" name="Field2" id="Field2">
									<option value="'.$Field2.'">'.$Field2.'</option>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									<option value=" ">Unselect A Field</option>
									</select></label>
									<br/>';		
								}
								if($Field3 == " " || $Field3 == ""){
									echo '
									<label for="Field2">Change Field2
									<select class="form-control" name="Field3" id="Field3">
									<option value=""></option>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									</select></label>
									<br/>';		
								}
								else{
									echo '
									<label for="Field3">Change Field3
									<select class="form-control" name="Field3" id="Field3" value="'.$Field3.'" required>
									<option value="'.$Field3.'">'.$Field3.'</option>
									<option value="Comp">Comp</option>
									<option value="IT">IT</option>
									<option value="Elex">Elex</option>
									<option value="Mech">Mech</option>
									<option value="Indus">Indus</option>
									<option value="Prod">Prod</option>
									<option value=" ">Unselect A Field</option>
									</select></label>
									<br/>';
								}
								echo '
								<label for="CPI">Change CPI
								<input type="text" class="form-control" name="Cpi" id="Cpi" value="'.$Cpi.'" placeholder="Add cpi" required autofocus>
								</label><br/><br/>
								<label for="Backlog">Allow backlog
								<div class="radio">
									<label><input type="radio" name="BackNo" value=0 checked>No</label>
									<label><input type="radio" name="BackNo" value=1>Yes</label>
								</div></label><br>
								<label for="Info">Add more info about the company
								<textarea name="Info" id="Info" class="form-control" placeholder="More info" autofocus>'.$Info.'</textarea></label>
								<br/>';
								echo "<label for='date'>Change exam date to";
								echo "<br/><input class='form-control' type='date' name='date' value=".$Date."><br><br> </label>";
								echo '<button class="form-control" type="submit">Change Info</button>';
								echo '</form>';
							?>
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