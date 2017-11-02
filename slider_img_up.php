<?php  
session_start();
$pagetitle = 'Upload/Delete Slider Image'; 
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
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
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
			<form action="slider_img_up.php" method="post" enctype="multipart/form-data">
				<div class="slider_img_up_body">
					<table style="float: left;">
					
						<tr>
							<td class="ins_td_sm" style="width: 110px;">Image File:</td>
							<td>
								<input  type="file" name="slider_img_up_file" class="ins_input_sm" style="border:none;padding:0px"  required>
							</td>
						
							<td class="ins_td_sm">Description:</td>
							<td>
								<input  type="text" name="slider_img_up_text" class="ins_input_sm"  required>
							</td>
						</tr>
					</table>
					<div class="slider_img_up_field">
						
						
						
					</div>
					<input class="submit_sm" type="submit" name="slider_img_button" value="Upload" style="top: 8px; left: 5%;"/>
				</div>
			</form>
		</div>
		<div class="admin_area">
			<h1 style="font-size:24px; padding:10px">Slider Image Delete</h1>
			<div class="s_i_d_t">
				<table class="slider_table" style="width: 80%;margin:0 auto">
					<tbody>
						<tr class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height:41px">Image</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
						</tr>
						
						<?php
							$slider_sql = "SELECT * FROM `slider` ORDER BY `slider_id` ASC  ";
							$slider_sql_run = mysqli_query($con, $slider_sql);
							while ($slider_data = mysqli_fetch_array($slider_sql_run) ){
								$slider_id = $slider_data['slider_id'];
								$slider_file = "image/img/".$slider_data['slider_file'];
								$slider_img_text = $slider_data['slider_img_text'];
								?>
								<tr>
									<td style="width: 50%;border: 1px solid #A5A5A5;"><img src="<?php echo $slider_file;?>" style="width: 100%;"> </td>
									<td style="border: 1px solid #A5A5A5;text-align: center;height:41px"><?php echo $slider_img_text;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;"><a href="slider_img_up.php?delete=<?php echo $slider_id;?>&nam=<?php echo $slider_file?>"><img class="icon" src="image/delete.png"></a></td>
								</tr>

								<?php
							}
						?>
						


					</tbody>

				</table>

			</div>
		</div>
	</body>
<html>

<?php
	if(isset($_POST['slider_img_button'])){

		$slider_img_up_text = $_POST['slider_img_up_text'];
		

		//getting the images from the file
		$slider_img_up_file = $_FILES['slider_img_up_file']['name'];
		$slider_img_up_file_tmp = $_FILES['slider_img_up_file']['tmp_name'];

		move_uploaded_file($slider_img_up_file_tmp, "image/img/$slider_img_up_file");

		$insert_img = "INSERT INTO `slider` (`slider_file`, `slider_img_text`) VALUES ('$slider_img_up_file','$slider_img_up_text')";
		$insert_image = mysqli_query($con, $insert_img);
		if ($insert_image) {
			echo "<script>alert('Slider image has been inserted!')</script>";
			echo "<script>window.open('slider_img_up.php','_self')</script>";
			
		}else
		{
			echo "<script>alert('Failed!')</script>";
			
		}
	}

?>

<?php
	if (isset($_GET['delete'])) {
		$id=$_GET['delete'];
		$exists=file_exists($_GET['nam']) ;
		if($exists){
			$ulk = unlink($_GET['nam']);
			if($ulk){
				$ulk_sql="delete from slider where slider_id='$id'";
				$ulk_sql_run = mysqli_query($con, $ulk_sql);
				if($ulk_sql_run){
					echo "<script>window.open('slider_img_up.php','_self')</script>";
				}
			}
		}else{
			$ulk_sql="delete from slider where slider_id='$id'";
			$ulk_sql_run = mysqli_query($con, $ulk_sql);
			if($ulk_sql_run){
				echo "<script>window.open('slider_img_up.php','_self')</script>";
			}
		}
	}
?>

