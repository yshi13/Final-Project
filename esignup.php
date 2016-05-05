<!-- 
Need to implement:
-DOB formatting

Optional:
-Min password length


-->

<?php
	include_once('config.php');
	include_once('utils.php');
	include_once('hashutil.php');
	include_once('header1.php');
?>
			
<!-- Start main content --> 
		<div class="container">	
			<title>
				<?php echo "Register - " . $Title; ?>
			</title>
			
			<!-- Page header -->
			<h1><font size=6 style="font-family:'Ubuntu'; color: white">Create an account</font></h1>
			<br>
			&nbsp;
			
			<!--
			<div class='modal fade' id='myModal'>
				<div class='modal-dialog modal-lg' style='padding-top: 240px'>
					<div class='modal-content' style='text-align: center; border-radius: 2px'>
						<div class='modal-body'>
							<br><font size=5 style="font-family:'Ubuntu'; color: #6c6c76; margin-top:400px"><strong><?php echo "The user " . $email . " was added to the database"; ?></strong></font>
						</div>
						<br><br>
						<a href='login.php'><button type='button' class='btn btn-default' style="margin-right: 20px; margin-bottom:30px; border: 1px solid black; color: black;
						border-radius: 0; font-size: 21px; padding: 4px 8px"><strong>LOG IN</strong></button></a>
						<a href='esignup.php'><button type='button' class='btn btn-default' style="margin-left: 20px; margin-bottom:30px; border: 1px solid black; color: black;
						border-radius: 0; font-size: 21px; padding: 4px 8px"><strong>SIGN UP</strong></button></a>
						<script>
						$('#myModal').modal({backdrop: 'static', keyboard: false});
						</script>
					</div>
				</div>
			</div>
			-->
<?php

// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.

if (isset($_POST['submit'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$fname = $_POST['UserFirstName'];
	$mname = $_POST['userMiddleInitial'];
	$lname = $_POST['UserLastName'];
	$userDOB = $_POST['userDOB'];
	$email = $_POST['UserEmail'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$phone = preg_replace('/\D+/', '', $_POST['phone']);
	$gender = $_POST['gender'];
	
	// check to make sure we have an email
	if (!$fname) {
		punt("Please enter the first name.");
	}
	
	if (!$lname) {
		punt("Please enter the last name.");
	}
	
	if (!$email) {
		punt("Please enter email address.");
	}

	if (!$password1) {
		punt("Please enter a password.");
	}

	if (!$password2) {
		punt("Please enter your password a second time.");
	}
	
	if ($password1 != $password2) {
		punt("The two passwords entered do not match.");
	}

	// check if email already in database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT UserEmail, UserPassword FROM Users_T WHERE UserEmail='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if the email is there
	if (nTuples($result) > 0) {
		punt("The email address $email is already in the database");
	}
	
	// generate hashed password
	$hashedPass = crypt($password1, getSalt());
	
	// set up my query
	$query = "INSERT INTO Users_T(UserFirstName, UserMiddleInitial, UserLastName, UserDOB, UserGender, UserEmail, UserPhoneNumber, UserPassword, UserTypeID) VALUES ('$fname', '$mname', '$lname', '$userDOB', '$gender', '$email', '$phone', '$hashedPass', 3);";
	
	// run the query
	$result = queryDB($query, $db);
	

	
	// tell users that we added the user to the database
	echo "<div class='modal fade' id='myModal'>\n";
	echo "<div class='modal-dialog modal-lg' style='padding-top: 240px'>\n";
	echo "<div class='modal-content' style='text-align: center; border-radius: 2px'>\n";
    echo "<div class='modal-body'>\n";
	echo "\t<br><font size=5 style='font-family:'Ubuntu'; color: #6c6c76; margin-top:400px;'><strong>The user " . $email . " was added to the database</strong></font></div><br><br>\n";
	echo "<a href='login.php'><button type='button' class='btn btn-default' style='margin-right: 20px; margin-bottom:30px; border: 1px solid black; color: black;
							border-radius: 0; font-size: 21px; padding: 4px 8px'><strong>LOG IN</strong></button></a>
							<a href='esignup.php'><button type='button' class='btn btn-default' style='margin-left: 20px; margin-bottom:30px; border: 1px solid black; color: black;
							border-radius: 0; font-size: 21px; padding: 4px 8px'><strong>SIGN UP</strong></button></a>\n";
	echo "<script>\n";
	echo "\t$('#myModal').modal({backdrop: 'static', keyboard: false});\n";
	echo "</script></div></div></div>\n";
	
}
?>
			
			<!-- Form to enter new users info -->			
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="jumbotron" style="background-color: #dcece1; border-radius: 2px; text-align: left">
					<div class="row-1">
						<br>
						&nbsp;
						<font size=5 style="font-family:'Ubuntu'">Personal Information</font>
						<br>
						<font size=2 style="color: red; padding-left: 10px">* Required Fields</font>
					</div>
					<br>
					&nbsp;
					
					<div class="row-2">
						<div class="col-sm-6 col-xs-12">
													
								<div class="form-group">
									<label for="UserFirstName">First Name <font style="color: red">*</font>
									<input type="text" class="form-control" name="UserFirstName" size=50 maxsize=128 /></label>
								</div>
							
								<div class="form-group">
									<label for="UserLastName">Last Name <font style="color: red">*</font>
									<input type="text" class="form-control" name="UserLastName" size=50 maxsize=128 /></label>
								</div>
							
								<div class="form-group">
									<label for="UserEmail">Email Address <font style="color: red">*</font>
									<input type="email" class="form-control" name="UserEmail" size=50 maxsize=128 /></label>
								</div>
								
								<div class="form-group">
									<label class="radio-inline"> 
									<input type="radio" name="gender" value="Female">Female</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label class="radio-inline">
									<input type="radio" name="gender" value="Male">Male</label>
								</div>						
										
						</div>

						<!-- right column-->
						<div class="col-sm-6 col-xs-12">
										
								<div class="form-group">
									<label for="userMiddleInitial">Middle Initial
									<input type="text" class="form-control" name="userMiddleInitial" size=50 maxsize=128 /></label>
								</div>
							
								<div class="form-group">
									<div class='input-group date' id='datetimepicker1'>
										<label for="userDOB">Date of Birth (YYYY-MM-DD)
										<input type='text' class="form-control" size=20 maxsize=128 />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
										</label>
									</div>
								</div>
								<script type="text/javascript">
									$(function () {
										$('#datetimepicker1').datetimepicker();
									});
								</script>
							
								<div class="form-group">
									<label for="phone">Phone Number <!--<font style="color: red">*--></font>
									<input type="tel" class="form-control" name="phone" size=50 maxsize=128 /></label>
								</div>												
							
						</div>
					</div>
					<br>
					&nbsp;
					<br>
					&nbsp;
					<HR color=white width="100%" size=10px>
					<br>
					&nbsp;
					<br>
					&nbsp;
				</div>
				<div class="jumbotron" style="background-color: #dcece1; border-radius: 2px; text-align: left; height: 350px">
					<div class="row-1">
						<br>
						&nbsp;
						<font size=5 style="font-family:'Ubuntu'">Please enter a password:</font>
					</div>
					<br>
					&nbsp;
					
					<div class="row-2">
						<div class="col-sm-6 col-xs-12">						
							
								<div class="form-group">
									<label for="password1">Password <font style="color: red">*</font></label>
									<input type="password" class="form-control" name="password1" size=50 maxsize=128 />
								</div>
							
								<div class="form-group">
									<label for="password2">Confirm Password <font style="color: red">*</font></label>
									<input type="password" class="form-control" name="password2" size=50 maxsize=128 />
								</div>													
						
						</div>
					</div>
						
					<br>
					&nbsp;
					<br>
					&nbsp;
				</div>
				
				<div class="row-3">
					<div class="col-sm-10 col-xs-12">
					</div>
					<div class="col-sm-2 col-xs-12">
						<button type="submit" class="btn btn-default" name="submit">
							<strong>And we're done !</strong>
						</button>
					</div>
				</div>
			</form>
			
				
<?php
	// Include the footer file (from within PHP).
	include_once("footer1.php");
?>