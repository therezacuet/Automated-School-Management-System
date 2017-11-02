<?php  
session_start();
$pagetitle = 'Photo Gallery'; 
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
<style type="text/css">
 .left{
 	float: left;
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

			<form method="post" enctype="multipart/form-data">
				<div style="width: 47%; margin: 0px 0px 0px 20%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 6%;">Create Album:</td>
							<td style="width: 20%;">
								<input  type="text" name="name" class="ins_input_sm" style="width: 100%;" placeholder="Album name" required>
							</td>
						</tr>
					</table>
						<input type="submit" name="submit" style="left:103%; top: -46px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Album Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 17%;">Delete</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 17%;">Add Photo</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `gallery` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$name = $ccsql_get['name'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file;?>?delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='add_photo.php?album=<?php echo $id;?>'><img class="icon" src="image/add_photo.PNG"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];

		$sql="INSERT INTO `gallery` (`id`, `name`) VALUES (NULL, '$name')";

		$sql_run = mysqli_query($con, $sql);

		if ($sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>

<?php
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$sql="DELETE FROM `gallery` WHERE `gallery`.`id` = '$id'";
		$sql_run = mysqli_query($con, $sql);

		$ccsql="SELECT * FROM `photo` WHERE `album_id` = '$id'";
		$ccsql_run = mysqli_query($con, $ccsql);
		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$file_name = "image/album/".$ccsql_get['file_name'];
						unlink($file_name);
						$sql="DELETE FROM `photo` WHERE `photo`.`id` = '$id'";
						$sql_run = mysqli_query($con, $sql);
		}

		
		if($sql_run){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>