<?php 
session_start();
 $pagetitle = 'Admission form'; 
$extra='<link href="css/admission.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
			  <script src="js/jquery-1.10.2.js"></script>
			  <script src="js/jquery-ui.js"></script>
			  <link rel="stylesheet" href="css/calender.css">
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
		$error = " " ;
	if(isset($_POST['admission_submit'])){
		$file_name = $_FILES['fld0']['name'];
		$file_tmp = $_FILES['fld0']['tmp_name'];
		$ext = findexts ($file_name) ;  
		$ran = date("Ymd").time();  
		$ran2 = $ran.".";  
		$target = "image/admission/";
		$target = $target . $ran2.$ext;
		$field0=$ran2.$ext;
		move_uploaded_file($file_tmp, $target);


		
		$field1=$_POST['fld1'];
		$field2=$_POST['fld2'];
		$field3=$_POST['fld3'];
		$field4=$_POST['fld4'];
		$field5="880".$_POST['fld5'];
		$field6=$_POST['fld6'];
		$field7="";
		$field8="";
		$field9="";
		$field10=substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 9);
		if (isset($_POST['fld7'])) {
			$fld7=$_POST['fld7'];
			foreach ($fld7 as $type){
				if ($type == 1) {
					$field7="Freedom Fighter";
				}
				if ($type == 2) {
					$field8="Disabled";
				}
				if ($type == 3) {
					$field9="Deperndent";
				}
			}
		}

		

				
		$sql_new_reg = "INSERT INTO admission VALUES (NULL, '$field0', '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', '$field7', '$field8', '$field9', '$field10','NULL',' ')";

		$run_sql_new_reg = mysqli_query($con, $sql_new_reg);

		if($run_sql_new_reg){
			$message = "You are successfully registered. Your Reference Number is: ".$field10;	
			sendShortSMS($message, $field5);

			header('Location: admisstion_successful.php?fromid='.$field10);

		}else{
			$error =  "Sorry we coldn't resister you at this time. try again later.";
		}
	}
				
	
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="admission_header"><h3 style="font-family: 'Hind Siliguri',sans-serif;"><b>ধাপ ১ঃ</b> নিচের ফর্ম পূরণ করে Submit  Button টি চাপুন।</h3></div>
				<?php
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 5";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file5= $ccsql_get['file'];
					$link5= $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 6";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file6 = $ccsql_get['file'];
					$link6 = $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 7";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file7 = $ccsql_get['file'];
					$link7 = $ccsql_get['link'];

					
				?>
		<div class="admission"<?php if($file7 != 0){echo "style='height: 734px;'";}?>>

			<div class="admission_form" >

					<?php
					if ($file5 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link5?>"><img src="<?php echo 'image/ads/'.$file5;?>" style="position: absolute;left: 0;top: 0;"></a>
					<?php
					}
					?>
					<?php
					if ($file6 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link6?>"><img src="<?php echo 'image/ads/'.$file6;?>" style="left: 88%;position: absolute;top: 0;"></a>
					<?php
					}
					?>
					<?php
					if ($file7 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link7?>"><img src="<?php echo 'image/ads/'.$file7;?>" style=" left: 14%;position: absolute;top: 641px;"></a>
					<?php
					}
					?>
				<form action="admission.php" method="POST" enctype="multipart/form-data">
					<table>
		<div class="error"><?php echo $error;?></div>

						<tbody>
							<tr>
								<td>Class of Admisstion</td>
								<td>
									<select class="flda" name="fld1" required>
										<option>---------------Choose a Class------------------</option>
										<?php getClass();?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="" >Student's Name</td>
								<td><input value="<?php if(isset($field2)){ echo $field2;} ?>" type="text" name="fld2" class="flda" required></td>
							</tr>
							<tr>
								<td>Student's Picture</td>
								<td><input type="file" name="fld0" class="flda"  required></td>
							</tr>
							<tr>
								<td>Father's Name</td>
								<td><input value="<?php if(isset($field3)){ echo $field3;} ?>" type="text" name="fld3" class="flda" required></td>
							</tr>
							<tr>
								<td>Mother's Name</td>
								<td><input value="<?php if(isset($field4)){ echo $field4;} ?>" type="text" name="fld4" class="flda" required></td>
							</tr>
							<tr>
								<td>Contact Mob no.</td>
								<td><div class="s">+880</div><input value="<?php if(isset($field5)){ echo $field5;} ?>" type="text" name="fld5" class="fldas" required></td>
							</tr>
							<tr>
								<td>Date of Birth</td>
								<td><input value="<?php if(isset($field6)){ echo $field6;} ?>" id="datepicker" type="text" name="fld6" class="flda" required></td>
							</tr>
							<tr>
								<td class="flda">Quota:</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="fld7[]" class="checkbox"  value="1">Freedom Fighter</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="fld7[]"  class="checkbox" value="2">Disabled</td>
							</tr>
							<tr >
								<td colspan="2"><input type="checkbox" class="checkbox"  name="fld7[]" value="3">Dependent(applicable for teachers & stuffs of Govt. High Schools)</td>
							</tr>

						</tbody>
					</table>
					<div class="admission_footer"><h3 style="font-family: 'Hind Siliguri',sans-serif;">সংরক্ষিত কোটার অন্তরভুক্ত হলে প্রযোজ্য ক্ষেত্রে সনদ পত্রের সত্যায়িত কপি ভর্তির সময় জমা দিতে হবে।<br>এই মর্মে অঙ্গীকার করছি যে, প্রদত্ত তথ্য সঠিক। কোন মিথ্যা প্রমাণিত হলে কর্তৃপক্ষের যে কোন সিদ্ধান্ত মেনে নিতে হবে।</h3></div>
					<input type="submit" name="admission_submit" value="Submit Your Form" >
				</form>
			</div>
		</div>
				<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
			  </script>
		<script src="js/tab.js"></script>
	</body>
<html>