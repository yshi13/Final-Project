<!--Employee login modal-->
			<div class="modal fade" id="elogin" role="dialog">
				<div class="modal-dialog modal-lg modal-1">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="row">
						<div class="col-sm-6">
							<div class="modal-header-1">
								<h3><strong><font size=6 style="font-family:'Dancing Script'">Introduction of employee</font></strong></h3>
								
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
								<form role="form">
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
								
							  </form>
							</div>	
							<div class="modal-footer-2">
								<a href="dashboard.php"><button type="button" class="btn btn-default" style="margin-right:20px; margin-top:15px;" href="esignup.php"><strong>LOG IN</strong></button></a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--NPO login modal-->
			<div class="modal fade" id="nlogin" role="dialog">
				<div class="modal-dialog modal-lg modal-2">
				
					<!-- Modal content-->
					<div class="modal-content">
						<div class="row">
						<div class="col-sm-6">
							<div class="modal-header-1">
								<h3><strong><font size=6 style="font-family:'Dancing Script'">Introduction of NPO</font></strong></h3>
								<p></p>
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
								<form role="form">
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
								
							  </form>
							</div>	
							<div class="modal-footer-2">
								<a href="dashboard.php"><button type="button" class="btn btn-default" style="margin-right:20px; margin-top:15px;"><strong>LOG IN</strong></button></a>
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