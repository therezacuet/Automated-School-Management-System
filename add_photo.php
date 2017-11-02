<?php  
session_start();
$pagetitle = 'Photo Gallery'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'web'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin() || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
	if (isset($_GET['album']) && !empty($_GET['album'])) {
		$album_id = $_GET['album'];
	}
?>
<style type="text/css">
 .left{
 	float: left;
 }

</style>
<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
					<?php
						$ccsql="SELECT * FROM `gallery` WHERE `gallery`.`id` = '$album_id'";
						$ccsql_run = mysqli_query($con, $ccsql);
						$ccsql_get=mysqli_fetch_array($ccsql_run);
						$name = $ccsql_get['name'];
					?>
					<h2 style="font-size: 23px; font-weight: bold;">Add photo to <?php echo $name;?> Album</h2 >
				<div style="width: 64%; margin: 0px 0px 0px 9%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 18%;">Select a Photo:</td>
							<td style="width: 20%;">
								<input  type="file" name="file"  style="width: 100%;" onchange="ValidateSingleInput(this);" required>
								<input  type="hidden" name="hidden"  value="<?php echo $album_id;?>" required>
							</td>
							<td class="ins_td_sm" style="width: 6%;">Caption:</td>
							<td style="width: 20%;">
								<input  type="text" name="caption" class="ins_input_sm" style="width: 100%;" placeholder="Write a Caption" >
							</td>
						</tr>
					</table>
						<input type="submit" name="submit" style="left:103%; top: -46px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Photo</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Caption</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 17%;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `photo` WHERE `album_id` = '$album_id' ORDER BY `photo`.`id`  DESC";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$file_name = $ccsql_get['file_name'];
						$caption = $ccsql_get['caption'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><img src="<?php echo "image/album/".$file_name;?>" style="max-width: 160px; max-height: 160px;"> </td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $caption;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file;?>?delete=<?php echo $id;?>&nam=<?php echo $file_name;?>&album=<?php echo $album_id?>'><img class="icon" src="image/delete.png"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>
		</div>
			<script src="js/jquery-1.10.2.js"></script> 
            <script type="text/javascript">
              var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
              function ValidateSingleInput(oInput) {
                  if (oInput.type == "file") {
                      var sFileName = oInput.value;
                       if (sFileName.length > 0) {
                          var blnValid = false;
                          for (var j = 0; j < _validFileExtensions.length; j++) {
                              var sCurExtension = _validFileExtensions[j];
                              if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                  blnValid = true;
                                  break;
                              }
                          }
                           
                          if (!blnValid) {
                              alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                              oInput.value = "";
                              return false;
                          }
                      }
                  }
                  return true;
              }
            </script>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		$album_id = $_POST['hidden'];
		$caption = mysqli_real_escape_string($con, $_POST['caption']);
		
		$file_name = $_FILES['file']['name'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$ext = findexts ($file_name) ;  
		$ran = date("Ymd").time() ;  
		$ran2 = $ran.".";  
		$target = "image/album/";
		$target = $target . $ran2.$ext;
		$file=$ran2.$ext;
		move_uploaded_file($file_tmp, $target);



		$sql="INSERT INTO `photo` (`id`, `file_name`, `caption`, `album_id`) VALUES (NULL, '$file', '$caption', '$album_id')";

		$sql_run = mysqli_query($con, $sql);

		if ($sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."?album=".$album_id."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>

<?php
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$nam=$_GET['nam'];
		$album_id=$_GET['album'];
		$file = "image/album/".$nam;
		unlink($file);
		

		$sql="DELETE FROM `photo` WHERE `photo`.`id` = '$id'";
		$sql_run = mysqli_query($con, $sql);

		
		if($sql_run){
			echo "<script>window.open('".$current_file."?album=".$album_id."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>