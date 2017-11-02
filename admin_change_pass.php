<?php  
session_start();

$pagetitle = 'A institute name'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: 404.html"); 
		exit();
	}
	$error=" ";
	if(isset($_POST['change_pass_submit'])){
		$old_password = $_POST['old_password'];
		$oldpass_hash = md5($old_password);
		$new_password = $_POST['new_password'];
		$new_c_password = $_POST['new_c_password'];
		
		
		$admin=$_SESSION['admin'];
		$orginal_pass = "SELECT * FROM `admin` WHERE `id`='1'";
		$orginal_pass_run = mysqli_query($con, $orginal_pass);
		if($orginal_pass_run){
			while($orginal_pass_row = mysqli_fetch_array($orginal_pass_run)){
				$password = $orginal_pass_row['pass'];
				
			}
		}
		if($password == $oldpass_hash){
			if ($new_password==$new_c_password) {
				$newpass_hash = md5($new_password);
				$insert = "UPDATE `admin` SET `pass` = '$newpass_hash' WHERE `id`='1'";
				$insert_run = mysqli_query($con, $insert);
				if($insert_run){
					echo "<script>alert('successful! Password has been changed')</script>";
					echo "<script>window.open('index.php','_self')</script>";
				}else{
					echo "<script>alert('Failed! Try again leter')</script>";
					echo "<script>window.open('changepass.php','_self')</script>";
				}
			}else{
				$error = "Your new password does not match";
			}
		}else{
			$error = "Your old password is not currect";
		}
		
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="chagepass_body">
					<div class="chagepass_body2">
						<div class="student" style="width: 18%;">Change password</div>
						<div class="c_error"><?php echo $error;?></div>
						<form method="POST" >
							<table class="chagepass_table" style="width: 56%; margin: 0px auto;">

								<tr>
									<td class="cf">Old password</td>
									<td><input class="change_pass_filed" name="old_password" type="password"></td>
								</tr>
								<tr>
									<td class="cf">New password</td>
									<td><input class="change_pass_filed" name="new_password" type="password"></td>
								</tr>
								<tr>
									<td class="cf">Confirm New password</td>
									<td><input class="change_pass_filed" name="new_c_password" type="password"></td>
								</tr>
							</table>
							<input type="submit" name="change_pass_submit" style="margin: 3% 0px 0px 47%;" class="change_pass_submit" value="Submit">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>