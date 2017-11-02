<?php 
session_start();
 $pagetitle = 'Add Officials'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'reg'";
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
				<div style="width: 57%; margin: 0px auto 50px;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width:53px">Name:</td>
							<td style="width: 80%;">
								<input  type="text" name="name" class="ins_input_sm" style="width: 100%;" required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width:53px">Photo:</td>
							<td style="width: 80%;">
								<input  type="file" name="file" class=""  style="width: 100%;"  required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width:53px">Position:</td>
							<td style="width: 80%;">
								<input  type="text" name="position" class="ins_input_sm" style="width: 100%;" required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width:53px">Designation:</td>
							<td style="width: 80%;">
								<input  type="text" name="degignation" class="ins_input_sm" style="width: 100%;" required>
							</td>
						</tr>
						<tr>
							<td class="ins_td_sm" style="width:53px">Phone:</td>
							<td style="width: 80%;">
								<input  type="text" name="number" class="ins_input_sm" style="width: 100%;" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>

						<input type="submit" name="head_info_submit" style="left:0; top: 0;" class="submit_sm" Value="Add">
							</td>
						</tr>
					</table>


				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Position</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Designation</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Phone</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `officials` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
								$class_id = $ccsql_get['id'];
								$name = $ccsql_get['name'];
								$position = $ccsql_get['position'];
								$degignation = $ccsql_get['degignation'];
								$number = $ccsql_get['number'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $position;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $degignation;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $number;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file;?>?class_delete=<?php echo $class_id;?>'><img class="icon" src="image/delete.png"></a></td>
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
		

		$name = $_POST['name'];
		$position = $_POST['position'];
		$degignation = $_POST['degignation'];
		$number = $_POST['number'];

		$file_name = $_FILES['file']['name'];
				$file_tmp = $_FILES['file']['tmp_name'];
				$ext = findexts ($file_name) ;  
				$ran = date("Ymd").time() ;  
				$ran2 = $ran.".";  
				$target = "image/official/";
				$target = $target . $ran2.$ext;
				$file=$ran2.$ext;
				move_uploaded_file($file_tmp, $target);

		$csql="INSERT INTO `officials` (`id`, `pic`, `name`, `position`, `degignation`, `number`) VALUES (NULL, '$file', '$name', '$position', '$degignation', '$number')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run&&$sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
			
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['class_delete'])){
		$cls_id=$_GET['class_delete'];

		$not_sql="DELETE FROM `officials` WHERE `officials`.`id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>