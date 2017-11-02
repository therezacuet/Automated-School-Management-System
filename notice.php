<?php  
session_start();
 
$extra='<link type="text/css" rel="stylesheet" href="css/uploadfile.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");

	if(isset($_GET['notice'])){
		$notice_cat = $_GET['notice'];
		$notice_cat2 = $_GET['notice'];
		if($notice_cat==1){
			$notice_cat="Notice Board";
		}else if($notice_cat==2){
			$notice_cat="Syllabus";
		}else if($notice_cat==3){
			$notice_cat="Results";
		}else if($notice_cat==4){
			$notice_cat="Class Routines";
		}else if($notice_cat==5){
			$notice_cat="Exam Routine";
		}else if($notice_cat==6){
			$notice_cat="Academic Celendar";
		}
	}

	$pagetitle = $notice_cat;

?>

<html>	
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div class="admission_aplication">
			<div class="admission_aplication_body">
				<table class="admission_aplication_table" border="1px">
					<tr>
						<th class="field1">No.</th>
						<th class="field2">Name</th>
						<th class="field4">Date</th>
						<th class="field5">Download</th>
					</tr>
					<?php 	$list="";

						$sql = "SELECT * FROM `notice` WHERE `notice`.`notice_cat` = '$notice_cat2' ORDER BY `notice`.`notice_id` DESC";

						$query = mysqli_query($con, $sql);
						$no =1;
						while ($row_notice = mysqli_fetch_array($query)) {
							$notice_id = $row_notice['notice_id'];
							$notice_name = $row_notice['notice_name'];
							$notice_date = $row_notice['notice_date'];
							$notice_path = $row_notice['notice_path'];
							
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td style='text-align: left; padding-left:10px'><?php echo $notice_name;?></td>
									<td><?php echo $notice_date;?></td>
									<td><a href='<?php echo $notice_path;?>'><img src="image/download.png" style="width:45px "></a></td>
								</tr>
							<?php
						$no=$no+1;
						}
					?>
				</table>
			</div>
		</div>

	</body>
</html>	