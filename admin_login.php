<?php 
session_start();
 $pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$error = "";
	if(isset($_POST['submit'])){
		if (isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			if(!empty($username) && !empty($password)){
				$query = "SELECT * FROM admin WHERE `username`='$username' AND `pass`='$password_hash'";
				$run_quert = mysqli_query($con, $query);
				$query_num_rows=mysqli_num_rows($run_quert);
				if($query_num_rows==0){
					$error= "Invalid username/password combination";
				}else if($query_num_rows==1){
					$user = mysqli_fetch_array($run_quert);
					$user_id = $user['id'];
					$_SESSION['admin'] = $user_id;
					header('Location: adminoption.php');
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
						<td class="ins_td_sm" style="width: 50%;">Username:</td>
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

