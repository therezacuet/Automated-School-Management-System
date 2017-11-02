<?php  
session_start();
$pagetitle = 'Addmission Applications'; 
$extra='<link href="css/admission_application.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'add'";
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


	if (isset($_POST['ad_submit'])) {
		$id = $_POST['id'];
		$transaction = $_POST['trans'];
		$roll = $_POST['roll'];
		$sql = "UPDATE `admission` SET `fld11` = '$transaction', `fld12` = '$roll' WHERE `admission`.`ad_id` = '$id'";
		$sql_run = mysqli_query($con, $sql);
	}
	
	
		
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>


		<div class="admission_aplication">
			<div class="admission_aplication_body">
				<div class="admisstion_search">
					<div class="admisstion_search_by">
						<form method="POST" enctype="multipart/form-data">
							<select class="admisstion_search_by_cat" name="admisstion_search_by_cat">

								<option>---------Select a Option--------</option>
								<option value="fld2">Student's Name</option>
								<option value="fld3">Father's Name</option>
								<option value="fld4">Mother's Name</option>
								<option value="fld1">Class</option>
								<option value="fld5">Mobile no.</option>
								<option value="fld6">Date of Birth</option>
								<option value="fld7">Quota: Freedom Fighter</option>
								<option value="fld8">Quota: Disabled</option>
								<option value="fld9">Quota:Dependent</option>
								<option value="fld10">Reference Number</option>
							</select>
							<input type="text" name="admisstion_search_like" class="admisstion_search_name">
							<!-- <input type="submit" id="search" name="submit" alt="search" value="">
							<div > -->
								<input type="submit" name="admisstion_search_submit" class="admisstion_search_submit">
						
							
						</form>
					</div>
				</div>
				<table class="admission_aplication_table" border="1px">
					<tr>
						<th class="field1" style="font-family: 'Hind Siliguri',sans-serif;">নং</th>
						<th class="field2" style="font-family: 'Hind Siliguri',sans-serif;">ছবি</th>
						<th class="field0" style="font-family: 'Hind Siliguri',sans-serif;">ক্লাস</th>
						<th class="field3" style="font-family: 'Hind Siliguri',sans-serif;">নাম</th>
						<th class="field4" style="font-family: 'Hind Siliguri',sans-serif;">পিতার নাম</th>
						<th class="field5" style="font-family: 'Hind Siliguri',sans-serif;">মাতার নাম</th>
						<th class="field6" style="font-family: 'Hind Siliguri',sans-serif;">মোবাইল</th>
						<th class="field7" style="font-family: 'Hind Siliguri',sans-serif;">জন্ম তারিখ</th>
						<th class="field8" style="font-family: 'Hind Siliguri',sans-serif;">কোটা সমূহ</th>
						<th class="field9" style="font-family: 'Hind Siliguri',sans-serif;">Reference number</th>
						<th class="field10">Transaction number</th>
						<th class="field12">Roll number</th>
						<th class="field11">Update</th>
					</tr>
					<?php
					$i=0;

					if (isset($_POST['admisstion_search_submit'])) {
						$search_by = $_POST['admisstion_search_by_cat'];
						$search_word = $_POST['admisstion_search_like'];

						$sql = "SELECT * FROM admission WHERE $search_by LIKE '%$search_word%'";
						$sql_run = mysqli_query($con, $sql);
						while ($sql_get=mysqli_fetch_array($sql_run)) {
						$admission_id=$sql_get['ad_id'];
						$admission_pic="image/admission/".$sql_get['fld0'];
						$admission_class=$sql_get['fld1'];
						$admission_name=$sql_get['fld2'];
						$admission_father=$sql_get['fld3'];
						$admission_mother=$sql_get['fld4'];
						$admission_mobile=$sql_get['fld5'];
						$admission_bod=$sql_get['fld6'];
						$admission_q1=$sql_get['fld7'];
						$admission_q2=$sql_get['fld8'];
						$admission_q3=$sql_get['fld9'];
						$admission_ref=$sql_get['fld10'];
						$i=$i+1;
						?>
						<form method="POST" enctype="multipart/form-data">
							<tr>
								<input type="hidden" name="id" value="<?php echo $admission_id;?>">
								<td><?php echo $i;?></td>
								<td><img src="<?php echo $admission_pic;?>" class="admission_pic"></td>
								<td><?php echo $admission_class;?></td>
								<td><?php echo $admission_name;?></td>
								<td><?php echo $admission_father;?></td>
								<td><?php echo $admission_mother;?></td>
								<td><?php echo $admission_mobile;?></td>
								<td><?php echo $admission_bod;?></td>
								<td><?php echo $admission_q1.", ".$admission_q2.", ".$admission_q3;?></td>
								<td><?php echo $admission_ref;?></td>
								<td><input type="text" name="trans" class="trans"></td>
								<td><input type="text" name="roll" class="trans"></td>
								<td><input  class="admission_update" type="submit" name="ad_submit" value="Update"></td>
							</tr>
						</form>

						<?php
					}
				}else{
					$sql="SELECT * FROM `admission` WHERE fld11='NULL'";
						$sql_run = mysqli_query($con, $sql);
						while ($sql_get=mysqli_fetch_array($sql_run)) {
							$admission_id=$sql_get['ad_id'];
							$admission_pic="image/admission/".$sql_get['fld0'];
							$admission_class=$sql_get['fld1'];
							$admission_name=$sql_get['fld2'];
							$admission_father=$sql_get['fld3'];
							$admission_mother=$sql_get['fld4'];
							$admission_mobile=$sql_get['fld5'];
							$admission_bod=$sql_get['fld6'];
							$admission_q1=$sql_get['fld7'];
							$admission_q2=$sql_get['fld8'];
							$admission_q3=$sql_get['fld9'];
							$admission_ref=$sql_get['fld10'];
							$i=$i+1;
							?>
							<form method="POST" enctype="multipart/form-data">
								<tr>
									<input type="hidden" name="id" value="<?php echo $admission_id;?>">
									<td><?php echo $i;?></td>
									<td><img src="<?php echo $admission_pic;?>" class="admission_pic"></td>
									<td><?php echo $admission_class;?></td>
									<td><?php echo $admission_name;?></td>
									<td><?php echo $admission_father;?></td>
									<td><?php echo $admission_mother;?></td>
									<td><?php echo $admission_mobile;?></td>
									<td><?php echo $admission_bod;?></td>
									<td><?php echo $admission_q1.", ".$admission_q2.", ".$admission_q3;?></td>
									<td><?php echo $admission_ref;?></td>
									<td><input type="text" name="trans" class="trans"></td>
									<td><input type="text" name="roll" class="roll"></td>
									<td><input  class="admission_update" type="submit" name="ad_submit" value="Update"></td>
								</tr>
							</form>

							<?php
						}
					}
						
					?>
				</table>
			</div>
		</div>

	</body>
<html>