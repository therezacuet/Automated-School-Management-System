<?php  
session_start();
$pagetitle = 'Student Attendence'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'att'";
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

			<table style="width: 80%; margin: 99px auto;">

				<tr>
					<td><h2>Assign Attendence to Class</h2></td>
					<td><select type="text" name="class" class="ins_input_xsm" style="margin-left:10px;width: 97%;"required>
										<option>Choose a Class</option>
										<?php getClass();?>
								</select></td>
								<td>
								<select type="text" name="year" class="ins_input_xsm"style="margin-left:10px;width: 97%;" required>
										<?php 
											for ($i=date("Y"); $i <date("Y")+10 ; $i++) { 
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
								</select>
							</td>
							<td>
								<select type="text" name="month" class="ins_input_xsm"style="margin-left:10px;width: 97%;" required>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
											
								</select>
							</td>
							<td>
								<select type="text" name="day" class="ins_input_xsm" style="margin-left:10px;width: 97%;" required>
										<?php 
											for ($i=1; $i <32 ; $i++) { 
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
								</select>
							</td>
					<td><input type="submit" name="submit"  class="submit_xsm" Value="Go" style="left: 12%;top: 3px;"></td>
				</tr>
			</table>
			</form>
		</div>
	</body>
<html>
<?php
	if (isset($_POST['submit'])) {
		$class = $_POST['class'];
		$year= $_POST['year'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$sql1="TRUNCATE `attendence_temp`";
		$sql1_run = mysqli_query($con, $sql1);

		$sql2 = "SELECT * FROM `student` WHERE `class`= '$class' ORDER BY `fld2` ASC";

		$sql2_run = mysqli_query($con, $sql2);
			while ($sql2_get=mysqli_fetch_array($sql2_run)) {
				$id = $sql2_get['fld2'];
				$name = $sql2_get['fld1'];
				$mob = $sql2_get['fld7'];

				$sql3 = "INSERT INTO `attendence_temp` (`id`, `student_id`, `name`,`mob`) VALUES (NULL, '$id', '$name', '$mob')";
				$sql3_run = mysqli_query($con, $sql3);
			}


		echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."&year=".$year."&month=".$month."&day=".$day."','_self')</script>";
	}
	
?>