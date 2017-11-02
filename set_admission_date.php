<?php 
session_start();
 $pagetitle = 'Set Admission Date'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'add'";
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

	$ssql = "SELECT * FROM `admission_date` ";
	$ssql_get = mysqli_query($con, $ssql);
	$ssql_run = mysqli_fetch_array($ssql_get);
	$admission_date = $ssql_run['admission_date'];
	$admission_time = $ssql_run['admission_time'];
	$adminoption_t = $ssql_run['admission_t&c'];
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
						<td class="ins_td">Date of Admission</td>
						<td><input value= "<?php if(isset($admission_date)){ echo $admission_date;}?>" type="text" name="admission_date" class="ins_input" required></td>
					</tr>
					<tr>
						<td class="ins_td">Time of Admission</td>
						<td><input value= "<?php if(isset($admission_time)){ echo $admission_time;}?>" type="text" name="admission_time" class="ins_input" required></td>
					</tr> 
					<tr>
						<td class="ins_td">Terms and conditions</td>
						<td><textarea name="adminoption_t"><?php if(isset($adminoption_t)){ echo $adminoption_t;}?></textarea></td>
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
		$admission_date = $_POST['admission_date'];
		$admission_time = $_POST['admission_time'];
		$adminoption_t = $_POST['adminoption_t'];

		$notice_sql = "UPDATE `admission_date` SET `admission_date` = '$admission_date', `admission_time` = '$admission_time', `admission_t&c` = '$adminoption_t' WHERE `admission_date`.`admission_id` = 1";

		$run_notice_sql = mysqli_query($con, $notice_sql);

		if($run_notice_sql){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('set_admission_date.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('set_admission_date.php','_self')</script>";
		}
	}
?>
