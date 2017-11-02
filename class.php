<?php  
session_start();
$pagetitle = 'Add/Delete class'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!admin_loggedin()) {
		header("Location: admin_login.php"); 
		exit();
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
				<div style="width: 68%; margin: 0px 0px 0px 8%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 20%;">Add class:</td>
							<td style="width: 20%;">
								<input  type="text" name="admission_date" class="ins_input_sm" style="width: 100%;" placeholder="Class name" required>
							</td>
							<td class="ins_td_sm" style="width: 20%;">Numeric value:</td>
							<td style="width: 20%;">
								<input  type="text" name="numeric_value" class="ins_input_sm"  style="width: 100%;"  required>
							</td>
						</tr>
					</table>


						<input type="submit" name="head_info_submit" style="left:103%; top: -46px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Class Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `class` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$class_id = $ccsql_get['class_id'];
						$class_name = $ccsql_get['class_name'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $class_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='class.php?class_delete=<?php echo $class_id;?>'><img class="icon" src="image/delete.png"></a></td>
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
		
		$class_name = $_POST['admission_date'];
		$numeric_value = $_POST['numeric_value'];

		$csql="INSERT INTO `class` (`class_id`, `class_name`, `numeric_value`) VALUES (NULL, '$class_name', '$numeric_value')";
		$sql="INSERT INTO `class_fee` (`id`, `class`, `fee`) VALUES (NULL, '$class_name', '0')";

		$sql_run = mysqli_query($con, $sql);

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run&&$sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('class.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('class.php','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['class_delete'])){
		$cls_id=$_GET['class_delete'];

		$not_sql="DELETE FROM `class` WHERE `class`.`class_id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		$sql="DELETE FROM `class_fee` WHERE `class_fee`.`id` = '$cls_id'";
		$sql_run = mysqli_query($con, $sql);
		
		if($run_not_sql){
			echo "<script>window.open('class.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('class.php','_self')</script>";
		}
	}
?>