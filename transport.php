<?php  
session_start();
$pagetitle = 'Transports'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'acc'";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);
	$user_id  = $sql_get['user_id'];
	$sql2 = "SELECT * FROM `teacher` WHERE `teacher`.`tld2` = '$user_id'";
	$sql2_run = mysqli_query($con, $sql2);
	$sql2_get=mysqli_fetch_array($sql2_run);
	$teid  = $sql2_get['teacher_id'];

	if (!admin_loggedin()) {
		if (!loggedin() || empty($_SESSION['teacher_id'])  || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}
?>
<style>
.bicon{
	background: url('image/update.png');
	background-repeat: no-repeat;
	border: 0;
	display: block;
	width: 40px;
	height: 40px;
	text-indent: -999999999999px;
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
				<div style="width: 88%; ">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 17%;">Add Transport:</td>
							<td style="width: 20%;">
								<input  type="text" name="trans_name" class="ins_input_sm" style="width: 100%;" placeholder="Transport name" required>
							</td>
							<td class="ins_td_sm" style="width: 11%;">Driver :</td>
							<td style="width: 20%;">
								<input  type="text" name="driver" class="ins_input_sm"  style="width: 100%;" >
							</td>
							<td class="ins_td_sm" style="width:18%;">Maintains Cost:</td>
							<td style="width: 33%;">
								<input  type="text" name="cost" class="ins_input_sm"  style="width: 100%;" >
							</td>
						</tr>
					</table>


						<input type="submit" name="submit" style="left: 101%; top: -46px; width: 100px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Transport Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Driver Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 14%;">Maintains Cost</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Update</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `transport` ";
					$ccsql_run = mysqli_query($con, $ccsql);
					$total = 0;
					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$trans_name = $ccsql_get['trans_name'];
						$driver = $ccsql_get['driver'];
						$cost = $ccsql_get['cost'];

						?>
<form method="post" enctype="multipart/form-data">
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>


							<td style="border: 1px solid #A5A5A5;text-align: left;">
								<input type="text" value="<?php echo $trans_name;?>" name="trans_name" class="ins_input_xsm" style="width:100%; height:100%; margin:0px;text-align: center;">
							</td>

							<td style="border: 1px solid #A5A5A5;text-align: left;">
								<input type="text" value="<?php echo $driver;?>" name="driver" class="ins_input_xsm" style="width:100%; height:100%; margin:0px;text-align: center;">
							</td>

							<td style="border: 1px solid #A5A5A5;">
								<input type="text" value="<?php echo $cost;?>" name="cost" class="ins_input_xsm" style="width:100%; height:100%; margin:0px;text-align: right;">
							</td>

							<td style="border: 1px solid #A5A5A5;text-align: center;">
										<input type="hidden" value ="<?php echo $id;?>" name="id">
										<input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;">
							</td>

							
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file;?>?transport_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
						</tr>

</form>
						<?php
						$i++;
						$total += $cost;
					}

					
				?>
				<tr>
					<td colspan = "3" style="border: 1px solid #A5A5A5;text-align: right;padding-right:10px;"><b>Total</b></td>
					<td style="border: 1px solid #A5A5A5;text-align: right;padding-right:10px;height:41px"><b><?php echo $total;?></b></td>
				</tr>
			</table>

		</div>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$trans_name = $_POST['trans_name'];
		$driver = $_POST['driver'];
		$cost = $_POST['cost'];

		$csql="INSERT INTO `transport` (`id`, `trans_name`, `driver`, `cost`) VALUES (NULL, '$trans_name', '$driver', '$cost')";


		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['transport_delete'])){
		$id=$_GET['transport_delete'];

		$not_sql="DELETE FROM `transport` WHERE `transport`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}
	}
?>

<?php
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$trans_name = $_POST['trans_name'];
		$driver = $_POST['driver'];
		$cost = $_POST['cost'];

		$not_sql="UPDATE `transport` SET `trans_name` = '$trans_name', `driver` = '$driver', `cost` = '$cost' WHERE `transport`.`id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>