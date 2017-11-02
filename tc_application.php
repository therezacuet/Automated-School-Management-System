<?php  
session_start();
$pagetitle = 'TC applications'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
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
			<form method="post" enctype="multipart/form-data">
			<?php
				
				

					?>
					

			<table style = "width: 850px;margin: 35px auto;color: rgb(0, 0, 0);font-size: 18px;text-align: center;">
				<tr style ="height: 35px;background-color: rgb(235, 235, 235);">
					<th style ="border: 1px solid rgb(170, 164, 170);">NO.</th>
					<th style ="border: 1px solid rgb(170, 164, 170);">Student ID</th>
					<th style ="border: 1px solid rgb(170, 164, 170);">Student name</th>
					<th style ="border: 1px solid rgb(170, 164, 170);">Appliction Subject</th>
					<th style ="border: 1px solid rgb(170, 164, 170);">Option</th>
				</tr>


					<?php
					$sql = "SELECT * FROM `application` WHERE app_type = 'tc' ORDER BY `application`.`app_id` DESC";

					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {

						$app_id = $sql_get['app_id'];
						$app_subject = $sql_get['app_subject'];
						$student_id = $sql_get['student_id'];
						$student_name = $sql_get['student_name'];
						$app_type = $sql_get['app_type'];
						$app_body = $sql_get['app_body'];
						$app_stats = $sql_get['app_stats'];
					

						?>
						<tr>
							<td style ="border: 1px solid rgb(170, 164, 170);height: 36px;"><?php echo $i;?></td>
							<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $student_id;?></td>
							<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $student_name;?></td>
							<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $app_subject;?></td>
							<?php if ($app_stats == 10) {
								?>
									<td style ="border: 1px solid rgb(170, 164, 170);"><a href="view_application.php?app_id=<?php echo $app_id?>&app_type=T&stu_id=<?php echo $student_id;?>" style="background-color: rgb(57, 114, 181);border-radius: 3px;padding: 4px 13px;text-align: center;color: rgb(255, 255, 255);" hover="background-color:#0E5E9F;">View</a></td>

								<?php
							}else if($app_stats == 0){
								?>
									<td style ="border: 1px solid rgb(170, 164, 170);"><h4 style="background-color: red; color: white; width: 88px; padding: 5px 14px; margin: 0px auto; border-radius: 4px; text-align: center;"><a href="view_application.php?app_id=<?php echo $app_id?>&app_type=T&stu_id=<?php echo $student_id;?>" style="color: #fff">Rejected</a></h4> </td>
								<?php
							}else if ($app_stats == 1) {
								?>
									<td style ="border: 1px solid rgb(170, 164, 170);"><h4 style="background-color: green; width: 88px; color: white; margin: 0px auto; padding: 5px 10px; border-radius: 4px;"><a href="view_application.php?app_id=<?php echo $app_id?>&app_type=T&stu_id=<?php echo $student_id;?>" style="color: #fff">Accepted</a></h4> </td>

								<?php
							}
							?>
						</tr>
						<?php
					$i++; 
					
					}

			?>
			</table>
		</form>
		</div>
	</body>
<html>