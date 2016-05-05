<?php
	include_once('header2.php');
?>
		<div class="row">
		<script>
			$(document).ready(function() {
				$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
					e.preventDefault();
					$(this).siblings('a.active').removeClass("active");
					$(this).addClass("active");
					var index = $(this).index();
					$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
					$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
				});
			});
		</script>
		<div class="container">
		
			<div class="row">
			
				<?php
					/* 
					This script generates dashboard content.
					Content changes based on user type.
					
					*/
					
					// (\\DB connection, Fetching user information
					
					// Developer feedback
					echo 'User ID: ' . $userID . '<br>';
					echo 'UserTypeID: ' . $userTypeID . '<br>';
					echo 'User Type: ' . nextTuple(queryDB("SELECT UserType FROM UserTypes_T WHERE UserTypeID='$userTypeID'", $db))['UserType'] . '<br>';
					
					
					
					// Admin Content Generation
					if ($userTypeID == 1){
						
						// Admin dashboard generation
						include_once('generateAdminDashboard.php');
						
					// NPO Content Generation
					} elseif ($userTypeID == 2) {
						
						// NPO dashboard generation
						include_once('generateNPODashboardMain.php');
					
					
					// Employee Content Generation 
					} else { //($usertypeID == 3)
					
						// Fetch # jobs users has in DB. content is generated based on # jobs; 
						// this value is based on the number of rows corresponding to the userID
						// in the DB's job assignments table (JobAssignments_T).
						$numJobs = nextTuple(queryDB("SELECT COUNT(JobAssignmentID) FROM JobAssignments_T WHERE UserID='$userID'", $db))['COUNT(JobAssignmentID)'];
						
						
						// Generate content for users w/ no jobs in the DB
						if ($numJobs == 0){
							
							// A sample job w/ previews of the tools is displayed, so the user
							// can familiarize themselves w/ the service before they enter
							// otherwise sensitive information.
							include_once('generateSampleDashboard.php');

							
						// Generate content for users with 1+ jobs (numJobs > 0)
						} else {
							
							// Employee menu bar generation
							include_once('generateEmployeeDashboardMenuBar.php');
							
							// Employee main dashboard generation
							include_once('generateEmployeeDashboardMain.php');
							
							// closing divs for everything underneath the header
							echo "\t</div>\n";
							echo "</div>\n";
						};
					};
				?>
			
		<!-- Modal for adding jobs-->
		
		<div class="modal fade" id="elogin" role="dialog">
			<div class="modal-dialog modal-lg" style='padding-top: 120px'>							
				<div class="modal-content" style="border-radius: 2px; padding-bottom: 50px">
					<div class="row" style="margin-left: 50px; font-family:'Raleway'; color: black">
						<br>
						<h1><strong>Add Job</strong></h1>
						<br>
					</div>
					<div class="row" style="margin-left: 30px; font-family:'Raleway'; font-size: 25px; color: black; text-align: center">
						<div class="row">
							<p style="float: left; margin-left: 80px">Company: </p>
							<select style="float: left; margin-left: 30px; width: 140px; margin-right: 30px; background: transparent;
							padding: 5px; font-size: 16px; border: 1px solid #ccc; height: 34px;">														
								<option value ="1">Company 1</option>
								<option value ="2">Company 2</option>
							</select>
							<input type="text" class="form-control" name="company" style="width:320px; height: 35px; text-align: center"
											   placeholder="Or input Company here">
						</div>
						<br>
						<div class="row">
							<p style="float: left; margin-left: 80px">Job Title: </p>
							<select style="float: left; margin-left: 30px; width: 140px; margin-right: 30px; background: transparent;
							padding: 5px; font-size: 16px; border: 1px solid #ccc; height: 34px;">													
								<option value ="1">1:00am</option>
								<option value ="2">2:00am</option>
							</select>
							<input type="text" class="form-control" name="job" style="width:320px; height: 35px; text-align: center"
											   placeholder="Or input Job here">
						</div>
						<br>
						<div class="row">
							<p style="float: left; margin-left: 80px">Hourly rate: </p>
							<input type="text" class="form-control" name="job" style="margin-left: 30px; float: left; width:320px; height: 35px; text-align: center"
											   placeholder="Enter hourly wage rate"><p style="margin-right: 200px">$/hour</p>
						</div>
						<br><button type="button" class="btn btn-default" name="submit" style="margin-left:600px; font-size:16px;"><strong>Plus One!</strong></button>
					</div>
				</div>
			</div>
		</div>
		<br>
		&nbsp;
		<br>
		&nbsp;
		<div class="row-footer">
			<div class="col-xs-12" style="font-family:'Raleway'; color: black; margin-bottom: 30px" align="center">
					<strong>Copyright Group Se7ven 2016 | All Rights Reserved</strong>
					<a href="terms.html"><strong>Terms & Conditions</strong></a> |
					<a href="privacy.html"><strong>Privacy Policy</strong></a>
			</div>
		</div>
	</body>
</html>