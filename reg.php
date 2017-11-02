<?php 
 
session_start();

require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$pagetitle = 'Registration'; 
	$extra ='<link href="css/reg.css" rel="stylesheet" type="text/css"/>
			  <link rel="stylesheet" href="css/jquery-ui.css">
			  <script src="js/jquery-1.10.2.js"></script>
			  <script src="js/jquery-ui.js"></script>
			  <link rel="stylesheet" href="css/calender.css">
			  
			  
	';

	$error = " " ;$phone1 =" ";$phone2 =" ";$phone3 =" ";$phone4 =" ";$phone5 =" ";

	if(isset($_POST['student_submit'])){
				$file_name = $_FILES['fld0']['name'];
				$file_tmp = $_FILES['fld0']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/student/";
				$target = $target . $ran2.$ext;
				$field0=$ran2.$ext;
				move_uploaded_file($file_tmp, $target);

				
					$field1=$_POST['fld1'];
					$field2=$_POST['fld2'];
					$field3=$_POST['fld3'];
					$field4=$_POST['fld4'];
					$field5=$_POST['fld5'];
					$field6=$_POST['fld6'];
					$md5field5=md5($field5);


					$phone1=$_POST['fld7'];
					$field7="880".$phone1;


					$field8=$_POST['fld8'];
					$field9=$_POST['fld9'];
					$field10=$_POST['fld10'];
					$field11=$_POST['fld11'];
					$field12=$_POST['fld12'];
					$field13=$_POST['fld13'];
					$field14=$_POST['fld14'];
					$field15=$_POST['fld15'];
					$field16=$_POST['fld16'];
					$field17=$_POST['fld17'];
					$field18=$_POST['fld18'];
					$field19=$_POST['fld19'];
					$field20=$_POST['fld20'];
					$field21=$_POST['fld21'];


					$phone2=$_POST['fld22'];
					$field22="880".$phone2;


					$field23=$_POST['fld23'];
					$field24=$_POST['fld24'];
					$field25=$_POST['fld25'];
					$field26=$_POST['fld26'];
					$field27=$_POST['fld27'];


					$phone3=$_POST['fld28'];
					$field28="880".$phone3;


					$field29=$_POST['fld29'];
					$field30=$_POST['fld30'];
					$field31=$_POST['fld31'];
					$field32=$_POST['fld32'];
					$field33=$_POST['fld33'];


					$phone4=$_POST['fld34'];
					$field34=$phone4;


					$field35=$_POST['fld35'];

					$class=$_POST['class'];
					$shift=$_POST['shift'];
					$sec=$_POST['sec'];
					$group=$_POST['group'];



				if($field5!=$field6){
					$error = "Password do not match";
				}else{
					$sql_reg = "select fld3 from student where fld3='$field3'";
					$run_sql_reg = mysqli_query($con, $sql_reg);
					$sql_reg_num_rows=mysqli_num_rows($run_sql_reg);


					$sql_reg3 = "select fld3 from student where fld2='$field2'";
					$run_sql_reg3 = mysqli_query($con, $sql_reg3);
					$sql_reg_num_rows3=mysqli_num_rows($run_sql_reg3);
					if($sql_reg_num_rows3==1){
						$error =  "The ID <b>" .$field2." </b>already exists";

					}else if($sql_reg_num_rows==1){
						$error =  "The username <b>" .$field3."</b> already exists";
					}else{
						$sql_new_reg = "INSERT INTO student VALUES (NULL, '$field0', '$field1', '$field2', '$field3', '$field4', '$md5field5', '$field7', '$field8', '$field9', '$field10', '$field11', '$field12', '$field13', '$field14', '$field15', '$field16', '$field17', '$field18', '$field19', '$field20', '$field21', '$field22', '$field23', '$field24', '$field25', '$field26', '$field27', '$field28', '$field29', '$field30', '$field31', 
							'$field32', '$field33', '$field34', '$field35', '$class', '$shift', '$sec', '$group' )";
						$run_sql_new_reg = mysqli_query($con, $sql_new_reg);
						
						$sql_new_reg2 = "INSERT INTO member VALUES (NULL, '$field3','$field1','S','$field0')";
						$run_sql_new_reg2 = mysqli_query($con, $sql_new_reg2);
						if($run_sql_new_reg && $run_sql_new_reg2){
							echo "<script>alert('You are successfully registered! Now please Login.')</script>";
							header('Location: login.php');
						}else{
							$error =  "Sorry we coldn't resister you at this time. try again later.";
						}
					}
				}
	}

	if(isset($_POST['teacher_submit'])){
				$file_name = $_FILES['tld0']['name'];
				$file_tmp = $_FILES['tld0']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/teacher/";
				$target = $target . $ran2.$ext;
				$tield0=$ran2.$ext;
				move_uploaded_file($file_tmp, $target);

				
					$tield1=$_POST['tld1'];
					$tield2=$_POST['tld2'];
					$tield3=$_POST['tld3'];
					$tield4=$_POST['tld4'];
					$tield5=$_POST['tld5'];
					$tield6=$_POST['tld6'];
					$tield7=$_POST['tld7'];
					$tield8=$_POST['tld8'];
					$md5tield7=md5($tield7);


					$phone5=$_POST['tld9'];
					$tield9="880".$phone5;


					$tield10=$_POST['tld10'];
					$tield11=$_POST['tld11'];
					$tield12=$_POST['tld12'];
					$tield13=$_POST['tld13'];
					$tield14=$_POST['tld14'];
					$tield15=$_POST['tld15'];
					$tield16=$_POST['tld16'];
					$tield17=$_POST['tld17'];
					$tield18=$_POST['tld18'];
					$tield19=$_POST['tld19'];
					$tield20=$_POST['tld20'];
					$tield21=$_POST['tld21'];
					$tield22=$_POST['tld22'];
					$tield23=$_POST['tld23'];
					$tield24=$_POST['tld24'];
					$tield25=$_POST['tld25'];
					$tield26=$_POST['tld26'];
					$tield27=$_POST['tld27'];
					$tield28=$_POST['tld28'];

				if($tield7!=$tield8){
					$error = "Password do not match";
				}else{
					$sql_reg = "select tld5 from teacher where tld5='$tield5'";
					$run_sql_reg = mysqli_query($con, $sql_reg);
					$sql_reg_num_rows=mysqli_num_rows($run_sql_reg);
					if($sql_reg_num_rows==1){
						$error =  "The username " .$tield5." already exists";
					}else{
						$sql_new_reg = "INSERT INTO teacher VALUES (NULL, '$tield0', '$tield1', '$tield2', '$tield3', '$tield4', '$tield5', '$tield6', '$md5tield7', '$tield9', '$tield10', '$tield11', '$tield12', '$tield13', '$tield14', '$tield15', '$tield16', '$tield17', '$tield18', '$tield19', '$tield20', '$tield21', '$tield22', '$tield23', '$tield24', '$tield25', '$tield26', '$tield27', '$tield28', 'unkown')";
						$sql_new_reg2 = "INSERT INTO member VALUES (NULL, '$tield5','$tield1','T','$tield0')";
						$sql3="INSERT INTO `salary` (`id`, `teacher_id`, `basic`, `huse_rent`, `provident`, `kollan`, `medical`, `lunch`, `tada`, `total_salary`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0')";
						$run_sql_new_reg = mysqli_query($con, $sql_new_reg);
						$run_sql_new_reg2 = mysqli_query($con, $sql_new_reg2);
						$sql3_run = mysqli_query($con, $sql3);
						if($run_sql_new_reg && $run_sql_new_reg2 && $sql3_run){
							echo "<script>alert('You are successfully registered! Now please Login.')</script>";
							header('Location: login.php');
						}else{
							$error =  "Sorry we coldn't resister you at this time. try again later.";
						}
					}
				}
	}
?>

<!DOCTYPE>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="login_tab_panels">
			<ul class="tabs">
				<li rel='panel1' class="active">Student</li>
				<li rel='panel2'>Teacher</li>
			</ul>
			<div id="panel1" class="panel active">
				
				<form  method="post" enctype="multipart/form-data">
					<div class="registrartion">
						<div class="regis">
							<div class="student">Student</div>
							<div class="error"><?php echo $error;?></div>
								<div class="regis2">
									<table style="margin:0px auto" width="750">
										<tr>
											<td class="fldl" style="padding: 15px 15px 5px 0;">Student's Name</td>
											<td><input value="<?php if(isset($field1)){ echo $field1;} ?>" style="margin: 15px 3px 3px 3px;" type="text" name="fld1" class="fldr" required></td>
										</tr>

										<tr>
											<td class="fldl">Student's ID</td>
											<td><input value="<?php if(isset($field2)){ echo $field2;} ?>" type="text" name="fld2" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Student's Picture</td>
											<td><input type="file" name="fld0" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Class</td>
											<td><select name="class" class="fldr"  required>
												<?php getClass();?>

											</select> </td>

										</tr>
										<tr>
											<td class="fldl">Shift</td>
											<td><select name="shift" class="fldr"  required>
												<?php getShift();?>

											</select></td>

										</tr>
										<tr>
											<td class="fldl">Section</td>
											<td><select name="sec" class="fldr"  required>
												<?php getSection();?>

											</select></td>

										</tr>
										<tr>
											<td class="fldl">Group</td>
											<td><select name="group" class="fldr"  required>
												<?php getGroup();?>
											</select></td>

										</tr>
										<tr>
											<td class="fldl">Username</td>
											<td><input type="text" name="fld3" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">E-mail</td>
											<td><input value="<?php if(isset($field4)){ echo $field4;} ?>" type="email" name="fld4" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Password</td>
											<td><input type="password" name="fld5" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Confirm Password</td>
											<td><input type="password" name="fld6" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Primary Mobile</td>
											<td><div style="float: left;margin: 5px 0px 0px 4px;font-size: 20px;background-color: rgb(255, 255, 255);padding: 6px 8px;color: rgb(0, 0, 0);border: 1px solid rgb(173, 173, 173);">+880</div><input value="<?php if(isset($phone1)){ echo $phone1;} ?>" type="text" name="fld7" class="fldr"  style=" width: 346px;" required></td>

										</tr>
										<tr>
											<td class="fldl">Gender</td>
											<td >
												<select name="fld8" class="fldr"  required>
													<option>Male</option>
													<option>Female</option>
												</select>
											</td>
										</tr>

										<tr>
											<td class="fldl">Date of Birth</td>
											<td><input value="<?php if(isset($field9)){ echo $field9;} ?>" type="text" class="fldr" name="fld9" id="datepicker"  required></td>

										</tr>
										<tr>
											<td class="fldl">Religion</td>
											<td><input value="<?php if(isset($field10)){ echo $field10;} ?>" type="text" name="fld10" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Blood Group</td>
											<td><input value="<?php if(isset($field11)){ echo $field11;} ?>" type="text" name="fld11" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Nationality</td>
											<td><input value="<?php if(isset($field12)){ echo $field12;} ?>" type="text" name="fld12" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Present Address</td>
											<td><input value="<?php if(isset($field13)){ echo $field13;} ?>" type="text" name="fld13" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Permanent Address</td>
											<td><input value="<?php if(isset($field14)){ echo $field14;} ?>" type="text" name="fld14" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Pervious Institute</td>
											<td><input value="<?php if(isset($field15)){ echo $field15;} ?>" type="text" name="fld15" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">T.C. Number</td>
											<td><input value="<?php if(isset($field16)){ echo $field16;} ?>" type="text" name="fld16" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Physical or Mental Disability (if any)</td>
											<td><input value="<?php if(isset($field17)){ echo $field17;} ?>" type="text" name="fld17" class="fldr"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>

						<div class="registrartion">
						<div class="regis">
							<div class="student">Father's</div>
								<div class="regis2">
									<table style="margin:0px auto" width="750">
										<tr>
											<td class="fldl">Father's Name</td>
											<td><input value="<?php if(isset($field18)){ echo $field18;} ?>" type="text" name="fld18" class="fldr"  required></td>

										</tr>


										<tr>
											<td class="fldl">Profession</td>
											<td><input value="<?php if(isset($field19)){ echo $field19;} ?>" type="text" name="fld19" class="fldr"  ></td>

										</tr>

										<tr>
											<td class="fldl">Designation</td>
											<td><input value="<?php if(isset($field20)){ echo $field20;} ?>" type="text" name="fld20" class="fldr"  ></td>

										</tr>
										<tr>
											<td class="fldl">Address</td>
											<td><input value="<?php if(isset($field21)){ echo $field21;} ?>" type="text" name="fld21" class="fldr"></td>
										</tr>
										
										<tr>
											<td class="fldl">Contact Number</td>
											<td><div style="float: left;margin: 5px 0px 0px 4px;font-size: 20px;background-color: rgb(255, 255, 255);padding: 6px 8px;color: rgb(0, 0, 0);border: 1px solid rgb(173, 173, 173);">+880</div><input value="<?php if(isset($phone2)){ echo $phone2;} ?>" style=" width: 346px;" type="text" name="fld22" class="fldr"  ></td>

										</tr>
										<tr>
											<td class="fldl">Monthly income</td>
											<td><input value="<?php if(isset($field23)){ echo $field23;} ?>" type="text" name="fld23" class="fldr"></td>
										</tr>
										
									</table>
								</div>
							</div>
						</div>
						<div class="registrartion">
						<div class="regis">
							<div class="student">Mother's</div>
								<div class="regis2">
									<table style="margin:0px auto" width="750">
										<tr>
											<td class="fldl">Mother's Name</td>
											<td><input value="<?php if(isset($field24)){ echo $field24;} ?>" type="text" name="fld24" class="fldr"  required></td>

										</tr>
										<tr>
											<td class="fldl">Profession</td>
											<td><input value="<?php if(isset($field25)){ echo $field25;} ?>" type="text" name="fld25" class="fldr"  ></td>

										</tr>

										<tr>
											<td class="fldl">Designation</td>
											<td><input value="<?php if(isset($field26)){ echo $field26;} ?>" type="text" name="fld26" class="fldr"  ></td>

										</tr>
										<tr>
											<td class="fldl">Address</td>
											<td><input value="<?php if(isset($field27)){ echo $field27;} ?>" type="text" name="fld27" class="fldr"></td>
										</tr>
										
										<tr>
											<td class="fldl">Contact Number</td>
											<td><div style="float: left;margin: 5px 0px 0px 4px;font-size: 20px;background-color: rgb(255, 255, 255);padding: 6px 8px;color: rgb(0, 0, 0);border: 1px solid rgb(173, 173, 173);">+880</div><input value="<?php if(isset($phone3)){ echo $phone3;} ?>" style=" width: 346px;" type="text" name="fld28" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Monthly income</td>
											<td><input value="<?php if(isset($field29)){ echo $field29;} ?>" type="text" name="fld29" class="fldr"></td>
										</tr>
										
									</table>
								</div>
							</div>
						</div>
						<div class="registrartion">
						<div class="regis">
							<div class="student">Guardian's</div>
							<div class="regis2">
								<table style="margin:0px auto" width="750">

									<tr>
										<td class="fldl">Guardian's Name</td>
										<td><input value="<?php if(isset($field30)){ echo $field30;} ?>" type="text" name="fld30" class="fldr"></td>
									</tr>

									<tr>
										<td class="fldl">Profession</td>
										<td><input value="<?php if(isset($field31)){ echo $field31;} ?>" type="text" name="fld31" class="fldr"></td>
									</tr>

									<tr>
										<td class="fldl">Designation</td>
										<td><input value="<?php if(isset($field32)){ echo $field32;} ?>" type="text" name="fld32" class="fldr"></td>
									</tr>
									<tr>
										<td class="fldl">Address</td>
										<td><input value="<?php if(isset($field33)){ echo $field33;} ?>" type="text" name="fld33" class="fldr"></td>
									</tr>
									
									<tr>
										<td class="fldl">Contact Number</td>
										<td><div style="float: left;margin: 5px 0px 0px 4px;font-size: 20px;background-color: rgb(255, 255, 255);padding: 6px 8px;color: rgb(0, 0, 0);border: 1px solid rgb(173, 173, 173);">+880</div><input value="<?php if(isset($phone4)){ echo $phone4;} ?>" style=" width: 346px;" type="text" name="fld34" class="fldr"></td>
									</tr>
									<tr>
										<td class="fldl">Monthly income</td>
										<td><input value="<?php if(isset($field35)){ echo $field35;} ?>" type="text" name="fld35" class="fldr"></td>
									</tr>
									
								</table>
							</div>
						</div>
					</div>
					<input name="student_submit" class="reg_submit" value="Submit" type="submit">
				</form>
				
			</div>
			<div id="panel2" class="panel">
				<form method="post" enctype="multipart/form-data">

					<div class="registrartion">
						<div class="regis">
							<div class="student">Teacher</div>
							<div class="error"><?php echo $error;?></div>
								<div class="regis2">
									<table style="margin:0px auto" width="750">
										<tr>
											<td class="fldl" style="padding: 15px 15px 5px 0;">Teacher's Name</td>
											<td><input value="<?php if(isset($tield1)){ echo $tield1;} ?>" style="margin: 15px 3px 3px 3px;" type="text" name="tld1" class="fldr" required></td>
										</tr>

										<tr>
											<td class="fldl">Teacher's ID</td>
											<td><input value="<?php if(isset($tield2)){ echo $tield2;} ?>" type="text" name="tld2" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Teacher's Picture</td>
											<td><input type="file" name="tld0" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Father's Name</td>
											<td><input value="<?php if(isset($tield3)){ echo $tield3;} ?>" type="text" name="tld3" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Mother's Name</td>									
											<td><input value="<?php if(isset($tield4)){ echo $tield4;} ?>" type="text" name="tld4" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Username</td>
											<td><input type="text" name="tld5" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">E-mail</td>
											<td><input value="<?php if(isset($tield6)){ echo $tield6;} ?>" type="email" name="tld6" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Password</td>
											<td><input type="password" name="tld7" class="fldr" required ></td>
										</tr>
										<tr>
											<td class="fldl">Confirm Password</td>
											<td><input type="password" name="tld8" class="fldr" required ></td>
										</tr>
										<tr>
											<td class="fldl">Mobile Number</td>
											<td><div style="float: left;margin: 5px 0px 0px 4px;font-size: 20px;background-color: rgb(255, 255, 255);padding: 6px 8px;color: rgb(0, 0, 0);border: 1px solid rgb(173, 173, 173);">+880</div><input value="<?php if(isset($phone5)){ echo $phone5;} ?>" style=" width: 346px;" type="text" name="tld9" class="fldr" required ></td>
										</tr>
										<tr>
											<td class="fldl">Gender</td>
											<td >
												<select name="tld10" class="fldr">
													<option>Male</option>
													<option>Female</option>
												</select>
											</td>
										</tr>

										<tr>
												<td class="fldl">Date of Birth</td>
												<td><input value="<?php if(isset($tield11)){ echo $tield11;} ?>" type="text" class="fldr" name="tld11" id="datepicker2" required></td>
											</tr>
										<tr>
											<td class="fldl">Religion</td>
											<td><input value="<?php if(isset($tield12)){ echo $tield12;} ?>" type="text" name="tld12" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Blood Group</td>
											<td><input value="<?php if(isset($tield13)){ echo $tield13;} ?>" type="text" name="tld13" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Nationality</td>
											<td><input value="<?php if(isset($tield14)){ echo $tield14;} ?>" type="text" name="tld14" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Present Address</td>
											<td><input value="<?php if(isset($tield15)){ echo $tield15;} ?>" type="text" name="tld15" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">Permanent Address</td>
											<td><input value="<?php if(isset($tield16)){ echo $tield16;} ?>" type="text" name="tld16" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Teacher's Designation</td>
											<td><input value="<?php if(isset($tield17)){ echo $tield17;} ?>" type="text" name="tld17" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Teaching Subject</td>
											<td><input value="<?php if(isset($tield18)){ echo $tield18;} ?>" type="text" name="tld18" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Appoinment Date</td>
											<td><input value="<?php if(isset($tield19)){ echo $tield19;} ?>" type="text" name="tld19" class="fldr" id="datepicker3" ></td>
										</tr>
										<tr>
											<td class="fldl">Joinning Date</td>
											<td><input value="<?php if(isset($tield20)){ echo $tield20;} ?>" type="text" name="tld20" class="fldr" id="datepicker4" ></td>
										</tr>
										<tr>
											<td class="fldl">Place of Posting</td>
											<td><input value="<?php if(isset($tield21)){ echo $tield21;} ?>" type="text" name="tld21" class="fldr" required></td>
										</tr>
										<tr>
											<td class="fldl">First Institute</td>
											<td><input value="<?php if(isset($tield22)){ echo $tield22;} ?>" type="text" name="tld22" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">National ID no</td>
											<td><input value="<?php if(isset($tield23)){ echo $tield23;} ?>" type="text" name="tld23" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Teacher Index no</td>
											<td><input value="<?php if(isset($tield24)){ echo $tield24;} ?>" type="text" name="tld24" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Head Examinar Code</td>
											<td><input value="<?php if(isset($tield25)){ echo $tield25;} ?>" type="text" name="tld25" class="fldr" ></td>
										</tr>
										<tr>
											<td class="fldl">Examinar Code</td>
											<td><input value="<?php if(isset($tield26)){ echo $tield26;} ?>" type="text" name="tld26" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Teaching level</td>
											<td><input value="<?php if(isset($tield27)){ echo $tield27;} ?>" type="text" name="tld27" class="fldr"></td>
										</tr>
										<tr>
											<td class="fldl">Teaching Class</td>
											<td><input value="<?php if(isset($tield28)){ echo $tield28;} ?>" type="text" name="tld28" class="fldr"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<input name="teacher_submit" class="reg_submit" value="Submit" type="submit">
				</form>
			</div>
		</div>
		<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			    $( "#datepicker2" ).datepicker();
			    $( "#datepicker3" ).datepicker();
			    $( "#datepicker4" ).datepicker();
			  });
			  </script>
		<script src="js/tab.js"></script>
		
	</body>
<html>