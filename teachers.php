<?php 
session_start();
 $pagetitle = 'All Teacher'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'reg'";
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
?>


<html>
	<?php include("head.php");?>
	<style type="text/css">
	.pp{
		float: right; background: rgb(57, 114, 181) none repeat scroll 0% 0%; color: rgb(255, 255, 255); padding: 8px 30px; border-radius: 5px; font-size: 22px; margin: 2px 30px 12px 0px;
	}
	.pp:hover{
		background: #0E5E9F;
	}
</style>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">
			<a href="print_teacher_list.php" class="pp">Print</a>
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 1000px;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 50px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 111px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">View Profile</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">ID card</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Manage</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Detele</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `teacher` WHERE `type`='Govt.' OR `type`='NON-Govt.' ORDER BY `tld2` ASC";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {
						$id = $sql_get['tld2']; 
						$name = $sql_get['tld1']; 
						$teacher_id = $sql_get['teacher_id']; 
						?>
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='view_teacher_profile.php?teacher=<?php echo $teacher_id;?>'><img class="icon" style="width: 28px;" src="image/profile.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='teacher_id_card.php?teacher=<?php echo $teacher_id;?>'><img class="icon" src="image/id.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='teacher_manage.php?teacher=<?php echo $teacher_id;?>'><img class="icon" src="image/setting.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='teachers.php?teacher_delete=<?php echo $teacher_id;?>'><img class="icon" src="image/delete.png"></a></td>
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
	if(isset($_GET['teacher_delete'])){
		$cls_id=$_GET['teacher_delete'];

		$not_sql="DELETE FROM `teacher` WHERE `teacher`.`teacher_id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('teachers.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('teachers.php','_self')</script>";
		}
	}
?>