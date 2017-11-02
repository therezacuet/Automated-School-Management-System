<?php 
session_start();
 $pagetitle = 'Transfer Certificate'; 
$extra='<link type="text/css" rel="stylesheet" href="css/uploadfile.css"/>

';

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
		

		<div class="admission_aplication">
			<div class="admission_aplication_body">
				<div class="admisstion_search">
					<div class="admisstion_search_by">
						<form method="POST" enctype="multipart/form-data">
							
							<h2 style="float: left; margin: 4px 5px 0px 105px; color: rgb(0, 0, 0);">Student ID:</h2><input type="text" name="admisstion_search_like" class="admisstion_search_name">
							<!-- <input type="submit" id="search" name="submit" alt="search" value="">
							<div > -->
								<input type="submit" name="admisstion_search_submit" class="admisstion_search_submit">
						
							
						</form>
					</div>
				</div>
				<table  border="1px" style="width: 800px; margin: 20px auto;">
					<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Token no.</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Student ID</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Student Name</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Viwe</th>
						
					</tr>
					<?php
					$i=0;

					if (isset($_POST['admisstion_search_submit'])) {
						$search_word = $_POST['admisstion_search_like'];

						$sql = "SELECT * FROM `tc` WHERE `student_id` LIKE '%$search_word%'";
						$sql_run = mysqli_query($con, $sql);


						while ($sql_get=mysqli_fetch_array($sql_run)) {
						$field0=$sql_get['field0'];
						$field1=$sql_get['field1'];
						$student_id=$sql_get['student_id'];
						$i=$i+1;
						?>
						<form method="POST" enctype="multipart/form-data">
							<tr>
								<td  style="text-align: center; color: rgb(0, 0, 0);"><?php echo $i;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $field0;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $student_id;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $field1;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);height: 40px;"><a class="vbtn" href='tc_certificate.php?tc_token=<?php echo $field0?>'>View</a></td>
							</tr>
						</form>

						<?php
					}
				}else{
					$sql="SELECT * FROM `tc`";
						$sql_run = mysqli_query($con, $sql);


						while ($sql_get=mysqli_fetch_array($sql_run)) {
						$field0=$sql_get['field0'];
						$field1=$sql_get['field1'];
						$student_id=$sql_get['student_id'];
						$i=$i+1;
						?>
						<form method="POST" enctype="multipart/form-data">
							<tr>
								<td  style="text-align: center; color: rgb(0, 0, 0);"><?php echo $i;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $field0;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $student_id;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);"><?php echo $field1;?></td>
								<td style="text-align: center; color: rgb(0, 0, 0);height: 40px;"><a class="vbtn" href='tc_certificate.php?tc_token=<?php echo $field0?>'>View</a></td>
							</tr>
						</form>

						<?php
					}

				}
						
				?>
				</table>
			</div>
		</div>




	</body>
</html>



