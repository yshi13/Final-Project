<?php
	include_once "config.php";
	include_once "utils.php";
?>
<!--Employee login modal-->
<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.

if (isset($_POST['submit'])) {
	
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$email = $_POST['userEmail'];
	$password = $_POST['userPassword'];
	
	
	// check to make sure we have an email
	if (!$email) {
		header("Location: Welcome.php");
	}
	
	if (!$password) {
		header("Location: Welcome.php");
	}

	// check if user is in the database
		// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT UserEmail, UserPassword FROM Users_T WHERE UserEmail='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	
	// check if the email is there
	if (nTuples($result) > 0) {
		$row = nextTuple($result);
		
		if ($row['UserPassword'] == crypt($password, $row['UserPassword'])) {
			// Password is correct
			if (session_start()) {
				$_SESSION['userEmail'] = $email;
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
			
				<div class="modal fade" id="elogin" role="dialog">
					<div class="modal-dialog modal-lg modal-1" style='padding-top: 120px'>
					
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
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h3><strong><font size=6 style="font-family:'Dancing Script'">Login to Wage Guard</font></strong></h3>
									</div>
									<div class="modal-body">
										
											<!--<form role="form">-->
											<div class="form-group">
											  <input type="email" class="form-control" name="userEmail" placeholder="Email Address">
											</div>
											<div class="form-group">
											  <input type="password" class="form-control" name="userPassword" placeholder="Password">
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
						</div>
					</div>
				</div>
				
				<!--NPO login modal-->
				<div class="modal fade" id="nlogin" role="dialog">
					<div class="modal-dialog modal-lg modal-2" style='padding-top: 120px'>
					
						<!-- Modal content-->
						<div class="modal-content">
							<div class="row">
							<div class="col-sm-6">
								<div class="modal-header-1">
									<h3><strong><font size=6 style="font-family:'Dancing Script'">Introduction of NPO</font></strong></h3>
									<br>
									<p>"Wage theft is the illegal withholding of wages or the denial of benefits that are rightfully owed to an employee.
									Wage theft can be conducted through various means such as: failure to pay overtime, minimum wage violations,
									employee misclassification, illegal deductions in pay, working off the clock, or not being paid at all."</p>
									
								</div>
								<div class="modal-footer-1">
									<a href="esignup.php"><button type="button" class="btn btn-default"><strong>JOIN US</strong></button></a>
								</div>
								
							</div>
							
							
							<div class="col-sm-6">
								<div class="modal-header-2">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h3><strong><font size=6 style="font-family:'Dancing Script'">Login to Wage Guard</font></strong></h3>
								</div>
								<div class="modal-body">
									
										<div class="form-group">
										  <input type="email" class="form-control" name="email" placeholder="Email Address">
										</div>
										<div class="form-group">
										  <input type="text" class="form-control" name="password" placeholder="Password">
										</div>
										<div class="checkbox">
										  <label><input type="checkbox" value="" checked>Remember me</label>
										</div>
										<div class="row" style="text-align: right; margin-right:40px;">
										  <a href=#>Password help</a>	
										</div>
									
								</div>	
								<div class="modal-footer-2">
									<button type="button" class="btn btn-default" style="margin-right:20px; margin-top:30px;"><strong>LOG IN</strong></button>
								</div>
							</div>
							</div>	
						</div>
					</div>
				</div>
				<script>
				$(document).ready(function(){
					$("#myBtn").click(function(){
						$("#myModal").modal();
					});
				});
				</script>