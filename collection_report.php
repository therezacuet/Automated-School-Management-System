<?php 
session_start();

$pagetitle = 'Collection Report'; 
$extra='<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<link type="text/css" rel="stylesheet" href="css/result.css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
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
		<?PHP
			include('print_header.php');
		if (isset($_GET['print_date'])) {
			$print_date = $_GET['print_date'];
			?>
			<h1 style="text-align: center; padding: 0px 0px 18px;"> Collection report for <?php echo $print_date?></h1>
		<?php
		}else{
			?>
			<h1 style="text-align: center; padding: 0px 0px 18px;">All Collection Report</h1>
			<?php
		}
		?>

		<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;margin-top:10px;width:800; margin:0 auto">
			<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
				<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;">Invoice no.</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;">ID</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;">Date</th>
				<th style="border: 1px solid #A5A5A5;text-align: center;">Amount</th>
			</tr>
			<?php
				if (isset($_GET['print_date'])) {
					$date = $_GET['print_date'];
					$sqll="SELECT * FROM `fee_management` WHERE `date`='$date'";
				}else{
					$sqll="SELECT * FROM `fee_management`";
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
					<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $date;?></td>
					<td style="border: 1px solid #A5A5A5;text-align: right;padding-right: 10px;"><?php echo $fee;?></td>
				</tr>

				<?php
				$i++;
				}
			?>
		<tr style="border: 1px solid #A5A5A5;text-align: center;">
			<td colspan = "5" style="border: 1px solid #A5A5A5;text-align:right;padding-right: 10px;">Total</td>
			<td style="border: 1px solid #A5A5A5;text-align:right;height: 41px;padding-right: 10px;"><b><?php echo $total;?></b> </td>
		</tr>
		</table>
		<form class="no-print" align="middle">
            <input type="button"  class="print1" value="Print" onClick="window.print()">
        </form>
	</body>
</html>