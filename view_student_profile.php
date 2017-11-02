<?php 
session_start();

$pagetitle = 'Student Profile'; 
$extra='<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link href="css/application1.css" rel="stylesheet" type="text/css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'reg'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin() || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}

?>

<style>
.container{
width: 800px;
margin: 0px auto;
position: relative;
}
.line1{
font-size: 27px;
    font-weight: bold;
}
.line0 img{
width: 107px;
position: absolute;
left: 665px;
border-radius: 9px;
box-shadow: 3px 4px 4px rgb(102, 102, 102);
}

.line2{
margin: 0 0 35px 0;
}
td{
    height: 27px;
}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}

</style>

<html>
	<?php include("head.php");?>
	<body>
		<?PHP
			include('print_header.php');
		if (isset($_GET['student'])) {
			$student_id = $_GET['student'];
		}

		$get_data = "SELECT * FROM student WHERE `student_id`='$student_id'";
		$run_data = mysqli_query($con, $get_data);
		while($run_data_array = mysqli_fetch_array($run_data)){
			$fld0="image/student/".$run_data_array['fld0'];
			$fld1=$run_data_array['fld1'];
			$fld2=$run_data_array['fld2'];
			$fld3=$run_data_array['fld3'];
			$fld4=$run_data_array['fld4'];
			$fld5=$run_data_array['fld5'];
			$fld7=$run_data_array['fld7'];
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
			$class=$run_data_array['class'];
			$shift=$run_data_array['shift']." Shift";
			$section=$run_data_array['section'];
			$class_group=$run_data_array['class_group'];
			
		}
		?>
		<div class="container">
			<div class="line0"><img src="<?php echo $fld0;?>"></div>
			<div class="line1"><?php echo $fld1;?></div>
			<div class="line21">Class: <?php echo $class;?></div>
			<div class="line21">Section: <?php echo $section;?></div>
			<div class="line21">Group: <?php echo $class_group;?></div>
			<div class="line21">Shift: <?php echo $shift;?></div>
			<div class="line2">Student's ID: <?php echo $fld2;?></div>


			<table>
				<tr>
					<td style="width: 202px;"><b>Father's name</b></td>
					<td>: <?php echo $fld18;?></td>
				</tr>
				<tr>
					<td><b>Mother's name</b></td>
					<td>: <?php echo $fld24;?></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>: <?php echo $fld4;?></td>
				</tr>
				<tr>
					<td><b>Mobile</b></td>
					<td>: <?php echo $fld7;?></td>
				</tr>
				<tr>
					<td><b>Date of Birth</b></td>
					<td>: <?php echo $fld9;?></td>
				</tr>
				<tr>
					<td><b>Religion</b></td>
					<td>: <?php echo $fld10;?></td>
				</tr>
				<tr>
					<td><b>Blood Group</b></td>
					<td>: <?php echo $fld11;?></td>
				</tr>
				<tr>
					<td><b>Nationality</b></td>
					<td>: <?php echo $fld12;?></td>
				</tr>
				<tr>
					<td><b>Present Address</b></td>
					<td>: <?php echo $fld13;?></td>
				</tr>
				<tr>
					<td><b>Permanent Address</b></td>
					<td>: <?php echo $fld14;?></td>
				</tr>
				
				


			</table>
			<form class="no-print" method="POST">
            <input name="print" class="print button" value="Print" type="submit" style="margin: 0;position: absolute;top: 167px;left: 663px;" onClick="window.print()">
        </form>
		</div>


	</body>
</html>

