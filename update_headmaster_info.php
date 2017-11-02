<?php 
session_start();
 $pagetitle = 'Update Headmaster info'; 
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
						<td class="ins_td">Headmaster's photo</td>
						<td><input type="file" name="head_pic" required ></td>
					</tr>
					<tr>
						<td class="ins_td">Headmaster's name</td>
						<td><input type="text" class ="ins_input"  name="head_name" required ></td>
					</tr>
					<tr>
						<td class="ins_td">Headmaster's signature</td>
						<td><input type="file" name="head_sign" required ></td>
					</tr>

					<tr>
						<td class="ins_td">Headmaster's message</td>
						<td><textarea name="head_mess" rows="30"></textarea></td>
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
		$head_name = $_POST['head_name'];







				$file_name = $_FILES['head_pic']['name'];
				$file_tmp = $_FILES['head_pic']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/headmaster/";
				$target = $target . $ran2.$ext;
				$field0=$ran2.$ext;
				
				$file_name1 = $_FILES['head_sign']['name'];
				$file_tmp1 = $_FILES['head_sign']['tmp_name'];
				$ext = findexts ($file_name1) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = "s".$ran.".";  
				$target1 = "image/headmaster/";
				$target1 = $target1 . $ran2.$ext;
				$field1=$ran2.$ext;
		
		

		$notice_sql = "UPDATE `headmaster_info` SET `head_name` = '$head_name', `head_pic` = '$field0', `head_sign` = '$field1', `head_message` = '$head_mess' WHERE `headmaster_info`.`head_id` = 1";

		$run_notice_sql = mysqli_query($con, $notice_sql);

		if($run_notice_sql && move_uploaded_file($file_tmp, $target) && move_uploaded_file($file_tmp1, $target1)){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('update_headmaster_info.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('update_headmaster_info.php','_self')</script>";
		}
	}
?>
