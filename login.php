<?php 
session_start();
 $pagetitle = 'Login'; 
$extra ='<link href="css/login.css" rel="stylesheet" type="text/css"/>
		 <script src="js/jquery-1.10.2.js"></script>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$error = " " ;
	if(isset($_POST['student_login'])){
		if (isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			if(!empty($username) && !empty($password)){
				$query = "select * from student where fld3='$username' AND fld5='$password_hash'";
				$run_quert = mysqli_query($con, $query);
				$query_num_rows=mysqli_num_rows($run_quert);
				if($query_num_rows==0){
					$error= "Invalid username/password combination";
				}else if($query_num_rows==1){
					$user = mysqli_fetch_array($run_quert);
					$user_id = $user['student_id'];
					$_SESSION['student_id'] = $user_id;
					header('Location: index.php');
				}
			}else{
				$error =  "You must supply a username and password";
				
			}
		}
	}
	if(isset($_POST['teacher_login'])){
		if (isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password_hash = md5($password);
			if(!empty($username) && !empty($password)){
				$query = "select * from teacher where tld5='$username' AND tld7='$password_hash'";
				$run_quert = mysqli_query($con, $query);
				$query_num_rows=mysqli_num_rows($run_quert);
				if($query_num_rows==0){
					$error= "Invalid username/password combination";
				}else if($query_num_rows==1){
					$user = mysqli_fetch_array($run_quert);
					$user_id = $user['teacher_id'];
					$_SESSION['teacher_id'] = $user_id;
					header('Location: index.php');
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
		<div class="divider"></div>
		<div class="login_main fix">
			<div class="login_content border">
				<?php
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 2";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file2 = $ccsql_get['file'];
					$link2 = $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 3";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file3 = $ccsql_get['file'];
					$link3 = $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 4";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file4 = $ccsql_get['file'];
					$link4 = $ccsql_get['link'];

					
				?>

					<?php
					if ($file2 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link2?>"><img src="<?php echo 'image/ads/'.$file2;?>" style="position: absolute;left: 6px;top: 34px;"></a>
					<?php
					}
					?>
					<?php
					if ($file3 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link3?>"><img src="<?php echo 'image/ads/'.$file3;?>" style="left: 84%;position: absolute;top: 34px;"></a>
					<?php
					}
					?>
					<?php
					if ($file4 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link4?>"><img src="<?php echo 'image/ads/'.$file4;?>" style=" left: 16%;position: absolute;width: 67%;top: 445px;"></a>
					<?php
					}
					?>
				<h2>Account Login</h2>
				<div class="login_tab_panels">
					<ul class="tabs">
						<li rel='panel1' class="active">Student</li>
						<li rel='panel2'>Teacher</li>
					</ul>

					<div id="panel1" class="panel active">
						<div class="message warning">
							<form method="POST">
								<li>
									<input class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" type="text" name="username"><div class="user"></div>
								</li>
									<div class="clear"> </div>
								<li>
									<input value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" type="password" name="password"> <div class="lock"></div>
								</li>
								<div class="clear"> </div>
								<div class="submit">
									<input  value="Sign in" name="student_login" type="submit">
									<div class="clear">  </div>	
								</div>
								<h3><a href="forgotpass.php?type=student" class="for"> Forgot password?</a></h3>
							</form>
						</div>

					</div>


					<div id="panel2" class="panel">
						<div class="message warning">
							<form method="POST">
								<li>
									<input class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" type="text" name="username"><div class="user"></div>
								</li>
									<div class="clear"> </div>
								<li>
									<input value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" type="password" name="password"> <div class="lock"></div>
								</li>
								<div class="clear"> </div>
								<div class="submit">
									<input  value="Sign in" name="teacher_login" type="submit">
									<div class="clear">  </div>	
								</div>
								<h3><a href="forgotpass.php?type=teacher" class="for"> Forgot password?</a></h3>
					
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/tab.js"></script>
		
	</body>
<html>