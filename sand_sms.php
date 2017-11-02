<?php 
session_start();
 $pagetitle = 'SMS Config'; 
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
<table style="width: 100%;">
		<td style="border-right:1px solid #000">
			<h2>Single SMS</h2>
			<form method="post" enctype="multipart/form-data">
				<table style="width: 80%; margin: 20px auto;">
					<tr>
						<td style="font-size: 24px;">Number</td>
						<td><input  type="text" name="num" class="ins_input_sm" style="width: 94%;" placeholder="eg. 8801682121272" required> </td>
					</tr>
					<tr>
						<td style="font-size: 24px;">Message</td>
						<td><textarea type="text" name="sms" id="sms1" class="ins_input_sm" style="width: 94%; height: 181px; margin: 10px 0px 0px;" maxlength="160" required></textarea>   </td>
					</tr>
					<tr>
						<td></td>
						<td><div id="textarea1_feedback"></div> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" style="left:0%;top:0%;width: 50%;margin: 26px 0px 0px;" class="submit_sm" Value="Sand"</td>
					</tr>
				</table>
			</form>
		</td>
		<td style="padding-left:15px">	

			<h2>Group SMS</h2>
			<form method="post" enctype="multipart/form-data">
				<table style="width: 80%; margin: 20px auto;">
					<tr>
						<td style="font-size: 24px;">Group</td>
						<td>
							<select  name="gnum" class="ins_input_sm" style="width: 94%;" >
								<option value="S">All Student</option>
								<option value="T">All Teacher</option>
								<?php getSMSGroup();?>

							</select>
						</td>
					</tr>
					<tr>
						<td style="font-size: 24px;">Message</td>
						<td><textarea type="text" name="gsms" id="sms2" class="ins_input_sm" style="width: 94%; height: 181px; margin: 10px 0px 0px;" maxlength="160" required></textarea>   </td>
					</tr>
					<tr>
						<td></td>
						<td><div id="textarea2_feedback"></div> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit2" style="left:0%;top:0%;width: 50%;margin: 26px 0px 0px;" class="submit_sm" Value="Sand"</td>
					</tr>
				</table>
			</form>
		</td>
</table>
		</div>



		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<script >
			$(document).ready(function(){
				var text_max = 160;
				$('#textarea1_feedback').html(text_max +'/160');
				$('#sms1').keyup(function(){
					var text_length = $('#sms1').val().length;
					var text_remaining = text_max - text_length;

					$('#textarea1_feedback').html(text_remaining +'/160')
				}); 
			});

		</script>

		<script >
			$(document).ready(function(){
				var text_max = 160;
				$('#textarea2_feedback').html(text_max +'/160');
				$('#sms2').keyup(function(){
					var text_length = $('#sms2').val().length;
					var text_remaining = text_max - text_length;

					$('#textarea2_feedback').html(text_remaining +'/160')
				}); 
			});

		</script>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {

		$num = $_POST['num'];
		$sms = $_POST['sms'];

		sendShortSMS($sms,$num);
		
	}


	if (isset($_POST['submit2'])) {

		$sms = $_POST['gsms'];
		$num = $_POST['gnum'];
		$allnum=" ";$number=" ";
		if ($num=="S") {
			$sql = "SELECT * FROM `student` ";
			$sql_run = mysqli_query($con, $sql);
			while ($sql_get=mysqli_fetch_array($sql_run)) {
				$num = $sql_get['fld7'];
				sendShortSMS($sms, $num);
			}
		}else if ($num=="T"){
			$sql = "SELECT * FROM `teacher` ";
			$sql_run = mysqli_query($con, $sql);
			while ($sql_get=mysqli_fetch_array($sql_run)) {
				$num = $sql_get['tld9'];
				sendShortSMS($sms, $num);
				 
			}
		}else{
			$sql = "SELECT * FROM `sms_group_contact` WHERE `sms_group`= '$num' ";
			$sql_run = mysqli_query($con, $sql);
			while ($sql_get=mysqli_fetch_array($sql_run)) {
				$num = $sql_get['contact'];
				sendShortSMS($sms, $num);
			}
		}

		
	}
	
?>