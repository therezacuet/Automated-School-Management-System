<?php  
session_start();
$pagetitle = 'Final Tabulation Sheet'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
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
				<div style="width: 951px;margin: 108px auto;;">
					<table>
						<tr>
							<td  colspan="4" style="font-size:18px;color:#000; font-weight:bold">Final Result Make With</td>
						</tr>
						<tr >
							<td colspan="4" style="padding: 0px 0px 10px;">
								<?php
								$ccsql="SELECT * FROM `exam_type` ";
									$ccsql_run = mysqli_query($con, $ccsql);
									$i = 1;
									while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
										$class_name = $ccsql_get['exam_type'];
										$per = $ccsql_get['per'];
										echo '<input type="checkbox" name="checkbox'.$i.'" value="'.$class_name.'"><label>&nbsp;'.$class_name.'&nbsp;('.$per.'%)&nbsp;&nbsp;&nbsp;</label>';
										$i++;
								}
								?>
								<!-- <input type="checkbox" name="checkbox1" value="Annual"><label>&nbsp;Annual</label> -->
							</td>
						</tr>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Class</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Section</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Group</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Year</td>
							
						</tr>

						<tr>
							<td>
								<select type="text" name="class" class="ins_input_xsm" style="width: 200px;" required>
										<option>Choose a Class</option>
										<?php getClass();?>
								</select>
							</td>
							<td>
								<select type="text" name="section" class="ins_input_xsm" style="width: 200px;" required>
										<option>Choose a Section</option>
										<?php getSection();?>
								</select>
							</td>
							<td>
								<select type="text" name="group" class="ins_input_xsm" style="width: 200px;" required>
										<option>Choose a Group</option>
										<?php getGroup();?>
								</select>
							</td>
							<td>
								<input  type="text" name="year" class="ins_input_xsm" style="width: 200px;" placeholder="Year" >
							</td>
						</tr>
					</table>


						<input type="submit" name="submit"  style="width: 114px;height: 36px;background: #3972B5;position: relative;left: 848px;top: -36px;border-radius: 5px;color: white;font-size: 19px;border: none;" Value="Go">
				</div>
			</form>
		</div>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
		</script>
	</body>

<html>

<?php
	if (isset($_POST['submit'])) {

$count = 0;		$cadit = 0;
		for ($i=1; $i < 50; $i++) { 
			$name = 'checkbox'.$i;
			if (isset($_POST[$name])) {
				$count++;
				${'chek'.$count} = $_POST[$name];

				$ccsql="SELECT * FROM `exam_type` WHERE `exam_type`.`exam_type` = '${'chek'.$count}'";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					${'per'.$count} = $ccsql_get['per']/100;
					$cadit += ${'per'.$i};
			}
		}

		$sql1="TRUNCATE `final_result`";
		$sql1_run = mysqli_query($con, $sql1);


		$class =$_POST['class'];
		$section =$_POST['section'];
		$group =$_POST['group']; 
		$year =$_POST['year'];
		$grand_total = 0;
		$grand_gpa = 0;
		$detail ="";
		$failstats = "Failed in ";

		$sql5 = "SELECT * FROM `student` WHERE `student`.`class` = '$class' AND `student`.`class_group` = '$group'";
		$sql5_run = mysqli_query($con, $sql5);
		while($sql5_get = mysqli_fetch_array($sql5_run)){
			$student_id = $sql5_get['fld2']; 
			$student_name = $sql5_get['fld1']; 
			$student_section = $sql5_get['section']; 
			for ($i=1; $i < $count + 1; $i++) { 
				$sql = "SELECT * FROM `result` WHERE `student_id` = '$student_id' AND `class` = '$class' AND `exam_type`='${'chek'.$i}' AND `class_group`='$group' AND `year` = '$year'";
				$sql_run = mysqli_query($con, $sql);
				$sql_get = mysqli_fetch_array($sql_run);
				$total = $sql_get['total']*${'per'.$i};
				$gpa = $sql_get['gpa']*${'per'.$i};
				$no = ${'per'.$i}*100;
				$detail .= ${'chek'.$i}." (".$no."%) : ".$total."<br>";
				$grand_total += $total;
				$grand_gpa += $gpa;
				
			}
			$details =  rtrim($detail, "<br>");
			$final_gpa = $grand_gpa/$cadit;
			$final_grade = getGradeToPoint($final_gpa);

			$sql2="SELECT * FROM `pass_fail` WHERE `student_id` = '$student_id' AND `class` = '$class' AND `class_group` = '$group' AND `year` = '$year' AND `grade` = 'F'";
			$sql2_run = mysqli_query($con, $sql2);
			$sql2_num_row = mysqli_num_rows($sql2_run);
			if ($sql2_num_row > 0) {
				$failstats  .= $sql2_num_row." subject(s)<br>";
				/*while($sql2_get = mysqli_fetch_array($sql2_run)){
					$failsubject = $sql2_get['subject'];
					$failstats .= $failsubject.", ";
				}*/

			}else{
				$failstats = "Passed";
			}

				// $failstats = rtrim($failstats, ", ");
				$sql0 = "INSERT INTO `final_result` (`id`, `student_id`, `student_name`, `student_section`, `detail`, `total_mark`, `gpa`, `grade`, `stats`) VALUES (NULL, '$student_id', '$student_name', '$student_section', '$details', '$grand_total', '$final_gpa', '$final_grade', '$failstats')";
				$sql0_run = mysqli_query($con, $sql0);

			$grand_total = 0;
			$grand_gpa = 0;
			$detail ="";
			$failstats = "Failed in ";
			
		}


		echo "<script>window.open('final_tabulation_sheet.php?class=$class&section=$section&group=$group&year=$year','_self')</script>";
	}
?>