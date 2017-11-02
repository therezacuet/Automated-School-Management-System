<?php  
session_start();
$pagetitle = 'Photo Gallery'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>
<style type="text/css">
.album_container{
position: relative;
width: 205px;
height: 167px;
margin: 10px 35px 30px 10px;
float: left;
}
.album_container h3{
top: 85%;
position: absolute;
color: #000;
}
.img{
	max-width: 166px; 
	max-height: 166px; 
	border: 4px solid rgb(229, 148, 57); 
	position: absolute;
	left: 6px;
}
.img:nth-child(1){
	-ms-transform: rotate(14deg);
	-webkit-transform: rotate(14deg);
	transform: rotate(14deg);
	top: 10px;
}
.img:nth-child(2){
	-ms-transform: rotate(7deg);
	-webkit-transform: rotate(7deg);
	transform: rotate(7deg);
}
.img:nth-child(3){
	-ms-transform: rotate(-7deg);
	-webkit-transform: rotate(-7deg);
	transform: rotate(-7deg);
	left: 12px;
}
.img:nth-child(4){
	-ms-transform: rotate(0deg);
	-webkit-transform: rotate(0deg);
	transform: rotate(0deg);
}
</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">
			<?php 
				$sql="SELECT * FROM `gallery`";
				$sql_run = mysqli_query($con, $sql);

				while($sql_get=mysqli_fetch_array($sql_run)){
					$name = $sql_get['name'];
					$album_id = $sql_get['id'];
					?>
					<a href="photo_viewer.php?album=<?php echo $album_id?>"><div class="album_container">
					<?php
						$sql2="SELECT * FROM `photo` WHERE `photo`.`album_id` = '$album_id' LIMIT 4";
						$sql2_run = mysqli_query($con, $sql2);

						while($sql2_get=mysqli_fetch_array($sql2_run)){
							$file_name = $sql2_get['file_name'];
							if (!empty($file_name)) {
								?>
									<img src="image/album/<?php echo $file_name?>" class="img">
								<?php
								
							}
							
						}
						?>
						<h3><?php echo $name?></h3>
					</div></a>
						<?php
					
				}
			?>
		</div>
	</body>
<html>