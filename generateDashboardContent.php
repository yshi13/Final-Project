<!-- live version -->

<?php
	include_once('config.php');
	include_once('dbutils.php');
	
/* 
Contents:
(*0.0.0) DB connection, fetch user info
(*1.0.0) Admin 	Content Generation
(*2.0.0) NPO 		Content Generation
(*3.0.0) Employee 	Content Generation
	(*3.1.0) Generate content for employees w/o jobs
	(*3.2.0) Generate content for employees w/ jobs
		(*3.2.1) Fetch user job information
		(*3.2.2) Navbar generation
		(*3.2.3) Primary content generation
*/
	
	// (*0.0.0) DB Connection, Fetching User Information
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	$userEmail = $_SESSION['userEmail'];
	
	// determine ID of current user, based on session email
	$userID = nextTuple(queryDB("SELECT UserID FROM Users_T WHERE UserEmail='$userEmail'", $db))['UserID'];
	
	// determine userType of current user
	$userTypeID = nextTuple(queryDB("SELECT UserTypeID FROM Users_T WHERE UserEmail='$userEmail'", $db))['UserTypeID'];
	
	// Feedback
	/*
	echo 'dev: User Information <br>';
	echo 'User ID: ' . $userID . '<br>';
	echo 'User Type ID: ' . $userTypeID . '<br>';
	echo 'Job Count: ' . $numJobs . '<br>';*/
	
	// (*1.0.0) Generate admin content
	if ($userTypeID == 0){
		
	// (*2.0.0) Generate NPO content
	} elseif ($userTypeID == 1) {
	
	// (*3.0.0) Generate employee content ($usertypeID == 2)
	} else {
		// fetch # jobs user has
		$numJobs = nextTuple(queryDB("SELECT COUNT(JobAssignmentID) FROM JobAssignments_T WHERE UserID='$userID'", $db))['COUNT(JobAssignmentID)'];
		
		// (*3.1.0) Generate content for users w/ no jobs; NEED TO FIX HTML
		if ($numJobs == 0){
			
			// generate Add Job icon; need to fix functionality
			echo "<div class='col-xs-11 bhoechie-tab-container'>\n";
			echo "\t<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>\n";
			echo "\t\t<div class='list-group' style='font-size: 17px; font-family:'Ubuntu'; color: #581a2d'>\n";
			echo "\t\t\t<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>\n";
			echo "\t\t</div>\n";
			
			echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
			
			echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
			echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
			echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
			echo "\t\t\t\t\t\t<a href=''><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
			echo "\t\t\t\t\t\t<br><p></p>\n";
			echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family:'Ubuntu'; color: black; margin-left: 11px; margin-right: 60px'>Add Job</font>\n";
		
		// (*3.2.0) Generate content for users with 1+ jobs (numJobs > 0)
		} else {
			
			// (*3.2.1) Fetch user's job information
			
			// set up query to determine jobAssignmentIDs and job names
			$jobsQuery = "SELECT JobAssignments_T.JobAssignmentID, JobAssignments_T.UserID, Jobs_T.JobName FROM JobAssignments_T INNER JOIN Jobs_T ON JobAssignments_T.JobID=Jobs_T.JobID WHERE JobAssignments_T.UserID=$userID";
			$jobsQueryResult = queryDB($jobsQuery, $db);
			
			// $userJobs is an indexed array that stores index:array values.
			// $jobInformation is an assoc. array that stores jobAssignmentID and jobNames
			$userJobs = array();
			$jobInformation = array();
			
			// populate $userJobs and $jobInformation arrays with indices, JobAssignmentIDs, and jobNames
			$jobAssignmentIndex = 0;
			while($row = nextTuple($jobsQueryResult)) {
				//sub array is populated w/ "jobAssignmentID" and "jobName" as keys
				$jobInformation["jobAssignmentID"] = $row['JobAssignmentID'];
				$jobInformation["jobName"] = $row['JobName'];
				
				//array is added to userJobs array.
				$userJobs[$jobAssignmentIndex] = $jobInformation;
				
				$jobAssignmentIndex += 1;
			};
			
			// start HTML
			
			echo "<div class='col-xs-11 bhoechie-tab-container'>\n";
			
			// menu bar start
			echo "\t<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>\n";
			echo "\t\t<div class='list-group' style='font-size: 17px; font-family:'Ubuntu'; color: #581a2d'>\n";
			
			// (*3.2.2) Tab generation
			// this loop generates HTML for tabs
			foreach($userJobs as $key => $val){
				
				// activate topmost tab
				if ($key == 0){
					echo "\t\t\t<a href='#' class='list-group-item active text-center'>\n";
					echo "\t\t\t\t<br/>" . $val["jobName"] . "<br/><br>\n";
					echo "\t\t\t</a>\n";
					
				// other tabs are left unactivated
				} else {
					echo "\t\t\t<a href='#' class='list-group-item text-center'>\n";
					echo "\t\t\t\t<br/>" . $val["jobName"] . "<br/><br>\n";
					echo "\t\t\t</a>\n";
				};
			};
			
			echo "\t\t</div>\n";
			echo "\t\t<br><br>\n";
			
			// "Add job" button at the bottom of navbar
			echo "\t\t\t<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>\n";
			echo "\t\t</div>\n";
			
			
			// (*3.2.3) Primary content generation
			echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
			
			// this loop generates primary content for each menu tab
			foreach($userJobs as $key => $val){
				
				// activate top-most tab content
				if ($key == 0){
					
					echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
					echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
					
					// HTML: generate toolbar
					echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
					echo "\t\t\t\t\t\t<a href='hours.php'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href='records.php'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href=''><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href=''><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
					echo "\t\t\t\t\t\t<br><p></p>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font: Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 77px'>Report Case</font>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black'>Checks</font>\n";
					echo "\t\t\t\t\t</div>\n";
					
					// HTML: generate content
					echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center'>\n";
					echo "\t\t\t\t\t\t<div class='alert alert-danger' role='alert'>\n";
					
					// HTML: sample alert
					echo "\t\t\t\t\t\t\t<a href='#' class='alert-link'>\n";
					echo "\t\t\t\t\t\t\t\t<font style='font-size: 25px; font-family:Raleway; color: #a95050'><strong>You have 22 Wage Theft alerts.</strong></font>\n";
					echo "\t\t\t\t\t\t\t</a>\n";
					echo "\t\t\t\t\t\t</div>\n";
					
					echo "\t\t\t\t\t</div>\n";
					echo "\t\t\t\t</div>\n";
					echo "\t\t\t</div>\n";
					
					
				// generate content for other tabs
				} else {
					
					echo "\t\t\t<div class='bhoechie-tab-content'>\n";
					echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
					
					// HTML: generate toolbar
					echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
					echo "\t\t\t\t\t\t<a href='hours.php'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href='records.php'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href=''><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
					echo "\t\t\t\t\t\t<a href=''><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
					echo "\t\t\t\t\t\t<br><p></p>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font: Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 77px'>Report Case</font>\n";
					echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black'>Checks</font>\n";
					echo "\t\t\t\t\t</div>\n";
					
					// HTML: generate content
					echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center'>\n";
					echo "\t\t\t\t\t\t<div class='alert alert-danger' role='alert'>\n";
					
					// HTML: sample alert
					echo "\t\t\t\t\t\t\t<a href='#' class='alert-link'>\n";
					echo "\t\t\t\t\t\t\t\t<font style='font-size: 25px; font-family:Raleway; color: #a95050'><strong>You have 23 Wage Theft alerts.</strong></font>\n";
					echo "\t\t\t\t\t\t\t</a>\n";
					echo "\t\t\t\t\t\t</div>\n";
					
					echo "\t\t\t\t\t</div>\n";
					echo "\t\t\t\t</div>\n";
					echo "\t\t\t</div>\n";
				};
			};
			
			// close div for tabs, primary content
			echo "\t\t</div>\n";
			echo "\t</div>\n";
			
			echo "</div>\n";
			// end of primary content
		};
	};
?>