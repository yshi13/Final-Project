<?php
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
			
				<!-- this PHP function generates content for dashboard for any user type. -->
				<?php include_once('generateDashboardContent.php'); ?>
			
			
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
							<select style="float: left; margin-left: 30px; margin-top: 7px; width: 140px; margin-right: 30px">													
								<option value ="1">1:00am</option>
								<option value ="2">2:00am</option>
							</select>
							<input type="text" class="form-control" name="company" style="width:320px; height: 30px; text-align: center"
											   placeholder="Or input Company here">
						</div>
						<div class="row">
							<p style="float: left; margin-left: 80px">Job Title: </p>
							<select style="float: left; margin-left: 30px; margin-top: 7px; width: 140px; margin-right: 30px">													
								<option value ="1">1:00am</option>
								<option value ="2">2:00am</option>
							</select>
							<input type="text" class="form-control" name="job" style="width:320px; height: 30px; text-align: center"
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
