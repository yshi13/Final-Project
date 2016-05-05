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
									<a href="hours.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px"></a>
									<a href="records.php"><img src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href="report.php"><img src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href="checks.php"><img src="money.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-left: 11px; margin-right: 60px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 56px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 77px">Report case</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Checks</font>
								</div>
								<div class="jumbotron" style="background-color: #e0ecf0; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: left; padding: 35px">
									<br><p></p>
                                    <!-- dorpdown menu for choosing paying hours-->
                                    <label for="checks"><font size=4 style="margin-left: 10px"><strong>Number of hours: </strong></font>
                                    <input type="text" class="form-control" name="checks" size=20 maxsize=128 /></label>
                                    <!-- Input payment amount-->
                                    <label for="checks"><font size=4 style="margin-left: 10px"><strong>Payment amount: </strong></font>
                                    <input type="text" class="form-control" name="checks" size=20 maxsize=128 /></label>
                                    
                                    <p></p>
                                
                                    <p>Payment start date: <input type="text" id="startdate"></p>
                                    
                                    <p>Payment end date: <input type="text" id="enddate"></p>
									<script type="text/javascript">
										$(function() {
												$("#startdate").datepicker({ dateFormat: "yy-mm-dd" }).val()
												$("#enddate").datepicker({ dateFormat: "yy-mm-dd" }).val()
										});
								 
									</script>
									<div class="row" style="margin-top: 30px">
										<a href="dashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:12px; margin-left: 470px"><strong>Back</strong></button></a>
										<button class="btn btn-default" type="submit" style="font-family:'Raleway'; font-size:12px; margin-left: 10px"><strong>Post</strong></button>								
									</div>
								</div>
							</div>							
						</div>
						
						<div class="bhoechie-tab-content">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
									<a href="hours.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px"></a>
									<a href=""><img src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href=""><img src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href=""><img src="money.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-left: 11px; margin-right: 60px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 56px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 77px">Report case</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Checks</font>
								</div>
								<div class="jumbotron" style="background-color: #dfd3d7; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: center">
									<div style="width:100%; max-width:900px; display:inline-block;">
										<div class="monthly" id="mycalendar"></div>
									</div>									
								</div>
							</div>
						</div>
			
						
						<div class="bhoechie-tab-content">
							<div class="container" style="text-align: left">
								<div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 700px; margin-top: 30px">
									<a href="hours.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-left: 18px; margin-right: 83px"></a>
									<a href=""><img src="record.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href=""><img src="report.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black; margin-right: 83px"></a>
									<a href=""><img src="money.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
									<br><p></p>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-left: 11px; margin-right: 60px">Post Hours</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 56px">Time Records</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black; margin-right: 77px">Report case</font>
									<font style="font-size: 17px; font-family:'Ubuntu'; color: black">Checks</font>
								</div>
								<div class="jumbotron" style="background-color: #dfd3d7; border-radius: 3px; width: 700px; height: auto; margin-top: 30px; text-align: center">
									<div style="width:100%; max-width:900px; display:inline-block;">
										<div class="monthly" id="mycalendar"></div>
									</div>									
								</div>
							</div>	
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
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
