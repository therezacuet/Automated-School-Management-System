<?php  
session_start();
$pagetitle = 'Teachers'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");

?>
<style type="text/css">
 .left{
 	float: left;
 }
 .hover:hover{
 	background-color: #E7F2EF;
 }

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="admin_area" style="overflow: auto; border: medium none;">
			<?php
				$sql = "SELECT * FROM `officials` ORDER BY `officials`.`id` ASC";
				$run_data = mysqli_query($con, $sql);
				while($run_data_array = mysqli_fetch_array($run_data)){
					$pic="image/official/".$run_data_array['pic'];
					$name = $run_data_array['name'];
					$position = $run_data_array['position'];
					$degignation = $run_data_array['degignation'];
					$number = $run_data_array['number'];

						
				?>

					<div style="height: 200px; width: 49%; float: left; margin: 2px;border: 1px solid rgb(1, 80, 58);">
						<div style="width: 160px; height: 160px; overflow: hidden; border-radius: 80px; border: 5px solid rgb(1, 80, 58); float: left; margin: 19px 19px 12px 19px">
							<img src="<?php echo $pic;?>" style="width: 150px;">
						</div>
						<div style="padding: 15px;position:relative;">
							<h2 style="color: rgb(1, 80, 58); font-size: 30px; margin: 0px; padding: 21px 0px 7px;"><?php echo $name;?></h2>
							<h3 style="font-size: 21px; font-weight: bold; padding: 5px 0px 0px; color: rgb(76, 158, 224);"><?php echo $position;?></h3>
							<h3 style="font-size: 16px; padding: 7px 0px 0px;color:black"><?php echo $degignation;?></h3>
							<h3 style="font-size: 16px; padding: 5px 0px 0px;color:black">Contact no.: <?php echo $number;?></h3>

						</div>
					</div>
				<?php
					
				}

			?>	

		</div>
		</div>
	</body>
<html>