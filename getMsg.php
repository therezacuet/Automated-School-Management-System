<?php  
session_start();
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
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
	$hash = $_SESSION['hash'];
?>

<?php
										$message_query_sql = "SELECT * FROM messages WHERE group_hash = '$hash'";
										$message_query = mysqli_query($con, $message_query_sql);
										while($message_query_run = mysqli_fetch_array($message_query)){
											$from_id = $message_query_run['from_id'];
											$message = $message_query_run['message'];


											$user_query_sql = "SELECT * from member WHERE id ='$from_id'";
											$user_query = mysqli_query($con, $user_query_sql);
											$user_query_run = mysqli_fetch_array($user_query);
											$from_username = $user_query_run['name'];
											$select_pic = $user_query_run['pic'];
											$type = $user_query_run['type'];
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
												if($from_id==$my_id){
													?>
												
													<div class="min_pro_left">
														<img class="min_pro_pic" src="<?php echo $pic_path;?>">
														<div class="min_pro_name_left">
														  <h3> <?php echo $message;?></h3>
														</div>
													</div>
												<?php
												}else{
													?>
											
													<div class="min_pro_right">
														<img class="min_pro_pic right" src="<?php echo $pic_path;?>">
														
														<div class="min_pro_name_right">
														   <h3><?php echo $message;?></h3>
														</div>
													</div>
													<?php
												}
										}
										?>
										