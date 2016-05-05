<?php 
	// start sample HTML
	echo "<div class='col-xs-11 bhoechie-tab-container'>\n";
	echo "\t<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu'>\n";
	echo "\t\t<div class='list-group' style='font-size: 17px; font-family:'Ubuntu'; color: #581a2d'>\n";
			
	// Sample menu bar
	echo "\t\t\t<a href='#' class='list-group-item active text-center'>\n";
	echo "\t\t\t\t<br/>Sample Job<br/><br>\n";
	echo "\t\t\t</a>\n";
	echo "\t\t</div>\n";
	echo "\t\t<br><br>\n";
			
	// Sample "Add job" button at the bottom of navbar
	echo "\t\t\t<a class='btn' style='margin-left: 55px' data-toggle='modal' data-target='#elogin'><img alt='Capital W' src='add.png' width=40 height=40></a>\n";
	echo "\t\t</div>\n";
	// menu bar end
			
	// Sample content
	echo "\t\t<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab'>\n";
			
	echo "\t\t\t<div class='bhoechie-tab-content active'>\n";
	echo "\t\t\t\t<div class='container' style='text-align: left'>\n";
			
	// HTML: generate sample toolbar
	echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px'>\n";
	echo "\t\t\t\t\t\t<a href='hours_sample.php'><img src='hour.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px'></a>\n";
	echo "\t\t\t\t\t\t<a href='records.php'><img src='record.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
	echo "\t\t\t\t\t\t<a href=''><img src='report.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black; margin-right: 83px'></a>\n";
	echo "\t\t\t\t\t\t<a href=''><img src='money.png' width=70 height=70 style='border-radius: 3px; border: 2px solid black'></a>\n";
	echo "\t\t\t\t\t\t<br><p></p>\n";
	echo "\t\t\t\t\t\t<font style='font-size: 17px; font: Ubuntu; color: black; margin-left: 11px; margin-right: 60px'>Post Hours</font>\n";
	echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 56px'>Time Records</font>";
	echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black; margin-right: 77px'>Report Case</font>\n";
	echo "\t\t\t\t\t\t<font style='font-size: 17px; font-family: Ubuntu; color: black'>Checks</font>\n";
	echo "\t\t\t\t\t</div>\n";
			
	// HTML: generate sample content
	echo "\t\t\t\t\t<div class='jumbotron' style='background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center'>\n";
	
					
	// HTML: sample alert
	echo "\t\t\t\t\t\t<div class='alert alert-danger' role='alert'>\n";
	echo "\t\t\t\t\t\t\t<a href='#' class='alert-link'>\n";
	echo "\t\t\t\t\t\t\t\t<font style='font-size: 25px; font-family:Raleway; color: #a95050'><strong>This is a preview of the dashboard. <br>Please add a job to access more tools.</strong></font>\n";
	echo "\t\t\t\t\t\t\t</a>\n";
	echo "\t\t\t\t\t\t</div>\n";
					
	echo "\t\t\t\t\t</div>\n";
	echo "\t\t\t\t</div>\n";
	echo "\t\t\t</div>\n";
			
	// closing div for menubar & sample content
	echo "\t\t</div>\n";
	echo "\t</div>\n";
			
	echo "</div>\n";
	// sample content end
?>