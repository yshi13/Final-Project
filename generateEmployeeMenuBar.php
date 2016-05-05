<?php 
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
?>
			
	<!-- start HTML -->
	<div class='col-xs-11 bhoechie-tab-container'>
		
	<!-- menu bar start -->
		<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>
			<div class='list-group' style='font-size: 17px; font-family:'Ubuntu'; color: #581a2d'>

			
<?php		
	// Tab generation
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
?>
			</div>
			<br><br>
			
	<!-- "Add job" button at the bottom of navbar -->
			<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>
		</div>
	<!-- menu bar end -->