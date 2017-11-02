<?php 
session_start();
 $pagetitle = 'Office Management'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/calender.css">';
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
			header("Location: 403.html"); 
			exit();
		}
	}

?>

<?php 
	$m = date('m');
	$d = date('d');
	$y = date('Y');
	$todate = $m."/".$d."/".$y;
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
			<h2>Create Expense Head</h2>
			<form method="post" enctype="multipart/form-data">
				<div style="width: 68%; margin: 0px 0px 0px 8%;">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 13%%;">Name:</td>
							<td style="width: 20%;">
								<input  type="text" name="name" class="ins_input_sm" style="width: 100%;font-size: 13px;"  required>
							</td>
							<td class="ins_td_sm" style="width: 13%%;">Details:</td>
							<td style="width: 20%;">
								<input  type="text" name="detail" class="ins_input_sm"  style="width: 100%;font-size: 13px;" >
							</td>
							<td class="ins_td_sm" style="width: 13%%;">Amount:</td>
							<td style="width: 20%;">
								<input  type="text" name="amount" class="ins_input_sm"  style="width: 100%;font-size: 13px;"  required>
							</td>
							<td class="ins_td_sm" style="width: 13%%;">Date:</td>
							<td style="width: 20%;">
								<input  type="text" name="date" class="ins_input_sm" value="<?php echo $todate;?>" id="datepicker" style="width: 100%;font-size: 13px;"  required>
							</td>
						</tr>
					</table>


						<input type="submit" name="submit" style="left:103%; top: -46px;" class="submit_sm" Value="Create">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 88%;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 50px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Details</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 100px;">Date</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 110px;">Amount</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 50px;">Update</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 50px;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `office_management` ";
					$ccsql_run = mysqli_query($con, $ccsql);
					$total=0;
					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$name = $ccsql_get['name'];
						$detail = $ccsql_get['detail'];
						$amount = $ccsql_get['amount'];
						$date = $ccsql_get['date'];

						?>
						<form method="post" enctype="multipart/form-data">
							<tr style="border: 1px solid #A5A5A5;text-align: center;">
								<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $i;?></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input  type="text" name="tname" class="ins_input_sm"  style="width: 100%;height:100%;font-size:14px" value="<?php echo $name;?>"></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input  type="text" name="tdetail" class="ins_input_sm"  style="width: 100%;height:100%;font-size:14px" value="<?php echo $detail;?>"></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input  type="text" name="tdate" class="ins_input_sm"  style="width: 100%;height:100%;font-size:14px" value="<?php echo $date;?>"></td>
								<td style="border: 1px solid #A5A5A5;text-align: right;"><input  type="text" name="tamount" class="ins_input_sm"  style="width: 100%;height:100%;font-size:14px;text-align: right;" value="<?php echo $amount;?>"></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><input type="hidden" value ="<?php echo $id;?>" name="hidden"><input type="submit" name="update" class="bicon icon" style="height: 26px;margin: 0 0 0 13px;"></td>
								<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='office_management.php?office_management_delete=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
							</tr>
						</form>


						<?php
						$total += $amount;
						$i++;
					}

					
				?>
				<tr>
					<td style="border: 1px solid rgb(165, 165, 165); text-align: right; padding-right: 10px;height: 43px; font-weight: bold;" colspan="4">Total</td>
					<td style="border: 1px solid rgb(165, 165, 165); text-align: right; padding-right: 10px;height: 43px; font-weight: bold;"><?php echo $total;?></td>
					<td style="border: 1px solid #A5A5A5;text-align: center;"></td>
					<td style="border: 1px solid #A5A5A5;text-align: center;"></td>
				</tr>

			</table>
		</div>
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script>
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
		</script>
	</body>
<html>

<?php
	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$detail = $_POST['detail'];
		$amount = $_POST['amount'];
		$date = $_POST['date'];


		$csql="INSERT INTO `office_management` (`id`, `name`, `detail`, `amount`, `date`) VALUES (NULL, '$name', '$detail', '$amount', '$date')";

		$csql_run = mysqli_query($con, $csql);


		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('office_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('office_management.php','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['office_management_delete'])){
		$cls_id=$_GET['office_management_delete'];

		$not_sql="DELETE FROM `office_management` WHERE `office_management`.`id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('office_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('office_management.php','_self')</script>";
		}
	}
?>

<?php
	if(isset($_POST['update'])){

		$hidden=$_POST['hidden'];
		$name = $_POST['tname'];
		$detail = $_POST['tdetail'];
		$amount = $_POST['tamount'];
		$date = $_POST['tdate'];

		$not_sql="UPDATE `office_management` SET `name` = '$name', `detail` = '$detail', `amount` = '$amount', `date` = '$date' WHERE `office_management`.`id` = '$hidden'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('office_management.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('office_management.php','_self')</script>";
		}
	}

?>