<?php 
session_start();
$pagetitle = 'Student Due'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'acc'";
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

	if (isset($_GET['class']) && !empty($_GET['class'])) {
		$class = $_GET['class'];
	}
?>
<style type="text/css">
 .left{
 	float: left;
 }

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">
			<form method="post" enctype="multipart/form-data">
				<table style="width: 60%; margin: 100px auto;">
					<tr>
						<td style="font-size:19px;width: 10%;">Year:</td>
						<td style="width: 27%;">
							<select type="text" name="year" class="ins_input_xsm" style="margin-left: 10px; width: 88%; padding: 4px; border-radius: 4px; border: 2px solid rgb(0, 129, 243);" required>
									<?php 
										for ($i=date("Y"); $i >date("Y")-10 ; $i--) { 
											echo "<option value=".$i.">".$i."</option>";
										}
									?>
							</select>
						</td>
						<td style="font-size:19px;width: 10%;">Class:</td>
						<td style="width: 27%;">
							<select type="text" name="class" class="ins_input_xsm" style="margin-left: 10px; width: 88%; padding: 4px; border-radius: 4px; border: 2px solid rgb(0, 129, 243);" required>
								<?php getClass();?>
							</select>
						</td>
						<td><input type="submit" name="submit"  class="submit_xsm" Value="Go" style="left: 0; top:0;margin: 6px 0px 0px 20px;"> </td>
					</tr>
				</table>

			</form>
			
		</div>
	</body>
<html>

 <?php 

 	if (isset($_POST['submit'])) {
 		$class = $_POST['class'];
 		$year = $_POST['year'];
 		$sql0 = "TRUNCATE `due`";
 		$sql0_run = mysqli_query($con, $sql0);
	 	$y = date("Y");
	 	$sql="SELECT * FROM `student` WHERE `class` ='$class'";
	 	$sql_run = mysqli_query($con, $sql);
	 	while ($sql_get = mysqli_fetch_array($sql_run)) {
	 		$id = $sql_get['fld2'];
	 		$sql2 = "SELECT * FROM `s_m_p` WHERE `student_id` = '$id' AND `year` = '$year'";
	 		$sql2_run = mysqli_query($con, $sql2);
	 		$pay = array();
	 		$i=0;
	 		while ($sql2_get = mysqli_fetch_array($sql2_run)) {
	 			$pay[] = $sql2_get['month'];
	 			$i++;
	 		}
	 		if ($y==$year) {
	 			$must_pay = range(1,date("m")); 
	 		}else{
	 			$must_pay = range(1,12); 
	 		}
	 		
			$not_pay = array_diff($must_pay,$pay);
	 		$arrlength=count($not_pay);
	 		$a = array_values($not_pay);
	 		$month_not_pay = " ";
	 		for ($i=0; $i < $arrlength ; $i++) { 
	 			$month_name = getMonthName($a[$i]);
	 			$month_not_pay .= $month_name.", ";
	 		}
	 	$real = rtrim($month_not_pay, ", ");
	 	$real .=".";

		 	if ($arrlength!=0) {
		 		$sql3 = "INSERT INTO `due` (`id`, `student_id`, `month_no`, `month_name`) VALUES (NULL, '$id', '$arrlength', '$real')";
		 		$sql3_run = mysqli_query($con, $sql3);
		 	}
	 	}

	 	echo "<script>window.open('view_due_detail.php','_self')</script>";
 	}

?>