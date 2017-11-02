<?php 
session_start();
 $pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'att'";
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
<style>
.bicon{
	background: url('image/update.png');
	background-repeat: no-repeat;
	border: 0;
	display: block;
	width: 40px;
	height: 40px;
	text-indent: -999999999999px;
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
				<div class="ins_table" style="width: 51%;">
					<table>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Year</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Month</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Working day(s)</td>
							
						</tr>

						<tr>
							
							<td>
								<select type="text" name="field1" class="ins_input_xsm" required>
										<?php 
											for ($i=date("Y"); $i <date("Y")+10 ; $i++) { 
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
								</select>
							</td>
							<td>
								<select type="text" name="field2" class="ins_input_xsm" required>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
											
								</select>
							</td>
							<td>
								<select type="text" name="field3" class="ins_input_xsm" required>
										<?php 
											for ($i=1; $i <32 ; $i++) { 
												echo "<option value=".$i.">".$i."</option>";
											}
										?>
								</select>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit"  class="submit_xsm" Value="Add" style="left: 89%;">
				</div>
			</form>


			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width:30%">Year</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width:30%">Month Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width:20%">Working Day</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;7%">Update</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;10%">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `workingday` ORDER BY `workingday`.`year` DESC, `workingday`.`month`ASC ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$year = $ccsql_get['year'];
						$month = $ccsql_get['month'];
						$working_day = $ccsql_get['working_day'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $year;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<?php 

								if ($month == 1) {
									echo "January";
								}elseif ($month == 2) {
									echo "February";
								}elseif ($month == 3) {
									echo "March";
								}elseif ($month == 4) {
									echo "April";
								}elseif ($month == 5) {
									echo "May";
								}elseif ($month == 6) {
									echo "June";
								}elseif ($month == 7) {
									echo "July";
								}elseif ($month == 8) {
									echo "August";
								}elseif ($month == 9) {
									echo "September";
								}elseif ($month == 10) {
									echo "October";
								}elseif ($month == 11) {
									echo "November";
								}elseif ($month == 12) {
									echo "December";
								}



								?>

							</td>
						<form method="post" enctype="multipart/form-data">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><input type="text" value="<?php echo $working_day;?>" name="workingday" class="ins_input_xsm" style="width:100%; height:100%; margin:0px;text-align: center;"></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
										<input type="hidden" value ="<?php echo $id;?>" name="id">
										<input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
							</td>
						</form>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file?>?wd_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>

		</div>
	</body>
<html>

<?php
$monthname="";
	if (isset($_POST['submit'])) {
		
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$field3 = $_POST['field3'];


		$ccsql="SELECT * FROM `workingday`";
		$ccsql_run = mysqli_query($con, $ccsql);
		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$id = $ccsql_get['id'];
			$year = $ccsql_get['year'];
			$month = $ccsql_get['month'];
			$working_day = $ccsql_get['working_day'];

			if ($year==$field1 && $month==$field2) {
				if ($month == 1) {
					$monthname = "January";
				}elseif ($month == 2) {
					$monthname = "February";
				}elseif ($month == 3) {
					$monthname = "March";
				}elseif ($month == 4) {
					$monthname = "April";
				}elseif ($month == 5) {
					$monthname = "May";
				}elseif ($month == 6) {
					$monthname = "June";
				}elseif ($month == 7) {
					$monthname = "July";
				}elseif ($month == 8) {
					$monthname = "August";
				}elseif ($month == 9) {
					$monthname = "September";
				}elseif ($month == 10) {
					$monthname = "October";
				}elseif ($month == 11) {
					$monthname = "November";
				}elseif ($month == 12) {
					$monthname = "December";
				}
				echo "<script>alert('Year: ".$field1." Month: ".$monthname." already added. Now you can only update.')</script>";
				return;
			}
		}

		$csql="INSERT INTO `workingday` (`id`, `year`, `month`, `working_day`) VALUES (NULL, '$field1', '$field2', '$field3')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['wd_delete'])){
		$wd_delete=$_GET['wd_delete'];

		$not_sql="DELETE FROM `workingday` WHERE `workingday`.`id` = '$wd_delete'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}
	}
?>

<?php
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$workingday=$_POST['workingday'];

		$not_sql="UPDATE `workingday` SET `working_day` = '$workingday' WHERE `workingday`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>
		