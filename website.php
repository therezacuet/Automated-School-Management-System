<?php  
session_start();
$pagetitle = 'Website Management'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'web'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>
<style type="text/css">
 .left{
 	float: left;
 }

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">
						<div class="admin_btn">
							<a href="fileupload.php">Notice Upload/Delete</a>
						</div>
						<div class="admin_btn">
							<a href="add_event.php">Add Event to Calendar</a>
						</div>
						<div class="admin_btn">
							<a href="update_institute_info.php">Update Institute info</a>
						</div>
						<div class="admin_btn">
							<a href="update_headmaster_info.php">Update Headmaster info</a>
						</div>
						<div class="admin_btn">
							<a href="update_headline.php">Update Headline</a>
						</div>
						<div class="admin_btn">
							<a href="slider_img_up.php">Slider Images</a>
						</div>
						<div class="admin_btn">
							<a href="advertisement.php">Advertisement</a>
						</div>
						<div class="admin_btn">
							<a href="link.php">Important Links</a>
						</div>
						<div class="admin_btn">
							<a href="photo.php">Photo Gallery</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=1">Page | PTA</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=2">Page | Board of Directors</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=3">Page | Class activities</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=4">Page | Annual program</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=5">Page | Curriculum</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=6">Page | Courses</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=7">Page | Documentary</a>
						</div>
						<div class="admin_btn">
							<a href="update_institute_history.php">Page | School History</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=8">Page | Rules and regulations</a>
						</div>
						<div class="admin_btn">
							<a href="page_edit.php?page=9">Page | Hostel</a>
						</div>

		</div>
	</body>
<html>