<?php 
session_start();
 $pagetitle = 'Update Headline'; 
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
						<td class="ins_td">Headline</td>
						<td><textarea name="head_mess" cols="50" rows="20"></textarea></td>
					</tr>
				</table>
					<input type="submit" name="head_info_submit" class="ins_info_submit" Value="Update">	
			</div>
		</form>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['head_info_submit'])) {
		$head_mess = $_POST['head_mess'];


		
		

		$notice_sql = "UPDATE `headline` SET `headline_text` = '$head_mess' WHERE `headline`.`headline_id` = 1";

		$run_notice_sql = mysqli_query($con, $notice_sql);

		if($run_notice_sql){
			echo "<script>alert('Successful! File has been uploaded.')</script>";
			echo "<script>window.open('update_headline.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('update_headline.php','_self')</script>";
		}
	}
?>
