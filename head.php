<?php 
	$institute_sql = "SELECT * FROM `institute_info` ";
	$institute_sql_get = mysqli_query($con, $institute_sql);
	$institute_sql_run = mysqli_fetch_array($institute_sql_get);
	$favicon = "image/".$institute_sql_run['ins_logo'];
?>


	<head>
		<title><?php echo $pagetitle; ?></title>
		<link rel="shortcut icon" href="<?php echo $favicon;?>" >
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
		<?php echo $extra; ?>
		
	</head>