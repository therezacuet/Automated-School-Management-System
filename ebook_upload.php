<?php 
session_start();
 $pagetitle = 'E-book Upload'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'lib'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>

<style type="text/css">
.search_name{
	height: 35px;
border: 2px solid #0081F3;
border-radius: 4px;
width: 200px;
}

.search_submit{
	background: url('image/search.png');
background-repeat: no-repeat;
border: 0;
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
			<table style="width: 80%; margin: 30px auto 0px;">
				<form method="post" enctype="multipart/form-data">

					<tr>
						<td class="ins_td_sm" style="width: 25%;">Title:</td>
						<td style="width: 75%;">
							<input  type="text" name="title" class="ins_input_sm" style="width: 100%;" required>
						</td>
					</tr>
					<tr>
						<td class="ins_td_sm" style="width: 25%;">File:</td>
						<td style="width: 75%;">
							<input  type="file" name="file" required>
						</td>
					</tr>
					<tr>
						<td class="ins_td_sm" style="width: 25%;"></td>
						<td style="width: 75%;">
							<input type="submit" name="submit" style="left:0%; top: 0px;margin: 22px 0px 0px;" class="submit_sm" Value="Upload">
						</td>
					</tr>
				</form>

			</table>
		</div>
		<div class="admin_area" style="position: relative;">
			<div style="float: right; margin: 0px 0px 10px 61%;">
				<form method="POST" enctype="multipart/form-data">
					<input type="text" name="search_like" class="search_name">
					<input type="submit" name="search_submit" class="search_submit">	
				</form>
			</div>


			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 10%;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Title</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 10%;">Download</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 10%;">Delete</th>
				</tr>
				<?php

				if (isset($_POST['search_submit'])) {
					$search_word = $_POST['search_like'];
					$ccsql="SELECT * FROM `ebook` WHERE `title` LIKE '%$search_word%' ORDER BY `id` DESC";
				}else{
					
					$ccsql="SELECT * FROM `ebook` ORDER BY `id` DESC";
				}
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$title = $ccsql_get['title'];
						$file = $ccsql_get['file'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left; padding-left:10px;"><?php echo $title;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $file;?>'><img class="icon" src="image/download.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file;?>?ebook_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
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
		$title = mysqli_real_escape_string($con, $_POST['title']);


		if (!empty($_FILES['file'])) {
			$file_name = $_FILES['file']['name'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$ext = findexts ($file_name) ;  
			$ran = date("Ymd").time() ;  
			$ran2 = $ran.".";  
			$target = "ebook/";
			$target = $target . $ran2.$ext;
			$file=$target;
			move_uploaded_file($file_tmp, $target);
		}

		$sql = "INSERT INTO `ebook` (`id`, `title`, `file`) VALUES (NULL, '$title', '$file')";
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
	if(isset($_GET['ebook_delete'])){
		$id=$_GET['ebook_delete'];

		$not_sql="DELETE FROM `ebook` WHERE `ebook`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		unlink($file);

		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}
	}
?>