<?php  
session_start();
$pagetitle = 'Headmaster'; 
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
				$sql = "SELECT * FROM `teacher` WHERE `tld2`='101' ORDER BY `teacher`.`tld2` ASC";
				$run_data = mysqli_query($con, $sql);
				while($run_data_array = mysqli_fetch_array($run_data)){
					$id=$run_data_array['teacher_id'];
					$pic="image/teacher/".$run_data_array['tld0'];
					$name=$run_data_array['tld1'];
					$position=$run_data_array['tld21'];
					$degignation=$run_data_array['tld17'];
					$email=$run_data_array['tld6'];
					$number=$run_data_array['tld9'];
					
						
				?>
					<a href="view_profile_of_teacher.php?teacher=<?php echo $id;?>">
					<div style="min-height: 200px; border-bottom: 1px solid rgb(1, 80, 58); width: 80%; margin: 0px auto;">
						<div style="width: 160px; height: 160px; overflow: hidden; border-radius: 80px; border: 5px solid rgb(1, 80, 58); float: left; margin: 20px 60px 12px 144px;">
							<img src="<?php echo $pic;?>" style="width: 150px;">
						</div>
						<div style="padding: 15px;position:relative;">
							<h2 style="color: rgb(1, 80, 58); font-size: 36px; margin: 0px; padding: 21px 0px 7px;"><?php echo $name;?></h2>
							<h3 style="font-size: 21px; font-weight: bold; padding: 5px 0px 0px; color: rgb(76, 158, 224);"><?php echo $position;?></h3>
							<h3 style="font-size: 16px; padding: 7px 0px 0px;color:black"><?php echo $degignation;?></h3>
							<h3 style="font-size: 16px; padding: 5px 0px 0px;color:black">E-mail: <?php echo $email;?></h3>
							<h3 style="font-size: 16px; padding: 5px 0px 0px;color:black">Contact no.: <?php echo "+".$number;?></h3>
							<!-- <a href="teacher_full_profile.php?t_id=<?php echo $id;?>" style="position: absolute; left: 80%; top: 46%; font-size: 20px; color: rgb(1, 80, 58); border: 2px solid rgb(1, 80, 58); padding: 10px; transition: all 0.5s ease 0s; border-radius: 4px;" class="hover">View Profile</a> -->
						</div>
					</div>
					</a> 
				<?php
					
				}

			?>	

		</div>
		</div>
	</body>
<html>