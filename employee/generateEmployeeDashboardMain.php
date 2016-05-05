<?php 
	// start HTML
	echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
			
	// this loop generates primary content for each menu tab
	foreach($userJobs as $key => $val){
		
		// fetch jobAssignmentID to populate values for tool GETs
		$jobAssignmentID = $val["jobAssignmentID"];
		//echo "jobAssignmentID: ". $jobAssignmentID;
		
		// activate top-most tab content
		if ($key == 0){
			
			echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
			echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
					
			// HTML: generate toolbar
			echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
			
			echo "\t\t\t\t\t\t<a href='hours.php?jobAssignmentID=$jobAssignmentID'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
			
			echo "\t\t\t\t\t\t<a href='records.php?jobAssignmentID=$jobAssignmentID'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
			
			echo "\t\t\t\t\t\t<a href='report.php?jobAssignmentID=$jobAssignmentID'><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
			
			echo "\t\t\t\t\t\t<a href='checks.php?jobAssignmentID=$jobAssignmentID'><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
			
			echo "\t\t\t\t\t\t<br><p></p>\n";
			echo "\t\t\t\t\t\t<font style='font-size: 17px; font: Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
			echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
			echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 77px'>Report Case</font>\n";
			echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black'>Checks</font>\n";
			echo "\t\t\t\t\t</div>\n";
					
			// HTML: generate content
			// jobAssignmentID as PHP variable, stored and entered as query into DB
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
			echo "\t\t\t\t\t\t<a href='hours.php?jobAssignmentID=$jobAssignmentID'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
			echo "\t\t\t\t\t\t<a href='records.php?jobAssignmentID=$jobAssignmentID'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
			echo "\t\t\t\t\t\t<a href='report.php?jobAssignmentID=$jobAssignmentID'><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
			echo "\t\t\t\t\t\t<a href='checks.php?jobAssignmentID=$jobAssignmentID'><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
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
			
	// close div for primary content
	echo "\t\t</div>\n";
?>