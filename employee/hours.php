<?php
	include_once('header2.php');
?>
		<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>	
		
		<link rel="stylesheet" href="css/monthly.css">
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
				
		<div class="container">
			<div class="row">
			
				<!-- PHP: generate menu bar -->
				<?php include_once('generateHoursMenuBar.php'); ?>
					
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
						
						<div class="bhoechie-tab-content active">
							<div class="container" style="text-align: left">
								<!-- Generate toolbar -->
								
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
								
								<!-- start primary content -->
								<div class="jumbotron" style="background-color: #e0ecf0; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: center; padding-top: 25px">
									
									<br><p></p>
									<!-- begin form -->
									<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
									
									<input type="text" class="form-control" id="datepicker" style="margin-left: 50px; width: 500px; height: 50px; text-align: center; font-size: large" placeholder="Choose the date for your time entry">
									<script type="text/javascript">
										$(function() {
												$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
										});
									</script>
                                        <span class="input-group-btn" style="text-align: center">
											<button id="button1" class="btn btn-default" type="button" onclick="viewme(1)" style="margin-top: 30px; width: 300px">Record Times</button>
											<button id="button2" class="btn btn-default" type="button" onclick="viewme(2)" style="margin-top: 30px; width: 300px">Record Hours</button>
											<br><div id="content1" style="float:left; display:block; margin-top: 40px; text-align: center">
												<p style="float: left">Start time:</p>
												<select style="float: left; margin-left: 30px; margin-top: 7px; width: 140px">													
													<option value ="1">1:00am</option>
													<option value ="2">2:00am</option>
													<option value="3">3:00am</option>
													<option value="4">4:00am</option>
												</select>
												<p style="float: left; margin-left: 80px">End time:</p>
												<select style="float: left; margin-left: 30px; margin-top: 7px; width: 140px">													
													<option value ="1">1:00am</option>
													<option value ="2">2:00am</option>
													<option value="3">3:00am</option>
													<option value="4">4:00am</option>
												</select>
											</div>
											
											<div id="content2" style="display: none; margin-left: 200px; margin-top: 30px">
												<div class="input-group spinner" data-trigger="spinner" id="spinner"> 
													<input type="text" class="form-control" value="1" data-max="100" data-min="0.5" data-step="1"> 
													<div class="input-group-addon"> 
														<a href="javascript：;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a> 
														<a href="javascript：;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a> 
													</div> 
												</div>
											</div>
											<script type="text/javascript">
											var temp=1;
											function viewme(id)
											{
											document.getElementById("button"+id).style.backgroundColor="gray";
											document.getElementById("button"+temp).style.backgroundColor="white";
											document.getElementById("content"+temp).style.display = "none";
											document.getElementById("content"+id).style.display = "block";
											temp=id;
											}
											</script>
                                          <!-- A modal here for editing info-->
                                        </span>
										<div class="row" style="margin-top: 30px; margin-left: 300px">
										<a href="dashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:12px; margin:0"><strong>Cancel</strong></button></a>
										<button class="btn btn-default" type="submit" style="font-family:'Raleway'; font-size:12px"><strong>Save Changes</strong></button>								
										</div>
										</form>
								
									<?php 
										//insert form info 
										if (isset($_POST['submit'])){
											
											$entryDate = $_POST['entryDate'];
											$numHours = $_POST['numHours'];
											
											if (!$entryDate){
												punt("Please enter an entry date.");
											};
											
											if (!$numHours){
												punt("Please enter the amount of hours worked.");
											};
											
											$submitHoursResult = queryDB("INSERT INTO EmployeeHours_T (NumHours, EntryDate, UserID, JobAssignmentID) VALUES ($numHours, '$entryDate', $userID, $URLjobAssignmentID", $db);
											
										};
									
									?>
								
								</div>
							</div>							
						</div>

					</div>
					
				</div>
			</div>
		</div>
		
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
								<option value ="1">1:00am</option>
								<option value ="2">2:00am</option>
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
