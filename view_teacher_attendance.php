<?php  
session_start();

$pagetitle = 'Attendence'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['teacher_id'])) {
		header("Location: 404.html"); 
		exit();
	}

// error_reporting(0);
					$January = 0;
					$February = 0;
					$March = 0;
					$April = 0;
					$May = 0;
					$June = 0;
					$July = 0;
					$August = 0;
					$September = 0;
					$October = 0;
					$November = 0;
					$December = 0;


					$JanuaryWorkingDay = 0;
					$FebruaryWorkingDay = 0;
					$MarchWorkingDay = 0;
					$AprilWorkingDay = 0;
					$MayWorkingDay = 0;
					$JuneWorkingDay = 0;
					$JulyWorkingDay = 0;
					$AugustWorkingDay = 0;
					$SeptemberWorkingDay = 0;
					$OctoberWorkingDay = 0;
					$NovemberWorkingDay = 0;
					$DecemberWorkingDay = 0;
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					
					<?php getSM();?>
				</div>
				<div class="chagepass_body" >
					<div class="chagepass_body2" style="height: 700px;">
						<div class="student">Attendence</div>
						<form method="post" enctype="multipart/form-data">

			<table style="width: 30%; margin: 30px auto 0px;">

				<tr>
					<td colspan="3"><h2 style="margin: 0px 0px 0px 10px;">Select a year</h2></td>
				</tr>
				<tr>
					
								<td style="width: 26%;">
								<select type="text" name="year" class="ins_input_xsm"style="margin-left: 10px; width: 88%; padding: 4px; border-radius: 4px; border: 2px solid rgb(0, 129, 243);" required>
										<?php 
											for ($i=date("Y"); $i >date("Y")-10 ; $i--) { 
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
								</select>
							</td>
							
					<td style="width: 18%;"><input type="submit" name="submit"  class="submit_xsm" Value="Go" style="color: rgb(255, 255, 255); background: rgb(0, 129, 243) none repeat scroll 0% 0%; border: medium none; padding: 5px 29px;  border-radius: 4px; font-size: 16px; width:100%; height:100%"></td>
				</tr>
			</table>
						</form>

						<table style="width: 40%; margin: 10px auto 0px;">
							<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
								<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Month</th>
								<th style="border: 1px solid #A5A5A5;text-align: center;">Percentage</th>
							</tr>
							<?php
							$year = $_GET['year'];
							$student_id = getfield('tld2');
					$ccsql="SELECT * FROM `teacher_attendence` WHERE `year` ='$year' AND `p_or_a` = '1' AND `teacher_id` = '$student_id'";
					$ccsql_run = mysqli_query($con, $ccsql);
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$month = $ccsql_get['month'];

						if($month == 1){
							$January++;
						}else if($month == 2){
							$February++;
						}else if($month == 3){
							$March++;
						}else if($month == 4){
							$April++;
						}else if($month == 5){
							$May++;
						}else if($month == 6){
							$June++;
						}else if($month == 7){
							$July++;
						}else if($month == 8){
							$August++;
						}else if($month == 9){
							$September++;
						}else if($month == 10){
							$October++;
						}else if($month == 11){
							$November++;
						}else if($month == 12){
							$December++;
						}

					}

					$sql = "SELECT * FROM `workingday` WHERE `year` = '$year'";
					$sql_run = mysqli_query($con, $sql);
					while ($sql_get=mysqli_fetch_array($sql_run)) {
						$month = $sql_get['month'];
						if($month == 1){
							$JanuaryWorkingDay = $sql_get['working_day'];
						}else if($month == 2){
							$FebruaryWorkingDay = $sql_get['working_day'];
						}else if($month == 3){
							$MarchWorkingDay = $sql_get['working_day'];
						}else if($month == 4){
							$AprilWorkingDay = $sql_get['working_day'];
						}else if($month == 5){
							$MayWorkingDay = $sql_get['working_day'];
						}else if($month == 6){
							$JuneWorkingDay = $sql_get['working_day'];
						}else if($month == 7){
							$JulyWorkingDay = $sql_get['working_day'];
						}else if($month == 8){
							$AugustWorkingDay = $sql_get['working_day'];
						}else if($month == 9){
							$SeptemberWorkingDay = $sql_get['working_day'];
						}else if($month == 10){
							$OctoberWorkingDay = $sql_get['working_day'];
						}else if($month == 11){
							$NovemberWorkingDay = $sql_get['working_day'];
						}else if($month == 12){
							$DecemberWorkingDay = $sql_get['working_day'];
						}
					}
						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">January</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($January/$JanuaryWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">February</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($February/$FebruaryWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">March</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($March/$MarchWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">April</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($April/$AprilWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">May</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($May/$MayWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">June</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($June/$JuneWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">July</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($July/$JulyWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">August</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($August/$AugustWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">September</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($September/$SeptemberWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">October</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($October/$OctoberWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">November</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($November/$NovemberWorkingDay)*100),2)."%";?></td>
						</tr>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px">December</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo round((($December/$DecemberWorkingDay)*100),2)."%";?></td>
						</tr>


						
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		$year= $_POST['year'];
		echo "<script>window.open('".$current_file."?year=".$year."','_self')</script>";
	}
	
?>