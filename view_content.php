<?php 
session_start();
 $pagetitle = 'Admin options'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");

	if (isset($_GET['content_id'])) {
		$content_id = $_GET['content_id'];	
	}
?>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">
			<?php
				$ccsql="SELECT * FROM `content` WHERE `id` ='$content_id'";
				$ccsql_run = mysqli_query($con, $ccsql);
				$ccsql_get=mysqli_fetch_array($ccsql_run);
				$title = $ccsql_get['title'];
				$das = $ccsql_get['das'];
				$file = $ccsql_get['file'];

			?>

			<table style="width: 80%; margin: 30px auto 0px;">
								<tr>
									<td class="ins_td_sm" style="width: 25%;">Title:</td>
									<td style="width: 75%;">
										<?php echo $title?>
									</td>
								</tr>
								<tr>

									<td class="ins_td_sm" style="width: 25%;" colspan="2">Description:</td>
								</tr>
								<tr>

									<td style="width: 75%;"  colspan="2">
										<?php echo $das?>
									</td>
								</tr>

						<?php
							if($file != "empty"){
								?>
								<tr>
									<td class="ins_td_sm" style="width: 25%;">File:</td>
									<td style="width: 75%;">
										<a href="<?php echo $file?>">Click here</a> to Download file
										
									</td>
								</tr>

								<?php

							}
						?>
								
							
							</table>
		</div>

	</body>
<html>