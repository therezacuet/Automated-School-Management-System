<?php  
session_start();
$pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
	}
?>
<style type="text/css">
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
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Page Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center; width: 15%;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 31px;">Update</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `user_manage` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$full_name = $ccsql_get['full_name'];
						$user_id = $ccsql_get['user_id'];

						?>
					<form method="post" enctype="multipart/form-data">
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $full_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><input value = "<?php echo $user_id;?>" type="text" name="cid" class="ins_input_sm" style="text-align: center; width: 100%;"></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<input type="hidden" value ="<?php echo $id;?>" name="hidden">
								<input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
							</td>
						</tr>
					</form>


						<?php
						$i++;
					}

					
				?>

			</table>

		</div>

	</body>
<html>

<?php
	if(isset($_POST['update'])){
		$cid=$_POST['cid'];
		$hidden=$_POST['hidden'];

		$not_sql="UPDATE `user_manage` SET `user_id` = '$cid' WHERE `user_manage`.`id` = '$hidden'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('users_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('users_management.php','_self')</script>";
		}
	}
?>