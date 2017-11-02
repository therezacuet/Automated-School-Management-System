<?php 
session_start();

$pagetitle = 'Withdraw & Deposit Report'; 
$extra='<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<link type="text/css" rel="stylesheet" href="css/result.css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
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
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}?>

<html>
	<?php include("head.php");?>
	<body>
		<?PHP
			include('print_header.php');
		?>

							<h1 style="text-align: center;">Withdraw & Deposit Report</h1>

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
						<table style="font-size: 12px; width: 550px; margin: 21px auto 0px;">
							<tr>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Deposit: </b><?php echo $deposit." TK";?></h3></td>
								<td style="padding: 0 9px 0 0;font-size: 20px;">-</td>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Withdraw: </b><?php echo $withdraw." TK";?></h3></td>
								<td style="padding: 0 9px 0 0;font-size: 20px;">=</td>
								<td><h3 style="border: 2px solid rgb(1, 80, 58); padding: 10px; color: rgb(1, 80, 58); margin: 0px 10px 0px 0px;"><b>Balence: </b><?php echo $balence." TK";?></h3></td>
						</table>
					<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;margin-top:30px">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Invoice no.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">A/C number</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Type</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Date</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Amount</th>
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
								
							</tr>

							<?php
							$i++;
						}
					?>
					</table>
		<form class="no-print" align="middle">
            <input type="button"  class="print1" value="Print" onClick="window.print()">
        </form>
	</body>
</html>