<?php
	include_once "config.php";
	include_once "utils.php";
	include_once('hashutil.php');
?>

<!-- This part is HTML -->
<html>
	<head>
        <!-- Some basic css style -->
        <style>
        <!--
           /* For main page div */
           .centered { width: 100%; text-align: center; }
        -->
        </style>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
                
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
                
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>				
    </head>

    <body>
        
<!-- Start main content --> 
		<!-- Page header -->
        <div class="row">
				<div class="col-xs-12" align=center>
                    <font size=10 style="font-family:'Comic Sans MS'">Dashboard</font>
				</div>
		</div>
<?php
	// Include the footer file (from within PHP).
	include_once("footer.php");
?>