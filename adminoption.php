<?php  
session_start();
$pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
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

		<div class="admin_area">
			<div class="admin_btn">
				<a href="website.php">Website</a>
			</div>
			<div class="admin_btn">
				<a href="admin.php">Admin</a>
			</div>
			<div class="admin_btn">
				<a href="registration.php">Registration</a>
			</div>
			<div class="admin_btn">
				<a href="exam.php">Exam</a>
			</div>
			<div class="admin_btn">
				<a href="account.php">Accounts</a>
			</div>
			<div class="admin_btn">
				<a href="online_admission.php">Online Admission</a>
			</div>
			<div class="admin_btn">
				<a href="attendance.php">Attendance</a>
			</div>
			<div class="admin_btn">
				<a href="sms.php">SMS</a>
			</div>
			<div class="admin_btn">
				<a href="librarian.php">Library </a>
			</div>
		</div>
	</body>
<html>