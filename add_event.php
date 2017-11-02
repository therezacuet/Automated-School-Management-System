<?php 
session_start();
 $pagetitle = 'Add/Delete Event'; 
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>
<style>
.input_xsm{
height: 35px;
border: 2px solid #0081F3;
border-radius: 4px;
width: 56px;
padding: 0 5px 0 5px;
font-size: 15px;
}

.submit {
	width: 80px;
	height: 36px;
	background: #3972B5;
	position: relative;
	left: 930px;
	top: -37px;
	border-radius: 5px;
	color: white;
	font-size: 19px;
	border: none;
}

.submit:hover {
background: #0E5E9F;
}

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">
			<form method="post" enctype="multipart/form-data">
				<div class="ins_table" style="width: 1000px;">
					<table>
						
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Date: &nbsp;&nbsp;&nbsp;</td>
							<td>
								<input  type="text" name="field1" class="input_xsm" placeholder="Day" required>

							</td>
							<td style="font-size:18px;color:#000; font-weight:bold;padding: 0px 5px;">-</td>
							<td>
								<input  type="text" name="field2" class="input_xsm" placeholder="Month" required>
							</td>
							<td style="font-size:18px;color:#000; font-weight:bold;padding: 0px 5px;">-</td>
							<td>
								<input  type="text" name="field3" class="input_xsm" placeholder="Year" required>
							</td>
							<td style="font-size:18px;color:#000; font-weight:bold">&nbsp;&nbsp;&nbsp;Time(in 24 Hour): &nbsp;&nbsp;&nbsp;</td>
							<td>
							<td>
								<input  type="text" name="field4" class="input_xsm" placeholder="Time" required>
							</td>
							<td style="font-size:18px;color:#000; font-weight:bold">&nbsp;&nbsp;&nbsp;Description: &nbsp;&nbsp;&nbsp;</td>
							<td>
								<input  type="text" name="field5" class="input_xsm" style="width: 308px;" placeholder="Description" required>
							</td>
						</tr>
					</table>


						<input type="submit" name="head_info_submit"  class="submit" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Date</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Time</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `event` ORDER BY `event`.`event_id` DESC";
					$ccsql_run = mysqli_query($con, $ccsql);

					
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$event_id = $ccsql_get['event_id'];
						$event_description = $ccsql_get['event_description'];
						$event_year = $ccsql_get['event_year'];
						$event_month = $ccsql_get['event_month'] + 1;
						$event_day = $ccsql_get['event_day'];
						$event_hour = $ccsql_get['event_hour'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $event_day." - ".$event_month." - ".$event_year;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $event_hour;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $event_description;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='add_event.php?event_delete=<?php echo $event_id;?>'><img class="delete_icon" src="image/delete.png"></a></td>
						</tr>


						<?php
					}

					
				?>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['head_info_submit'])) {
		
		$day = $_POST['field1'];
		$month = $_POST['field2'] - 1;
		$year = $_POST['field3'];
		$Time = $_POST['field4'];
		$description = $_POST['field5'];

		$csql="INSERT INTO `event` (`event_id`, `event_description`, `event_year`, `event_month`, `event_day`, `event_hour`) VALUES (NULL, '$description', '$year', '$month', '$day', '$Time')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('add_event.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('add_event.php','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['event_delete'])){
		$cls_id=$_GET['event_delete'];

		$not_sql="DELETE FROM `event` WHERE `event`.`event_id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('add_event.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('add_event.php','_self')</script>";
		}
	}
?>