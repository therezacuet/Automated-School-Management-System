<?php 
session_start();
 $pagetitle = 'Add/Delete Group'; 
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
				<div class="ins_table_sm">
					<table>
						<tr>
							<td class="ins_td_sm" style="width: 108px;">Add Group:</td>
							<td>
								<input  type="text" name="admission_date" class="ins_input_sm" placeholder="Group name" required>
							</td>
						</tr>
					</table>


						<input type="submit" name="head_info_submit"  class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Group Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `group_type` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$group_id = $ccsql_get['group_id'];
						$group_name = $ccsql_get['group_name'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $group_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='group_type.php?group_delete=<?php echo $group_id;?>'><img class="delete_icon" src="image/delete.png"></a></td>
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
		
		$group_name = $_POST['admission_date'];

		$csql="INSERT INTO `group_type` (`group_id`, `group_name`) VALUES (NULL, '$group_name')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('group_type.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('group_type.php','_self')</script>";
		}
	}
?>


<?php
	if(isset($_GET['group_delete'])){
		$cls_id=$_GET['group_delete'];

		$not_sql="DELETE FROM `group_type` WHERE `group_type`.`group_id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('group_type.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('group_type.php','_self')</script>";
		}
	}
?>