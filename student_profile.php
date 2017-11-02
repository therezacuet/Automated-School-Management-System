<?php 
session_start();
 $pagetitle = 'User Profile'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['student_id'])) {
		header("Location: 404.html"); 
		exit();
	}

	$id=$_SESSION['student_id'];

		$get_data = "select * from student where `student_id`='$id'";
		$run_data = mysqli_query($con, $get_data);
		while($run_data_array = mysqli_fetch_array($run_data)){
			$fld0=$run_data_array['fld0'];
			$fld1=$run_data_array['fld1'];
			$fld2=$run_data_array['fld2'];
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
				<div class="student2"><img src="image/student/<?php echo $fld0;?>"></div>

						<table class="profile_table">
								<tr>
									<td class="fldl">Student's Name</td>
									<td><?php echo $fld1;?></td>
								</tr>

								<tr>
									<td class="fldl">Student's ID</td>
									<td><?php echo $fld2;?></td>

								</tr>
							
								<tr>
									<td class="fldl">Username</td>
									<td><?php echo $fld3;?></td>

								</tr>
								<tr>
									<td class="fldl">E-mail</td>
									<td><?php echo $fld4;?></td>

								</tr>

								<tr>
									<td class="fldl">Primary Mobile</td>
									<td><?php echo $fld7;?></td>

								</tr>
								<tr>
									<td class="fldl">Gender</td>
									<td><?php echo $fld8;?></td>
								</tr>

								<tr>
									<td class="fldl">Date of Birth</td>
									<td><?php echo $fld9;?></td>

								</tr>
								<tr>
									<td class="fldl">Religion</td>
									<td><?php echo $fld10;?></td>

								</tr>
								<tr>
									<td class="fldl">Blood Group</td>
									<td><?php echo $fld11;?></td>
								</tr>
								<tr>
									<td class="fldl">Nationality</td>
									<td><?php echo $fld12;?></td>
								</tr>
								<tr>
									<td class="fldl">Present Address</td>
									<td><?php echo $fld13;?></td>

								</tr>
								<tr>
									<td class="fldl">Permanent Address</td>
									<td><?php echo $fld14;?></td>
								</tr>
								<tr>
									<td class="fldl">Pervious Institute</td>
									<td><?php echo $fld15;?></td>
								</tr>
								<tr>
									<td class="fldl">T.C. Number</td>
									<td><?php echo $fld16;?></td>
								</tr>
								<tr>
									<td class="fldl">Physical or Mental Disability (if any)</td>
									<td><?php echo $fld17;?></td>
								</tr>
							</table>
						</div>
						<div class="profile_body2">
						<div class="student">Father's</div>
				
							<table class="profile_table">
								<tr>
									<td class="fldl">Father's name</td>
									<td><?php echo $fld18;?></td>

								</tr>
								<tr>
									<td class="fldl">Profession</td>
									<td><?php echo $fld19;?></td>
								</tr>

								<tr>
									<td class="fldl">Designation</td>
									<td><?php echo $fld20;?></td>

								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><?php echo $fld21;?></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><?php echo $fld22;?></td>

								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><?php echo $fld23;?></td>
								</tr>
								
							</table>
						</div>
						<div class="profile_body2">
				<div class="student">Mother's</div>
							<table class="profile_table">
								<tr>
									<td class="fldl">Mother's name</td>
									<td><?php echo $fld24;?></td>
								</tr>
								<tr>
									<td class="fldl">Profession</td>
									<td><?php echo $fld25;?></td>
								</tr>
								<tr>
									<td class="fldl">Designation</td>

									<td><?php echo $fld26;?></td>
								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><?php echo $fld27;?></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><?php echo $fld28;?></td>
								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><?php echo $fld29;?></td>
								</tr>
								
							</table>
						</div>
						<div class="profile_body2">
							<div class="student">Guardian's</div>
							<table class="profile_table">
								
								<tr>
									<td class="fldl">Guardian's Name</td>
									<td><?php echo $fld30;?></td>
								</tr>

								<tr>
									<td class="fldl">Profession</td>
									<td><?php echo $fld31;?></td>
								</tr>

								<tr>
									<td class="fldl">Designation</td>
									<td><?php echo $fld32;?></td>
								</tr>
								<tr>
									<td class="fldl">Address</td>
									<td><?php echo $fld33;?></td>
								</tr>
								
								<tr>
									<td class="fldl">Contact Number</td>
									<td><?php echo $fld34;?></td>
								</tr>
								<tr>
									<td class="fldl">Monthly income</td>
									<td><?php echo $fld34;?></td>
								</tr>
								
							</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>