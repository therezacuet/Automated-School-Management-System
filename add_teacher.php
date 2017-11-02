<?php 
session_start();
 $pagetitle = 'All Teacher'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
';
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
	if (isset($_POST['submit'])) {
		$teacher_id = $_POST['teacher_id'];
		$type = $_POST['type'];
		$sql = "UPDATE `teacher` SET `type` = '$type' WHERE `teacher`.`teacher_id` = '$teacher_id'";
		$sql_run = mysqli_query($con, $sql);
	}
?>


<html>
	<?php include("head.php");?>
	<style>
      
    </style>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 1000px;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 50px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 111px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 200px;">Type</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 121px;">Add</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `teacher` Where `type`='unkown' ";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {
						$id = $sql_get['tld2']; 
						$name = $sql_get['tld1']; 
						$teacher_id = $sql_get['teacher_id']; 
						?>
						<form method="POST" enctype="multipart/form-data">
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<input type="hidden" name="teacher_id" value="<?php echo $teacher_id;?>">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<select class="ins_input_xsm" style="width: 167px; margin: 0px;" name="type">
									<option name="Govt.">Govt.</option>
									<option name="NON-Govt.">NON-Govt.</option>
								</select>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><input  class="submit_xsm" style="top: 0px; left: 0px; width: 95px; height: 30px;" type="submit" name="submit" value="Add"></td>
						</tr>

						</form>
						<?php
						$i++;
					}
				?>

			</table>
		</div>
	</body>
<html>

