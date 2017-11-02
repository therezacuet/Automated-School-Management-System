<?php 
session_start();
 $pagetitle = 'Update Institute info'; 
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
		if (!loggedin() || empty($_SESSION['teacher_id'])  || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
			<div class="ins_table">
				<table>
					<tr>
						<td class="ins_td">Historycal photo</td>
						<td><input type="file" name="head_pic" required ></td>
					</tr>

					<tr>
						<td class="ins_td">History</td>
						<td><textarea name="head_mess"></textarea></td>
					</tr>
				</table>


					<input type="submit" name="head_info_submit" class="ins_info_submit" Value="Update">
					

				
			</div>
		</form>
		</div>

		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</body>
<html>

<?php
	if (isset($_POST['head_info_submit'])) {
		$head_mess = $_POST['head_mess'];







				$file_name = $_FILES['head_pic']['name'];
				$file_tmp = $_FILES['head_pic']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/history/";
				$target = $target . $ran2.$ext;
				$field0=$ran2.$ext;
				

		
		

		$notice_sql = "UPDATE `institute_history` SET `hs_pic` = '$field0', `his_history` = '$head_mess' WHERE `institute_history`.`his_id` = 1";

		$run_notice_sql = mysqli_query($con, $notice_sql);

		if($run_notice_sql && move_uploaded_file($file_tmp, $target)){
			echo "<script>alert('Successful! File has been uploaded.')</script>";
			echo "<script>window.open('update_institute_history.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('update_institute_history.php','_self')</script>";
		}
	}
?>
