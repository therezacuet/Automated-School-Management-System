<?php 
session_start();
 $pagetitle = 'Manage Teacher'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'reg'";
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
	if (isset($_GET['teacher'])) {
		$teacher_id = $_GET['teacher'];
	}
	if (isset($_POST['submit'])) {
		$type = $_POST['type'];
		$sql = "UPDATE `teacher` SET `type` = '$type' WHERE `teacher`.`teacher_id` = '$teacher_id'";
		$sql_run = mysqli_query($con, $sql);
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
			<h2 style="float:left;margin: 5px 29px 0px 75px;">Teacher Type:</h2>
			<select class="ins_input_xsm" style="width: 167px; margin: 0px;" name="type">
				<option name="Govt.">Govt.</option>
				<option name="NON-Govt.">NON-Govt.</option>
			</select>
			<input  class="submit_xsm" style="top: 2px; left: 22px; width: 96px; height: 35px;" type="submit" name="submit" value="Update">
		</form>
		</div>
		<div class="admin_area" style="position: relative;">
			<h2 style="float:left;margin: 100px 75px;">Teacher Salary Sheet:</h2>
			<table>
				<form method="post" enctype="multipart/form-data">
				<tr>
					<td>Basic</td>
					<td>:<input type="text" name="basic" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"></td>
				</tr>
				<tr>
					<td>Medical</td>
					<td>:<input type="text" name="medical" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"></td>
				</tr>
				<tr>
					<td>Lunch</td>
					<td>:<input type="text" name="lunch" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"></td>
				</tr>

				<tr>
					<td>TADA</td>
					<td>:<input type="text" name="tada" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"></td>
				</tr>

				<input  class="submit_xsm" style="top: 100px;left: 705px;position: absolute; width: 96px; height: 35px;" type="submit" name="submit2" value="Update">
				</form>
			</table>	
		</div>
	</body>
<html>

<?php
if (isset($_POST['submit2'])) {
	$basic = $_POST['basic'];
	$huse_rent = $basic * 0.4;
	$provident = $basic * 0.04;
	$kollan = $basic * 0.02;
	$medical = $_POST['medical'];
	$lunch = $_POST['lunch'];
	$tada = $_POST['tada'];
 	
 	$sql2 = "SELECT * FROM `teacher` Where `teacher_id` = '$teacher_id' ";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get = mysqli_fetch_array($sql2_run);
	$type = $sql2_get['type'];
	if ($type == "Govt.") {
		$total = $basic+$huse_rent+$provident+$kollan+$medical+$lunch+$tada;
	}else if ($type = "NON-Govt.") {
		$total = $basic+$huse_rent-$provident-$kollan+$medical+$lunch+$tada;
	}
		
	

	$sql3="UPDATE `salary` SET `basic` = '$basic', `huse_rent` = '$huse_rent', `provident` = '$provident', `kollan` = '$kollan', `medical` = '$medical', `lunch` = '$lunch', `tada` = '$tada', `total_salary` = '$total' WHERE `salary`.`teacher_id` = '$teacher_id'" ;
	$sql3_run = mysqli_query($con, $sql3);
	if($sql3_run){
		echo "<script>alert('Successful!')</script>";
		echo "<script>window.open('teachers.php','_self')</script>";
	}else{
		echo "<script>alert('Failed!')</script>";
	}
}

?>