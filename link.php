<?php  
session_start();
$pagetitle = 'Add/Delete link'; 
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
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">

			<form method="post" enctype="multipart/form-data">
				<div style="width: 68%; margin: 0px auto 15px;">
					<table style="width: 100%;">
						<tr>
							<td class="ins_td_sm">Link Name:</td>
							<td style="width: 75%;">
								<input  type="text" name="name" class="ins_input_sm"  style="width: 100%;"  required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm">Link:</td>
							<td style="width: 75%;">
								<input  type="text" name="link" class="ins_input_sm" style="width: 100%;" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>

						<input type="submit" name="head_info_submit" style="left:0px; top: 0px;" class="submit_sm" Value="Add">
							</td>
						</tr>
					</table>


				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Link Address</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Link Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `link` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$link = $ccsql_get['link'];
						$name = $ccsql_get['name'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;font-family: 'Hind Siliguri',sans-serif;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $link;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='link.php?delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
						</tr>


						<?php
						$i++;
					}

					
				?>

			</table>

		</div>
	</body>
<html>

<?php
	if (isset($_POST['head_info_submit'])) {
		
		$link = $_POST['link'];
		$name = $_POST['name'];

		$csql="INSERT INTO `link` (`id`, `link`, `name`) VALUES (NULL, '$link', '$name')";


		$csql_run = mysqli_query($con, $csql);

		if ($csql_run&&$sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('link.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$not_sql="DELETE FROM `link` WHERE `link`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('link.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>