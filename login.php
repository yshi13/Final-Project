<?php
	include_once('header.php');
?>

<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.

if (isset($_POST['submit'])) {
	
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$email = $_POST['eemail'];
	$password = $_POST['epassword'];
	
	
	// check to make sure we have an email
	if (!$email) {
		header("Location: login.php");
	}
	
	if (!$password) {
		header("Location: login.php");
	}

	// check if user is in the database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email, hashedPass FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	
	// check if the email is there
	if (nTuples($result) > 0) {
		$row = nextTuple($result);
		
		if ($row['hashedPass'] == crypt($password, $row['hashedPass'])) {
			// Password is correct
			if (session_start()) {
				$_SESSION['eemail'] = $email;
				header('Location: dashboard.php');
			} else {
				punt("Unable to create session");
			}
		} else {
			// Password is not correct
			punt('The password you entered is incorrect');
		}
	} else {
		punt("The email '$email' is not in our database");
	}	
	
}

?>

			<div class="jumbotron">
				<div class="container-narrow">
				  <br>
				  &nbsp;
				  <br>
				  &nbsp;
				  
				  <h1><font size=10 style="font-family:'Lobster'"><strong>Wage  Guard</strong></font></h1>
				  <p></p>
				  <p><font size=5 style="font-family:'Allan'">/weyj gahrd/</font></p>
				  <p></p>
				  
				  <a class="btn btn-large btn-1" style="margin-right:60px;">I am Employee</a>
							  
				  <a class="btn btn-large btn-2">I am NPO</a>
				</div>
			</div>
			

            <div class="modal fade" id="elogin" role="dialog">
					<div class="modal-dialog modal-lg modal-1">
					
						<!-- Modal content-->
						<div class="modal-content">
							<div class="row">
								<div class="col-sm-6">
									<div class="modal-header-1">
										<h3><strong><font size=6 style="font-family:'Dancing Script'">Introduction of employee</font></strong></h3>
										<br>
										<p>"Wage theft is the illegal withholding of wages or the denial of benefits that are rightfully owed to an employee.
										Wage theft can be conducted through various means such as: failure to pay overtime, minimum wage violations,
										employee misclassification, illegal deductions in pay, working off the clock, or not being paid at all."</p>
										
									</div>
									<div class="modal-footer-1">
										<a href="esignup.php"><button type="button" class="btn btn-default"><strong>JOIN US</strong></button></a>
									</div>
									
								</div>
							
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<div class="col-sm-6">
									<div class="modal-header-2">
										<h3><strong><font size=6 style="font-family:'Dancing Script'">Login to Wage Guard</font></strong></h3>
									</div>
									<div class="modal-body">
										
											<!--<form role="form">-->
											<div class="form-group">
											  <input type="email" class="form-control" name="eemail" placeholder="Email Address">
											</div>
											<div class="form-group">
											  <input type="password" class="form-control" name="epassword" placeholder="Password">
											</div>
											<div class="checkbox">
											  <label><input type="checkbox" value="" checked>Remember me</label>
											</div>
											<div class="row" style="text-align: right; margin-right:40px;">
											  <a href=#>Password help</a>	
											</div>
			
									</div>	
									<div class="modal-footer-2">
										<button type="submit" class="btn btn-default" name="submit" style="margin-right:20px; margin-top:30px"><strong>LOG IN</strong></button>
									</div>
								</div>
								</form>
							</div>
                            <script>
                                $('#elogin').modal({backdrop: 'static', keyboard: false});
                            </script>
						</div>
					</div>
			</div>
                
			
<?php
	include_once('footer.php');
?>