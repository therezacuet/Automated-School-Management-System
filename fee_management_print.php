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
	}

	if (isset($_GET['invoice']) && !empty($_GET['invoice'])) {
		$invoice = $_GET['invoice'];
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?PHP
			include('print_header.php');
		?>
		<div style="width:800px; margin: 10px auto">
		<h3>Invoice No.: <?php echo $invoice;?></h3>
		<table style="width: 80%; margin: 10px auto;">
			<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">	
				<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width:15%;">No.</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;width:60%;">Description</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;width:25%;">Amount</th>
			</tr>
			<?php
				$i=1;
				$sqll="SELECT * FROM `fee_management` WHERE `invoice`='$invoice'";
						$sqll_run = mysqli_query($con, $sqll);
						$total=0;
						$i=1;
						while ($sqll_get=mysqli_fetch_array($sqll_run)) {
							$fid = $sqll_get['id'];
							$id = $sqll_get['student_id'];
							$description = $sqll_get['description'];
							$fee = $sqll_get['amount'];
							$date = $sqll_get['date'];
							$total = $total+$fee;
							
							?>

							<tr style="border: 1px solid #A5A5A5;text-align: center;">
								<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: left;padding-left: 10px;"><?php echo $description." (".$id.")";?></td>
								<td style="border: 1px solid #A5A5A5;text-align: right;padding-right: 10px;"><?php echo $fee;?></td>
							</tr>

							<?php
							$i++;
						} 
						?>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td colspan = "2" style="border: 1px solid #A5A5A5;text-align:right;padding-right: 10px;">Total</td>
							<td style="border: 1px solid #A5A5A5;text-align:right;height: 41px;padding-right: 10px;"><b><?php echo $total;?></b> </td>
						</tr>
						<?php
			?>	
		</table>
		</div>
		<form class="no-print" align="middle">
            <input type="button"  class="print1" value="Print" onClick="window.print()">
        </form>
	</body>
</html>