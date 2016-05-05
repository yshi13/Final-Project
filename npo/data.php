<?php
	include_once('header2.php');
?>
        
		<div class="container"  style="text-align: center">
			<div class="row">
				<div class="col-xs-12">
				<div class="jumbotron" style="background-color: white; border-radius: 3px; width: 1150px; margin-top: 30px; text-align: center">
					<div class="row" style="text-align: center">
						<div class="col-sm-3">
                            <div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; width: 250px; margin-top: 10px;text-align: center">
                                <a href="data.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
                                <br><font style="font-size: 17px; font-family:'Ubuntu'; color: black">Aggregate Data</font><br><br><br>
                                
                                <br><a href="view.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
                                <br><font style="font-size: 17px; font-family:'Ubuntu'; color: black">View Claims</font><br><br><br>
                                
                                <br><a href="create.php"><img src="hour.png" width=70 height=70 style="border-radius: 3px; border: 2px solid black"></a>
                                <br><font style="font-size: 17px; font-family:'Ubuntu'; color: black">Create Cases</font><br>
                                                    
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="jumbotron" style="background-color: #e0ecf0; border-radius: 3px; width: 730px; min-height: 500px; margin-left: 30px; margin-top: 10px">
                                <a href="ndashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:12px; margin:0; margin-right:600px"><strong>Back</strong></button></a>
								<br><p></p>
								<label for="company"><font size=4 style="margin-left: 10px"><strong>Enter Employer ID: </strong></font>
                                <input type="text" class="form-control" name="company" size=20 maxsize=128 style="margin-top: 20px"/></label>
                                <div class="row">
								<ul class="pricing_table">
                                    <li class="price_block">
                                        <h4>Total Users</h4>
                                        <div class="price">
                                            <div class="price_figure">
                                                <span class="price_number">245</span>
												<span class="price_tenure">people</span>
                                            </div>
                                        </div>
                                        <ul class="features">
                                            <li><font size=4>Top 5 company</font></li>
                                            <li>CVS</li>
                                            <li>Wal-mart</li>
                                            <li>Apple</li>
                                            <li>Microsoft</li>
                                            <li>Linkedin</li>
                                        </ul>
                                    </li>
                                    <li class="price_block">
                                        <h4>Case Number</h4>
                                        <div class="price">
                                            <div class="price_figure">
                                                <span class="price_number">25</span>
												<span class="price_tenure">this year</span>
                                            </div>
                                        </div>
                                        <ul class="features">
                                            <li>A block chart</li>
                                        </ul>
                                    </li>
                                    <li class="price_block">
                                        <h4>Theft rate</h4>
                                        <div class="price">
                                            <div class="price_figure">
                                                <span class="price_number">%19.7</span>
                                                <span class="price_tenure">in total</span>
                                            </div>
                                        </div>
                                        <ul class="features">
                                            <li>A pie chart</li>
                                        </ul>
                                    </li>
								</ul>
                                <script src="prefixfree.min.js" type="text/javascript"></script>
								</div>
                            </div>
                        </div>
					</div>
				</div>
				</div>
			</div>
			<br>
			&nbsp;
			<br>
			&nbsp;
        </div>
        
		<div class="row-footer">
			<div class="col-xs-12" style="font-family:'Raleway'; color: black; margin-bottom: 30px" align="center">
					<strong>Copyright Group Se7ven 2016 | All Rights Reserved</strong>
					<a href="terms.html"><strong>Terms & Conditions</strong></a> |
					<a href="privacy.html"><strong>Privacy Policy</strong></a>
			</div>
		</div>

	</body>
</html>