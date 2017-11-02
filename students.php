<?php 
session_start();
 $pagetitle = 'All Student'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
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
	if (isset($_GET['clas'])&&!empty($_GET['clas'])) {
		$clas = $_GET['clas'];
	}
?>
<style type="text/css">
	.pp{
		float: right; background: rgb(57, 114, 181) none repeat scroll 0% 0%; color: rgb(255, 255, 255); padding: 8px 30px; border-radius: 5px; font-size: 22px; margin: 16px 7px 0px 0px;
	}
	.pp:hover{
		background: #0E5E9F;
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
			<a href="print_student_list.php?clas=<?php echo $clas?>" class="pp">Print</a>
			<form method="post" enctype="multipart/form-data">
				<table style="width: 50%; margin: 9px 8px 22px;">

					<tr>
						<td><h2 style="margin-top: 5px;">Select Class</h2></td>
						<td><select type="text" name="class" class="ins_input_xsm" style="margin-left:10px;width: 97%;">
											<?php getClass();?>
							</select>
						</td>
						<td><input type="submit" name="submit"  class="submit_xsm" Value="Go" style="left: 12%;top: 3px;"></td>
					</tr>
				</table>
			</form>
			<h1 style="text-align: center; font-size: 24px; margin: 37px 0px 15px;">Class <?php echo $clas;?> Student List</h1>
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 1000px;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 50px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 111px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">View Profile</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">ID Card</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Manage</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Detele</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `student` WHERE `class` = '$clas' ORDER BY `student`.`fld2` ASC";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {
						$id = $sql_get['fld2']; 
						$name = $sql_get['fld1']; 
						$teacher_id = $sql_get['student_id']; 
						?>
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='view_student_profile.php?student=<?php echo $teacher_id;?>'><img class="icon" src="image/profile.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='student_id_card.php?student=<?php echo $teacher_id;?>'><img class="icon" src="image/id.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='student_manage.php?student=<?php echo $teacher_id;?>'><img class="icon" src="image/setting.png"></a></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='students.php?student_delete=<?php echo $teacher_id;?>'><img class="icon" src="image/delete.png"></a></td>
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
	if(isset($_GET['student_delete'])){
		$cls_id=$_GET['student_delete'];

		$not_sql="DELETE FROM `student` WHERE `student`.`student_id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('students.php?clas=".$clas."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>

<?php
	if (isset($_POST['submit'])) {
		$class = $_POST['class'];
		echo "<script>window.open('students.php?clas=".$class."','_self')</script>";
	}
	
?>