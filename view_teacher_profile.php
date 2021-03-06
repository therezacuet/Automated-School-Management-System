<?php 
session_start();

$pagetitle = 'Teacher Profile'; 
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
		if (isset($_GET['teacher'])) {
			$teacher_id = $_GET['teacher'];
		}

		$get_data = "SELECT * FROM teacher WHERE `teacher_id`='$teacher_id'";
		$run_data = mysqli_query($con, $get_data);
		while($run_data_array = mysqli_fetch_array($run_data)){
			$fld0="image/teacher/".$run_data_array['tld0'];
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
			$type=$run_data_array['type'];
			
		}
		?>
		<div class="container">
			<div class="line0"><img src="<?php echo $fld0;?>"></div>
			<div class="line1"><?php echo $fld1;?></div>
			<div class="line21"><?php echo $fld21;?></div>
			<div class="line29">Type: <?php echo $type;?> Teacher</div>
			<div class="line2">Teacher's ID: <?php echo $fld2;?></div>


			<table>
				<tr>
					<td style="width: 202px;"><b>Father's name</b></td>
					<td>: <?php echo $fld3;?></td>
				</tr>
				<tr>
					<td><b>Mother's name</b></td>
					<td>: <?php echo $fld4;?></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>: <?php echo $fld6;?></td>
				</tr>
				<tr>
					<td><b>Mobile</b></td>
					<td>: <?php echo $fld9;?></td>
				</tr>
				<tr>
					<td><b>Date of Birth</b></td>
					<td>: <?php echo $fld11;?></td>
				</tr>
				<tr>
					<td><b>Religion</b></td>
					<td>: <?php echo $fld12;?></td>
				</tr>
				<tr>
					<td><b>Blood Group</b></td>
					<td>: <?php echo $fld13;?></td>
				</tr>
				<tr>
					<td><b>Nationality</b></td>
					<td>: <?php echo $fld14;?></td>
				</tr>
				<tr>
					<td><b>Present Address</b></td>
					<td>: <?php echo $fld15;?></td>
				</tr>
				<tr>
					<td><b>Permanent Address</b></td>
					<td>: <?php echo $fld16;?></td>
				</tr>
				<tr>
					<td><b>Designation</b></td>
					<td>: <?php echo $fld17;?></td>
				</tr>
				
				<tr>
					<td><b>Teaching Subject</b></td>
					<td>: <?php echo $fld18;?></td>
				</tr>
				<tr>
					<td><b>Appoinment Date</b></td>
					<td>: <?php echo $fld19;?></td>
				</tr>
				<tr>
					<td><b>Joinning Date</b></td>
					<td>: <?php echo $fld20;?></td>
				</tr>
				<tr>
					<td><b>National ID</b></td>
					<td>: <?php echo $fld23;?></td>
				</tr>
				


			</table>
			<form class="no-print" method="POST">
            <input name="print" class="print button" value="Print" type="submit" style="margin: 0;position: absolute;top: 167px;left: 663px;" onClick="window.print()">
        </form>
		</div>


	</body>
</html>

