<?php  
//session_start();
$pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
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
							<a href="class.php">Class</a>
						</div>
						<div class="admin_btn">
							<a href="section.php">Section</a>
						</div>
						<div class="admin_btn">
							<a href="exam_type.php">Exam Type</a>
						</div>
						<div class="admin_btn">
							<a href="group_type.php">Group Type</a>
						</div>
						<div class="admin_btn">
							<a href="subject2.php">Subject</a>
						</div>
						<div class="admin_btn">
							<a href="shift.php">Shift</a>
						</div>
						<div class="admin_btn">
							<a href="online_application.php">Online Applications</a>
						</div>
						<div class="admin_btn">
							<a href="tc_application.php">TC Applications</a>
						</div>
						<div class="admin_btn">
							<a href="tc.php">Transfer Certificates</a>
						</div>
						<div class="admin_btn">
							<a href="sms_config.php">SMS Config</a>
						</div>
						<div class="admin_btn">
							<a href="users_management.php">Users Management</a>
						</div>

		</div>

	</body>
<html>