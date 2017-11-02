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

	if (isset($_GET['section'])&&!empty($_GET['section'])&&isset($_GET['class'])&&!empty($_GET['class'])&&isset($_GET['group'])&&!empty($_GET['group'])) {

		$section = $_GET['section'];
		$class = $_GET['class'];
		$group = $_GET['group'];
		$year = $_GET['year'];
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
			<h2>Final Tebulation Sheet</h2>
			<h3>Class <?php echo $class." Examination - ".$year;?></h3>
			<h3>Section: <?php echo $section;?></h3>
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
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 31px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 63px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 25%;">Subject</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 55px;">Grade</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 55px;">GP</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 55px;">GPA</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 55px;">Grade</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 55px;">Total</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 60px;">Stats</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 45px;">Marit Position</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `final_result` WHERE `student_section` = '$section' ORDER BY `final_result`.`stats` DESC,  `total_mark` DESC ";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {

						$total = $sql_get['total_mark']; 
						$gpa = $sql_get['gpa']; 
						$grade = $sql_get['grade']; 
						$stats = $sql_get['stats']; 
						$id = $sql_get['student_id']; 
						$student_name = $sql_get['student_name']; 
						

						$sql2 = "SELECT `rank` FROM ( select @rownum:=@rownum+1 `rank`, p.* from `final_result` p, (SELECT @rownum:=0) r order by `stats` DESC, `total_mark` DESC ) s WHERE `student_id` = '$id'";
						$sql2_run = mysqli_query($con, $sql2);
						$sql2_get = mysqli_fetch_array($sql2_run);
						$pos = $sql2_get['rank'];

/*						$sql = "SELECT * FROM `final_result` ORDER BY `final_result`.`stats` DESC, `total_mark` DESC ";
							$sql_run = mysqli_query($con, $sql);
							$j=1;
							while ($sql_get = mysqli_fetch_array($sql_run)) {
								$stu_id = $sql_get['student_id'];
								
								if (condition) {*/
							/*		$j++;
								}
							}*/

						?>
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5; text-align: left; padding-left: 10px;"><?php echo $student_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `pass_fail` WHERE `class` = '$class' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											$subject = $sql2_get['subject']; 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px"><?php echo $subject;?></td>
									</tr>
									<?php
								}
									?>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `pass_fail` WHERE `class` = '$class' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											$ggrade = $sql2_get['grade']; 
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><?php echo $ggrade;?></td>
									</tr>
									<?php
								}
									?>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<table style="width: 100%;">
									<?php
										$sql2 = "SELECT * FROM `pass_fail` WHERE `class` = '$class' AND `class_group`='$group' AND `year` = '$year' AND `student_id` = '$id'";
										$sql2_run = mysqli_query($con, $sql2);
										$gpa = 0; $j = 0;$f = 0;
										while ($sql2_get = mysqli_fetch_array($sql2_run)) {

											$gp = getGradePoint($sql2_get['grade']); 
											$gpa += $gp;
											$j++;

											if ($gp == 'F') {
												$f = 1;
											}
									?>
									<tr style="border: 1px solid #A5A5A5;text-align:">
										<td style="border: 1px solid #A5A5A5;text-align: center"><?php echo $gp;?></td>
									</tr>
									<?php
								}
									?>
								</table>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php if ($f == 1) {
								echo $ggpa = '0.00';
							}else {echo $ggpa = round($gpa/$j, 3);}?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo getGradeToPoint($ggpa);?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $total;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $stats;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo getPosition($pos);?></td>
						</tr>


						<?php
						$i++;
					}
				?>

			</table>

		</div>
	</body>
<html>