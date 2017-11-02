<?php 
session_start();
 $pagetitle = 'Content'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>

<style type="text/css">
.search_name{
	height: 35px;
border: 2px solid #0081F3;
border-radius: 4px;
width: 200px;
}

.search_submit{
	background: url('image/search.png');
background-repeat: no-repeat;
border: 0;
width: 40px;
height: 40px;
text-indent: -999999999999px;
}
</style>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admin_area">
			<div style="float: right; margin: 0px 0px 10px 61%;">
				<form method="POST" enctype="multipart/form-data">
					<input type="text" name="search_like" class="search_name">
					<input type="submit" name="search_submit" class="search_submit">	
				</form>
			</div>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 10%;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Title</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Writen by</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 10%;">View</th>
				</tr>
				<?php

				if (isset($_POST['search_submit'])) {
					$search_word = $_POST['search_like'];
					$ccsql="SELECT * FROM `content` WHERE `title` LIKE '%$search_word%' ORDER BY `id` DESC";
				}else{
					
					$ccsql="SELECT * FROM `content` ORDER BY `id` DESC";
				}
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$title = $ccsql_get['title'];
						$t_name = $ccsql_get['t_name'];
						$das = $ccsql_get['das'];
						$file = $ccsql_get['file'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left; padding-left:10px;"><?php echo $title;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left; padding-left:10px;"><?php echo $t_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='view_content.php?content_id=<?php echo $id;?>'><img class="icon" src="image/view.png"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>
		</div>

	</body>
<html>