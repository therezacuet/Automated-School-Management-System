<?php  
session_start();
$pagetitle = 'Add/Delete SMS group'; 
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
				<div style="width: 34%; margin: 0px 0px 0px 22%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 20%;">Add SMS Group:</td>
							<td style="width: 20%;">
								<input  type="text" name="group_name" class="ins_input_sm" style="width: 100%;" placeholder="Group name" required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit" style="left:103%; top: -46px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Group Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Manage</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `sms_group` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$group_name = $ccsql_get['group_name'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px;width:10%"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $group_name;?></td>

							<td style="border: 1px solid #A5A5A5;text-align: center;width:10%"><a href='sms_group_contact.php?sms_group=<?php echo $id;?>'><img class="icon" src="image/setting.png"></a></td>

							<td style="border: 1px solid #A5A5A5;text-align: center;width:10%"><a href='<?php echo $current_file;?>?sms_group_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>

		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$group_name = $_POST['group_name'];

		$csql="INSERT INTO `sms_group` (`id`, `group_name`) VALUES (NULL, '$group_name')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['sms_group_delete'])){
		$id=$_GET['sms_group_delete'];

		$not_sql="DELETE FROM `sms_group` WHERE `sms_group`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		$ccsql="SELECT * FROM `sms_group_contact` WHERE `sms_group` = '$id'";
		$ccsql_run = mysqli_query($con, $ccsql);
		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$cid = $ccsql_get['id'];
			$sql="DELETE FROM `sms_group_contact` WHERE `sms_group_contact`.`id` = '$cid'";
			$sql_run = mysqli_query($con, $sql);
		}
		
		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>