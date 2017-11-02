<?php 
session_start();
 $pagetitle = 'Download Admit card'; 
$extra='<link href="css/dadmission.css" rel="stylesheet" type="text/css"/>
<link href="css/dadmission1.css" rel="stylesheet" type="text/css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = "image/".$ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];

	$ssql = "SELECT * FROM `admission_date` ";
	$ssql_get = mysqli_query($con, $ssql);
	$ssql_run = mysqli_fetch_array($ssql_get);
	$admission_date = $ssql_run['admission_date'];
	$admission_time = $ssql_run['admission_time'];
	$adminoption_t = $ssql_run['admission_t&c'];
?>

<!-- http://localhost/institute/download_admitcard.php?ref=17A8OGRK1&tran=1245 -->
<html>
	<?php include("head.php");?>
	<body>
		<?php
			if (isset($_GET['ref'])&&isset($_GET['tran'])) {
				if(!empty($_GET['ref'])&&!empty($_GET['tran'])){
					$ref = $_GET['ref'];
					$tran = $_GET['tran'];
					$down_sql = "SELECT * FROM admission WHERE `fld10` = '$ref' AND `fld11` = '$tran'";
					$down_sql_run = mysqli_query($con, $down_sql);
					$down_sql_num_rows=mysqli_num_rows($down_sql_run);
					if($down_sql_num_rows == 1){
						$down_sql_get = mysqli_fetch_array($down_sql_run);
						$ad_sdn_pic = "image/admission/".$down_sql_get['fld0'];
						$ad_sdn_class = $down_sql_get['fld1'];
						$ad_sdn_name = $down_sql_get['fld2'];
						$ad_sdn_fname = $down_sql_get['fld3'];
						$ad_sdn_mname = $down_sql_get['fld4'];
						$ad_sdn_ref = $down_sql_get['fld10'];
						$ad_sdn_roll = $down_sql_get['fld12'];

						?>
						<div class="ac_body">

							<div class="ac_header">
								<div class="ac_header_left">
									<div class="ac_header_left_upper">
										<div class="ac_logo"><img class="ac_logo_pic" src="<?php echo $logo?>"></div>
										<div class = "ac_had">
											<h3 class="ac1"><?php echo $name;?></h3>
											<h3 class="ac2"><b>Admit Card</b></h3>
											<h3 class="ac3">Class <?php echo $ad_sdn_class;?> Admission Examination</h3>
										</div>
										<div class="ac_header_right"><img class="ac_header_right_pic" src="<?php echo $ad_sdn_pic;?>"></div>
									</div>
									<div class="ac_header_lower">
										<div class="ref"><b>REF: </b><?php echo $ad_sdn_ref;?></div>
										<div class="roll"><b>ROLL: </b><?php echo $ad_sdn_roll;?></div>
									</div>
									
								</div>
								
							</div>
							<div class="ac_mid">
								<div class="ac_mid_left">
									<table>
										<tr>
											<td class="ac_info_left">Student Name</td>
											<td class="ac_info_mid">:</td>
											<td class="ac_info_right"><?php echo $ad_sdn_name;?></td>
										</tr>
										<tr>
											<td class="ac_info_left">Father's Name</td>
											<td class="ac_info_mid">:</td>
											<td class="ac_info_right"><?php echo $ad_sdn_fname;?></td>
										</tr>
										<tr>
											<td class="ac_info_left">Mother's Name</td>
											<td class="ac_info_mid">:</td>
											<td class="ac_info_right"><?php echo $ad_sdn_mname;?></td>
										</tr>
										<tr>
											<td class="ac_info_left">Date of Exam</td>
											<td class="ac_info_mid">:</td>
											<td class="ac_info_right"><?php echo $admission_date;?></td>
										</tr>
										<tr>
											<td class="ac_info_left">Time</td>
											<td class="ac_info_mid">:</td>
											<td class="ac_info_right"><?php echo $admission_time;?></td>
										</tr>
									</table>
								</div>
								<div class="ac_mid_right">
									<?php
										$sql = "SELECT * FROM `headmaster_info`";
										$sql_run = mysqli_query($con, $sql);
										$sql_get=mysqli_fetch_array($sql_run);
										$head_sign  = $sql_get['head_sign'];
									?>
									<img class="signature" src="image/headmaster/<?php echo $head_sign;?>">
									<div class="signature_name">Signature (Head Master)</div>
								</div>

								
							</div>
							<div class="ac_footer">
								<?php echo $adminoption_t;?>
							</div>
						</div>

					 	<form class="no-print">
		                    <input type="button"  class="print_button" value="Print this page" onClick="window.print()">
		                </form>
						<?php
					}else{
						 include("header.php");
						 ?>
								<div style='padding: 16px; border-radius: 10px; font-size: 19px; margin: 23px auto; font-family: "Hind Siliguri",sans-serif; width: 900px; background: rgb(250, 229, 227) none repeat scroll 0% 0%; color: rgb(255, 0, 0);'>
									 Reference Number/Transaction Number ভুল। অথবা, আপনার Admit Card টি এখনো তৈরী হয়নি।  
								</div>
						<?php

					}
					

				}
			}

		?>
	</body>
</html>