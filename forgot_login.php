<?php 
/*NYDMWSPVC*/
session_start();
 $pagetitle = 'Forgot Login'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (isset($_GET['type']) && !empty($_GET['type'])) {
		$type = $_GET['type'];
	}
	$error = "";
	if(isset($_POST['submit'])){
		if (isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			if(!empty($username) && !empty($password)){
				$query = "SELECT * FROM `forgot_pass` WHERE `email`='$username' AND `pass`='$password_hash'";
				$run_quert = mysqli_query($con, $query);
				$query_num_rows=mysqli_num_rows($run_quert);
				if($query_num_rows==0){
					$error= "Invalid username/password combination";
				}else if($query_num_rows==1){

					if ($type=="student") {
						$sql = "SELECT * FROM `student` WHERE `fld4` ='$username'";
					}elseif ($type == "teacher") {
						$sql = "SELECT * FROM `teacher` WHERE `tld6` ='$username'";
					}
					$run_sql_reg = mysqli_query($con, $sql);

					$user = mysqli_fetch_array($run_sql_reg);

					if ($type=="student") {
						$user_id = $user['student_id'];
						$_SESSION['student_id'] = $user_id;

						$sql = "UPDATE `student` SET `fld5` = '$password_hash' WHERE `student`.`student_id` = '$user_id'";
						mysqli_query($con, $sql);
						echo "<script>alert('s".$user_id."')</script>";
						header('Location: student_profile.php');
					}elseif ($type == "teacher") {
						$user_id = $user['teacher_id'];
						$_SESSION['teacher_id'] = $user_id;

						$sql = "UPDATE `teacher` SET `tld7` = '$password_hash' WHERE `teacher`.`teacher_id` = '$user_id'";
						mysqli_query($con, $sql);
						echo "<script>alert('t".$user_id."')</script>";
						header('Location: teacher_profile.php');
					}
				}
			}else{
				$error =  "You must supply a username and password";
				
			}
		}
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="admin_area">
			<h2 style="color: red; height: 26px; text-align: center;"><?php echo $error;?></h2>
			<table style="width: 50%; margin: 30px auto 0px;">
				<form method="post" enctype="multipart/form-data">

					<tr>
						<td class="ins_td_sm" style="width: 50%;">E-mail:</td>
						<td style="width: 75%;">
							<input  type="text" name="username" class="ins_input_sm" style="width: 100%;" required>
						</td>
					</tr>
					<tr>
						<td class="ins_td_sm" style="width: 50%;">Password:</td>
						<td style="width: 75%;">
							<input  type="password" name="password" class="ins_input_sm" style="width: 100%;" required>
						</td>
					</tr>
					<tr>
						<td class="ins_td_sm" style="width: 25%;"></td>
						<td style="width: 75%;">
							<input type="submit" name="submit" style="left:0%; top: 0px;margin: 22px 0px 20px;" class="submit_sm" Value="Login">
						</td>
					</tr>
				</form>


			</table>
	</div>
	</body>
<html>

