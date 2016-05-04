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
								<a href="dashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:12px; margin:0; margin-right:600px"><strong>Back</strong></button></a>
								<br><p></p>
									<table style="margin-top: 50px">
										<td><label for="userid">Please Enter User ID:</label></td> 
										<td><input type="text" class="form-control" name="userid" size=20 maxsize=128 style="margin-left: 50px"/></td>
										<td><button type="submit" class="btn btn-default" name="submit" style="margin-left: 130px"><strong>submit</strong></button></td>
									</table>									
									
									<table class="table table-striped sortable" style="font-family:'Raleway'; font-weight: 400; margin-top: 50px">
                                        <thead>
                                            <tr>
                                                <th>Pycheck ID</th>
                                                <th>Hours</th>
                                                <th>Payment Amount</th>                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                              <td>134</td>
                                              <td>68</td>
                                              <td>$1360</td>
                                           </tr>
                                           <tr>
                                              <td>xxx</td>
                                              <td>xxx</td>
                                              <td>xxx</td>
                                           </tr>
                                        </tbody>
                                    </table>
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