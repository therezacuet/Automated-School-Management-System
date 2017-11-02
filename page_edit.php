<?php  
session_start();
$pagetitle = 'Edit Page Content'; 
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}

	if (isset($_GET['page']) && !empty($_GET['page'])) {
		$id = $_GET['page'];
	}
?>
<style type="text/css">
</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
			<h1 style="width: 751px; margin: 15px auto; color: rgb(0, 0, 0); font-size: 20px;">Edit <?php getPageName($id);?></h1>

		
		<form method="post" enctype="multipart/form-data">
			<div class="ins_table" style="width: 750px;margin: 31px auto;">
				<?php
					$sql = "SELECT * FROM `page` WHERE `page`.`id` = '$id';";
					$sql_run = mysqli_query($con, $sql);
					$sql_get=mysqli_fetch_array($sql_run);
					$page_detail = $sql_get['page_detail'];
				?>
				<input type="submit" name="submit" class="ins_info_submit" Value="Save" style="margin: -67px 88% 0px; height: 40px; border: medium none; width: 93px;">
				<textarea name="page_detail"  cols="100" rows="30"><?php echo $page_detail?></textarea>
					
			</div>
		</form>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>

	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		$page_detail = mysqli_real_escape_string($con, $_POST['page_detail']);

		$sql = "UPDATE `page` SET  `page_detail` = '$page_detail'  WHERE `page`.`id` = '$id';";

		$sql_run = mysqli_query($con, $sql);

		if ($sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."?page=".$id."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>