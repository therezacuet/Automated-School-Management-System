<?php 
session_start();
 $pagetitle = 'View result'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
				<div style="width: 951px;margin: 108px auto;;">
					<table>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Student ID</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Exam type</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Class</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Group</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Year</td>
							
						</tr>

						<tr>
							<td>
								<input  type="text" name="field1" class="ins_input_xsm" style="width: 157px;" placeholder="Enter ID" required>

							</td>
							<td>
								<select type="text" name="field2" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Exam type</option>
										<?php getExamtype();?>
								</select>
							</td>
							<td>
								<select type="text" name="field3" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Class</option>
										<?php getClass();?>
								</select>
							</td>
							<td>
								<select type="text" name="field4" class="ins_input_xsm" style="width: 157px;" required>
										<option>Choose a Group</option>
										<?php getGroup();?>
								</select>
							</td>
							<td>
								<input  type="text" name="field5" class="ins_input_xsm" style="width: 157px;" placeholder="Year" required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit"  style="width: 114px;height: 36px;background: #3972B5;position: relative;left: 848px;top: -36px;border-radius: 5px;color: white;font-size: 19px;border: none;" Value="Go">
				</div>
			</form>
		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		$field1 =$_POST['field1'];
		$field2 =$_POST['field2'];
		$field3 =$_POST['field3'];
		$field4 =$_POST['field4'];
		$field5 =$_POST['field5'];

		echo "<script>window.open('result.php?id=$field1&exam=$field2&class=$field3&group=$field4&year=$field5','_self')</script>";
	}
?>