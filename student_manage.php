<?php 
session_start();
 $pagetitle = 'Manage Student'; 
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
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
	if (isset($_GET['student'])) {
		$student_id = $_GET['student'];
	}	

	$sql4="SELECT * FROM `student`  WHERE `student`.`student_id` = '$student_id'";
	$sql4_run = mysqli_query($con, $sql4);
	$sql4_get=mysqli_fetch_array($sql4_run);

	$class = $sql4_get['class'];
	$group = $sql4_get['class_group'];
	$id = $sql4_get['fld2'];

$option="";

		$ccsql="SELECT * FROM `subject` WHERE `class`='$class' AND `class_group`='$group' AND `type` = 0";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$sub_name = $ccsql_get['sub_name'];
				$option.= "<option>".$sub_name."</option>";
			}



?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area" style="position: relative;">
			<h1 style="font-size: 21px; padding: 0px 0px 0px 10px;">Assign Main and Optional subject</h1>
			<table style="margin: 0px 0px 0px 237px;">
				<form method="post" enctype="multipart/form-data">
				<tr>
					<td>Main Subject</td>
					<td>:<select name="main" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										<option>Chosse a subject</option>
										<?php echo $option;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Optional Subject</td>
					<td>:<select name="optional" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										
										<option>Chosse a subject</option>
										<?php echo $option;?>
						</select></td>
				</tr>
				<tr>
					<td>Class</td>
					<td>:<select name="class" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										<option>Choose a Class</option>
										<?php getClass();?>
						</select>
					</td>
				</tr>
					<input  class="submit_xsm" style="top: 103px;left: 705px;position: absolute; width: 96px; height: 35px;" type="submit" name="submit3" value="Update">
				</form>
			</table>
		</div>
		<div class="admin_area" style="position: relative;">
		<form method="post" enctype="multipart/form-data">
		<h2 style="font-size: 21px; padding: 0px 0px 0px 10px;">Upgrade Student:</h2>
			<table style="margin: 0px 0px 0px 296px;">
				<form method="post" enctype="multipart/form-data">
				<tr>
					<td>Class</td>
					<td>:<select name="class" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										<option>Choose a Class</option>
										<?php getClass();?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Scetion</td>
					<td>:<select name="section" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										
										<option>Choose a Section</option>
										<?php getSection();?>
						</select></td>
				</tr>
				<tr>
					<td>Group</td>
					<td>:<select name="group" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										
										<option>Choose a Group</option>
										<?php getGroup();?>
						</select>
					</td>
				</tr>

				<tr>
					<td>Shift</td>
					<td>:<select name="shift" class="ins_input_xsm" style="margin: 12px 13px 13px 13px;width: 167px;"required>
										
										<option>Choose a Shift</option>
										<?php getShift();?>
						</select></td>
				</tr>

				<input  class="submit_xsm" style="top: 127px;left: 705px;position: absolute; width: 96px; height: 35px;" type="submit" name="submit2" value="Update">
				</form>
			</table>
		</div>
	</body>
<html>

<?php
if (isset($_POST['submit2'])) {

	$class = $_POST['class'];
	$section = $_POST['section'];
	$group = $_POST['group'];
	$shift = $_POST['shift'];

	$sql3="UPDATE `student` SET `class` = '$class', `shift` = '$shift', `section` = '$section', `class_group` = '$group' WHERE `student`.`student_id` = '$student_id'";
	$sql3_run = mysqli_query($con, $sql3);

	if($sql3_run){
		echo "<script>alert('Successful!')</script>";
		echo "<script>window.open('students.php','_self')</script>";	
	}else{
		echo "<script>alert('Failed!')</script>";
	}
}


if (isset($_POST['submit3'])) {

	$main = $_POST['main'];
	$optional = $_POST['optional'];
	$class = $_POST['class'];

	$sql3="INSERT INTO `optional_subject` (`id`, `student_id`, `class`, `main`, `optional`) VALUES (NULL, '$id', '$class', '$main', '$optional')";
	$sql3_run = mysqli_query($con, $sql3);

	if($sql3_run){
		echo "<script>alert('Successful!')</script>";
		echo "<script>window.open('students.php','_self')</script>";	
	}else{
		echo "<script>alert('Failed!')</script>";
	}
}
?>