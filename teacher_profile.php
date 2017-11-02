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
			$fld2=$run_data_array['tld2'];
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
						<div class="student2"><img src="image/teacher/<?php echo $fld0;?>"></div>

						<table class="profile_table">
							<tr>
								<td class="fldl">Teacher's Name</td>
								<td><?php echo $fld1 ;?></td>
							</tr>

							<tr>
								<td class="fldl">Teacher's ID</td>
								<td><?php echo $fld2;?></td>
							</tr>
							<tr>
								<td class="fldl">Father's Name</td>
								<td><?php echo $fld3;?></td>
							</tr>
							<tr>
								<td class="fldl">Mother's Name</td>									
								<td><?php echo $fld4 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Username</td>
								<td><?php echo $fld5 ;?></td>
							</tr>
							<tr>
								<td class="fldl">E-mail</td>
								<td><?php echo $fld6 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Mobile Number</td>
								<td><?php echo $fld9 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Gender</td>
								<td><?php echo $fld10 ;?></td>
							</tr>

							<tr>
								<td class="fldl">Date of Birth</td>
								<td><?php echo $fld11 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Religion</td>
								<td><?php echo $fld12 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Blood Group</td>
								<td><?php echo $fld13 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Nationality</td>
								<td><?php echo $fld14 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Present Address</td>
								<td><?php echo $fld15 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Permanent Address</td>
								<td><?php echo $fld16 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Teacher's Designation</td>
								<td><?php echo $fld17 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Teaching Subject</td>
								<td><?php echo $fld18 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Appoinment Date</td>
								<td><?php echo $fld19 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Joinning Date</td>
								<td><?php echo $fld20 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Place of Posting</td>
								<td><?php echo $fld21 ;?></td>
							</tr>
							<tr>
								<td class="fldl">First Institute</td>
								<td><?php echo $fld22 ;?></td>
							</tr>
							<tr>
								<td class="fldl">National ID no</td>
								<td><?php echo $fld23 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Teacher Index no</td>
								<td><?php echo $fld24 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Head Examinar Code</td>
								<td><?php echo $fld25 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Examinar Code</td>
								<td><?php echo $fld26 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Teaching level</td>
								<td><?php echo $fld27 ;?></td>
							</tr>
							<tr>
								<td class="fldl">Teaching Class</td>
								<td><?php echo $fld28 ;?></td>
							</tr>
						
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</body>
<html>

