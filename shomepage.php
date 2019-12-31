<?php
	session_start();
	include_once('dbconnect.php');
	if($_SESSION['security'] != "aniwbfaybfylasfl fcoah fclohfuh afu chr"){
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
							<h1>Student</h1>
						<?php
							$Name = $_SESSION['user'];
							$Usern = $Name;
							$sql = "SELECT * FROM `student` WHERE `Username` LIKE '$Name'";
							$result = mysqli_query($con, $sql);
							$row = mysqli_fetch_array($result);
							$Branch = $row['Field'];
							//echo $Branch;
							$Cpi = $row['Cpi'];
							$Backlogs = $row['Backlogs'];
							$Selected = $row['Blocked'];
							$Comp = $row['Company'];
							if($Selected == 0 && ($Comp == "" || $Comp == " ")){
								$sql = "SELECT * FROM `company` WHERE `Field1` LIKE '$Branch' OR `Field2` LIKE '$Branch' OR `Field3` LIKE '$Branch'";	
									//echo $sql;
								$result = mysqli_query($con, $sql);
								if(!$result ){
									echo '<span style = "color:red">Error fetching data</span>';
								}
								else{
									$num_rows = mysqli_num_rows($result);
									if($num_rows == 0){
										echo "No companies eligible right now";
									}
									else{
										echo '<table class="table">';
										echo '<tr class = "Danger"><td>Company </td> <td>Criteria</td><td>Date</td><td>Info</td><td>Apply</td><td>Result</td></tr>';
										while($row = mysqli_fetch_array($result)){
											$Name = $row['Name'];
											$Criteria = $row['Cpi'];
											$Backlog = $row['BackNo'];
											$Date = $row['Date'];
											$DreamC = $row['DreamC'];
											$Info = $row['Info'];
											if(($Backlog == $Backlogs || $Backlog == 1)&&((float)$Criteria <= (float)$Cpi)&&($DreamC != "yes")){
												echo '<tr class = "Danger"><td>'.$Name.'</td><td>'.$Criteria.'</td><td>'.$Date.'</td><td>'.$Info.'</td><td>';
												$sqli = "SELECT * FROM `applied` WHERE `student` LIKE '$Usern' AND `company` LIKE '$Name'";
												$result1 = mysqli_query($con, $sqli);
												$num_rows = mysqli_num_rows($result1);
												$row1 = mysqli_fetch_array($result1);
												$Flag = $row1['flag'];
												if($num_rows == 0){
													echo "<a href = 'setcomp.php?cname=".$Name."&Company=".$Name."'><span style='color:#42f495'>Apply</span></a>";
												}
												else if($Flag == 0){
													echo "<a href = 'setcomp.php?cname=".$Usern."&Company=".$Name."'><span style='color:#42f495'>Applied/Remove</span></a>";
												}
												else{
													echo "Applied";
												}
												echo '</td><td>';
												if($Flag == 0){
													echo "Not selected";
												}
												else{
													echo "Selected";
												}
												echo '</td></tr>';
											}
											else{
												//echo "Not eligible right now";
											}
										}
										echo '</table>';
									}
								}
							}
							else if($Selected == 0){
								echo '<table class="table">';
								echo '<tr class = "Danger"><td>Comapny Name</td><td>Contact</td><td>Location</td><td>Info</td><td>Result</td></tr>';
								$sql = "SELECT * FROM `company` WHERE `Name` LIKE '$Comp'";
								//echo $sql;
								$result = mysqli_query($con, $sql);
								if(!$result ){
									echo '<span style = "color:red">Error fetching data</span>';
								}
								else{
									$row = mysqli_fetch_array($result);
									$Cname = $row['Name'];
									$Contact = $row['Contact'];
									$Location = $row['Location'];
									$DreamC = $row['DreamC'];
									$Result = "Selected";
									$Info = $row['Info'];
									echo '<tr class = "Danger"><td>'.$Cname.'</td><td>'.$Contact.'</td><td>'.$Location.'</td><td>'.$Info.'</td><td>'.$Result.'</td></tr>';
								}
							}
							else if($Selected == 1){
								echo "You are tempeporarily banned.<br/>Contact tpo for more details.";
							}
							else {
								echo "You are not eligible for Any companies";
							}
							if($Selected == 0){
								
								echo '<br/><br/></table>';
								$sql = "SELECT * FROM `company` WHERE `Field1` LIKE '$Branch' OR `Field2` LIKE '$Branch' OR `Field3` LIKE '$Branch'";	
								$result2 = mysqli_query($con, $sql);
								if(!$result2 ){
									echo '<span style = "color:red">Error fetching data</span>';
								}
								else{
								echo "<h3>Dream Companies Present right now : </h3>";
								echo '<table class = "table">';
								echo '<tr class = "Danger"><td>Company </td> <td>Criteria</td><td>Date</td><td>Info</td><td>Apply</td><td>Result</td></tr>';
								while($row2 = mysqli_fetch_array($result2)){
									$Name = $row2['Name'];
									$Criteria = $row2['Cpi'];
									$Backlog = $row2['BackNo'];
									$Date = $row2['Date'];
									$DreamC = $row2['DreamC'];
									$Info = $row2['Info'];
									if(($Backlog == $Backlogs || $Backlog == 1)&&((float)$Criteria <= (float)$Cpi) && ($DreamC == "yes") ){
										$sqli = "SELECT * FROM `applied` WHERE `student` LIKE '$Usern' AND `company` LIKE '$Name'";
										$result3 = mysqli_query($con, $sqli);
										$num_rows = mysqli_num_rows($result3);
										$row3 = mysqli_fetch_array($result3);
										$Flag = $row3['flag'];
										if($num_rows == 0){
											echo '<tr><td>'.$Name.'</td><td>'.$Criteria.'</td><td>'.$Date.'</td><td>'.$Info.'</td><td>';
											echo "<a href = 'setcomp.php?cname=".$Name."&Company=".$Name."'><span style='color:#42f495'>Apply</span></a></td>";
										}
										else if($Flag == 0){
											echo '<tr><td>'.$Name.'</td><td>'.$Criteria.'</td><td>'.$Date.'</td><td>'.$Info.'</td><td>';
											echo "<a href = 'setcomp.php?cname=".$Usern."&Company=".$Name."'><span style='color:#42f495'>Applied/Remove</span></a></td>";
										}
										else{
											echo '<tr><td>'.$Name.'</td><td>'.$Criteria.'</td><td>'.$Date.'</td><td>'.$Info.'</td><td>';
											echo "Applied";
										}
										echo '</td><td>';
										if($Flag == 0){
											echo "Not selected";
										}
										else{
											echo "Selected";
										}
										echo '</td></tr>';
									}
								}
							echo '</table>';
							}	
							}
						?>
						<br/>
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