<?php 
session_start();
 $pagetitle = 'SMS Config'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
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
			<table style="width: 80%; margin: 104px auto;">	
				<tr>
					<td style="font-size: 20px;">Username</td>
					<td style="font-size: 20px;">Password</td>
					<td style="font-size: 20px;">Sender</td>
				</tr>

				<?php
					$sql="SELECT * FROM `sms_config` WHERE `id` = 1";
					$sql_run = mysqli_query($con, $sql);
					$sql_get=mysqli_fetch_array($sql_run);
						$username = $sql_get['username'];
						$pass = $sql_get['pass'];
						$sender = $sql_get['sender'];
				?>
				<tr>
					<form method="post" enctype="multipart/form-data">
						<td>
							<input  type="text" name="username" value="<?php echo $username;?>" class="ins_input_sm" style="width: 94%;" required>
						</td>
						<td>
							<input  type="text" name="pass" value="<?php echo $pass;?>" class="ins_input_sm" style="width: 94%;" required>
						</td>
						<td>
							<input  type="text" name="sender" value="<?php echo $sender;?>" class="ins_input_sm" style="width: 94%;" required>
						</td>
						<td><input type="submit" name="submit" style="left:0%;top:0%;width: 100%;" class="submit_sm" Value="Save Changes"> </td>
					</form>
				</tr>
			</table>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$sender = $_POST['sender'];


		$csql="UPDATE `sms_config` SET `username` = '$username', `pass` = '$pass', `sender` = '$sender' WHERE `sms_config`.`id` = 1";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>