<?php 
session_start();
 $pagetitle = 'Tabulation Sheet'; 
$extra='
		<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'ex'";
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

	if (isset($_GET['tab_exam'])&&!empty($_GET['tab_exam'])&&isset($_GET['tab_class'])&&!empty($_GET['tab_class'])&&isset($_GET['tab_group'])&&!empty($_GET['tab_group'])) {

		$exam = $_GET['tab_exam'];
		$class = $_GET['tab_class'];
		$group = $_GET['tab_group'];
		$year = $_GET['tab_year'];
	}

?>

<html>
	<?php include("head.php");?>
	<body>
		<?php 
			$ins_sql = "SELECT * FROM `institute_info` ";
			$ins_sql_get = mysqli_query($con, $ins_sql);
			$ins_sql_run = mysqli_fetch_array($ins_sql_get);
			$logo = "image/".$ins_sql_run['ins_logo'];
			$name = $ins_sql_run['ins_name'];
			$add = "Address: ".$ins_sql_run['ins_add'];
			$phone = "Mobile: ".$ins_sql_run['ins_phone'];
		?>


		<div class="ahead_body">		
			<div class="ahead">
				<div class="ahead_right">
					<h1><?php echo $phone;?></h1>
				</div>
				<div class="ahead_left">
					<img src="<?php echo $logo;?>">
					<h1><?php echo $name;?></h1>
					<h2><?php echo $add;?></h2>
				</div>
			</div>
		</div>

		<div class="admin0_area" style="width: 800px; margin: 0px auto;text-align: center;">
			<h2>Tebulation Sheet</h2>
			<h3>Class <?php echo $class." ".$exam." Examination - ".$year;?></h3>
<form class="no-print">
	            <input type="button"  class="print button" value="Print" onClick="window.print()" style="
    position: relative;
    left: 682px;
    top: -23px;
    margin: 0;
" >
<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="position: relative; top: -65px; left: 284px; background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
       		</form>
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 100%;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 63px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 25%;">Subject</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Marks</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Grade</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">GPA</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Stats</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 70px;">Marit Position</th>
					<!-- <th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 100px;">Marit Position</th> -->
				</tr>
				<?php
					$sql = "SELECT * FROM `result` WHERE `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year' ORDER BY `result`.`stats` DESC, `gpa` DESC, `total` DESC ";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {

						$gtotal = $sql_get['total']; 
						$gpa = $sql_get['gpa']; 
						$ggrade = $sql_get['grade']; 
						$stats = $sql_get['stats']; 
						$id = $sql_get['student_id']; 



						$sql5 = "SELECT * FROM `student` WHERE `student`.`fld2` = '$id' ";
						$sql5_run = mysqli_query($con, $sql5);
						$sql5_get = mysqli_fetch_array($sql5_run);
						$student_name = $sql5_get['fld1']; 

						?>
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $student_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `marks` WHERE `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											$subject = $sql2_get['subject']; 
											$total = $sql2_get['total']; 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px"><?php echo $subject;?></td>
									</tr>
									<?php
								}
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px"><b>Total Markes & GPA</b></td>
									</tr>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `marks` WHERE `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											 
											$total = $sql2_get['total']; 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><?php echo $total;?></td>
									</tr>
									<?php
								}
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><b><?php echo $gtotal;?></b></td>
									</tr>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `marks` WHERE `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											 
											$grade = $sql2_get['grade']; 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><?php echo $grade;?></td>
									</tr>
									<?php
								}
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><b><?php echo $ggrade;?></b></td>
									</tr>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `marks` WHERE `class` = '$class' AND `exam_type`='$exam' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											 
											$gp = getGradePoint($sql2_get['grade']); 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><?php echo $gp;?></td>
									</tr>
									<?php
								}
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><b><?php echo $gpa;?></b></td>
									</tr>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $stats;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo getPosition($i);?></td>
						</tr>


						<?php
						$i++;
					}
				?>

			</table>
			
		</div>
	</body>
<html>