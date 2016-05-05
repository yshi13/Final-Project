<?php
// check if user logged in, if not, kick them to login.php
	session_start();
	//echo $_SESSION['userEmail'];
	if(!isset($_SESSION['userEmail'])) {
		
		// if this is not set, it means they are not logged in
		header("Location: Welcome.php");
	}
		
	include_once "config.php";
	include_once "utils.php";
	
	// determine ID of current user, based on session email
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	$userEmail = $_SESSION['userEmail'];
	$userID = nextTuple(queryDB("SELECT UserID FROM Users_T WHERE UserEmail='$userEmail'", $db))['UserID'];
	
	// determine first name of current user for greeting in header
	$userFirstName = nextTuple(queryDB("SELECT UserFirstName FROM Users_T WHERE UserID=$userID", $db))['UserFirstName'];
	
	// fetch jobAssignmentID for tool from URL
	$URLjobAssignmentID = $_GET['jobAssignmentID'];
	//echo "GET result: " . $URLjobAssignmentID;
	
	// query DB to see if user has URL jobAssignmentID in their associated IDs
	$jobAssignmentIDQuery = "SELECT COUNT(JobAssignmentID) FROM JobAssignments_T WHERE UserID='$userID' AND JobAssignmentID='$URLjobAssignmentID'"; 
	
	$jobAssignmentIDCheckValue = nextTuple(queryDB($jobAssignmentIDQuery, $db))['COUNT(JobAssignmentID)'];
	//echo "jobAssignmentID check value: " . $jobAssignmentIDCheckValue;
	
	//echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	if ($_SERVER['PHP_SELF'] == "/~jlin4/WageGuard/dashboard.php"){
		goto skipChecks;
	};
	
	if ($URLjobAssignmentID == 0){
		header('Location: dashboard.php');
	};
	
	if ($jobAssignmentIDCheckValue == 0){
		header('Location: dashboard.php');
	};
	
	skipChecks: echo "";
		
?>
	
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Handmade CSS -->
        <link href="style2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="sorttable.js"></script>
		
		<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		
    </head>

    <body style="background-color: #d4d4d4">
		<div class="row" style="background-color: white" width=100%>
			<div class="col-sm-10 col-xs-12 menu" width=100%>
				<br>
				<a href="dashboard.php" style="margin-left: 80px; margin-right: 30px"><img alt="avatar" src="avatar.png" width=60 height=60></a>
				<font size=2 style="font-family:'Raleway'; color: #6c6c76"><strong>Hello, <?php echo $userFirstName ?>!</strong></font>
				<a href="#" style="margin-left: 30px"><font size=4 style="font-family:'Raleway'; color: #6c6c76"><strong>Notifications</strong></font></a>
				<span class="glyphicon glyphicon-envelope"></span>
				<a href="#" style="margin-left: 30px"><font size=4 style="font-family:'Raleway'; color: #6c6c76"><strong>Account Settings</strong></font></a>
				<span class="glyphicon glyphicon-cog"></span>
				<a href="#" style="margin-left: 30px"><font size=4 style="font-family:'Raleway'; color: #6c6c76"><strong>Help</strong></font></a>
				<a href="logout.php" style="margin-left: 50px"><font size=4 style="font-family:'Raleway'; color: #6c6c76"><strong>Logout </strong></font></a>
			</div>
			<div class="col-sm-2 col-xs-12" width=100% href="Welcome.php">
				<p></p>
				<a href="dashboard.php"><img alt="Capital W" src="logo.jpg" width=85 height=80></a>
				<p></p>
			</div>
		</div>
		<br>
		&nbsp;
			
	
	        
