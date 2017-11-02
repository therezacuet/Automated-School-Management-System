<?php 
session_start();
 $pagetitle = 'Messages'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
<link href="css/massage.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin()) {
		header("Location: 404.html"); 
		exit();
	}
	if(!empty($_SESSION['student_id'])){

		$user_id = $_SESSION['student_id'];
		$user_name = getfield('fld3');
	}else{
		$user_id = $_SESSION['teacher_id'];
		$user_name = getfield('tld5');
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					<?php 
					if(!empty($_SESSION['student_id'])){
						 getSM();
					}else{
						getTM();
					}
					?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2">
						<div class="message_option">
							<?php include 'message_title_bar.php';?>
						</div>
						<div class="start_new_conversation" style="overflow-y: scroll; height: 382px; overflow-x: hidden;">
							<?php 
								if(isset($_GET['user'])&&!empty($_GET['user'])){

									?>
									<form method="POST">
										<?php
										if (isset($_POST['massage_sent'])&&!empty($_POST['massage_box'])) {
											$reciver_id = $_GET['user'];
											$random_number = rand();
											$user_list_sql = "SELECT * from `member`";
											$user_list = mysqli_query($con, $user_list_sql);
											while ($user_list_run=mysqli_fetch_array($user_list)) {
												$user = $user_list_run['id'];
												$name = $user_list_run['name'];
												$type = $user_list_run['type'];
												$username = $user_list_run['user_name'];
												$message = $_POST['massage_box'];
												if($user_name==$username){
													$my_id=$user;
												}
													
											}
											$check_con_sql = "SELECT hash FROM massage_group WHERE (user_one='$my_id' AND user_two='$reciver_id') OR (user_one='$reciver_id' AND user_two='$my_id')";
											$check_con = mysqli_query($con, $check_con_sql);
											if(mysqli_num_rows($check_con)== 1){
												echo "<p>Conversation Already Started, Please chack Your conversations</p>";
											}else{
												$sql = "INSERT INTO massage_group VALUES('', '$my_id','$reciver_id','$random_number')";
												$sql2 = "INSERT INTO messages VALUES('','$random_number','$my_id','$message')";
												mysqli_query($con, $sql);
												mysqli_query($con, $sql2);
												echo "<p>conversation Started</p>";
											}
										}
										?>
										Enter Message: <br>
										<input type="text" class="message_text" name="massage_box"><br>
										<input type="submit" class="massage_sent" name="massage_sent" value="Send">
									</form>
									<?php
								}else{
									echo "<h2>Select User</h2><br>";
									$user_list_sql = "SELECT * from `member`";
									$user_list = mysqli_query($con, $user_list_sql);
									while ($user_list_run=mysqli_fetch_array($user_list)) {
										$user = $user_list_run['id'];
										$name = $user_list_run['name'];
										$select_pic = $user_list_run['pic'];
										$type = $user_list_run['type'];
										$username = $user_list_run['user_name'];
										if($type=='T'){
												$type = 'Teacher';
												$pic_path ="image/teacher/".$select_pic;
											}else if($type=='S'){
												$type='Student';
												$pic_path ="image/student/".$select_pic;
											}else if($type=='A'){
												$type='Admin';
												$pic_path ="image/admin/admin.png";
											}

										if($user_name!=$username){

											?>

											<div class="min_pro">
												<a href='sand.php?user=<?php echo $user;?>'><img class="min_pro_pic" src="<?php echo $pic_path;?>"></a>
												<div class="min_pro_name">
												   <a href='sand.php?user=<?php echo $user;?>'><?php echo $name;?></a><br>
												   <a href='sand.php?user=<?php echo $user;?>'><?php echo $type;?></a>
												</div>
											</div>
											<?php

										}
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>