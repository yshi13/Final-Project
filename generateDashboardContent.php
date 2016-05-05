<?php
	include_once('config.php');
	include_once('dbutils.php');
	
/* 
Tasks:
-
*/

	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	$userEmail = $_SESSION['userEmail'];
	
	// set up queries
	
	// determine ID of current user, based on session email
	$userID = nextTuple(queryDB("SELECT UserID FROM Users_T WHERE UserEmail='$userEmail'", $db))['UserID'];
	
	// use userID to return # jobs
	$numJobs = nextTuple(queryDB("SELECT COUNT(JobAssignmentID) FROM JobAssignments_T WHERE UserID='$userID'", $db))['COUNT(JobAssignmentID)'];
	
	// Results (for testing)
	/*echo 'Query test results <br>';
	echo 'User ID: ' . $userID . '<br>';
	echo 'Job Count: ' . $numJobs . '<br>';*/
	
	// generate no tabs if user doesn't have jobs; NEED TO FIX
	if ($numJobs == 0){
		
		// generate Add Job icon; need to fix functionality
		echo "<div class='col-xs-11 bhoechie-tab-container'>\n";
		echo "\t<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>\n";
		echo "\t\t<div class='list-group' style='font-size: 17px; font:Ubuntu; color: #581a2d'>\n";
		echo "\t\t\t<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>\n";
		echo "\t\t</div>\n";
		
		echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
		
		echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
		echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
		echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
		echo "\t\t\t\t\t\t<a href=''><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
		echo "\t\t\t\t\t\t<br><p></p>\n";
		echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Add Job</font>\n";
	
	// generate tabs if user does have jobs	
	} else {
		
		// set up query to determine jobAssignmentIDs and job names
		// jobAssignmentID:jobName is key:value
		
		$jobsQuery = "SELECT JobAssignments_T.JobAssignmentID, JobAssignments_T.UserID, Jobs_T.JobName FROM JobAssignments_T INNER JOIN Jobs_T ON JobAssignments_T.JobID=Jobs_T.JobID WHERE JobAssignments_T.UserID=$userID";
		$jobsQueryResult = queryDB($jobsQuery, $db);
		
		
		// $userJobs is an indexed array that stores jobAssignmentIDs and jobNames.
		// $jobInformation is an array that stores job info as jobAssignmentID:jobName pairs.
		$userJobs = array();
		$jobInformation = array();
		
		
		// populate $userJobs and $jobInformation arrays with indices, JobAssignmentIDs, and jobNames
		$jobAssignmentCounter = 0;
		while($row = nextTuple($jobsQueryResult)) {
			$jobAssignmentID = $row['JobAssignmentID'];
			$jobName = $row['JobName'];
			
			$jobInformation[$jobAssignmentID] = $jobName;
			$userJobs[$jobAssignmentCounter] = $jobInformation;
			
			$jobAssignmentCounter += 1;
		};
		
		// primary content
		echo "<div class='col-xs-11 bhoechie-tab-container'>\n";
		
		// menu bar start
		echo "\t<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>\n";
		echo "\t\t<div class='list-group' style='font-size: 17px; font:Ubuntu; color: #581a2d'>\n";
		
		// loop to generate tabs
		foreach($userJobs as $key => $val){
			
			// conditional to activate the top-most tab
			if ($key == 0){
			echo "\t\t\t<a href='#' class='list-group-item active text-center'>\n";
			echo "\t\t\t\t<br/>" . $val[1] . "<br/><br>\n";
			echo "\t\t\t</a>\n";
			} else {
			echo "\t\t\t<a href='#' class='list-group-item text-center'>\n";
			echo "\t\t\t\t<br/>" . $val[1] . "<br/><br>\n";
			echo "\t\t\t</a>\n";
			};
		};
		
		echo "\t\t</div>\n";
		echo "\t\t<br><br>\n";
		
		// add button at the bottom of navbar tabs
		echo "\t\t\t<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>\n";
		echo "\t\t</div>\n";
		
		echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
		
		// loop to generate content for each menu tabs
		foreach($userJobs as $key => $val){
			
			// activate top-most (0 index) tab content
			if ($key == 0){
				// generate toolbar
				echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
				echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
				echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
				echo "\t\t\t\t\t\t<a href='hours.php'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href='records.php'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href=''><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href=''><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
				echo "\t\t\t\t\t\t<br><p></p>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-right: 77px'>Report case</font>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black'>Checks</font>\n";
				echo "\t\t\t\t\t<div>\n";
				
				// generate tab content
				echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center'>\n";
				echo "\t\t\t\t\t\t<div class='alert alert-danger' role='alert'>\n";
				
				// sample alert
				echo "\t\t\t\t\t\t\t<a href='#' class='alert-link'>\n";
				echo "\t\t\t\t\t\t\t\t<font style='font-size: 25px; font:Raleway; color: #a95050'><strong>You have 22 Wage Theft alerts.</strong></font>\n";
				echo "\t\t\t\t\t\t\t</a>\n";
				echo "\t\t\t\t\t\t</div>\n";
				
				echo "\t\t\t\t\t</div>\n";
				
			} else {
				// generate toolbar
				echo "\t\t\t<div class='bhoechie-tab-content'>\n";
				echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
				echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
				echo "\t\t\t\t\t\t<a href='hours.php'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href='records.php'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href=''><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
				echo "\t\t\t\t\t\t<a href=''><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
				echo "\t\t\t\t\t\t<br><p></p>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black; margin-right: 77px'>Report case</font>\n";
				echo "\t\t\t\t\t\t<font style='font-size: 17px; font:Ubuntu; color: black'>Checks</font>\n";
				echo "\t\t\t\t\t<div>\n";
				
				// generate tab content
				echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center'>\n";
				
				echo "\t\t\t\t\t</div>\n";
			};
		};
		
	};
	
?>