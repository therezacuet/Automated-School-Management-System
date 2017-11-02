<?php  
session_start();

	require 'core.inc.php';
    require 'conn.inc.php';
    include("functions/functions.php");
    $sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'reg'";
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
	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = "image/".$ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];
	$add = "Address: ".$ins_sql_run['ins_add'];
	$phone = "Mobile: ".$ins_sql_run['ins_phone'];
?>
<html>
<head>
	<title>ID Card</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
</head>

<style>
.uppercase {
    text-transform: uppercase;
}

.lowercase {
    text-transform: lowercase;
}

.capitalize {
    text-transform: capitalize;
}
.back_white { 
	-webkit-filter: grayscale(100%);
	filter: grayscale(100%);
}

.Source-Sans-Pro {
    font-family: 'Source Sans Pro' !important;
    font-style: normal;
    font-weight: 400;
}
.rotate90{
	-ms-transform: rotate(-90deg); /* IE 9 */
    -webkit-transform: rotate(-90deg); /* Chrome, Safari, Opera */
    transform: rotate(-90deg);
}
.water_mark{
	position: absolute;
    z-index: 1;
    opacity: 0.2;
}
.crop_height { 
 width: 60px;
height: 70px;
overflow: hidden;
position: absolute;
left: 269px;
top: 7px; 
}
.crop_height img { 
    width: 100%;
}

.container{
width: 800px;
margin: 0 auto;

}
.main{
width: 331px;
margin: 0 auto;
height: 178px;
    border: 1px solid;

    border-radius: 10px;
    padding: 5px;
    position: relative;
}
.idheader{

}
.idheader h1{
	font-size: 14px;
width: 188px;
height: 45px;
overflow: hidden;
padding: 7px 5px 0 5px;
margin: 0px;
}
.idheader img{
	width: 57px;
height: 57px;
float: left;
}
.corp_height{}
.absolute{
	position: absolute;
}
.name{
	font-weight: 600;top: 67px;   left: 10px;
}
.pos{
top: 88px;
    left: 10px;
    font-size: 14px
}
.pos1{
top: 104px;
    left: 10px;
    font-size: 14px
}
.email{
    font-size: 14px;
    top: 117px;
    left: 10px;
}
.phone{
	font-size: 14px;
    top: 103px;
    left: 10px;
}
.blood{
	    font-size: 14px;
    top: 120px;
    left: 10px;
}
.h5{
	    position: absolute;
    font-size: 9px;
    left: 250px;
    width: 53px;
    margin: 0;
    padding: 0;
    font-weight: 600;
    top: 107px;
}
.id{
	    font-weight: bold;
    left: 250px;
    top: 117px;
}
.type{
    position: absolute;
    left: 250px;
    top: 135px;
    background: #134E94;
    color: #fff;
    padding: 0 19px 0 4px;
}
.cutting{
	    position: absolute;
    height: 10px;
    width: 6px;
}
.blue{
	    background: #134E94;
    left: 324px;
    top: 158px;
}
.white{
	background: #fff;
    left: 324px;
    top: 134px;
}

.add{
font-size: 14px;
  top: 137px;line-height: 16px;width: 224px;
    left: 10px;
}

.print1{
    width: 104px;
    background-color: #3972B5;
    border-radius: 6px;
    padding: 12px;
    text-align: center;
    margin: 10px auto;
    border: none;
    color: white;
}
.print1:hover{
background-color: #0E5E9F;
}
@media print
{    

    .no-print, .no-print *
    {
        display: none !important;
    }
}


@media print
{ 



}
</style>

<body>
<div class="container">
	<div class="main">
		<div class="idheader">
			<img src="<?php echo $logo;?>">
			<h1 class="uppercase Source-Sans-Pro"><?php echo $name;?></h1>
			<div style="    overflow: hidden;
    width: 54px;
    height: 101px;
    position: absolute;
    left: 209px;">

			<img class="water_mark back_white rotate90" style="    width: auto;height: 100%;"  src="<?php echo $logo;?>">
			</div>
			<h5 class="Source-Sans-Pro h5">ID Number:</h5>
			<div class="type Source-Sans-Pro">STUDENT</div>
			<div class="cutting blue"></div>
			<div class="cutting white"></div>


			<?php
				if (isset($_GET['student'])) {
					$student_id = $_GET['student'];
				}

					$get_data = "SELECT * FROM student WHERE `student_id`='$student_id'";
					$run_data = mysqli_query($con, $get_data);
					$run_data_array = mysqli_fetch_array($run_data);
						$fld0="image/student/".$run_data_array['fld0'];
						$fld1=$run_data_array['fld1'];
						$fld2=$run_data_array['fld2'];
						$fld18=$run_data_array['fld18'];
						$fld24=$run_data_array['fld24'];
						$fld13=$run_data_array['fld13'];
						$fld11=$run_data_array['fld11'];
			?>
		</div>


			<div class="crop_height">
				<img src="<?php echo $fld0;?>">

			</div>
			<div class="name absolute uppercase Source-Sans-Pro"><?php echo $fld1;?></div>
            <div class="pos absolute  Source-Sans-Pro">Father: <?php echo $fld18;?></div>
			<div class="pos1 absolute  Source-Sans-Pro">Mother: <?php echo $fld24;?></div>
			<div class="id absolute  Source-Sans-Pro"><?php echo $fld2;?></div>
			<div class="blood absolute  Source-Sans-Pro">Blood of Group: <?php echo $fld11;?></div>
			<div class="add absolute  Source-Sans-Pro">Address:  <?php echo $fld13;?></div>



	</div>
<form class="no-print" align="middle" style="margin: 10px auto; width: 105px;">
            <input type="button"  class="print1" value="Print" onClick="window.print()"  >
        </form>
</div>
</body>
</html>