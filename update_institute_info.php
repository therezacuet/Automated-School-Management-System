<?php 
session_start();
$pagetitle = 'Update Institute info'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'web'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin() || empty($_SESSION['teacher_id'])  || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
		$sql = "SELECT * FROM `institute_info` ";
		$sql_run = mysqli_query($con, $sql);
		$sql_get = mysqli_fetch_array($sql_run);
		$ins_logo = $sql_get['ins_logo'];
		$ins_name = $sql_get['ins_name'];
		$ins_subtitle = $sql_get['ins_subtitle'];
		$ins_phone = $sql_get['ins_phone'];
		$ins_add = $sql_get['ins_add'];
		$ins_web_link = $sql_get['ins_web_link'];
		$ins_fb = $sql_get['ins_fb'];
		$ins_gp = $sql_get['ins_gp'];
		$ins_twe = $sql_get['ins_twe'];
		$ins_Latitude = $sql_get['ins_Latitude'];
		$ins_Longitude = $sql_get['ins_Longitude'];

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
			<div class="ins_table">
				<table>
					<tr>
						<td class="ins_td">Institute's logo</td>
						<td><input type="file" name="ins_logo" ></td>
					</tr>
					<tr>
						<td class="ins_td">Name of institute</td>
						<td><input value= "<?php if(isset($ins_name)){ echo $ins_name;}?>" type="text" name="ins_name" class="ins_input" required></td>
					</tr>
					<tr>
						<td class="ins_td">Institutle Motto</td>
						<td><input value= "<?php if(isset($ins_subtitle)){ echo $ins_subtitle;}?>" type="text" name="ins_subtitle" class="ins_input" required></td>
					</tr> 
					<tr>
						<td class="ins_td">Institutle Phone no.</td>
						<td><input value= "<?php if(isset($ins_phone)){ echo $ins_phone;}?>" type="text" name="ins_phone" class="ins_input" required></td>
					</tr>
					<tr>
						<td class="ins_td">Institutle Address</td>
						<td><input value= "<?php if(isset($ins_add)){ echo $ins_add;}?>" type="text" name="ins_add" class="ins_input" required></td>
					</tr>
					<tr>
						<td class="ins_td">Institutle Website Link</td>
						<td><input value= "<?php if(isset($ins_web_link)){ echo $ins_web_link;}?>" type="text" name="ins_web_link" class="ins_input" required></td>
					</tr>
					<tr>
						<td class="ins_td">Google Map Position</td>
						<td>
						<table>
							
							<tr>	
								<td><input value= "<?php if(isset($ins_Latitude)){ echo $ins_Latitude;}?>" type="text" name="ins_Latitude" class="ins_input" style="width: 205px;margin-right: 11px;" placeholder="Latitude" required></td>
								<td><input value= "<?php if(isset($ins_Longitude)){ echo $ins_Longitude;}?>" type="text" name="ins_Longitude" class="ins_input" style="width: 205px;" placeholder="Longitude" required></td>
							</tr>
						</table>
						</td>
					</tr>
					<tr>
						<td class="ins_td">Facebook link</td>
						<td><input value= "<?php if(isset($ins_fb)){ echo $ins_fb;}?>" type="text" name="ins_fb" class="ins_input"></td>
					</tr>
					<tr>
						<td class="ins_td">Google+ link</td>
						<td><input value= "<?php if(isset($ins_gp)){ echo $ins_gp;}?>" type="text" name="ins_gp" class="ins_input"></td>
					</tr>
					<tr>
						<td class="ins_td">Tweet link</td>
						<td><input value= "<?php if(isset($ins_twe)){ echo $ins_twe;}?>" type="text" name="ins_twe" class="ins_input"></td>
					</tr>

					</table>


						<input type="submit" name="ins_info_submit" class="ins_info_submit" Value="Update">
					

				
			</div>
		</form>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['ins_info_submit'])) {
		$ins_name = $_POST['ins_name'];
		$ins_subtitle = $_POST['ins_subtitle'];
		$ins_phone = $_POST['ins_phone'];
		$ins_add = $_POST['ins_add'];
		$ins_web_link = $_POST['ins_web_link'];
		$ins_fb = $_POST['ins_fb'];
		$ins_gp = $_POST['ins_gp'];
		$ins_twe = $_POST['ins_twe'];
		$ins_Latitude = $_POST['ins_Latitude'];
		$ins_Longitude = $_POST['ins_Longitude'];

		if (!empty($_FILES['ins_logo']['name'])) {
				$file_name = $_FILES['ins_logo']['name'];
				$file_tmp = $_FILES['ins_logo']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/";
				$target = $target . $ran2.$ext;
				$field0=$ran2.$ext;
				$notice_sql = "UPDATE `institute_info` SET `ins_logo` = '$field0', `ins_name` = '$ins_name ', `ins_subtitle` = '$ins_subtitle', `ins_phone` = '$ins_phone', `ins_add` = '$ins_add', `ins_web_link` = '$ins_web_link', `ins_fb` = '$ins_fb', `ins_gp` = '$ins_gp', `ins_twe` = '$ins_twe', `ins_Latitude`='$ins_Latitude', `ins_Longitude`='$ins_Longitude' WHERE `institute_info`.`id` = 1";
				$run_notice_sql = mysqli_query($con, $notice_sql);

				if($run_notice_sql && move_uploaded_file($file_tmp, $target)){
					unlink("image/".$ins_logo);
					
					echo "<script>alert('Successful! Information has been uploaded.')</script>";
					echo "<script>window.open('update_institute_info.php','_self')</script>";
				}else{
					echo "<script>alert('Failed! Try again leter.')</script>";
				}
				
		}else{

				$notice_sql = "UPDATE `institute_info` SET  `ins_name` = '$ins_name ', `ins_subtitle` = '$ins_subtitle', `ins_phone` = '$ins_phone', `ins_add` = '$ins_add', `ins_web_link` = '$ins_web_link', `ins_fb` = '$ins_fb', `ins_gp` = '$ins_gp', `ins_twe` = '$ins_twe', `ins_Latitude`='$ins_Latitude', `ins_Longitude`='$ins_Longitude' WHERE `institute_info`.`id` = 1";
				
				$run_notice_sql = mysqli_query($con, $notice_sql);

				if($run_notice_sql){
					echo "<script>alert('Successful! Information has been uploaded.')</script>";
					echo "<script>window.open('update_institute_info.php','_self')</script>";
				}else{
					echo "<script>alert('Failed! Try again leter.')</script>";
				}
		}
			
				
		
		


	}
?>
