<?php 
session_start();
 $pagetitle = 'Student Due'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'acc'";
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
			<table style="width: 88%; margin: 10px auto;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Student ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">No. of month due</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Month name(s)</th>
				</tr>
			
			<?php
			$i = 1;
				$sql="SELECT * FROM `due` ORDER BY `due`.`month_no` DESC";
			 	$sql_run = mysqli_query($con, $sql);
			 	while ($sql_get = mysqli_fetch_array($sql_run)) {
			 		$id = $sql_get['student_id'];
			 		$month_no = $sql_get['month_no'];
			 		$month_name = $sql_get['month_name'];

			 		?>
			 			<tr style="border: 1px solid #A5A5A5;text-align: center;">
			 				<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i ; ?></td>
			 				<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $id ; ?></td>
			 				<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $month_no ; ?></td>
			 				<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $month_name ; ?></td>
			 			</tr>
			 		<?php
			 		$i++;
			 	}
			?>
		</table>
		</div>
	</body>
<html>