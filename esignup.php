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
		<div class="row">
			<div class="col-xs-12">
				<div class="navbar navbar-default navbar-fixed-top">
					<div class="container-fluid">
						<ul class="nav nav-pills">
							<p class="navbar-text navbar-right">   </a></p>
							<a class="btn btn-default navbar-btn navbar-right" href="login.php" role="button">Login</a>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="centered">
		<br>
		&nbsp;
		<br>
		&nbsp;
        
<!-- Start main content --> 
		<title>
			<?php echo "Register - " . $Title; ?>
		</title>
		
		<!-- Page header -->
        <div class="row">
				<div class="col-xs-12">
                    <font size=10 style="font-family:'Comic Sans MS'">Register</font>
				</div>
		</div>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['submit'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	// check to make sure we have an email
	if (!$email) {
		punt("Please enter a name");
	}

	if (!$password1) {
		punt("Please enter a password");
	}

	if (!$password2) {
		punt("Please enter your password twice");
	}
	
	if ($password1 != $password2) {
		punt("Your two passwords are not the same");
	}

	// check if email already in database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if the email is there
	if (nTuples($result) > 0) {
		punt("The email address $email is already in the database");
	}
	
	// generate hashed password
	$hashedPass = crypt($password1, getSalt());
	
	// set up my query
	$query = "INSERT INTO Users(email, hashedPass) VALUES ('$email', '$hashedPass');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the player to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tThe user " . $email . " was added to the database\n";
	echo "</div></div>\n";
	
}
?>

<!-- Form to enter new users info -->
		<br>
		&nbsp;
		
		<div class="row">
			<div class="col-xs-12">
			
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="form-group">
						<label for="email">Email
						<input type="email" class="form-control" name="email" size=50 maxsize=128 /></label>
					</div>
				
					<div class="form-group">
						<label for="password1">Password
						<input type="password" class="form-control" name="password1" size=50 maxsize=128 /></label>
					</div>
				
					<div class="form-group">
						<label for="password2">Please enter password again
						<input type="password" class="form-control" name="password2" size=50 maxsize=128 /></label>
					</div>
					
				<button type="submit" class="btn btn-default" name="submit">Add</button>
				
				</form>
			
			</div>
		</div>
			
		<br>
		&nbsp;
		<br>
		&nbsp;
		
<?php
	// Include the footer file (from within PHP).
	include_once("footer.php");
?>