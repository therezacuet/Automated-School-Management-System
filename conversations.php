<?php  
session_start();
$pagetitle = 'Messages'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
<link href="css/massage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/component.css" />
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
	$user_list_sql = "SELECT * from `member`";
	$user_list = mysqli_query($con, $user_list_sql);
	while ($user_list_run=mysqli_fetch_array($user_list)) {
		$user = $user_list_run['id'];
		$username = $user_list_run['user_name'];
		if($user_name==$username){
			$my_id=$user;
		}
			
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
						<div class="conversations_name">
							<div  id='div2'>
							<div class="conversations" id='div1'>
								<?php
									if(isset($_GET['hash']) && !empty($_GET['hash'])){
										$hash = $_GET['hash'];
										$_SESSION['hash'] = $_GET['hash'];
										?>


							</div>

							</div>

										<br>
											<div class="sent_box">
										<form method="POST" enctype="multipart/form-data" >
												<input type="file" name="fld0" id="file-1" class="inputfile inputfile-1" style="z-index: -14; position: relative; height: 0px;">
         										<label for="file-1" style="width: 103px; float: left; margin: -11px 0px 0px 80px; border-radius: 0px; padding: 10px 0px 11px 9px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 16px;">File&hellip;</span></label>	


												<textarea type="text" class="message_text" name="massage_box"></textarea><br>
												<input type="submit" class="massage_sent" name="massage_sent" value="Send">

										</form>
											</div>
										<?php
										if (isset($_POST['massage_sent']) && !empty($_POST['massage_box'])) {
											if(!empty($_FILES['fld0']['name'])){
												$file_name = $_FILES['fld0']['name'];
												$file_tmp = $_FILES['fld0']['tmp_name'];
												$ext = findexts ($file_name) ;  
												$ran = date("Ymd").time() ;  
												$ran2 = $ran.".";  
												$target = "image/msg_file/";
												$target = $target . $ran2.$ext;
												
												move_uploaded_file($file_tmp, $target);
												$new_message = '<a href='.$target.' style="font-weight: bold;text-decoration: underline;color: blue;">'.$_POST['massage_box'].'</a>';
												$new_message = mysqli_real_escape_string($con, $new_message);
											}else{
												$new_message = $_POST['massage_box'];
												
											}
											

											$user_list_sql = "SELECT * from `member`";
											$user_list = mysqli_query($con, $user_list_sql);
											while ($user_list_run=mysqli_fetch_array($user_list)) {
												$user = $user_list_run['id'];
												$username = $user_list_run['user_name'];
												if($user_name==$username){
													$my_id=$user;
												}
													
											}
											$mysqli_query_sql = "INSERT INTO messages VALUES('','$hash','$my_id','$new_message')";
											mysqli_query($con, $mysqli_query_sql);
											header('location: conversations.php?hash='.$hash);
										}
										?>
										<?php


									}else{
										$user_list_sql = "SELECT * from `member`";
										$user_list = mysqli_query($con, $user_list_sql);
										while ($user_list_run=mysqli_fetch_array($user_list)) {
											$user = $user_list_run['id'];
											$username = $user_list_run['user_name'];
											if($user_name==$username){
												$my_id=$user;
											}
												
										}
										echo "<h2>Select conversation:</h2>";
										$get_con_sql = "SELECT * FROM massage_group WHERE user_one = '$my_id' OR user_two='$my_id'";
										$get_con = mysqli_query($con, $get_con_sql);

										while ($get_con_run = mysqli_fetch_array($get_con)) {
											$hash = $get_con_run['hash'];
											$user_one = $get_con_run['user_one'];
											$user_two = $get_con_run['user_two'];

											if($user_one == $my_id){

												$select_id = $user_two;
											}else{
												$select_id = $user_one;
											}
											$user_get_sql = "SELECT * FROM member WHERE id = '$select_id'";
											$user_get = mysqli_query($con, $user_get_sql);
											$user_get_run = mysqli_fetch_array($user_get);
											$select_name = $user_get_run['name'];
											$select_pic = $user_get_run['pic'];
											$type = $user_get_run['type'];
											if($type=='T'){
												$type = 'Teacher';
												$pic_path ="image/teacher/".$select_pic;
											}else if($type=='S'){
												$type='Student';
												$pic_path ="image/student/".$select_pic;
											}else if($type=='A'){
												$type='Admin';
											}
											?>

											<div class="min_pro">
												<a href='conversations.php?hash=<?php echo $hash;?>'><img class="min_pro_pic" src="<?php echo $pic_path;?>"></a>
												<div class="min_pro_name">
												   <a href='conversations.php?hash=<?php echo $hash;?>'><?php echo $select_name;?></a><br>
												   <a href='conversations.php?hash=<?php echo $hash;?>'><?php echo $type;?></a>
												</div>
											</div>
											<?php
										}
									}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-1.10.2.js"></script>
		 <script src="js/custom-file-input.js"></script>
		<script>
		window.setInterval(function(){
		  var elem = document.getElementById('div1');
		  elem.scrollTop = elem.scrollHeight;
		}, 1000);
		    


		    function ajax() {
		        var req = new XMLHttpRequest();

		        req.onreadystatechange = function () {
		            if (req.readyState == 4 && req.status == 200){
		                document.getElementById('div1').innerHTML = req.responseText;
		            }

		        };
		        req.open('GET','getMsg.php', true);
		        req.send();

		    }
		    setInterval(function () {
		        ajax();

		    },1000);

		</script>
	</body>
<html>