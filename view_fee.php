<?php  
session_start();

$pagetitle = 'View Fee'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['student_id'])) {
		header("Location: 404.html"); 
		exit();
	}
	?>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
				<?php  getSM();?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2" style="height: 490px; margin: 0px; overflow: scroll;overflow-x: hidden;">
						

						<table class="cls_xtab" style="border: 1px solid rgb(165, 165, 165); text-align: center; width: 80%; margin: 77px auto 0px;">
						<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
							<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Invoice no.</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Description</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Date</th>
							<th style="border: 1px solid #A5A5A5;text-align: center;">Amount</th>
						</tr>
					<?php

						$student_id = getfield("fld2");
						$sqll="SELECT * FROM `fee_management` WHERE `student_id`='$student_id' ORDER BY `id` DESC";
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
								<td style="border: 1px solid #A5A5A5;text-align: left;padding-left: 10px;"><?php echo $description;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $date;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: right;padding-right: 10px;"><?php echo $fee;?></td>
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
					</div>
				</div>
			</div>
		</div>
	</body>
<html>