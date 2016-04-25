<?php
	include_once('header2.php');
?>
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
        
		<div class="container"  style="text-align: center">
			<div class="row">
				<div class="col-xs-12">
				<div class="jumbotron" style="background-color: #e0ecf0; border-radius: 3px; width: 1150px; margin-top: 30px; text-align: center; padding-bottom: 33px">
					<div style="width:100%; max-width:1000px; display:inline-block;">
						<div class="monthly" id="mycalendar"></div>
					</div>
					<br><p></p>
					<a href="dashboard.php"><button type="button" class="btn btn-default" name="submit" style="font-family:'Raleway'; font-size:15px; margin:0; margin-right:940px"><strong>Back</strong></button></a>
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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
	$(window).load( function() {

		$('#mycalendar').monthly({
			mode: 'event',
			xmlUrl: 'events.xml'
		});

		$('#mycalendar2').monthly({
			mode: 'picker',
			target: '#mytarget',
			setWidth: '250px',
			startHidden: true,
			showTrigger: '#mytarget',
			stylePast: true,
			disablePast: true
		});

	switch(window.location.protocol) {
	case 'http:':
	case 'https:':
	// running on a server, should be good.
	break;
	}

	});
</script>
	</body>
</html>