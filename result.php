<?php 
session_start();
 $pagetitle = 'Result'; 
$extra='<link type="text/css" rel="stylesheet" href="css/result.css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$marit = " ";
				
	if (isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['exam'])&&!empty($_GET['exam'])&&isset($_GET['class'])&&!empty($_GET['class'])&&isset($_GET['group'])&&!empty($_GET['group'])) {

		$id = $_GET['id'];
		$exam = $_GET['exam'];
		$class = $_GET['class'];
		$group = $_GET['group'];
		$year = $_GET['year'];
	}


	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = "image/".$ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];
	$add = "Address: ".$ins_sql_run['ins_add'];
	$phone = "Mobile: ".$ins_sql_run['ins_phone'];



	$sql1="SELECT * FROM `result` WHERE `student_id` ='$id' AND `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year'";
	$sql1_get = mysqli_query($con, $sql1);
	$sql1_run = mysqli_fetch_array($sql1_get);
	$student_id = $sql1_run['student_id'];
	$class = $sql1_run['class'];
	$exam_type = $sql1_run['exam_type'];
	$class_group = $sql1_run['class_group'];
	$total = $sql1_run['total'];
	$gpa = $sql1_run['gpa'];
	$grade = $sql1_run['grade'];
	$stats = $sql1_run['stats'];
	$sql3="SELECT * FROM `result` WHERE `stats`= 'Pass' ORDER BY `gpa` DESC, `total` DESC ";
	$sql3_get = mysqli_query($con, $sql3);

	$sql3_num_rows=mysqli_num_rows($sql3_get);
	if ($sql3_num_rows==0) {
		$marit = "<h3 style='color:red'>FAILED</h3>";
	}else{
		$i=1;
		while($sql3_run = mysqli_fetch_array($sql1_get)){
			$student_id3 = $sql3_run['student_id'];
			$class3 = $sql3_run['class'];
			$exam_type3 = $sql3_run['exam_type'];
			$class_group3 = $sql3_run['class_group'];

			if ($student_id3==$student_id&&$class3=$class&&$exam_type3=$exam_type&&$class_group3=$class_group) {
				return;
			}
			$i++;
		}

	}
	
?>




<html>
<?php include("head.php");?>
	<body>
		<?php
			$sql1="SELECT * FROM `result` WHERE `student_id` ='$id' AND `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year'";
			$sql1_get = mysqli_query($con, $sql1);
			$sql1_get_num_rows=mysqli_num_rows($sql1_get);
			if($sql1_get_num_rows == 1){

				$sql1_run = mysqli_fetch_array($sql1_get);
				$student_id = $sql1_run['student_id'];
				$class = $sql1_run['class'];
				$exam_type = $sql1_run['exam_type'];
				$class_group = $sql1_run['class_group'];
				$total = $sql1_run['total'];
				$gpa = $sql1_run['gpa'];
				$grade = $sql1_run['grade'];
				$stats = $sql1_run['stats'];
				$sql3="SELECT * FROM `result` WHERE `stats`= 'Pass' ORDER BY `gpa` DESC, `total` DESC ";
				$sql3_get = mysqli_query($con, $sql3);

				$sql3_num_rows=mysqli_num_rows($sql3_get);
				if ($sql3_num_rows==0) {
					$marit = "<h3 style='color:red'>FAILED</h3>";
				}else{
					$i=1;
					while($sql3_run = mysqli_fetch_array($sql1_get)){
						$student_id3 = $sql3_run['student_id'];
						$class3 = $sql3_run['class'];
						$exam_type3 = $sql3_run['exam_type'];
						$class_group3 = $sql3_run['class_group'];

						if ($student_id3==$student_id&&$class3=$class&&$exam_type3=$exam_type&&$class_group3=$class_group) {
							return;
						}
						$i++;
					}

				}
			?>
			<div class="body">
				<div class="result_head">
					<img src="<?php echo $logo;?>">
					<div class="name"><?php echo $name?></div>
					<div class="uppercase exam"><?php echo $exam_type;?> Examination-<?php echo $year;?></div>
				</div>
				<img src="image/cer/divider1.png" class="img_divider" align="middle">

				<div class="mid_left">
					<?php
						$sql2 = "SELECT * FROM `student` WHERE `fld2`='$id'";
						$sql2_get = mysqli_query($con, $sql2);
						$sql2_run = mysqli_fetch_array($sql2_get);

						$name = $sql2_run['fld1'];
						$fname = $sql2_run['fld18'];
						$mname = $sql2_run['fld24'];
						$dob = $sql2_run['fld9'];

					?>
					<h3 class="uppercase fontstyle1 sname" style="font-size: 22px;"><b><?php echo $name;?></b></h3>

					<table>
						<tr>
							<td class="uppercase fontstyle1 fname" style="width: 159px;"><b>father's name</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $fname;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>mother's name</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $mname;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>student's id</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $id;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>date of birth</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $dob;?></td>
						</tr>

					</table>
					

				</div>
				<div class="mid_right">
					<table>
						<tr>
							<td class="uppercase fontstyle1 fname" style="width: 159px;"><b>class</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $class;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>group</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $group;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>gpa</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $gpa;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>grade</b></td>
							<td class="uppercase fontstyle1 fname">: <?php echo $grade;?></td>
						</tr>
						<tr>
							<td class="uppercase fontstyle1 fname"><b>Merit position</b></td>
							<td class="uppercase fontstyle1 fname"><?php if($stats == "Fail") echo "<h3 style='color:red' float: left;>: FAILED</h3>"; else echo ": ".getPosition($i);?></td>
						</tr>

					</table>
				</div>
				
				<h1 class="uppercase fontstyle1 mk">subject- wise grade & mark sheet</h1>
				<div class= "uppercase ttable">
					<table border="2" style="width: 900px;margin: 15px auto 0px;">

						<tr>
							<td rowspan="2">subject</td>
							<td colspan="9"><?php echo $exam_type;?> Examination Marks</td>
							
						</tr>
						<tr>
							
							<td colspan="2" style="width: 90px;">written</td>
							<td colspan="2" style="width: 90px;">mcq</td>
							<td colspan="2" style="width: 90px;">practical</td>

							<td>total</td>
							<td>gpa</td>
							<td>grade</td>
						</tr>

						<?php
							$sql4 =  "SELECT * FROM `marks` WHERE `student_id` ='$id' AND `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year'";
							$sql4_get = mysqli_query($con, $sql4);
							while($sql4_run = mysqli_fetch_array($sql4_get)){
								$subject = $sql4_run['subject'];
								$pair = $sql4_run['pair'];
								$p1w = $sql4_run['p1w'];
								$p2w = $sql4_run['p2w'];
								$t1 = $sql4_run['t1'];
								$p1m = $sql4_run['p1m'];
								$p2m = $sql4_run['p2m'];
								$t2 = $sql4_run['t2'];
								$p1p = $sql4_run['p1p'];
								$p2p = $sql4_run['p2p'];
								$t3 = $sql4_run['t3'];
								$sub_total = $sql4_run['total'];
								$sub_grade = $sql4_run['grade'];
								$grade_gpa = getGradePoint($sub_grade);

								if ($pair==1) {
									?>
									<tr>
										<td style="text-align: left;padding: 0px 0px 0px 10px;"><?php echo $subject;?> 1st</td>
										<td ><?php echo $p1w; ?></td>
										<td rowspan="2"><?php echo $t1; ?></td>
										<td ><?php echo $p1m; ?></td>
										<td rowspan="2"><?php echo $t2; ?></td>
										<td ><?php echo $p1p; ?></td>
										<td rowspan="2"><?php echo $t3; ?></td>

										<td rowspan="2"><?php echo $sub_total; ?></td>
										<td rowspan="2"><?php echo $grade_gpa; ?></td>
										<td rowspan="2"><?php echo $sub_grade; ?></td>
									</tr>
									<tr>
										<td style="text-align: left;padding: 0px 0px 0px 10px;"><?php echo $subject;?> 2nd </td>
										<td ><?php echo $p2w; ?></td>
										<td ><?php echo $p2m; ?></td>
										<td ><?php echo $p2p; ?></td>
									</tr>
									<?php
								}else if($pair == 0){
									?>
									<tr>
										<td style="text-align: left;padding: 0px 0px 0px 10px;"><?php echo $subject;?></td>
										<td colspan="2"><?php echo $t1;?></td>
										<td colspan="2"><?php echo $t2;?></td>
										<td colspan="2"><?php echo $t3;?></td>

										<td><?php echo $sub_total;?></td>
										<td><?php echo $grade_gpa;?></td>
										<td><?php echo $sub_grade;?></td>
									</tr>
									<?php
								}
							}

						?>
						
						<tr>
							
							<td colspan="7" style="text-align: right;padding: 0 15px 0 0;">total markes & gpa</td>

							<td><?php echo $total;?></td>
							<td><?php echo $gpa;?></td>
							<td><?php echo $grade;?></td>
							
						</tr>
					</table>
				</div>
				<div class="uppercase overall" style="padding: 17px 14px 0px 20px;text-align: center;">OVERALL REOPRT
					<table border ="2">
						<tr>
							<td style="width: 224px;">subject</td>
							<td style="width: 69px;">Total marks</td>
							<td style="width: 44px;">gpa</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>overall marks and gpa</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>

				<?php
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

					$ccsql="SELECT * FROM `student_attendence` WHERE `year` ='$year' AND `p_or_a` = '1' AND `student_id` = '$id'";
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
				<div class="uppercase overall" style="padding: 17px 15px 0px 0px;text-align: center;">ATTENDANCE REOPRT
					<table border ="2">
						<tr>
							<td style="width: 100px;">month</td>
							<td style="width: 90px;">Working days</td>
							<td style="width: 90px;">Presence</td>
						</tr>
						<tr>
							<td>January</td>
							<td><?php echo $JanuaryWorkingDay;?></td>
							<td><?php echo $January;?></td>
						</tr>
						<tr>
							<td>February</td>
							<td><?php echo $FebruaryWorkingDay;?></td>
							<td><?php echo $February;?></td>
						</tr>
						<tr>
							<td>March</td>
							<td><?php echo $MarchWorkingDay;?></td>
							<td><?php echo $March;?></td>
						</tr>
						<tr>
							<td>April</td>
							<td><?php echo $AprilWorkingDay;?></td>
							<td><?php echo $April;?></td>
						</tr>
						<tr>
							<td>may</td>
							<td><?php echo $MayWorkingDay;?></td>
							<td><?php echo $May;?></td>
						</tr>
						<tr>
							<td>june</td>
							<td><?php echo $JuneWorkingDay;?></td>
							<td><?php echo $June;?></td>
						</tr>
						<tr>
							<td>july</td>
							<td><?php echo $JulyWorkingDay;?></td>
							<td><?php echo $July;?></td>
						</tr>
						<tr>
							<td>August</td>
							<td><?php echo $AugustWorkingDay;?></td>
							<td><?php echo $August;?></td>
						</tr>
						<tr>
							<td>September</td>
							<td><?php echo $SeptemberWorkingDay;?></td>
							<td><?php echo $September;?></td>
						</tr>
						<tr>
							<td>October</td>
							<td><?php echo $OctoberWorkingDay;?></td>
							<td><?php echo $October;?></td>
						</tr>
						<tr>
							<td>November</td>
							<td><?php echo $NovemberWorkingDay;?></td>
							<td><?php echo $November;?></td>
						</tr>
						<tr>
							<td>December</td>
							<td><?php echo $DecemberWorkingDay;?></td>
							<td><?php echo $December;?></td>
						</tr>
					</table>
				</div>

				<div class=" overall" style="padding: 17px 15px 0px 0px;text-align: center;">GPA GRADING
					<table border ="2">
						<tr>
							<td style="width: 132px;">Range of marks</td>
							<td style="width: 55px;">Grade</td>
							<td style="width: 52px;">Point</td>
						</tr>
						<tr>
							<td>80 or above</td>
							<td>A+</td>
							<td>5</td>
						</tr>
						<tr>
							<td>70 to 79</td>
							<td>A</td>
							<td>4</td>
						</tr>
						<tr>
							<td>60 to 69</td>
							<td>A-</td>
							<td>3.5</td>
						</tr>
						<tr>
							<td>50 to 59</td>
							<td>B</td>
							<td>3</td>
						</tr>
						<tr>
							<td>40 to 49</td>
							<td>C</td>
							<td>2</td>
						</tr>
						<tr>
							<td>33 to 39</td>
							<td>D</td>
							<td>1</td>
						</tr>
						<tr>
							<td>Bellow 33</td>
							<td>F</td>
							<td>0</td>
						</tr>
					</table>
				</div>
				<div class="footer">
						<div class="sign" style="margin-right: 155px;margin-left: 10;">Signature(Guardians)</div>
						<div class="sign" style="margin-right: 148px;">Signature(Class Teacher)</div>
						<div class="sign">Signature(Headmaster)</div>
				</div>
			</div>
			<form class="no-print" align="middle">
	            <input type="button"  class="print1" value="Print" onClick="window.print()"  >
	        </form>
        <?php
			}else{
				 include("header.php");
						 ?>
								<div style='padding: 16px; border-radius: 10px; font-size: 19px; margin: 23px auto; width: 900px; background: rgb(250, 229, 227) none repeat scroll 0% 0%; color: rgb(255, 0, 0);'>
									Either the providing infomarion was not appeared or the result is not published yet! Please try later. 
								</div>
						<?php
			}
		?>


	</body>
</html>