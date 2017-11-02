<?php 
session_start();
$pagetitle = 'Photo Gallery'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" id="camera-css"  href="css/camera.css" type="text/css" media="all"> 
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="js/camera.min.js"></script> 
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (isset($_GET['album']) && !empty($_GET['album'])) {
		$album_id = $_GET['album'];
	}

?>
<!-- Camera is a Pixedelic free jQuery slideshow | Manuel Masia (designer and developer) --> 
<html> 
<head> 
	<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //		Styles
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
    
<style>
		body {
			margin: 0;
			padding: 0;
		}
		a {
			color: #09f;
		}
		a:hover {
			text-decoration: none;
		}
		#back_to_camera {
			clear: both;
display: block;
height: 20px;
line-height: 40px;
padding: 0;
		}
		.fluid_container {
			margin: 0 auto;
			max-width: 1000px;
			width: 90%;
		}
	</style>
    

    
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				thumbnails: true
			});

			jQuery('#camera_wrap_2').camera({
				height: '400px',
				loader: 'bar',
				pagination: false,
				thumbnails: true
			});
		});
	</script>
 
</head>
<body>
	<div id="back_to_camera">
    </div>
    
	<div class="fluid_container">
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">

        		<?php
					$ccsql="SELECT * FROM `photo` WHERE `album_id` = '$album_id'";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$file_name = $ccsql_get['file_name'];
						$caption = $ccsql_get['caption'];

						?>
						 <div data-thumb="image/album/<?php echo $file_name;?>" data-src="image/album/<?php echo $file_name;?>">
						 	<?php
						 		if (!empty($caption)) {
						 		?>
					                <div class="camera_caption fadeFromBottom">
					                    <?php echo $caption;?>
					                </div>

						 		<?php
						 		}
						 	?>
			            </div>

						<?php
					}

					
				?>
        </div>
    </div>
    
</body> 
</html>