<?php 
session_start();
 $pagetitle = 'Add Marks'; 
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
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
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
			<?php
				
				if (isset($_GET['id'])&&!empty($_GET['id'])&&isset($_GET['exam'])&&!empty($_GET['exam'])&&isset($_GET['class'])&&!empty($_GET['class'])&&isset($_GET['group'])&&!empty($_GET['group'])) {

					$id = $_GET['id'];
					$exam = $_GET['exam'];
					$class = $_GET['class'];
					$group = $_GET['group'];
					$year = $_GET['year'];

			?>
				<div style="font-size:20px"><b>Student ID: </b> <?php echo $id;?> &nbsp;&nbsp;&nbsp;&nbsp; <b>Exam type: </b><?php echo $exam;?>  &nbsp;&nbsp;&nbsp;&nbsp; <b>Class: </b><?php echo $class;?> &nbsp;&nbsp;&nbsp;&nbsp;  <b>Group: </b><?php echo $group;?> &nbsp;&nbsp;&nbsp;&nbsp;  <b>Year: </b><?php echo $year;?></div>

				<table style = "width: 470px;margin: 35px auto;color: rgb(0, 0, 0);font-size: 18px;text-align: center;">
					<tr style ="height: 35px;background-color: rgb(235, 235, 235);">
						<th style ="border: 1px solid rgb(170, 164, 170);padding: 0px 65px;">Subject</th>
						<th style ="border: 1px solid rgb(170, 164, 170);padding: 0px 18px;">Pair Stats</th>
						<th style ="border: 1px solid rgb(170, 164, 170);padding: 0px 18px;">Full Mark</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair1 Written</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair2 Written</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Written</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair1 MCQ</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair2 MCQ</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">MCQ</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair1 Practical</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">Pair2 practical</th>
						<th style ="border: 1px solid rgb(170, 164, 170);width: 121px;">practical</th>
					</tr>


					<?php
						$sql = "SELECT * FROM `subject` WHERE `subject`.`class` = '$class' AND `subject`.`class_group` = '$group' AND `subject`.`type` = 1";
						$sql_run = mysqli_query($con, $sql);
						$i=1;
						while ($sql_get = mysqli_fetch_array($sql_run)) {
							$sub_name = $sql_get['sub_name'];
							$pair = $sql_get['pair'];
							$fmark = $sql_get['fmark'];
							/*$p1w = $sql_get['p1w'];
							$p2w = $sql_get['p2w'];
							$p1m = $sql_get['p1m'];
							$p2m = $sql_get['p2m'];
							$p1p = $sql_get['p1p'];
							$p2p = $sql_get['p2p'];*/

							if ($pair==1) {
								$p_stats="Pair";
							}else
								$p_stats="Unpair";

							?>

							<tr>
								<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $sub_name;?></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $p_stats;?></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $fmark;?></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field1<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field2<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field3<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field4<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field5<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field6<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field7<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field8<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
								<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field9<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
							</tr>

							<input type="hidden" name="sub<?php echo $i;?>" value ="<?php echo $sub_name;?>" >
							<input type="hidden" name="pair<?php echo $i;?>" value ="<?php echo $pair;?>" >
							<input type="hidden" name="fmark<?php echo $i;?>" value ="<?php echo $fmark;?>" >
							
							<?php
						$i++; 
						
						}
						
					}

				?>

				<?php
						$sql = "SELECT * FROM `optional_subject` WHERE `optional_subject`.`student_id` = '$id' AND `optional_subject`.`class` = '$class' ";
						$sql_run = mysqli_query($con, $sql);
						$sql_get = mysqli_fetch_array($sql_run);
						$main = $sql_get['main'];
						$optional = $sql_get['optional'];
						if (!empty($main) && !empty($optional)) {
							$sql = "SELECT * FROM `subject` WHERE `subject`.`class` = '$class' AND `subject`.`class_group` = '$group' AND `subject`.`sub_name` = '$main'";
							$sql_run = mysqli_query($con, $sql);
								$sql_get = mysqli_fetch_array($sql_run);
								$sub_name = $sql_get['sub_name'];
								$pair = $sql_get['pair'];
								$fmark = $sql_get['fmark'];
								/*$p1w = $sql_get['p1w'];
								$p2w = $sql_get['p2w'];
								$p1m = $sql_get['p1m'];
								$p2m = $sql_get['p2m'];
								$p1p = $sql_get['p1p'];
								$p2p = $sql_get['p2p'];*/

								if ($pair==1) {
									$p_stats="Pair";
								}else
									$p_stats="Unpair";

								?>

								<tr>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $sub_name;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $p_stats;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $fmark;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field1<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field2<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field3<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field4<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field5<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field6<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field7<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field8<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field9<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
								</tr>

								<input type="hidden" name="sub<?php echo $i;?>" value ="<?php echo $sub_name;?>" >
								<input type="hidden" name="pair<?php echo $i;?>" value ="<?php echo $pair;?>" >
								<input type="hidden" name="fmark<?php echo $i;?>" value ="<?php echo $fmark;?>" >
								<?php
							$i++; 


							$sql = "SELECT * FROM `subject` WHERE `subject`.`class` = '$class' AND `subject`.`class_group` = '$group' AND `subject`.`sub_name` = '$optional'";
							$sql_run = mysqli_query($con, $sql);
								$sql_get = mysqli_fetch_array($sql_run);
								$sub_name = $sql_get['sub_name'];
								$pair = $sql_get['pair'];
								$fmark = $sql_get['fmark'];
								/*$p1w = $sql_get['p1w'];
								$p2w = $sql_get['p2w'];
								$p1m = $sql_get['p1m'];
								$p2m = $sql_get['p2m'];
								$p1p = $sql_get['p1p'];
								$p2p = $sql_get['p2p'];*/

								if ($pair==1) {
									$p_stats="Pair";
								}else
									$p_stats="Unpair";

								?>

								<tr>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $sub_name;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $p_stats;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><?php echo $fmark;?></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field1<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field2<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field3<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field4<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field5<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field6<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field7<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field8<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 0 ) echo  "disabled"; else echo "required"; ?>></td>
									<td style ="border: 1px solid rgb(170, 164, 170);"><input  type="text" name="field9<?php echo $i;?>" style = "height: 35px;   width: 75px;padding: 0 5px 0 5px;font-size: 15px;text-align: center;" <?php if($pair == 1 ) echo  "disabled"; else echo "required"; ?>></td>
								</tr>

								<input type="hidden" name="sub<?php echo $i;?>" value ="<?php echo $sub_name;?>" >
								<input type="hidden" name="pair<?php echo $i;?>" value ="<?php echo $pair;?>" >
								<input type="hidden" name="fmark<?php echo $i;?>" value ="<?php echo $fmark;?>" >
								<?php
							$i++;
						}

					

				?>


				</table>

				<input type="submit" Value="Submit" class="submit_mid_bottom" name ="submit" style="margin: 0 0 0 48%;">
			</form>
		</div>
	</body>
<html>

<?php
	if(isset($_POST['submit'])){
		$total = " ";$gpa =" ";$fail=" ";
		$total = 0;$gap = 0;$fail=0;$grand_total=0;$fm = 0;
		for ($j=1; $j < $i; $j++) {
			
			$sub = "sub".$j; 
			$pair_stats = "pair".$j; 
			$fmark = "fmark".$j; 
			$subject = $_POST[$sub];
			$pair = $_POST[$pair_stats];
			$fullmark = $_POST[$fmark];

			if ($pair==1) {
				$fld1 = "field1".$j;
				$fld2 = "field2".$j; 
			
				$fld4 = "field4".$j; 
				$fld5 = "field5".$j; 
		 
				$fld7 = "field7".$j; 
				$fld8 = "field8".$j; 
			
				$field1 = $_POST[$fld1];
				$field2 = $_POST[$fld2];
				$field3 = $field1 + $field2;
				$field4 = $_POST[$fld4];
				$field5 = $_POST[$fld5];
				$field6 = $field4 + $field5;
				$field7 = $_POST[$fld7];
				$field8 = $_POST[$fld8];
				$field9 =  $field7 + $field8;
				$total = $field3 + $field6 + $field9;
				$grade_total = $total / 2 ;
				$grade_total = getPersentage($grade_total, $fullmark);
				$grade_total = round($grade_total, 0, PHP_ROUND_HALF_UP);
				$fm = $fullmark*2;
			}else{

 
				$fld3 = "field3".$j; 

				$fld6 = "field6".$j; 
 
				$fld9 = "field9".$j; 
				$field1 = "0";
				$field2 = "0";
				$field3 = $_POST[$fld3];
				$field4 = "0";
				$field5 = "0";
				$field6 = $_POST[$fld6];
				$field7 = "0";
				$field8 = "0";
				$field9 = $_POST[$fld9];

				$total = $field3 + $field6 + $field9;
				$grade_total = $total;
				$grade_total = getPersentage($grade_total, $fullmark);
				$grade_total = round($grade_total, 0, PHP_ROUND_HALF_UP);
				$fm = $fullmark;
			}
			







			$grade=getGrade($grade_total);
			$point = getGradePoint($grade);
			if($grade=='F'){
				$fail++;
			}


			$sql="INSERT INTO `marks` (`id`, `student_id`, `class`, `exam_type`, `class_group`, `year`, `subject`, `pair`, `p1w`, `p2w`, `t1`, `p1m`, `p2m`, `t2`, `p1p`, `p2p`, `t3`, `total`, `grade_total`, `grade`) VALUES 
												  (NULL, '$id', '$class', '$exam', '$group', '$year', '$subject', '$pair', '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', '$field7', '$field8', '$field9', '$total', '$grade_total', '$grade')";
			$sql_run = mysqli_query($con, $sql);

			$sql2="SELECT * FROM `pass_fail` WHERE `student_id` = '$id' AND `class` = '$class' AND `class_group` = '$group' AND `year` = '$year' AND `subject` = '$subject'";
			$sql2_run = mysqli_query($con, $sql2);
			$sql2_num_row = mysqli_num_rows($sql2_run);

			if ($sql2_num_row == 1) {
				$sql2_get = mysqli_fetch_array($sql2_run);
				$rowid = $sql2_get['id'];
				$rowtotal = $sql2_get['total'] + $total;
				$rowfm = $sql2_get['full_mark'] + $fm;
				$ver = getPersentage($rowtotal, $rowfm);
				$gr = getGrade($ver) ; 
				$sql3="UPDATE `pass_fail` SET `total` = '$rowtotal', `full_mark` = '$rowfm', `grade` = '$gr' WHERE `pass_fail`.`id` = '$rowid'";
				$sql3_run = mysqli_query($con, $sql3);
			}else{
				$sql3="INSERT INTO `pass_fail` (`id`, `student_id`, `class`, `class_group`, `year`, `subject`,  `total`, `full_mark`, `grade`) VALUES 
													  (NULL, '$id', '$class', '$group', '$year', '$subject',  '$total', '$fm', '$grade')";
				$sql3_run = mysqli_query($con, $sql3);
				
			}


			$grand_total = $total +$grand_total;
			$gpa = $gpa + $point;
		}


			 $gpa_point = $gpa/($i-1);
			 $gpa_grade = getGradeToPoint($gpa_point);
			 if ($fail > 0) {
			 	$stats = "Fail";
			 	//$gpa_point = $gpa/($i-1-$fail);
			 	$gpa_point = 0.00;
			 	$gpa_grade = "F";
			 }
			 	
			 else $stats = "Pass";

				$sql2="INSERT INTO `result` (`id`, `student_id`, `class`, `exam_type`, `class_group`, `year`, `total`, `gpa`, `grade`, `stats`) VALUES (NULL,'$id', '$class', '$exam', '$group', '$year', '$grand_total', '$gpa_point', '$gpa_grade', '$stats')";
				$sql2_run = mysqli_query($con, $sql2);
				if($sql_run&&$sql2_run){
					echo "<script>alert('Successful')</script>";
					echo "<script>window.open('publish_result.php','_self')</script>";
				}else{
					echo "<script>alert('Failed! Try again leter.')</script>";
				}
			}

		

?>