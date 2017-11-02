<?php 
session_start();
 $pagetitle = 'Add/Delete SMS group contact'; 
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
	if (isset($_GET['sms_group']) && !empty($_GET['sms_group'])) {
		$sms_group = $_GET['sms_group'];
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
				<div style="width: 56%; margin: 0px 0px 0px 14%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 20%;">Add Contact:</td>
							<td style="width: 20%;">
								<input  type="text" name="name" class="ins_input_sm" style="width: 100%;" placeholder="name" required>
							</td>
							<td class="ins_td_sm" style="width: 1%;">+880</td>
							<td style="width: 20%;">
								<input  type="text" name="contact" class="ins_input_sm" style="width: 100%;" placeholder="Contact no." required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit" style="left:103%; top: -46px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Contact no.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `sms_group_contact` WHERE `sms_group` = '$sms_group'";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$name = $ccsql_get['name'];
						$contact = $ccsql_get['contact'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px;width:10%"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo "+".$contact;?></td>

							<td style="border: 1px solid #A5A5A5;text-align: center;width:10%"><a href='<?php echo $current_file;?>?contact_delete=<?php echo $id;?>&sms_group=<?php echo $sms_group;?>'><img class="icon" src="image/delete.png"></a></td>
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
		
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$contact = "880".$contact;


		$csql="INSERT INTO `sms_group_contact` (`id`, `name`, `contact`, `sms_group`) VALUES (NULL, '$name', '$contact', '$sms_group')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."?sms_group=".$sms_group."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['contact_delete'])){
		$id=$_GET['contact_delete'];
		$sms_group=$_GET['sms_group'];

		$not_sql="DELETE FROM `sms_group_contact` WHERE `sms_group_contact`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."?sms_group=".$sms_group."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>