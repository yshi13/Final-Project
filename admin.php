<?php
	include_once('header2.php');
?>
        
		<div class="container"  style="text-align: center">
			<div class="row">
				<!-- Change user type/access level box -->
                <div class="col-xs-6">
                    <div class="jumbotron" style="background-color: white; border-radius: 3px; width: auto; margin-top: 30px; text-align: left; padding: 20px 20px; padding-bottom: 0">
                        <div class="row" style="text-align: center">
                            <div class="col-xs-12">
                                <div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; height: 238px; width: auto; margin-top: 10px;text-align: left; padding-left: 30px">
                                    <font size=5 style="font-family:'Ubuntu'">Change User Type</font>
                                    <div class="input-group" style="margin-top: 40px">
                                        <input type="text" class="form-control" placeholder="Enter User Email">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="button">Submit</button>
                                          <!-- A modal here for choosing different types-->
                                        </span>
                                    </div>
                                                        
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Add/edit/remove other admin/users -->
                <div class="col-xs-6">
                    <div class="jumbotron" style="background-color: white; border-radius: 3px; width: auto; margin-top: 30px; text-align: left; padding: 20px 20px; padding-bottom: 0">
                        <div class="row" style="text-align: center">
                            <div class="col-xs-12">
                                <div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; height: auto; width: auto; margin-top: 10px;text-align: left; padding-left: 30px">
                                    <font size=5 style="font-family:'Ubuntu'">Add/Edit User</font>
                                    <div class="input-group" style="margin-top: 20px">
                                        <input type="text" class="form-control" placeholder="Enter User Email">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="button">Edit User</button>
                                          <!-- A modal here for editing info-->
                                        </span>
                                    </div>
                                    <div class="input-group" style="margin-top: 20px">
                                        <input type="text" class="form-control" placeholder="Enter New Email">
                                        <span class="input-group-btn">
                                          <button class="btn btn-default" type="button">Add User</button>
                                          <!-- A modal here for adding user-->
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <!-- Manage/merge employers -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron" style="background-color: white; border-radius: 3px; width: auto; margin-top: 30px; text-align: left; padding: 20px 20px; padding-bottom: 0">
                        <div class="row" style="text-align: center">
                            <div class="col-xs-12">
                                <div class="jumbotron" style="background-color: #eedee3; border-radius: 3px; height: auto; width: auto; margin-top: 10px;text-align: left; padding-left: 30px">
                                    <font size=5 style="font-family:'Ubuntu'">Manage Employers</font>
                                    <br>
                                    <div class="dropdown" style="margin-top: 30px; margin-left: 50px">
                                        <button class="btn btn-default dropdown-toggle" type="button"
                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                        style="margin: 10px 10px; width: 300px; height: 60px">
                                            <strong>Select Employer</strong>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="width: 500px; text-align: center; font-size: large">
                                          <li><a href="#">Company 1</a></li>
                                          <li><a href="#">Company 2</a></li>
                                          <li><a href="#">Company 3</a></li>
                                          <li><a href="#">Company 4</a></li>
                                        </ul>
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