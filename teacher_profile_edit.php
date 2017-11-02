<?php 
session_start();
 $pagetitle = 'User Profile'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['teacher_id'])) {
		header("Location: 404.html"); 
		exit();
	}
	$id=$_SESSION['teacher_id'];
		$get_data = "select * from teacher where `teacher_id`='$id'";
		$run_data = mysqli_query($con, $get_data);
		while($run_data_array = mysqli_fetch_array($run_data)){
			$fld0=$run_data_array['tld0'];
			$fld1=$run_data_array['tld1'];
			//$fld2=$run_data_array['tld2'];
			$fld3=$run_data_array['tld3'];
			$fld4=$run_data_array['tld4'];
			$fld5=$run_data_array['tld5'];
			$fld6=$run_data_array['tld6'];
			$fld7=$run_data_array['tld7'];
			$fld9=$run_data_array['tld9'];
			$fld10=$run_data_array['tld10'];
			$fld11=$run_data_array['tld11'];
			$fld12=$run_data_array['tld12'];
			$fld13=$run_data_array['tld13'];
			$fld14=$run_data_array['tld14'];
			$fld15=$run_data_array['tld15'];
			$fld16=$run_data_array['tld16'];
			$fld17=$run_data_array['tld17'];
			$fld18=$run_data_array['tld18'];
			$fld19=$run_data_array['tld19'];
			$fld20=$run_data_array['tld20'];
			$fld21=$run_data_array['tld21'];
			$fld22=$run_data_array['tld22'];
			$fld23=$run_data_array['tld23'];
			$fld24=$run_data_array['tld24'];
			$fld25=$run_data_array['tld25'];
			$fld26=$run_data_array['tld26'];
			$fld27=$run_data_array['tld27'];
			$fld28=$run_data_array['tld28'];
			
		}
?>
<style type="text/css">
.input_field{
	width:70%;
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
					<?php getTM();?>
				</div>
				<div class="profile_body">
					<div class="profile_body2">
						<div class="student">Teacher</div>
	<form method="post" enctype="multipart/form-data">
						<table class="profile_table">
							<tr>
								<td class="fldl">Teacher's Name</td>
								<td><input type="text" class="input_field" name="field1" value="<?php echo $fld1 ;?>"></td>
							</tr>

<!-- 							<tr>
								<td class="fldl">Teacher's ID</td>
								<td><input type="text" class="input_field" name="field2" value="<?php echo $fld2;?>"></td>
							</tr> -->
							<tr>
								<td class="fldl">Father's Name</td>
								<td><input type="text" class="input_field" name="field3" value="<?php echo $fld3;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Mother's Name</td>									
								<td><input type="text" class="input_field" name="field4" value="<?php echo $fld4 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">E-mail</td>
								<td><input type="text" class="input_field" name="field6" value="<?php echo $fld6 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Mobile Number</td>
								<td><input type="text" class="input_field" name="field9" value="<?php echo $fld9 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Gender</td>
								<td><input type="text" class="input_field" name="field10" value="<?php echo $fld10 ;?>"></td>
							</tr>

							<tr>
								<td class="fldl">Date of Birth</td>
								<td><input type="text" class="input_field" name="field11" value="<?php echo $fld11 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Religion</td>
								<td><input type="text" class="input_field" name="field12" value="<?php echo $fld12 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Blood Group</td>
								<td><input type="text" class="input_field" name="field13" value="<?php echo $fld13 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Nationality</td>
								<td><input type="text" class="input_field" name="field14" value="<?php echo $fld14 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Present Address</td>
								<td><input type="text" class="input_field" name="field15" value="<?php echo $fld15 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Permanent Address</td>
								<td><input type="text" class="input_field" name="field16" value="<?php echo $fld16 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Teacher's Designation</td>
								<td><input type="text" class="input_field" name="field17" value="<?php echo $fld17 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Teaching Subject</td>
								<td><input type="text" class="input_field" name="field18" value="<?php echo $fld18 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Appoinment Date</td>
								<td><input type="text" class="input_field" name="field19" value="<?php echo $fld19 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Joinning Date</td>
								<td><input type="text" class="input_field" name="field20" value="<?php echo $fld20 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Place of Posting</td>
								<td><input type="text" class="input_field" name="field21" value="<?php echo $fld21 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">First Institute</td>
								<td><input type="text" class="input_field" name="field22" value="<?php echo $fld22 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">National ID no</td>
								<td><input type="text" class="input_field" name="field23" value="<?php echo $fld23 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Teacher Index no</td>
								<td><input type="text" class="input_field" name="field24" value="<?php echo $fld24 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Head Examinar Code</td>
								<td><input type="text" class="input_field" name="field25" value="<?php echo $fld25 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Examinar Code</td>
								<td><input type="text" class="input_field" name="field26" value="<?php echo $fld26 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Teaching level</td>
								<td><input type="text" class="input_field" name="field27" value="<?php echo $fld27 ;?>"></td>
							</tr>
							<tr>
								<td class="fldl">Teaching Class</td>
								<td><input type="text" class="input_field" name="field28" value="<?php echo $fld28 ;?>"></td>
							</tr>
						
						</table>
						<input name="teacher"  class="submit" value="Update Teacher info" type="submit">
	</form>
					</div>
				</div>
			</div>
		</div>
		
	</body>
<html>

<?php
	if (isset($_POST['teacher'])) {
			$tld1=$_POST['field1'];
			//$tld2=$_POST['field2'];
			$tld3=$_POST['field3'];
			$tld4=$_POST['field4'];
			$tld6=$_POST['field6'];
			$tld9=$_POST['field9'];
			$tld10=$_POST['field10'];
			$tld11=$_POST['field11'];
			$tld12=$_POST['field12'];
			$tld13=$_POST['field13'];
			$tld14=$_POST['field14'];
			$tld15=$_POST['field15'];
			$tld16=$_POST['field16'];
			$tld17=$_POST['field17'];
			$tld18=$_POST['field18'];
			$tld19=$_POST['field19'];
			$tld20=$_POST['field20'];
			$tld21=$_POST['field21'];
			$tld22=$_POST['field22'];
			$tld23=$_POST['field23'];
			$tld24=$_POST['field24'];
			$tld25=$_POST['field25'];
			$tld26=$_POST['field26'];
			$tld27=$_POST['field27'];
			$tld28=$_POST['field28'];

			$sql="UPDATE `teacher` SET `tld1` = '$tld1', `tld3` = '$tld3', `tld4` = '$tld4',  `tld6` = '$tld6', `tld9` = '$tld9', `tld10` = '$tld10', `tld11` = '$tld11', `tld12` = '$tld12', `tld13` = '$tld13', `tld14` = '$tld14', `tld15` = '$tld15', `tld16` = '$tld16', `tld17` = '$tld17', `tld18` = '$tld18', `tld19` = '$tld19', `tld20` = '$tld20', `tld21` = '$tld21', `tld22` = '$tld22', `tld23` = '$tld23', `tld24` = '$tld24', `tld25` = '$tld25', `tld26` = '$tld26', `tld27` = '$tld27', `tld28` = '$tld28' WHERE `teacher`.`teacher_id` = '$id'";
			$sql_run = mysqli_query($con, $sql);

			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
	}
	
?>