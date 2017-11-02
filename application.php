<?php 
session_start();
 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin()) {
		header("Location: 404.html"); 
		exit();
	}
	$type="";
if (isset($_GET['type'])) {

	$type=$_GET['type'];
	if ($type=="tc") {
		$pagetitle = 'Apply For TC';
	}else if ($type=="other") {
		$pagetitle = 'Online Application';
	}
	 
}

?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?><h1 style="width: 751px; margin: 15px auto; color: rgb(0, 0, 0); font-size: 20px;">Write Your Application</h1>

		
		<form method="post" enctype="multipart/form-data">
			<div class="ins_table" style="width: 750px;margin: 31px auto;">
				<?php

				if ($type=="other") {
					echo '
<div style="color: rgb(0, 0, 0);font-size: 17px;float: left;margin: 4px 12px 0px 0px;">Subject: </div><input type="text" name="subject" class="ins_input" style="margin: 0 0 18px 0;">

					';
				}

				?>
				<input type="submit" name="submit" class="ins_info_submit" Value="Sand" style="margin: -62px 650px 0px; height: 40px; border: medium none; width: 93px;">
				<textarea name="application_body"  cols="100" rows="30"></textarea>
					
		</form>
		</div>

		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
		<div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {

		if ($type=="other") {
		
		$subject = $_POST['subject'];
		}else $subject="TC";
		
		$body = $_POST['application_body'];
		$user_name = getfield('fld1');
		$user_id = getfield('fld2');

		$sql = "INSERT INTO `application` (`app_id`, `app_subject`, `student_id`, `student_name`, `app_type`, `app_body`, `app_stats`) VALUES (NULL, '$subject', '$user_id', '$user_name', '$type', '$body', '10')";

		$sql_run = mysqli_query($con, $sql);

		if ($sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('application.php?type=$type','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('application.php?type=$type','_self')</script>";
		}
	}
?>