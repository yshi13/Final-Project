<!-- live version -->

<?php
	include_once('config.php');
	include_once('dbutils.php');
	
/* 
Contents:
(*1.0) DB connection, fetch user info
(*2.0) Admin Content Generation
(*3.0) NPO Content Generation
(*4.0) Employee Content Generation
	(*4.1) Content generation for users w/o jobs
	(*4.2) Content generation for users w/ jobs
*/
	
	// (*1.0) DB connection, Fetching user information
	
	// determine userType of current user
	$userTypeID = nextTuple(queryDB("SELECT UserTypeID FROM Users_T WHERE UserEmail='$userEmail'", $db))['UserTypeID'];
	
	// Developer feedback
	echo 'User ID: ' . $userID . '<br>';
	echo 'UserTypeID: ' . $userTypeID . '<br>';
	echo 'User Type: ' . nextTuple(queryDB("SELECT UserType FROM UserTypes_T WHERE UserTypeID='$userTypeID'", $db))['UserType'] . '<br>';
	
	
	
	// (*2.0) Admin Content Generation
	if ($userTypeID == 1){
		
		echo "Admin content still under development.";
		
	// (*3.0) NPO Content Generation
	} elseif ($userTypeID == 2) {
		
		// NPO menu bar generation
		include_once('generateNPOMenuBar.php');
		
		// NPO main dashboard generation
		include_once('generateNPODashboardMain.php');
	
	
	// (*4.0)Employee Content Generation 
	} else { //($usertypeID == 3)
	
		// Fetch # jobs users has in DB. content is generated based on # jobs; 
		// this value is based on the number of rows corresponding to the userID
		// in the DB's job assignments table (JobAssignments_T).
		$numJobs = nextTuple(queryDB("SELECT COUNT(JobAssignmentID) FROM JobAssignments_T WHERE UserID='$userID'", $db))['COUNT(JobAssignmentID)'];
		
		
		// (*4.1) Generate content for users w/ no jobs in the DB
		if ($numJobs == 0){
			
			// A sample job w/ previews of the tools is displayed, so the user
			// can familiarize themselves w/ the service before they enter
			// otherwise sensitive information.
			include_once('generateSampleDashboard.php');

			
		// (*4.2) Generate content for users with 1+ jobs (numJobs > 0)
		} else {
			
			// Employee menu bar generation
			include_once('generateEmployeeMenuBar.php');
			
			// Employee main dashboard generation
			include_once('generateEmployeeDashboardMain.php');
			
			// closing divs for everything underneath the header
			echo "\t</div>\n";
			echo "</div>\n";
		};
	};
?>