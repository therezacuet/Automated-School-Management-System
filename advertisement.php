<?php  
session_start();
$pagetitle = 'Advertisement'; 
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
<style>
.bicon{
	background: url('image/update.png');
	background-repeat: no-repeat;
	border: 0;
	display: block;
	width: 40px;
	height: 40px;
	text-indent: -999999999999px;
}


</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 90%;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Place</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Ratio</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Ads</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Change image</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 5%;">Upload image</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Change link</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 5%;">Upload link</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `advertisement` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					//$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$i = $ccsql_get['id'];
						$place = $ccsql_get['place'];
						$size = $ccsql_get['size'];
						$file = $ccsql_get['file'];
						$link = $ccsql_get['link'];

						?>

						<form method="post" enctype="multipart/form-data">
							<tr style="border: 1px solid #A5A5A5;text-align: center;">
								<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: left; padding-left:10px"><?php echo $place;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $size;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;">
									<?php
										if ($file == 0) {
											?>Ads remove<?php
										}else{
									?><img src="<?php echo "image/ads/".$file;?>" style="max-width: 90px; max-height: 90px;"><?php 
										}
									?>
								</td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input type="file" name="file" required> </td>
								<td style="border: 1px solid #A5A5A5;text-align: center;">
									<input type="hidden" value ="<?php echo $i;?>" name="hidden">
									<input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
								</td>
						</form>
						<form method="post" enctype="multipart/form-data">
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input type="text" name="link" value="<?php echo $link;?>" class="ins_input_sm" style="width: 100%;" required> </td>
								<td style="border: 1px solid #A5A5A5;text-align: center;">
									<input type="hidden" value ="<?php echo $i;?>" name="hidden">
									<input type="submit" name="linkupdate" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
								</td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='advertisement.php?delete=<?php echo $i;?>'><img class="icon" src="image/delete.png"></a></td>
							</tr>
						</form>


						<?php
						//$i++;
					}

					
				?>

			</table>

		</div>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['update'])) {
		$hidden=$_POST['hidden'];
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$ext = findexts ($file_name) ;  
		$ran = $hidden;  
		$ran2 = $ran.".";  
		$target = "image/ads/";
		$target = $target . $ran2.$ext;
		echo $file=$ran2.$ext;
		move_uploaded_file($file_tmp, $target);


		$not_sql="UPDATE `advertisement` SET `file` = '$file' WHERE `advertisement`.`id` = '$hidden'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
	if (isset($_POST['linkupdate'])) {
		$hidden=$_POST['hidden'];
		$link=$_POST['link'];
		$not_sql="UPDATE `advertisement` SET `link` = '$link' WHERE `advertisement`.`id` = '$hidden'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$not_sql="UPDATE `advertisement` SET `file` = '0', `link` = '' WHERE `advertisement`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
		
	}
	
?>