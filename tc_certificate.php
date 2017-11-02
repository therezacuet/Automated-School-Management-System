<?php 
session_start();
 $pagetitle = 'Transfer Certificate'; 
$extra='
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Niconne">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fjalla+One">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Parisienne">
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


.field{
	position: absolute;
	font-family: 'Parisienne' !important;
	font-style: normal;
	color: #000;
}
.field0{
left: 420px;
top: 84px;
font-size: 15px;
}
.field1{
left: 149px;
top: 129px;
font-size: 21px;
}
.field2{
left: 74px;
top: 151px;
font-size: 21px;
}
.field3{
left: 312px;
top: 151px;
font-size: 21px;
}
.field4{
left: 82px;
top: 173px;
font-size: 21px;
}
.field5{
left: 297px;
top: 197px;
font-size: 15px;
}
.field6{
left: 144px;
top: 219px;
font-size: 21px;
}
.field7{
left: 32px;
top: 240px;
font-size: 21px;
}
.field8{
left: 153px;
top: 240px;
font-size: 21px;
}
.field9{
left: 374px;
top: 240px;
font-size: 15px;
}
.field10{
left: 128px;
top: 262px;
font-size: 15px;
}
.field11{
left: 382px;
top: 262px;
font-size: 15px;
}
.field12{
left: 123px;
top: 284px;
font-size: 15px;
}
.field13{
left: 321px;
top: 284px;
font-size: 15px;
}
.field14{
left: 282px;
top: 306px;
font-size: 15px;
}
.field15{
left: 339px;
top: 328px;
font-size: 15px;
}
.field16{
left: 298px;
top: 372px;
font-size: 15px;
}
.field17{
left: 156px;
top: 393px;
font-size: 21px;
}
.field18{
left: 51px;
top: 458px;
font-size: 15px;
}
.field19{

}		

@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}



.print{
width: 114px;
height: 36px;
background: #3972B5;
position: relative;
left: 41%;
top: 13px;
border-radius: 5px;
color: white;
font-size: 19px;
border: none;
}
.print:hover{
background: #0E5E9F;
}
		</style>





	
	<body>

		<div class="class2">
			<div class="class1">
				<div id="borderimg1">
					<?php
						if (isset($_GET['tc_token'])) {
							$token = $_GET['tc_token'];
						}

						$sql = "SELECT * FROM `tc` WHERE `field0` = '$token'";
						$run_sql = mysqli_query($con, $sql);
						$get_sql = mysqli_fetch_array($run_sql);

						 $field0 = $get_sql['field0'];
						 $field1 = $get_sql['field1'];
						 $field2 = $get_sql['field2'];
						 $field3 = $get_sql['field3'];
						 $field4 = $get_sql['field4'];
						 $field5 = $get_sql['field5'];
						 $field6 = $get_sql['field6'];
						 $field7 = $get_sql['field7'];
						 $field8 = $get_sql['field8'];
						 $field9 = $get_sql['field9'];
						 $field10 = $get_sql['field10'];
						 $field11 = $get_sql['field11'];
						 $field12 = $get_sql['field12'];
						 $field13 = $get_sql['field13'];
						 $field14 = $get_sql['field14'];
						 $field15 = $get_sql['field15'];
						 $field16 = $get_sql['field16'];
						 $field17 = $get_sql['field17'];
						 $field18 = $get_sql['field18'];

						
					?>
						<div class="field field0"><?php echo $field0?></div>
						<div class="field field1"><?php echo $field1?></div>
						<div class="field field2"><?php echo $field2?></div>
						<div class="field field3"><?php echo $field3?></div>
						<div class="field field4"><?php echo $field4?></div>
						<div class="field field5"><?php echo $field5?></div>
						<div class="field field6"><?php echo $field6?></div>
						<div class="field field7"><?php echo $field7?></div>
						<div class="field field8"><?php echo $field8?></div>
						<div class="field field9"><?php echo $field9?></div>
						<div class="field field10"><?php echo $field10?></div>
						<div class="field field11"><?php echo $field11?></div>
						<div class="field field12"><?php echo $field12?></div>
						<div class="field field13"><?php echo $field13?></div>
						<div class="field field14"><?php echo $field14?></div>
						<div class="field field15"><?php echo $field15?></div>
						<div class="field field16"><?php echo $field16?></div>
						<div class="field field17"><?php echo $field17?></div>
						<div class="field field18"><?php echo $field18?></div>




				
					<img class="background" src="<?php echo $logo;?>">
					<div class="result_head">
						<img src="<?php echo $logo;?>">
						<div class="name"><?php echo $name?></div>
						<div class="exam">Transfer Certificate</div>
						<div class="token fjalla_one">Token No.:</div><div class="token_field"></div>
					</div>
					<img src="image/cer/divider1.png" class="img_divider" align="middle">
					<div class="container">
					This is certify that ……………………………………………… Father:……………………… Mother:……………………… Address:……………………………………………………… He/She was a student of this school till …………………………… belonging to class ……………… He/She has been promoted to class …………… in the ………… examination held in ……………… securing GPA ……………… His/Her class roll……………… Register No.: ………………… Session:……………………… Birth date as per admission register is ………………………  The combined dues of school have been collected up to ………………… He/She with good character and pleasant manner and wish him all the successes. His/Her School Student ID…………………… <br>

					Causes of Leaving: ………………………


					</div>

					<div class="date fjalla_one">Date:</div><div class="date_field"></div>

					<div class="sign_field fjalla_one">Head Teacher<br> <?php echo $name;?></div>
				</div>


			</div>
			<form class="no-print">
            <input type="button"  class="print button" value="Print" onClick="window.print()">
        </form>
		</div>

	</body>
</html>