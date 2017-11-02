<?php  
session_start();

$pagetitle = 'Salary Sheet'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['student_id'])) {
		header("Location: 404.html"); 
		exit();
	}

		$user_id = $_SESSION['teacher_id'];
		$user_name = getfield('tld5');
	
?>
<style>
tr, td{
	height: 31px;
font-size: 20px;
padding: 0 47px;
}
.type{
	margin: 40px auto;
text-align: center;
font-size: 20px;
}

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					<?php getTM();?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2">
						<div class="student" style="width: 145px;">Salary Sheet</div>
						<?php
							$sql = "SELECT * FROM `salary` WHERE `teacher_id`='$user_id'";
							$run_sql = mysqli_query($con, $sql);
							$get_sql = mysqli_fetch_array($run_sql);

							$basic = $get_sql['basic']; 
							$huse_rent = $get_sql['huse_rent']; 
							$provident = $get_sql['provident']; 
							$kollan = $get_sql['kollan']; 
							$medical = $get_sql['medical']; 
							$lunch = $get_sql['lunch']; 
							$tada = $get_sql['tada']; 
							$total_salary = $get_sql['total_salary']; 

							$sql2 = "SELECT * FROM `teacher` WHERE `teacher_id`='$user_id'";
							$run_sql2 = mysqli_query($con, $sql2);
							$get_sql2 = mysqli_fetch_array($run_sql2);
							$type = $get_sql2['type']; 


							if ($type=="Govt.") {
								?>
									<div class="type">Teacher Type: <b><?php echo $type;?></b></div>

									<table style="position: relative; left: 210px; top: 0px; width: 447px;">

										<tr>
											<td>Basic</td>
											<td>&nbsp;&nbsp;<?php echo $basic;?></td>
										</tr>
										<tr>
											<td>House Rent</td>
											<td><?php echo "+".$huse_rent;?></td>
										</tr>
										<tr>
											<td>Provident Fund</td>
											<td><?php echo "+".$provident;?></td>
										</tr>
										<tr>
											<td>Kollan Fund</td>
											<td><?php echo "+".$kollan;?></td>
										</tr>
										<tr>
											<td>Medical</td>
											<td><?php echo "+".$medical;?></td>
										</tr>
										<tr>
											<td>Lunch</td>
											<td><?php echo "+".$lunch;?></td>
										</tr>
										<tr style="border-bottom: 1px solid rgb(76, 158, 217);">
											<td>TADA</td>
											<td><?php echo "+".$tada;?></td>
										</tr>
										<tr>
											<td><b>Total</b></td>
											<td>&nbsp;&nbsp;<b><?php echo $total_salary;?></b></td>
										</tr>


									</table>
								<?php
							}else if ($type=="NON-Govt.") {
								?>
									<div class="type">Teacher Type: <b><?php echo $type;?></b></div>

									<table style="position: relative; left: 210px; top: 0px; width: 447px;">

										<tr>
											<td>Basic</td>
											<td>&nbsp;&nbsp;<?php echo $basic;?></td>
										</tr>
										<tr>
											<td>House Rent</td>
											<td><?php echo "+".$huse_rent;?></td>
										</tr>
										<tr>
											<td>Provident Fund</td>
											<td><?php echo "-".$provident;?></td>
										</tr>
										<tr>
											<td>Kollan Fund</td>
											<td><?php echo "-".$kollan;?></td>
										</tr>
										<tr>
											<td>Medical</td>
											<td><?php echo "+".$medical;?></td>
										</tr>
										<tr>
											<td>Lunch</td>
											<td><?php echo "+".$lunch;?></td>
										</tr>
										<tr style="border-bottom: 1px solid rgb(76, 158, 217);">
											<td>TADA</td>
											<td><?php echo "+".$tada;?></td>
										</tr>
										<tr>
											<td><b>Total</b></td>
											<td>&nbsp;&nbsp;<b><?php echo $total_salary;?></b></td>
										</tr>


									</table>
								<?php
							}else if ($type=="unkown") {
								?>

								<div class="type">You are not yet added to Database, Please contact to ADMIN</div>
								<?php
							}

						?>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>