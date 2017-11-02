<?php  
session_start();
$pagetitle = 'Rules and regulations'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>
<style type="text/css">
</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">
			<div class="ins_table" style="width: 900px;margin: 20px auto;">
				<?php
					$sql = "SELECT * FROM `page` WHERE `page`.`id` = 1;";
					$sql_run = mysqli_query($con, $sql);
					$sql_get=mysqli_fetch_array($sql_run);
					$page_detail = $sql_get['page_detail'];
				?>

				<?php echo $page_detail?>
					
			</div>
		</div>
	</body>
<html>

