<?php
	include_once('header2.php');
			
?>

        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        
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
				<div class="col-xs-11 bhoechie-tab-container">
					
					<?php include_once('generatePaychecksMenuBar.php'); ?>
					
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
						
						<div class="bhoechie-tab-content active">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
								
									<a href="hours.php?jobAssignmentID=<?php echo "$URLjobAssignmentID";?>"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px"></a>
									
									<a href="records.php?jobAssignmentID=<?php echo "$URLjobAssignmentID";?>"><img src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									
									<a href="report.php?jobAssignmentID=<?php echo "$URLjobAssignmentID";?>"><img src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									
									<a href="checks.php?jobAssignmentID=<?php echo "$URLjobAssignmentID";?>"><img src="money.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
									
									<br><p></p>
									
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-left: 11px; margin-right: 60px">Post Hours</font>
									
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 56px">Time Records</font>
									
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 77px">Report case</font>
									
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Checks</font>
									
								</div>
								<div class="jumbotron" style="background-color: #e0ecf0; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: left; padding: 35px">
									<br><p></p>
									
                                    <label for="numHours"><font size=4 style="margin-left: 10px"><strong>Number of hours worked: </strong></font>
									
                                    <input type="text" class="form-control" name="numHours" size=20 maxsize=128 /></label>
                                    
									<!-- $ Amount paid -->
                                    <label for="amountPaid"><font size=4 style="margin-left: 10px"><strong>Amount Paid (before tax): </strong></font>
                                    <input type="text" class="form-control" name="amountPaid" size=20 maxsize=128 /></label>
                                    
                                    <label for="payPdStartDate"><font size=4 style="margin-left: 10px"><strong>Pay Period Start Date: </strong></font>
                                    <input type="text" class="form-control" name="payPdStartDate" size=20 maxsize=128 /></label>
                                    
                                    <label for="payPdEndDate"><font size=4 style="margin-left: 10px"><strong>Pay Period End Date: </strong></font>
                                    <input type="text" class="form-control" name="payPdEndDate" size=20 maxsize=128 /></label>
									
									<div class="row" style="margin-top: 30px">
									
										<a href="dashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:12px; margin-left: 470px"><strong>Back</strong></button></a>
										
										<button class="btn btn-default" type="submit" name="submitHours" style="font-family:'Raleway'; font-size:12px; margin-left: 10px"><strong>Post</strong></button>								
									</div>
									
									<?php 
										//echo "GET result: " . $URLjobAssignmentID;
	
										// prepare $_POST data
										
										if (isset($_POST['submit'])){
											echo "Processing form data..";
											
											$numHours 		= 	$_POST['numHours'];
											$amountPaid 	= 	$_POST['amountPaid'];
											$payPdStartDate	=	$_POST['payPdStartDate'];
											$payPdEndDate	=	$_Post['payPdEndDate'];
											
											if (!$numHours){
												punt("Please enter the number of hours worked.");
											};
											if (!$amountPaid){
												punt("Please enter the amount paid (before tax).");
											};
											if (!$payPdStartDate){
												punt("Please enter the start date of the pay period.");
											};
											if (!$payPdEndDate){
												punt("Please enter the end date of the pay period.");
											};
											
											// set up query
											$insertPaycheckQuery = "INSERT INTO Paychecks_T (PaycheckNumHours, AmountPaid, PayPeriodStartDate, PayPeriodEndDate, InWageTheftClaim, WageTheftFlag, UserID, JobAssignmentID) VALUES ($numHours, $amountPaid, '$payPdStartDate', '$payPdEndDate', 0, 0, $userID, $URLjobAssignmentID)";
											
											// run query
											$insertPaycheckInfo = queryDB($insertPaycheckQuery, $db);
											
												// tell users that we added the paycheck to the database
											echo "<div class='modal fade' id='myModal'>\n";
											echo "<div class='modal-dialog modal-lg' style='padding-top: 240px'>\n";
											echo "<div class='modal-content' style='text-align: center; border-radius: 2px'>\n";
											echo "<div class='modal-body'>\n";
											echo "\t<br><font size=5 style='font-family:'Ubuntu'; color: #6c6c76; margin-top:400px;'><strong>Your paycheck from " . $payPdStartDate . " - " . $payPdEndDate . " has been added to the database.</strong></font></div><br><br>\n";
											echo "<a href='dashboard.php'><button type='button' class='btn btn-default' style='margin-right: 20px; margin-bottom:30px; border: 1px solid black; color: black; border-radius: 0; font-size: 21px; padding: 4px 8px'><strong>Back to dashboard</strong></button></a>\n";
											echo "<script>\n";
											echo "\t$('#myModal').modal({backdrop: 'static', keyboard: false});\n";
											echo "</script></div></div></div>\n";
										};
									?>
								</div>
							</div>							
						</div>
					
					<!-- end primary content -->
					</div>
					
				</div>
			</div>
		</div>
		
		<!--<div class="modal fade" id="elogin" role="dialog">
			<div class="modal-dialog modal-lg" style='padding-top: 120px'>							
				<div class="modal-content" style="border-radius: 2px; padding-bottom: 50px">
					<div class="row" style="margin-left: 50px; font-family:'Raleway'; color: black">
						<br>
						<h1><strong>Add Job</strong></h1>
						<br>
					</div>
					<div class="row" style="margin-left: 30px; font-family:'Raleway'; color: black; text-align: center">
						<div class="dropup">
							<font size=4><strong>Company :</strong></font>
							<button class="btn btn-default dropdown-toggle" type="button"
							id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
							style="margin: 10px 10px; margin-right: 350px">
								<strong>Select company</strong>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left: 200px">
							  <li><a href="#">Company 1</a></li>
							  <li><a href="#">Company 2</a></li>
							  <li><a href="#">Company 3</a></li>
							  <li><a href="#">Company 4</a></li>
							</ul>
						</div>
						<div class="dropdown">
							<font size=4 style="margin-left: 100px"><strong>Job Title :</strong></font>
							<button class="btn btn-default dropdown-toggle" type="button"
							id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
							style="margin: 10px 10px">
								<strong>Select Job Title</strong>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left: 500px">
							  <li><a href="#">Job 1</a></li>
							  <li><a href="#">Job 2</a></li>
							  <li><a href="#">Job 3</a></li>
							  <li><a href="#">Job 4</a></li>
							</ul>
						</div>
						<br><button type="button" class="btn btn-default" name="submit" style="margin-left:600px; font-size:16px;"><strong>Plus One!</strong></button>
					</div>
				</div>
			</div>
		</div>-->
		
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
