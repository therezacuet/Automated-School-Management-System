<?php 
session_start();
 $pagetitle = 'Send Birth Day SMS'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'sms'";
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
			<h2>Birth Day SMS</h2>
			<form method="post" enctype="multipart/form-data">
				<table style="width: 80%; margin: 20px auto;">
<!-- 					<tr>
						<td style="font-size: 24px;"></td>
						<td>
							Dear Name,
						</td>
					</tr> -->
					<?php
						$sql = "SELECT * FROM `birth_sms` ";
						$sql_run = mysqli_query($con, $sql);
						$sql_get=mysqli_fetch_array($sql_run);
							$sms = $sql_get['sms'];
					?>
					<tr>
						<td style="font-size: 24px;">Message</td>
						<td><textarea type="text" name="gsms" id="sms1" class="ins_input_sm" style="width: 94%; height: 181px; margin: 10px 0px 0px;" maxlength="160" required><?php echo $sms?></textarea>   </td>
					</tr>
					<tr>
						<td></td>
						<td><div id="textarea_feedback"></div> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit2" style="left:0%;top:0%;width: 50%;margin: 26px 0px 0px;" class="submit_sm" Value="Sand"</td>
					</tr>
				</table>
			</form>
		</div>
		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<script >
			$(document).ready(function(){
				var text_max = 160;
				$('#textarea_feedback').html(text_max +'/160');
				$('#sms1').keyup(function(){
					var text_length = $('#sms1').val().length;
					var text_remaining = text_max - text_length;

					$('#textarea_feedback').html(text_remaining +'/160')
				}); 
			});

		</script>
	</body>
<html>
<?php
	if (isset($_POST['submit2'])) {

		$sms = $_POST['gsms'];

		$allnum=" ";$number=" ";
		$birth_day = substr(date("m/d/Y"), 0, 5);

		$sql2 = "UPDATE `birth_sms` SET `sms` = '$sms' WHERE `birth_sms`.`id` = 1";
		$sql2_run = mysqli_query($con, $sql2);
			$sql = "SELECT * FROM `student` WHERE `fld9` like '$birth_day%'";
			$sql_run = mysqli_query($con, $sql);
			while ($sql_get=mysqli_fetch_array($sql_run)) {
				$num = $sql_get['fld7'];
				sendShortSMS($sms, $num);
			}
	echo "<script>window.open('send_birth_day_sms.php','_self')</script>";
}
	
?>