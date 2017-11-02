<?php 
session_start();
 $pagetitle = 'Publish result'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'ex'";
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

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
				<div style="width: 951px;margin: 108px auto;;">
					<table>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Student ID</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Exam type</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Class</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Group</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Year</td>
							
						</tr>

						<tr>
							<td>
								<input  type="text" name="field1" class="ins_input_xsm" style="width: 157px;" placeholder="Enter Student ID" required>

							</td>
							<td>
								<select type="text" name="field2" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Exam type</option>
										<?php getExamtype();?>
								</select>
							</td>
							<td>
								<select type="text" name="field3" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Class</option>
										<?php getClass();?>
								</select>
							</td>
							<td>
								<select type="text" name="field4" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Group</option>
										<?php getGroup();?>
								</select>
							</td>
							<td>
								<input  type="text" name="field5" class="ins_input_xsm" style="width: 157px;" placeholder="Year" required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit"  style="width: 114px;height: 36px;background: #3972B5;position: relative;left: 848px;top: -36px;border-radius: 5px;color: white;font-size: 19px;border: none;" Value="Go">
				</div>
			</form>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		$field1 =$_POST['field1'];
		$field2 =$_POST['field2'];
		$field3 =$_POST['field3'];
		$field4 =$_POST['field4'];
		$field5 =$_POST['field5'];

		echo "<script>window.open('mark.php?id=$field1&exam=$field2&class=$field3&group=$field4&year=$field5','_self')</script>";
	}
?>