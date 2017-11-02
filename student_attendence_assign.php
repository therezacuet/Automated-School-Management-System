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


if (isset($_GET['student_attendence_class']) && !empty($_GET['student_attendence_class']) && isset($_GET['year']) && !empty($_GET['year']) && isset($_GET['month']) && !empty($_GET['month']) && isset($_GET['day']) && !empty($_GET['day']) ) {
	$class=$_GET['student_attendence_class'];
	$year=$_GET['year'];
	$month=$_GET['month'];
	$day=$_GET['day'];
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
			<h2 style="margin: 0px 0px 26px;">Attendence for class: <b><?php echo $class;?></b>  &nbsp;&nbsp; Date: <b><?php echo $day."/".$month."/".$year;?></b> </h2>
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width:15%">id</th>
					<th style="border: 1px solid #A5A5A5;text-align: center">Nmae</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width:12%">Present</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width:12%">Absent</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `attendence_temp`; ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$student_id = $ccsql_get['student_id'];
						$name = $ccsql_get['name'];
						$mob = $ccsql_get['mob'];

						?>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $student_id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:10px"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href="<?php echo $current_file;?>?student_present=<?php echo $id;?>&mob=<?php echo $mob;?>&student_id=<?php echo $student_id;?>&student_attendence_class=<?php echo $class;?>&year=<?php echo $year;?>&month=<?php echo $month;?>&day=<?php echo $day;?>" style="color: rgb(255, 255, 255); background: green none repeat scroll 0% 0%; padding: 7px 15px; border-radius: 4px;">Present</a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href="<?php echo $current_file;?>?student_absent=<?php echo $id;?>&mob=<?php echo $mob;?>&student_id=<?php echo $student_id;?>&student_attendence_class=<?php echo $class;?>&year=<?php echo $year;?>&month=<?php echo $month;?>&day=<?php echo $day;?>" style="color: rgb(255, 255, 255); background: red none repeat scroll 0% 0%; padding: 7px 15px; border-radius: 4px;">Absent</a></td>
						<?php
					}
					?>
		</div>
	</body>
<html>
<?php
	if (isset($_POST['submit'])) {
		$class = $_POST['class'];

		echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."','_self')</script>";
	}
	
?> 
<?php
	if (isset($_GET['student_present'])) {
		$id = $_GET['student_present'];
		$student_id = $_GET['student_id'];

			$class=$_GET['student_attendence_class'];
			$year=$_GET['year'];
			$month=$_GET['month'];
			$day=$_GET['day'];
			$mob=$_GET['mob'];

		$sms = "You are PRESENT today.";
		sendShortSMS($sms,$mob);

		$sql = "INSERT INTO `student_attendence` (`id`, `student_id`, `year`, `month`, `day`, `p_or_a`) VALUES (NULL, '$student_id', '$year', '$month', '$day', '1')";
		$run_sql = mysqli_query($con, $sql);

		$not_sql="DELETE FROM `attendence_temp` WHERE `attendence_temp`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."&year=".$year."&month=".$month."&day=".$day."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."&year=".$year."&month=".$month."&day=".$day."','_self')</script>";
		}
	}
	
?>

<?php
	if (isset($_GET['student_absent'])) {
		$id = $_GET['student_absent'];
		$student_id = $_GET['student_id'];
		if (isset($_GET['student_attendence_class']) && !empty($_GET['student_attendence_class']) && isset($_GET['year']) && !empty($_GET['year']) && isset($_GET['month']) && !empty($_GET['month']) && isset($_GET['day']) && !empty($_GET['day']) ) {
			$class=$_GET['student_attendence_class'];
			$year=$_GET['year'];
			$month=$_GET['month'];
			$day=$_GET['day'];
			$mob=$_GET['mob'];
		}


		$sms = "You are ABSENT today.";
		sendShortSMS($sms,$mob);

		$sql = "INSERT INTO `student_attendence` (`id`, `student_id`, `year`, `month`, `day`, `p_or_a`) VALUES (NULL, '$student_id', '$year', '$month', '$day', '0')";
		$run_sql = mysqli_query($con, $sql);

		$not_sql="DELETE FROM `attendence_temp` WHERE `attendence_temp`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."&year=".$year."&month=".$month."&day=".$day."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('student_attendence_assign.php?student_attendence_class=".$class."&year=".$year."&month=".$month."&day=".$day."','_self')</script>";
		}
	}
	
?>