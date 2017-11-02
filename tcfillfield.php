<?php 
session_start();
 $pagetitle = 'Transfer Certificate'; 
$extra='
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Niconne">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fjalla+One">
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
	}

	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = "image/".$ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];
	$add = "Address: ".$ins_sql_run['ins_add'];
	$phone = "Mobile: ".$ins_sql_run['ins_phone'];
?>

<!-- 'Monsieur La Doulaise' !important -->
<!-- 'Parisienne' !important -->
<html>
	<?php include("head.php");?>
		<style> 
		#borderimg1 { 
		border: 35px solid transparent;
		padding: 15px;
		border-image-source: url(image/v.png);
		border-image-repeat: round;
		border-image-slice: 114;
		height: 594px;
		width: 594px;
		margin: 5px;
		position: relative;

		}
		.background{
			position: absolute;
			left: 25%;
			top: 25%;
			z-index: 1;
			opacity: 0.1;
			height: 260px;
			width: 260px;
		}
		.class1{
			border: 1px solid #84A975;
		width: 605px;
		height: 605px;
		margin: 3px;
		}
		.class2{
		width: 620px;
		height: 620px;
		border: 5px solid #84A975;
		margin: 0 auto;
		}
		.uppercase {
		    text-transform: uppercase;
		}

		.lowercase {
		    text-transform: lowercase;
		}

		.capitalize {
		    text-transform: capitalize;
		}

		/*.body{
		width: 1000px;
		border: 15px groove #666;
		padding: 15px;
		margin: 0 auto;
		overflow: hidden;
		}*/
		.result_head{
		height: 80px;
		}
		.result_head img{
		float: left;
		width: 50px;
		position: absolute;
		height: 50px;
		left: 23px;
		}
		.name{
		text-align: center;
		font-family: 'olde_englishregular';
		font-size: 27px;
		padding: 9px 0;
		color: #000;
		}
		.exam{
		font-family: 'olde_englishregular';
		text-align: center;
		font-size: 41px;
		padding: 10px 0;
		color: #000;
		}
		.img_divider{
		    display: block;
		    margin: 11px auto;
		    width: 309px;
		    height: 15px;
		}
		.container{
			font-family: 'Niconne' !important;
        font-size: 20px;
        color: black;
		}
		.fjalla_one{
			font-family: 'Fjalla One' !important;
			font-style: normal;
			    font-weight: 400;
    color: #000;
		}
		.date{
			    margin: 39px 0 0 0;
			    float: left;
		}
		.date_field{
		    border: 1px solid;
    width: 100px;
    height: 24px;
    margin: 38px 0 0 31px;

		}
		.sign_field{
			width: 206px;
    font-size: 12px;
    text-align: center;
    float: right;
    border-top: 2px solid #000;
		}
		.token{
width: 90px;
    text-align: center;
    float: right;
    margin: -35px 0 0 0;
		}
		.token_field{
			    width: 95px;
    height: 20px;
    border: 1px solid #000;
    float: right;
    margin: -14px 0 0 0;
		}
		.ins_input_xsm{
padding: 0 0 0 5px;
		}
		.field0{
			width: 94px;
		}
		.field1{
width: 355px;
		}
		.field2{
width: 180px;
		}
		.field3{
width: 180px;
		}
		.field4{
width: 412px;
		}
		.field5{
width: 215px;
		}
		.field6{
width: 121px;
		}
		.field7{
width: 90px;
		}
		.field8{
width: 90px;
		}
		.field9{
width: 115px;
		}
		.field10{
width: 118px;
		}
		.field11{
width: 116px;
		}
		.field12{
width: 151px;
		}
		.field13{
width: 163px;
		}
		.field14{
width: 175px;
		}
		.field15{
width: ;
		}
		.field16{
width: ;
		}
		.field17{
width: ;
		}
		.field18{
width: 98px;
		}
		</style>

<?php
	if (isset($_GET['stu'])) {
		$id=$_GET['stu'];
	}

	$get_data = "select * from student where `fld2`='$id'";
			$run_data = mysqli_query($con, $get_data);
			$run_data_array = mysqli_fetch_array($run_data);
				$field1=$run_data_array['fld1'];
				$field2=$run_data_array['fld18'];
				$field3=$run_data_array['fld24'];
				$field4=$run_data_array['fld13'];
				$field14=$run_data_array['fld9'];
				$mob=$run_data_array['fld7'];
	

?>





	
	<body>

		<div class="class2">
			<div class="class1">
				<div id="borderimg1">
				<form  method="post" enctype="multipart/form-data">
					<div class="result_head">
						<img src="<?php echo $logo;?>">
						<div class="name"><?php echo $name?></div>
						<div class="exam">Transfer Certificate</div>
						<div class="token fjalla_one">Token No.:</div>
						<div class="token_field"><input  type="text" name="field0" class="ins_input_xsm field0" required>
						</div>
					</div>
					<img src="image/cer/divider1.png" class="img_divider" align="middle">
					<div class="container">
					This is certify that 
					<input  type="text" name="field1" value="<?php if (isset($field1)) {echo $field1;}?>" class="ins_input_xsm field1" required>
					Father:
					<input  type="text" name="field2" value="<?php if (isset($field2)) {echo $field2;}?>" class="ins_input_xsm field2" required> 
					Mother:
					<input  type="text" name="field3" value="<?php if (isset($field3)) {echo $field3;}?>" class="ins_input_xsm field3" required>
					 Address:
					 <input  type="text" name="field4" value="<?php if (isset($field4)) {echo $field4;}?>" class="ins_input_xsm field4" required> 
					 He/She was a student of this school till 
					 <input  type="text" name="field5" class="ins_input_xsm field5" required> 
					 belonging to class 
					 <input  type="text" name="field6" class="ins_input_xsm field6" required> 
					 He/She has been promoted to class
					<input  type="text" name="field7" class="ins_input_xsm field7" required> 
					in the 
					<input  type="text" name="field8" class="ins_input_xsm field8" required>
					 examination held in 
					 <input  type="text" name="field9" class="ins_input_xsm field9" >
					  securing GPA 
					  <input  type="text" name="field10" class="ins_input_xsm field10" > 
					  His/Her class roll
					  <input  type="text" name="field11" class="ins_input_xsm field11" required> 
					  Register No.: 
					  <input  type="text" name="field12" class="ins_input_xsm field12" > 
					  Session:
					  <input  type="text" name="field13" class="ins_input_xsm field13" required> 
					  Birth date as per admission register is 
					  <input  type="text" name="field14" value="<?php if (isset($field14)) {echo $field14;}?>" class="ins_input_xsm field14" required>  
					  The combined dues of school have been collected up to <input  type="text" name="field15" class="ins_input_xsm field15" required> 
					  He/She with good character and pleasant manner and wish him all the successes. His/Her School Student ID
					  <input  type="text" name="field16" value="<?php if (isset($id)) {echo $id;}?>" class="ins_input_xsm field16" required> <br>

					Causes of Leaving: 
					<input  type="text" name="field17" class="ins_input_xsm field17" >


					</div>

					<div class="date fjalla_one">Date:</div>
					<div class="date_field">
						<input  type="text" name="field18" class="ins_input_xsm field18" required>
					</div>

					<div class="sign_field fjalla_one">Head Teacher<br> <?php echo $name;?></div>

					<input type="submit" name="submit" class="btn" style="top: -34px; left: 584px; width: 167px; height: 36px; border-radius: 5px; color: white; font-size: 19px; border: medium none; position: absolute; background: rgb(57, 114, 181) none repeat scroll 0% 0%;" value="View Certificate">
				</form>
				</div>
			</div>

			</div>
		</div>

	</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		 $field0 = $_POST['field0'];
		 $field1 = $_POST['field1'];
		 $field2 = $_POST['field2'];
		 $field3 = $_POST['field3'];
		 $field4 = $_POST['field4'];
		 $field5 = $_POST['field5'];
		 $field6 = $_POST['field6'];
		 $field7 = $_POST['field7'];
		 $field8 = $_POST['field8'];
		 $field9 = $_POST['field9'];
		 $field10 = $_POST['field10'];
		 $field11 = $_POST['field11'];
		 $field12 = $_POST['field12'];
		 $field13 = $_POST['field13'];
		 $field14 = $_POST['field14'];
		 $field15 = $_POST['field15'];
		 $field16 = $_POST['field16'];
		 $field17 = $_POST['field17'];
		 $field18 = $_POST['field18'];

		 $sql = "INSERT INTO `tc` (`id`, `field0`, `field1`, `field2`, `field3`, `field4`, `field5`, `field6`, `field7`, `field8`, `field9`, `field10`, `field11`, `field12`, `field13`, `field14`, `field15`, `field16`, `field17`, `field18`, `student_id`) 
		 							   VALUES (NULL, '$field0', '$field1', '$field2', '$field3', '$field4', '$field5', '$field6', '$field7', '$field8', '$field9', '$field10', '$field11', '$field12', '$field13', '$field14', '$field15', '$field16', '$field17', '$field18', '$id')";
		$run_sql = mysqli_query($con, $sql);
		$sms = "Your TC application is accepted. Please collect your TC from office.";
		sendShortSMS($sms,$mob);
		if($run_sql){
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('tc_certificate.php?tc_token=".$field0."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}		 							   
	}

?>