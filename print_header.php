<?php 

	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = "image/".$ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];
	$add = "Address: ".$ins_sql_run['ins_add'];
	$phone = "Mobile: ".$ins_sql_run['ins_phone'];
?>


		<div class="ahead_body">		
			<div class="ahead">
				<div class="ahead_right">
					<h1><?php echo $phone;?></h1>
				</div>
				<div class="ahead_left">
					<img src="<?php echo $logo;?>">
					<h1><?php echo $name;?></h1>
					<h2><?php echo $add;?></h2>
				</div>
			</div>
		</div>
