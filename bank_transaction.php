<?php 
 
session_start();
$pagetitle = 'Bank Transaction'; 
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

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<table border="2" style="margin:2px auto; width:1100px">
			<tr>
				<td style="padding:10px;    vertical-align: top;"> 
					<h1>Accounts</h1>
					<form method="post" enctype="multipart/form-data">
						<div class="ins_table_sm" style="width: 100%">
							<table style="width: 73%;margin: 0 auto;">
								<tr>
									<td class="ins_td_sm" style="width: 215px;">Account Name:</td>
									<td>
										<input  type="text" name="field1" class="ins_input_sm"  required>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm">Account Number:</td>
									<td>
										<input  type="text" name="field2" class="ins_input_sm"  required>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm">Account Details:</td>
									<td>
										<input  type="text" name="field3" class="ins_input_sm" >
									</td>
								</tr>
							</table>
							<input type="submit" name="submit"  class="submit_sm" Value="Add" style="left: 66%;top: 0;">
						</div>
					</form>

					<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width:100%">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Account Name</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Account Number</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Account Details</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
						</tr>
						<?php
							$ccsql="SELECT * FROM `account_info` ";
							$ccsql_run = mysqli_query($con, $ccsql);

							$i=1;
							while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
								$id = $ccsql_get['id'];
								$ac_name = $ccsql_get['ac_name'];
								$ac_number = $ccsql_get['ac_number'];
								$ac_detail = $ccsql_get['ac_detail'];

								?>

								<tr style="border: 1px solid #A5A5A5;text-align: center;">
									<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $ac_name;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $ac_number;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $ac_detail;?></td>
									<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='bank_transaction.php?ac_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
									
								</tr>


								<?php
								$i++;
							}

							
						?>
					</table>
				</td>
				<td style="padding:10px;    vertical-align: top;">
				<?php 
					$m = date('m');
					$d = date('d');
					$y = date('Y');
					$date = $m."/".$d."/".$y;
					$rest = substr($date, 0, -8);
				?>
				<h1>Deposit/Withdraw Money</h1>
					<form method="post" enctype="multipart/form-data">
						<div style=" margin: 10px auto;">
							<table style="width: 90%; margin: 0px auto;">
								<tr>
									<td class="ins_td_sm" style="width: 45%;">Invoice no.:</td>
									<td>
										<input  type="text" name="field1" class="ins_input_xsm" style="width: 200px;"required>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">A/C Number:</td>
									<td>
										<select type="text" name="field2" class="ins_input_xsm" style="width: 200px;" required>
											<option>Choose a A/C</option>
											<?php getAccount();?>
										</select>
									
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">Transction Type:</td>
									<td>
										<select type="text" name="field3" class="ins_input_xsm" style="width: 200px;" required>
											<option value="D">Deposit Money</option>
											<option value="W">Withdraw Money</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">Description:</td>
									<td>
											<input  type="text" name="field4" class="ins_input_xsm" style="width: 200px;">
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">Amount:</td>
									<td>
											<input  type="text" name="field5" class="ins_input_xsm" style="width: 200px;">
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 117px;">Date:</td>
									<td>
											<input  type="text" name="field6" id="datepicker" class="ins_input_xsm" style="width: 200px;" value="<?php echo $date;?>"required>
									</td>
								</tr>
							</table>
							<input type="submit" name="submit12"  class="submit_sm" Value="Add" style="left: 58%; top: 12px;">
						</div>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<h1>Withdraw & Deposit Report</h1>

					<?php
						$sqll="SELECT * FROM `bank_transaction` ORDER BY `bank_transaction`.`id`  DESC";
						$sqll_run = mysqli_query($con, $sqll);
						$balence=0;
						$withdraw = 0;
						$deposit = 0;
						$i=1;
						while ($sqll_get=mysqli_fetch_array($sqll_run)) {
							$type = $sqll_get['type'];
							$amount = $sqll_get['amount'];
							$balence = $balence+$amount;
							if ($type == "W") {
								$withdraw = $withdraw + $amount;
							}else if ($type == "D") {
								$deposit = $deposit + $amount;
							}
						}
							
							?>
					<?php
					$balence = $deposit - $withdraw;
					?>
						<table style="float:right">
							<tr>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Deposit: </b><?php echo $deposit." TK";?></h3></td>
								<td style="padding: 0 9px 0 0;font-size: 20px;">-</td>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Withdraw: </b><?php echo $withdraw." TK";?></h3></td>
								<td style="padding: 0 9px 0 0;font-size: 20px;">=</td>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Balence: </b><?php echo $balence." TK";?></h3></td>
						</table>
					<form method="post" enctype="multipart/form-data">
						<table style="margin-left: 1%;">
							<tr>
								<td>
									<input type="submit" name="print"  class="submit_sm" Value="Print" style="left: 0px; top: 3px;">
								</td>
						</table>
					</form>
					<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;margin-top:30px">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Invoice no.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">A/C number</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Type</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Date</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Amount</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Print</th>
						</tr>
					<?php
						$sqll="SELECT * FROM `bank_transaction` ORDER BY `bank_transaction`.`id`  DESC";
						$sqll_run = mysqli_query($con, $sqll);
						$balence=0;
						$withdraw = 0;
						$deposit = 0;
						$i=1;
						while ($sqll_get=mysqli_fetch_array($sqll_run)) {
							$fid = $sqll_get['id'];
							$invoice = $sqll_get['invoice'];
							$ac_number = $sqll_get['ac_number'];
							$type = $sqll_get['type'];
							$des = $sqll_get['des'];
							$amount = $sqll_get['amount'];
							$date = $sqll_get['date'];
							$balence = $balence+$amount;
							
							?>

							<tr style="border: 1px solid #A5A5A5;text-align: center;">
								<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $invoice;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $ac_number;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php if ($type == "W") { echo "Withdraw";}else echo "Deposit";?></td>
								<td style="border: 1px solid #A5A5A5;text-align: left;padding-left: 10px;"><?php echo $des;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $date;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: right;padding-right: 10px;"><?php echo $amount;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='bank_transaction.php?bank_transaction_delete=<?php echo $fid;?>'><img class="icon" src="image/delete.png"></a></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='bank_transaction_print.php?invoice=<?php echo $invoice;?>'><img class="icon" src="image/print.PNG"></a></td>
							</tr>

							<?php
							$i++;
						}
					?>
					</table>
				</td>
			</tr>
		</table>


			

		</div>
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
		</script>

	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$ac_name = mysqli_real_escape_string($con, $_POST['field1']);
		$ac_number = mysqli_real_escape_string($con, $_POST['field2']);
		$ac_detail = mysqli_real_escape_string($con, $_POST['field3']);

		$csql="INSERT INTO `account_info` (`id`, `ac_name`, `ac_number`, `ac_detail`) VALUES (NULL, '$ac_name', '$ac_number', '$ac_detail')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['ac_delete'])){
		$id=$_GET['ac_delete'];

		$not_sql="DELETE FROM `account_info` WHERE `account_info`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}
	}

	if(isset($_GET['bank_transaction_delete'])){
		$id=$_GET['bank_transaction_delete'];

		$not_sql="DELETE FROM `bank_transaction` WHERE `bank_transaction`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}
	}

	if(isset($_POST['submit12'])){
		$invoice = mysqli_real_escape_string($con, $_POST['field1']);
		$ac_number = mysqli_real_escape_string($con, $_POST['field2']);
		$type = mysqli_real_escape_string($con, $_POST['field3']);
		$des = mysqli_real_escape_string($con, $_POST['field4']);
		$amount = mysqli_real_escape_string($con, $_POST['field5']);
		$date = mysqli_real_escape_string($con, $_POST['field6']);

		$not_sql = "INSERT INTO `bank_transaction` (`id`, `invoice`, `ac_number`, `type`, `des`, `amount`, `date`) VALUES (NULL, '$invoice', '$ac_number', '$type', '$des', '$amount', '$date')";
		$run_not_sql = mysqli_query($con, $not_sql);

		if($run_not_sql){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('bank_transaction.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			// echo "<script>window.open('bank_transaction.php','_self')</script>";
		}
	}
?>

<?php
	if(isset($_POST['print'])){
		$print_date = $_POST['print_date'];
		echo "<script>window.open('withdraw_beposit_report.php','_self')</script>";
	}
?>