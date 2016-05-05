<!-- HTML -->
<div class="jumbotron" style="background-color: #ebeed6; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: center; padding: 35px">
	<br><p></p>
	<table class="table table-striped sortable" style="font-family:'Raleway'; font-weight: 400">
		
		<?php
			// This script queries the DB and returns the hours logged by the
			// user for their last several (up to five) pay periods. If paycheck information hasn't
			// been entered, the hours logged for the last several (up to five) days are retrieved.

			//set up queries
			$numPaychecksQuery = "SELECT COUNT(PaycheckID) FROM Paychecks_T WHERE UserID='$userID'";
			$numPaychecks = nextTuple(queryDB($numPaychecksQuery, $db))['COUNT(PaycheckID)'];
			
			// if user has no paychecks in the DB, display last few
			// time entries
			if ($numPaychecks == 0){
				

				
				$numHourEntries = nextTuple(queryDB("SELECT COUNT(HourEntryID) FROM EmployeeHours_T WHERE UserID='$userID'", $db))['COUNT(HourEntryID)'];
				
				// if user has no time entries, display warning message
				if ($numHourEntries == 0){
					
					echo "<thead>\n";
					echo "\t<tr>\n";
					echo "\t\t<th>You have not entered any hours.</th>\n";
					echo "\t</tr>\n";
					echo "</thead>\n";
					
				// if user has time entries, display last five entries
				} else {
					
					// HTML: table headers
					echo "<thead>\n";
					echo "\t<tr>\n";
					echo "\t\t<th>Position</th>\n";
					echo "\t\t<th>Date</th>\n";
					echo "\t\t<th>#	Hours Entered</th>\n";
					echo "\t\t<th>Estimated earnings (without tax)</th>\n";
					echo "\t</tr>\n";
					echo "</thead>\n";
					
					// set up queries
					$userHoursQuery =  "SELECT Jobs_T.JobName, 							EmployeeHours_T.EntryDate, EmployeeHours_T.NumHours, JobAssignments_T.PayRate FROM JobAssignments_T INNER JOIN EmployeeHours_T ON JobAssignments_T.JobAssignmentID=EmployeeHours_T.JobAssignmentID  INNER JOIN Jobs_T ON JobAssignments_T.JobID=Jobs_T.JobID ORDER BY EmployeeHours_T.EntryDate DESC LIMIT 5;";
						
					$userHoursResult = queryDB($userHoursQuery, $db);
					
					// generate HTML for table rows
					echo "<tbody>\n";
					while($row = nextTuple($userHoursResult){
						echo "\t<tr>\n";
						echo "<td>".$row['JobName']."</td>\n";
						echo "<td>".$row['EntryDate']."</td>\n";
						echo "<td>".$row['NumHours']."</td>\n";
						echo "<td>".$row['PayRate']."</td>\n";
						echo "\t</tr>\n";
					};
					echo "</tbody>\n";	
				};
				
				
			// if user has paychecks in DB, generate table for
			// last several pay periods based on hours entered.
			} else {

				// if user has no time entries, display warning message
				if ($numHourEntries == 0){
				
					echo "<thead>\n";
					echo "\t<tr>\n";
					echo "\t\t<th>You have not entered any hours.</th>\n";
					echo "\t</tr>\n";
					echo "</thead>\n";
				
				
				// if user has time entries, display table for last few pay periods
				} else {
					
					// HTML: table headers
					echo "<thead>\n";
					echo "\t<tr>\n";
					echo "\t\t<th>Position</th>\n";
					echo "\t\t<th>Date</th>\n";
					echo "\t\t<th>#	Hours Entered</th>\n";
					echo "\t\t<th>Estimated earnings (without tax)</th>\n";
					echo "\t</tr>\n";
					echo "</thead>\n";
					
					// set up queries
					//$userHoursQuery =  ""
					//$userHoursResult = queryDB($userHoursQuery, $db);
						
					// generate HTML for table rows
					while($row = nextTuple($userHoursResult){
					
					};
			
			
				};
				
			};
		?>