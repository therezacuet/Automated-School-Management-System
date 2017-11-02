<?php 
session_start();
 $pagetitle = 'Admit Card'; 
$extra='<link href="css/admit.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if(isset($_POST['admitcard_submit'])){
		$ref = $_POST['ref'];
		$tran = $_POST['tran'];
		$sql="SELECT * FROM admission WHERE fld10 = '$ref' AND fld11 = '$tran'";
		$sql_run = mysqli_query($con, $sql);
		if($sql_run){
			header('Location: download_admitcard.php?ref='.$ref.'&tran='.$tran);
		}
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<?php
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 8";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file5= $ccsql_get['file'];
					$link5= $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 9";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file6 = $ccsql_get['file'];
					$link6 = $ccsql_get['link'];
					$ccsql="SELECT * FROM `advertisement` WHERE `id` = 10";
					$ccsql_run = mysqli_query($con, $ccsql);
					$ccsql_get=mysqli_fetch_array($ccsql_run);
					$file7 = $ccsql_get['file'];
					$link7 = $ccsql_get['link'];

					
				?>
		<div class="admitcard_body" <?php if($file7 != 0){echo "style='height: 342px;'";}?>>
			<?php
					if ($file5 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link5?>"><img src="<?php echo 'image/ads/'.$file5;?>" style="position: absolute;left: -13%;top: 0;"></a>
					<?php
					}
					?>
					<?php
					if ($file6 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link6?>"><img src="<?php echo 'image/ads/'.$file6;?>" style="left: 101%;position: absolute;top: 0;"></a>
					<?php
					}
					?>
					<?php
					if ($file7 == 0) {
						
					}else{
					?>
						<a href="<?php echo $link7?>"><img src="<?php echo 'image/ads/'.$file7;?>" style="left: 1%;position: absolute;top: 350px;"></a>
					<?php
					}
					?>
			<div class="admitcard_info">

				<div class="ac_header">Admit card টি Download করার জন্যে, আপনাকে যে Reference Number এবং Transaction Number প্রদান করা হয়েছিল সেগুলো লিখুন এবং <img src="image/arrow.PNG" class="adicon"> তে Click করুন</div> 
				<h3 class="adh1">Reference Number</h3><h3 class="adh2">Transaction Number</h3><br>
				
				<form method="post" enctype="multipart/form-data">
					<input type="text" class="input_field" name="ref" placeholder="Your Reference Number">
					<input type="text" class="input_field" name="tran" placeholder="Your Transaction Number">
					<input type="submit" name="admitcard_submit" class="acsubmit">
				</form>
			</div>
		</div>
	</body>
<html>