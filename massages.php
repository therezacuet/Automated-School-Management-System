<?php 
session_start();
 $pagetitle = 'Messages'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
	<link href="css/massage.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin()) {
		header("Location: 404.html"); 
		exit();
	}
	if(!empty($_SESSION['student_id'])){

		$user_id = $_SESSION['student_id'];
		$user_name = getfield('fld3');
	}else{
		$user_id = $_SESSION['teacher_id'];
		$user_name = getfield('tld5');
	}
?>

<html>
	<?php include("head.php");?>
		<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					<?php 
					if(!empty($_SESSION['student_id'])){
						getSM();
					}else{
						getTM();
					}
					?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2">
						<div class="message_option">
							<?php include 'message_title_bar.php';?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>