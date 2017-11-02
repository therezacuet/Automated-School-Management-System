<?php 
session_start();
 $pagetitle = 'Fee Management'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/calender.css">';
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
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
		<table border="2" style="width: 1100px ! important; margin: 2px auto;">
			<tr>
				<td rowspan="2" style="padding:5px;vertical-align: top;">
					<h1 style="margin: 0px 0px 14px;">Assign fee to class</h1>
			

					<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 281px;">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Class Name</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Fee</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Update</th>
						</tr>
						<?php
							$ccsql="SELECT * FROM `class_fee` ";
							$ccsql_run = mysqli_query($con, $ccsql);

							$i=1;
							while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
								$id = $ccsql_get['id'];
								$class = $ccsql_get['class'];
								$fee = $ccsql_get['fee'];

								?>
								<form method="post" enctype="multipart/form-data">
								<tr style="border: 1px solid #A5A5A5;text-align: center;height: 42px;">
									<td style="border: 1px solid #A5A5A5;text-align: center;width: 43px;"><?php echo $i;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;width: 125px;"><?php echo $class;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;width: 49px;"><input  type="text" name="fee" class="ins_input_sm" placeholder="Amount" style="width: 90px;text-align: right;" value="<?php echo $fee;?>" required></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;width: 0px;">
										<input type="hidden" value ="<?php echo $id;?>" name="hidden">
										<input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
									</td>
								</tr>

								</form>
								<?php
								$i++;
							}

							
						?>

					</table>

				</td>
				<td style="padding:5px;vertical-align: top;">
					<h1>Individual Fee Assign</h1>
					<form method="post" enctype="multipart/form-data">
						<div style=" margin: 10px auto;">
							<table style="width: 320px; margin: 0px auto;">
								<tr>
									<td class="ins_td_sm" style="width: 135px;">Invoice No.:</td>
									<td>
										<input  type="text" name="invoice" class="ins_input_xsm" style="width: 160px;"required>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 135px;">Student ID:</td>
									<td>
										<input  type="text" name="field1" class="ins_input_xsm" style="width: 160px;"required>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">Month:</td>
									<td>
											<select type="text" name="field2" class="ins_input_xsm" style="width: 160px;" required>
													<option>Choose a Month</option>
													<?php getMonth();?>
											</select>
									</td>
								</tr>
							</table>


								<input type="submit" name="submit2"  class="submit_sm" Value="Add" style="left: 282px; top: 12px;">
						</div>
					</form>
				</td>
			</tr>
			<tr>
				
				<td style="padding:5px">
					<?php 
						$m = date('m');
						$d = date('d');
						$y = date('Y');
						$date = $m."/".$d."/".$y;
						$rest = substr($date, 0, -8);
					?>
				<h1>Receive Student Payment</h1>
			<form method="post" enctype="multipart/form-data">
				<div style=" margin: 10px auto;">
					<table style="width: 320px; margin: 0px auto;">
						<tr>
							<td class="ins_td_sm" style="width: 117px;">Invoice No.:</td>
							<td>
								<input  type="text" name="invoice2" class="ins_input_xsm" style="width: 200px;"required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width: 117px;">Student ID:</td>
							<td>
								<input  type="text" name="field3" class="ins_input_xsm" style="width: 200px;"required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width: 117px;">Description:</td>
							<td>
									<input  type="text" name="field4" class="ins_input_xsm" style="width: 200px;"required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width: 117px;">Amount:</td>
							<td>
									<input  type="text" name="field5" class="ins_input_xsm" style="width: 200px;"required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width: 117px;">Date:</td>
							<td>
									<input  type="text" name="field6" id="datepicker" class="ins_input_xsm" value="<?php echo $date;?>" style="width: 200px;"required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit"  class="submit_sm" Value="Add" style="left: 257px; top: 12px;">
				</div>
			</form></td>
			</tr>
			<tr>
				<td colspan="2" style="padding:5px;vertical-align: top;">
					<form method="post" enctype="multipart/form-data">
						<h1>Day to day collection report for 
							<input  type="text" name="da_date" id="datepicker3" placeholder="<?php echo "eg. ".$date;?>" class="ins_input_xsm" style=""required>
							
							<input type="submit" name="da"  class="submit_sm" Value="Go" style="left: 0px; top: 0px;width: 50px;">
						</h1>
					</form>
					<form method="post" enctype="multipart/form-data">
						
						<table>
							<tr>
								<td class="ins_td_sm" style="width: 255px;color: rgb(0, 129, 243);">Print collection report for</td>
								<td>
									<input  type="text" name="print_date" id="datepicker2" placeholder="Date" class="ins_input_xsm" style=""required>
								</td>
								<td>
									<input type="submit" name="print"  class="submit_sm" Value="Print" style="left: 0px; top: 3px;">
								</td>
							</form>
							<form method="post" enctype="multipart/form-data">
								<td style="color: rgb(0, 129, 243); font-size: 30px; padding: 0px 32px;">or,</td>
								<td><input type="submit" name="printall"  class="submit_sm" Value="Print all collection report" style="left: 0px; top: 3px;width: 254px;"></td>
							</tr>
						</table>
					</form>
					<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;margin-top:10px">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Invoice no.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">ID</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Amount</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Print</th>
						</tr>
					<?php
					if (isset($_POST['da'])) {
						$da_date = $_POST['da_date'];
						$sqll="SELECT * FROM `fee_management` WHERE `date`='$da_date'";
					}else{
						$sqll="SELECT * FROM `fee_management` WHERE `date`='$date'";
					}
						$sqll_run = mysqli_query($con, $sqll);
						$total=0;
						$i=1;
						while ($sqll_get=mysqli_fetch_array($sqll_run)) {
							$fid = $sqll_get['id'];
							$invoice = $sqll_get['invoice'];
							$id = $sqll_get['student_id'];
							$description = $sqll_get['description'];
							$fee = $sqll_get['amount'];
							$date = $sqll_get['date'];
							$total = $total+$fee;
							
							?>

							<tr style="border: 1px solid #A5A5A5;text-align: center;">
								<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $invoice;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: left;padding-left: 10px;"><?php echo $description;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: right;padding-right: 10px;"><?php echo $fee;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='fee_management.php?fee_delete=<?php echo $fid;?>'><img class="icon" src="image/delete.png"></a></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='fee_management_print.php?invoice=<?php echo $invoice;?>'><img class="icon" src="image/print.PNG"></a></td>
							</tr>

							<?php
							$i++;
						}
					?>
					<tr style="border: 1px solid #A5A5A5;text-align: center;">
						<td colspan = "4" style="border: 1px solid #A5A5A5;text-align:right;padding-right: 10px;">Total</td>
						<td style="border: 1px solid #A5A5A5;text-align:right;height: 41px;padding-right: 10px;"><b><?php echo $total;?></b> </td>
					</tr>
					</table>
				</td>
			</tr>

		</table>

		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			    $( "#datepicker2" ).datepicker();
			    $( "#datepicker3" ).datepicker();
			  });
		</script>
	</body>
<html>



<?php
	if(isset($_POST['update'])){
		$fee=$_POST['fee'];
		$hidden=$_POST['hidden'];

		$not_sql="UPDATE `class_fee` SET `fee` = '$fee' WHERE `class_fee`.`id` = '$hidden'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('fee_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}
	}

	if(isset($_POST['submit2'])){
		$invoice = $_POST['invoice'];
		$id = $_POST['field1'];
		$month = $_POST['field2'];
		$month_name = getMonthName($month);
		$description = "Month Fee for ".$month_name;
		$m = date('m');
		$d = date('d');
		$y = date('Y');
		$date = $m."/".$d."/".$y;

		$sql1 = "SELECT * FROM `student` WHERE `fld2` ='$id'";
		$sql1_run = mysqli_query($con, $sql1);
		$sql1_get=mysqli_fetch_array($sql1_run);
		$class = $sql1_get['class'];

		$sql1 = "SELECT * FROM `class_fee` WHERE `class` ='$class'";
		$sql1_run = mysqli_query($con, $sql1);
		$sql1_get=mysqli_fetch_array($sql1_run);
		$fee = $sql1_get['fee'];



		$sql = "INSERT INTO `fee_management` (`id`, `invoice`, `student_id`, `description`, `amount`, `date`) VALUES (NULL, '$invoice', '$id', '$description', '$fee', '$date')";
		$sql_run = mysqli_query($con, $sql);

		$sql2 = "INSERT INTO `s_m_p` (`id`, `student_id`, `month`, `year`) VALUES (NULL, '$id', '$month', '$y')";
		$sql2_run = mysqli_query($con, $sql2);

		if($sql_run){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}
	}

	if(isset($_POST['submit'])){
		$invoice2 = $_POST['invoice2'];
		$id = $_POST['field3'];
		$description = $_POST['field4'];
		$fee = $_POST['field5'];
		$date = $_POST['field6'];

		$sql = "INSERT INTO `fee_management` (`id`,`invoice`, `student_id`, `description`, `amount`, `date`) VALUES (NULL, '$invoice2', '$id', '$description', '$fee', '$date')";
		$sql_run = mysqli_query($con, $sql);

		if($sql_run){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}
	}
?>

<?php
	if(isset($_GET['fee_delete'])){
		$id=$_GET['fee_delete'];

		$not_sql="DELETE FROM `fee_management` WHERE `fee_management`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('fee_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fee_management.php','_self')</script>";
		}
	}
?>

<?php
	if(isset($_POST['print'])){
		$print_date = $_POST['print_date'];
		echo "<script>window.open('collection_report.php?print_date=".$print_date."','_self')</script>";
	}
?>
<?php
	if(isset($_POST['printall'])){
		echo "<script>window.open('collection_report.php','_self')</script>";
	}
?>