<?php 
session_start();
 $pagetitle = 'All Student'; 
$extra='
		<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
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
		if (!loggedin() || empty($_SESSION['teacher_id'])  || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>
<style type="text/css">
	.pp{
		float: right; background: rgb(57, 114, 181) none repeat scroll 0% 0%; color: rgb(255, 255, 255); padding: 8px 30px; border-radius: 5px; font-size: 22px; margin: 16px 7px 0px 0px;
	}
	.pp:hover{
		background: #0E5E9F;
	}
	.print1 {
    background-color: #3972B5;
    border-radius: 4px;
    padding: 4px 19px;
    text-align: center;
    color: #fff;
    font-size: 20px;
    display: block;
    margin: 5px auto;
    border: none;
}
</style>

<html>
	<?php include("head.php");?>
	<body>
		<?php
			include('print_header.php');
		?>
		<div style="width: 800px;
margin: 0px auto;">
		<form class="no-print" align="middle">
            <input type="button"  class="print1" value="Print" onClick="window.print()" style="float: right;">
        </form>
		<h1 style="text-align: center; font-size: 24px; margin: 37px 0px 15px;">Teachers' List</h1>
			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 800px;
margin: 0px auto;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 31px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 73px;">ID</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 120px;">Position</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 86px;">Govt./ Non-Govt.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: ;">Comment</th>
				</tr>
				<?php
					$sql = "SELECT * FROM `teacher` WHERE `type`='Govt.' OR `type`='NON-Govt.' ORDER BY `tld2` ASC";
					$sql_run = mysqli_query($con, $sql);
					$i=1;
					while ($sql_get = mysqli_fetch_array($sql_run)) {
						$id = $sql_get['tld2']; 
						$name = $sql_get['tld1']; 
						$position = $sql_get['tld21']; 
						$gng = $sql_get['type']; 
						?>
						<tr style="border: 1px solid #A5A5A5;text-align:">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $position;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $gng;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"></td>
							
						</tr>


						<?php
						$i++;
					}
				?>
			</table>
		</div>
	</body>
</html>