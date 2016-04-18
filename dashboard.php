<?php
	include_once "config.php";
	include_once "utils.php";
	include_once('hashutil.php');
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
				<div class="col-xs-11 bhoechie-tab-container">
					
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
						<div class="list-group" style="font-size: 17px; font-family:'Ubuntu'; color: #581a2d">
						  <a href="#" class="list-group-item active text-center">
							  <br/>JOB TITLE &nbsp; #1<br/><br>
						  </a>
						  <a href="#" class="list-group-item text-center">
							  <br/>JOB TITLE &nbsp; #2<br/><br>
						  </a>
						  <a href="#" class="list-group-item text-center">
							  <br/>JOB TITLE &nbsp; #3<br/><br>
						  </a>
						</div>
						<br><br>
						<a class="btn" style="margin-left: 55px" data-toggle="modal" data-target="#elogin"><img alt="Capital W" src="add.png" width=40 height=40></a>
					</div>
					
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
						
						<div class="bhoechie-tab-content active">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
									<a href=""><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 8px; margin-right: 60px"></a>
									<a href=""><img src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 60px"></a>
									<a href=""><img src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 40px"></a>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black"><strong>More tools coming...</strong></font>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 40px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 30px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Report case</font>
								</div>
								<div class="jumbotron" style="background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center">
									<div class="alert alert-danger" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a95050"><strong>You have No Wage Theft alert.</strong></font>
										</a>
									</div>
									<div class="alert alert-success" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #459a46"><strong>You have worked 233 Hours in 2016.</strong></font>
										</a>
									</div>
									<div class="alert alert-info" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #42a0e7"><strong>You recently entered 3 paychecks.</strong></font>
										</a>
									</div>
									<div class="alert alert-warning" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a4a553"><strong>New policy updated.</strong></font>
										</a>
									</div>									
								</div>
							</div>							
						</div>
						
						<div class="bhoechie-tab-content">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
									<a href=""><img alt="calendar" src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 8px; margin-right: 60px"></a>
									<a href=""><img alt="calendar" src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 60px"></a>
									<a href=""><img alt="calendar" src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 40px"></a>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black"><strong>More tools coming...</strong></font>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 40px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 30px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Report case</font>
								</div>
								<div class="jumbotron" style="background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center">
									<div class="alert alert-danger" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a95050"><strong>You have 22 Wage Theft alert.</strong></font>
										</a>
									</div>
									<div class="alert alert-success" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #459a46"><strong>You have worked 40 Hours in this month.</strong></font>
										</a>
									</div>
									<div class="alert alert-info" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #42a0e7"><strong>You recently entered no paychecks.</strong></font>
										</a>
									</div>
									<div class="alert alert-warning" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a4a553"><strong>You have No Wage Theft alert.</strong></font>
										</a>
									</div>									
								</div>
							</div>
						</div>
			
						
						<div class="bhoechie-tab-content">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
									<a href=""><img alt="calendar" src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 8px; margin-right: 60px"></a>
									<a href=""><img alt="calendar" src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 60px"></a>
									<a href=""><img alt="calendar" src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 40px"></a>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black"><strong>More tools coming...</strong></font>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 40px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 30px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Report case</font>
								</div>
								<div class="jumbotron" style="background-color: #dfd3d7; border-radius: 3px; width: 700px; height: 440px; margin-top: 30px; text-align: center">
									<div class="alert alert-danger" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a95050"><strong>This is for testing.</strong></font>
										</a>
									</div>
									<div class="alert alert-success" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #459a46"><strong>This is for testing.</strong></font>
										</a>
									</div>
									<div class="alert alert-info" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #42a0e7"><strong>This is for testing.</strong></font>
										</a>
									</div>
									<div class="alert alert-warning" role="alert">
										<a href="#" class="alert-link">
											<font style="font-size: 25px; font-family:'Raleway'; color: #a4a553"><strong>BYE, KOKE 24.</strong></font>
										</a>
									</div>									
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