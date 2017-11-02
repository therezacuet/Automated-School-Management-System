<?php 
session_start();
 $pagetitle = 'Home'; 
$extra='

	<link type="text/css" rel="stylesheet" href="css/bjqs.css"/>
	<link type="text/css" rel="stylesheet" href="css/index.css"/>
	<link rel="stylesheet" href="css/jquery-ui2.css">
	';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<?php
			$headlinesql="SELECT * FROM `headline`";
			$headlinesql_run = mysqli_query($con, $headlinesql);
			$headlinesql_get = mysqli_fetch_array($headlinesql_run);
			$headline = $headlinesql_get['headline_text'];

		?>
		<div class="marquee_all">
			<marquee class="marquee">
				<h1>
					<?php echo $headline;?>
					
				</h1> 
			</marquee>
		</div>
		<div style="width: 1100px; margin: 0px auto;">

		<div class="slider fix" style="float:left;width:773px">
				<div id="banner-fade">
			        <ul class="bjqs">
			         <?php getSlider();?>
			        </ul>
			    </div>
			</div>


			<div style="width: 328px; margin: 0px 0px 0px 773px;min-height: 426px;">
				<div id="accordion" style="width: 319px;">

				  <div> 
				  	<img src="image/notice bord.png" style="width: 30px; float: left; padding: 0px;">
				  	<h3 style="margin: 0px 0px 0px 48px; font-size: 18px; font-weight: normal;color: #032D66;font-family: 'Slabo 27px', serif;">Notice Board <a href="notice.php?notice=1" style="color: rgb(2, 46, 99); font-size: 12px; margin: 6px 0px 0px; float:right">View all</a></h3>
				  </div>
				  <div >
				  	<?php getNotice1();?>
				  </div>
				  <div> 
				  	<img src="image/sy.png" style="width: 30px; float: left; padding: 0px;">
				  	<h3 style="margin: 0px 0px 0px 48px; font-size: 18px; font-weight: normal;color: #032D66;font-family: 'Slabo 27px', serif;">Syllabus <a href="notice.php?notice=2" style="color: rgb(2, 46, 99); font-size: 12px; margin: 6px 0px 0px; float:right">View all</a></h3>
				  </div>
				  <div>
				  	<?php getNotice2();?>
				  </div>
				  <div> 
				  	<img src="image/result.png" style="width: 30px; float: left; padding: 0px;height: 28px;">
				  	<h3 style="margin: 0px 0px 0px 48px; font-size: 18px; font-weight: normal;color: #032D66;font-family: 'Slabo 27px', serif;">Results <a href="notice.php?notice=3" style="color: rgb(2, 46, 99); font-size: 12px; margin: 6px 0px 0px; float:right">View all</a></h3>
				  </div>
				  <div>
				  	<?php getNotice3();?>
				  </div>
				  <div> 
				  	<img src="image/class_routile.png" style="width: 30px; float: left; padding: 0px;">
				  	<h3 style="margin: 0px 0px 0px 48px; font-size: 18px; font-weight: normal;color: #032D66;font-family: 'Slabo 27px', serif;">Class Routines <a href="notice.php?notice=4" style="color: rgb(2, 46, 99); font-size: 12px; margin: 6px 0px 0px; float:right">View all</a></h3>
				  </div>
				  <div>
				  	<?php getNotice4();?>
				  </div>
				  <div> 
				  	<img src="image/exam.png" style="width: 30px; float: left; padding: 0px;">
				  	<h3 style="margin: 0px 0px 0px 48px; font-size: 18px; font-weight: normal;color: #032D66;font-family: 'Slabo 27px', serif;">Exam Routine <a href="notice.php?notice=5" style="color: rgb(2, 46, 99); font-size: 12px; margin: 6px 0px 0px; float:right">View all</a></h3>
				  </div>
				  <div>
				  	<?php getNotice5();?>
				  </div>
				</div>

			</div>
			</div>

		<?php
			$hsql="SELECT * FROM `headmaster_info`";
			$hsql_run = mysqli_query($con, $hsql);
			$hsql_get = mysqli_fetch_array($hsql_run);
			$head_pic = $hsql_get['head_pic'];
			$head_message = $hsql_get['head_message'];

		?>
		<?php
			$hissql="SELECT * FROM `institute_history`";
			$hissql_run = mysqli_query($con, $hissql);
			$hissql_get = mysqli_fetch_array($hissql_run);
			$hs_pic = $hissql_get['hs_pic'];
			$his_history = $hissql_get['his_history'];

		?>
		<div class="middle">
			<div class="headmessage">
				<img src="image/message.png" class="notice_icon2">
				<h2 class="headh2">Message form Headmaster</h2>
				<div class="head_div">
					<img src="image/headmaster/<?php echo $head_pic;?>" class="head_pic">
				</div>
				<div style="font-family: 'Hind Siliguri', sans-serif;text-align: justify;">
					<?php echo $head_message;?>
				</div>
			</div>

			<div class="his">
			<div class="history">
				<img src="image/chart.png" class="notice_icon2">
				<h2 class="historyh2">Student Attendence</h2>
				<div>
					<div style="width: 30%; float: left;">
						<table>
							<tr>
								<td style="width: 117px; padding: 5px; font-size: 17px;">Today Present</td>
								<td style="font-size: 17px;">1265
								
								</td>
							</tr>
							<tr>
								<td style="width: 117px; padding: 5px; font-size: 17px;">Today Absent</td>
								<td style="font-size: 17px;">198
								
								</td>
							</tr>
						</table>
					</div>
					<div style="width: 70%">


						<script type="text/javascript">
						  window.onload = function () {
						    var chart = new CanvasJS.Chart("chartContainer",
						    {
						      
						      data: [
						      {
						       type: "doughnut",
						       dataPoints: [
							       {  y: 1265, indexLabel: "Present" },
							       {  y: 198, indexLabel: "Absent" }
						       ]
						     }
						     ]
						   });

						    chart.render();
						  }
						</script>
						<script type="text/javascript" src="js/canvasjs.min.js"></script>
						<div id="chartContainer" style="height: 250px; width: 100%;">
						</div>
				</div>
   			 </div>




			</div>
			<div class="link">
				<img src="image/link.png" class="notice_icon2">
				<h2>Important Links</h2>
				<table style="width:94%; margin:0 auto">
					<?php
					$ccsql="SELECT * FROM `link` ";
					$ccsql_run = mysqli_query($con, $ccsql);
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$link = $ccsql_get['link'];
						$nam = $ccsql_get['name'];
						?>
						<tr> 
							<td> &#9758; <a href="<?php echo $link;?>" class="alink"><?php echo $nam;?></a> </td>

						</tr>
						<?php
					}
				?>
				</table>
			</div>

		</div>
		</div>
		<div class="middle" style="height: 280px;">
		<?php
			$ccsql="SELECT * FROM `advertisement` WHERE `id` = 1";
			$ccsql_run = mysqli_query($con, $ccsql);
			$ccsql_get=mysqli_fetch_array($ccsql_run);
			$file = $ccsql_get['file'];
			$lnk = $ccsql_get['link'];
			if ($file == 0) {
				
			}else{
				?>
			<div class="ads1">
				<a href="<?php echo $lnk;?>"> <img src="<?php echo 'image/ads/'.$file;?>" style="margin: 5px 0px; float: left;"></a>
			</div>
			<?php
			}
		?>

			<div class="google_map" <?php if($file != 0){echo "style='border: 2px solid #D99529;
margin: 5px 8 0 0;
padding: 10px;
height: 280px;
background: #FAF5EC;
width: 746px;
float: right;'";}?>>
				<img src="image/google_map.png" class="notice_icon2">
				<h2>Google Map</h2>
				<div>
					<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:195px;
					<?php
						if ($file == 0) {
							
						}else{
						echo "width:723px;";
							
						}
					?>

					'><div id='gmap_canvas' style='height:195px;
					<?php
						if ($file == 0) {
							
						}else{
						echo "width:723px;";
							
						}
					?>

					'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://www.proxysitereviews.com/">proxy sites</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(<?php echo $g_pos;?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $g_pos;?>)});infowindow = new google.maps.InfoWindow({content:'<strong><?php echo $name;?></strong><br><?php echo $ins_add;?><br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
				</div>

			</div>
			

		</div>
		<?php
			include("footer.php");
		?>




		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bjqs-1.3.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script>
			  $(function() {
			    $( "#accordion" ).accordion();
			  });
		 </script>
		<script type="text/javascript">
		        jQuery(document).ready(function($) {

				  $('#banner-fade').bjqs({
				    height      : 425,
				    width       : 768,
				    responsive  : true
				  });

				});
		</script>
	</body>
<html>