<?php 
session_start();
$pagetitle = 'Forgot Password'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");

	if (isset($_POST['submit'])) {
		$type = $_POST['type'];
		$email = $_POST['email'];
		$pass=substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 9);
		$passhash = md5($pass);

		if ($type=="student") {
			$sql = "SELECT * FROM `student` WHERE `fld4` ='$email'";
			$sql2 = "SELECT * FROM `forgot_pass` WHERE `type` = 'student'";
		}elseif ($type == "teacher") {
			$sql = "SELECT * FROM `teacher` WHERE `tld6` ='$email'";
			$sql2 = "SELECT * FROM `forgot_pass` WHERE `type` = 'teacher'";
		}

		$run_sql_reg = mysqli_query($con, $sql);
        $sql_reg_num_rows=mysqli_num_rows($run_sql_reg);

        $run_sql2_reg = mysqli_query($con, $sql2);
        $sql2_reg_num_rows=mysqli_num_rows($run_sql2_reg);

        if ($sql2_reg_num_rows > 0) {
        	$del = "DELETE FROM `forgot_pass` WHERE `forgot_pass`.`email` = '$email' AND `type`= '$type'";
        	mysqli_query($con, $del);
        }
          if($sql_reg_num_rows==1){
          	$sql = "INSERT INTO `forgot_pass` (`id`, `email`, `pass`, `type`) VALUES (NULL, '$email', '$passhash', '$type')";
          	$run_sql = mysqli_query($con, $sql);
          	if ($run_sql) {
          		//EMAIL----------------------------------------
          		$sql = "SELECT `ins_web_link` FROM `institute_info` ";
          		$run_sql = mysqli_query($con, $sql);
          		$get = mysqli_fetch_array($run_sql);
          		$site = $get['ins_web_link'];

          		$to = "$email";
				$from = "School";
				$headers ="From: $from\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
				$subject ="Forgot Password";
				if ($type=="student") {
				$msg = '<h2>Hello </h2><p>This is an automated message from School website. If you did not recently initiate the Forgot Password process, please disregard this email.</p><p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p><p>After you click the link below your password to login will be:<br /><b>'.$pass.'</b></p><p><a href="'.$site.'/forgot_login.php?type=student">Click here now to apply the temporary password shown below to your account</a></p><p>If you do not click the link in this email, no changes will be made to your account. In order to set your login password to the temporary password you must click the link above.</p>';
				}elseif ($type == "teacher") {
				$msg = '<h2>Hello </h2><p>This is an automated message from School website. If you did not recently initiate the Forgot Password process, please disregard this email.</p><p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p><p>After you click the link below your password to login will be:<br /><b>'.$pass.'</b></p><p><a href="'.$site.'/forgot_login.php?type=teacher">Click here now to apply the temporary password shown below to your account</a></p><p>If you do not click the link in this email, no changes will be made to your account. In order to set your login password to the temporary password you must click the link above.</p>';
				}
				if(mail($to,$subject,$msg,$headers)) {
					echo "<script>alert('Check your mail box. A password will be sand to your mail in a few seconds.')</script>";
					exit();
				} else {
					echo "<script>alert('Failed! Please try again leter.')</script>";
					exit();
				}


          		



			}else{
				echo "<script>alert('Failed! Please try again leter.')</script>";
			}
          }else{
          	echo "<script>alert('The E-mail: ".$email." is not registered')</script>";
          }
        	
     

	}
?>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">

			<div>
				<table style="width: 50%; margin: 30px auto 0px;">
				<form method="post" enctype="multipart/form-data">
					<tr>
						<td class="ins_td_sm" style="width: 50%;">
							Select your type:
						</td>
						<td style="width: 75%;">
							<select class="ins_input_sm" name="type" style="width: 100%;" required>
								<option value="student">Student</option>
								<option value="teacher">Teacher</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="ins_td_sm" style="width: 50%;">Your email:</td>
						<td style="width: 75%;"><input type="email" name="email" class="ins_input_sm" style="width: 100%;" required> </td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Submit" style="left:0%; top: 0px;margin: 22px 0px 20px;" class="submit_sm" required> </td>
					</tr>
				</form>
				</table>
			</div>
		</div>
	</body>
<html>