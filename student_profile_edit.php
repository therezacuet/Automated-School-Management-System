<?php 
session_start();
 $pagetitle = 'User Profile'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin()|| empty($_SESSION['student_id'])) {
		header("Location: 404.html"); 
		exit();
	}
	$id=$_SESSION['student_id'];
	$user_id = getfield("student_id");

		$get_data = "select * from student where `student_id`='$id'";
		$run_data = mysqli_query($con, $get_data);
		while($run_data_array = mysqli_fetch_array($run_data)){
			$fld0=$run_data_array['fld0'];
			$fld1=$run_data_array['fld1'];
			// $fld2=$run_data_array['fld2'];
			$fld3=$run_data_array['fld3'];
			$fld4=$run_data_array['fld4'];
			$fld5=$run_data_array['fld5'];

			$fld7=$run_data_array['fld7'];
			$fld8=$run_data_array['fld8'];
			$fld9=$run_data_array['fld9'];
			$fld10=$run_data_array['fld10'];
			$fld11=$run_data_array['fld11'];
			$fld12=$run_data_array['fld12'];
			$fld13=$run_data_array['fld13'];
			$fld14=$run_data_array['fld14'];
			$fld15=$run_data_array['fld15'];
			$fld16=$run_data_array['fld16'];
			$fld17=$run_data_array['fld17'];
			$fld18=$run_data_array['fld18'];
			$fld19=$run_data_array['fld19'];
			$fld20=$run_data_array['fld20'];
			$fld21=$run_data_array['fld21'];
			$fld22=$run_data_array['fld22'];
			$fld23=$run_data_array['fld23'];
			$fld24=$run_data_array['fld24'];
			$fld25=$run_data_array['fld25'];
			$fld26=$run_data_array['fld26'];
			$fld27=$run_data_array['fld27'];
			$fld28=$run_data_array['fld28'];
			$fld29=$run_data_array['fld29'];
			$fld30=$run_data_array['fld30'];
			$fld31=$run_data_array['fld31'];
			$fld32=$run_data_array['fld32'];
			$fld33=$run_data_array['fld33'];
			$fld34=$run_data_array['fld34'];
			$fld35=$run_data_array['fld35'];
		}
		
	
?>
<style type="text/css">
.input_field{
	width: 52%;
padding: 4px 10px;
margin: 3px 0;
}
.submit{
width: 192px;
height: 36px;
background: #3972B5;
position: relative;
left: 52%;
top: 0px;
border-radius: 5px;
color: white;
font-size: 19px;
border: none;
margin: 0 0 20px 0;
}

</style>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					<?php getSM();?>
				</div>
				<div class="profile_body">
					<div class="profile_body2">
				<div class="student">Student</div>

	<form method="post" enctype="multipart/form-data">	
						<table class="profile_table">
								<tr>
									<td class="fldl">Student's Name</td>
									<td><input type="text" class="input_field" name="field1" value="<?php echo $fld1;?>" ></td>
								</tr>

<!-- 								<tr>
									<td class="fldl">Student's ID</td>
									<td><input type="text" class="input_field" name="field2" value="<?php echo $fld2;?>"></td>

								</tr> -->
							
								
								<tr>
									<td class="fldl">E-mail</td>
									<td><input type="text" class="input_field" name="field4" value="<?php echo $fld4;?>"></td>

								</tr>

								<tr>
									<td class="fldl">Primary Mobile</td>
									<td><input type="text" class="input_field" name="field7" value="<?php echo $fld7;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Gender</td>
									<td><select class="input_field" name="field8" value=""><?php echo $fld8;?>
										<option>Male</option>
										<option>Female</option>
									</select> </td>

								</tr>

								<tr>
									<td class="fldl">Date of Birth</td>
									<td><input type="text" class="input_field" name="field9" value="<?php echo $fld9;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Religion</td>
									<td><input type="text" class="input_field" name="field10" value="<?php echo $fld10;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Blood Group</td>
									<td><input type="text" class="input_field" name="field11" value="<?php echo $fld11;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Nationality</td>
									<td><input type="text" class="input_field" name="field12" value="<?php echo $fld12;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Present Address</td>
									<td><input type="text" class="input_field" name="field13" value="<?php echo $fld13;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Permanent Address</td>
									<td><input type="text" class="input_field" name="field14" value="<?php echo $fld14;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Pervious Institute</td>
									<td><input type="text" class="input_field" name="field15" value="<?php echo $fld15;?>"></td>
								</tr>
								<tr>
									<td class="fldl">T.C. Number</td>
									<td><input type="text" class="input_field" name="field16" value="<?php echo $fld16;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Physical or Mental Disability (if any)</td>
									<td><input type="text" class="input_field" name="field17" value="<?php echo $fld17;?>"></td>
								</tr>
							</table>
							<input name="student"  class="submit" value="Update Student info" type="submit">

</form>

						</div>
						<div class="profile_body2">
						<div class="student">Father's</div>
<form method="post" enctype="multipart/form-data">				
							<table class="profile_table">
								<tr>
									<td class="fldl">Father's name</td>
									<td><input type="text" class="input_field" name="field18" value="<?php echo $fld18;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Profession</td>
									<td><input type="text" class="input_field" name="field19" value="<?php echo $fld19;?>"></td>
								</tr>

								<tr>
									<td class="fldl">Designation</td>
									<td><input type="text" class="input_field" name="field20" value="<?php echo $fld20;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><input type="text" class="input_field" name="field21" value="<?php echo $fld21;?>"></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><input type="text" class="input_field" name="field22" value="<?php echo $fld22;?>"></td>

								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><input type="text" class="input_field" name="field23" value="<?php echo $fld23;?>"></td>
								</tr>
								
							</table>
							<input name="father"  class="submit" value="Update Father info" type="submit">
</form>
						</div>
						<div class="profile_body2">
				<div class="student">Mother's</div>
<form method="post" enctype="multipart/form-data">
							<table class="profile_table">
								<tr>
									<td class="fldl">Mother's name</td>
									<td><input type="text" class="input_field" name="field24" value="<?php echo $fld24;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Profession</td>
									<td><input type="text" class="input_field" name="field25" value="<?php echo $fld25;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Designation</td>

									<td><input type="text" class="input_field" name="field26" value="<?php echo $fld26;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><input type="text" class="input_field" name="field27" value="<?php echo $fld27;?>"></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><input type="text" class="input_field" name="field28" value="<?php echo $fld28;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><input type="text" class="input_field" name="field29" value="<?php echo $fld29;?>"></td>
								</tr>
								
							</table>
							<input name="mother"  class="submit" value="Update Mother info" type="submit">
</form>
						</div>
						<div class="profile_body2">
<form method="post" enctype="multipart/form-data">
							<div class="student">Guardian's</div>
							<table class="profile_table">
								
								<tr>
									<td class="fldl">Guardian's Name</td>
									<td><input type="text" class="input_field" name="field30" value="<?php echo $fld30;?>"></td>
								</tr>

								<tr>
									<td class="fldl">Profession</td>
									<td><input type="text" class="input_field" name="field31" value="<?php echo $fld31;?>"></td>
								</tr>

								<tr>
									<td class="fldl">Designation</td>
									<td><input type="text" class="input_field" name="field32" value="<?php echo $fld32;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><input type="text" class="input_field" name="field33" value="<?php echo $fld33;?>"></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><input type="text" class="input_field" name="field34" value="<?php echo $fld34;?>"></td>
								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><input type="text" class="input_field" name="field35" value="<?php echo $fld35;?>"></td>
								</tr>
								
							</table>
							<input name="guardian"  class="submit" value="Update Guardian info" type="submit">
</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


<?php
	if (isset($_POST['student'])) {

			$fld1=$_POST['field1'];
			//$fld2=$_POST['field2'];
			$fld4=$_POST['field4'];
			$fld7=$_POST['field7'];
			$fld8=$_POST['field8'];
			$fld9=$_POST['field9'];
			$fld10=$_POST['field10'];
			$fld11=$_POST['field11'];
			$fld12=$_POST['field12'];
			$fld13=$_POST['field13'];
			$fld14=$_POST['field14'];
			$fld15=$_POST['field15'];
			$fld16=$_POST['field16'];
			$fld17=$_POST['field17'];

			$sql  = "UPDATE `student` SET `fld1` = '$fld1',  `fld4` = '$fld4', `fld7` = '$fld7', `fld8` = '$fld8', `fld9` = '$fld9', `fld10` = '$fld10', `fld11` = '$fld11', `fld12` = '$fld12', `fld13` = '$fld13', `fld14` = '$fld14', `fld15` = '$fld15', `fld16` = '$fld16', `fld17` = '$fld17' WHERE `student`.`student_id` = '$id'";


			$sql_run = mysqli_query($con, $sql);

			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
	}

?>

<?php
	if (isset($_POST['father'])) {

			$fld18=$_POST['field18'];
			$fld19=$_POST['field19'];
			$fld20=$_POST['field20'];
			$fld21=$_POST['field21'];
			$fld22=$_POST['field22'];
			$fld23=$_POST['field23'];

			$sql  = "UPDATE `student` SET `fld18` = '$fld18', `fld19` = '$fld19', `fld20` = '$fld20', `fld21` = '$fld21', `fld22` = '$fld22', `fld23` = '$fld23' WHERE `student`.`student_id` = '$id'";


			$sql_run = mysqli_query($con, $sql);

			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
	}

?>

<?php
	if (isset($_POST['mother'])) {

			$fld24=$_POST['field24'];
			$fld25=$_POST['field25'];
			$fld26=$_POST['field26'];
			$fld27=$_POST['field27'];
			$fld28=$_POST['field28'];
			$fld29=$_POST['field29'];

			$sql  = "UPDATE `student` SET `fld24` = '$fld24', `fld25` = '$fld25', `fld26` = '$fld26', `fld27` = '$fld27', `fld28` = '$fld28', `fld29` = '$fld29' WHERE `student`.`student_id` = '$id'";


			$sql_run = mysqli_query($con, $sql);

			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
	}

?>

<?php
	if (isset($_POST['guardian'])) {

			$fld30=$_POST['field30'];
			$fld31=$_POST['field31'];
			$fld32=$_POST['field32'];
			$fld33=$_POST['field33'];
			$fld34=$_POST['field34'];
			$fld35=$_POST['field35'];
			

			$sql  = "UPDATE `student` SET `fld30` = '$fld30', `fld31` = '$fld31', `fld32` = '$fld32', `fld33` = '$fld33', `fld34` = '$fld34', `fld35` = '$fld35' WHERE `student`.`student_id` = '$id'";


			$sql_run = mysqli_query($con, $sql);

			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
	}

?>