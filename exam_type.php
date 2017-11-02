<?php 
session_start();
 $pagetitle = 'Add/Delete Exam type'; 
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
				<div>
					<table style="margin: 0px 0px 0px 112px;">
						<tr>
							<td class="ins_td_sm" style="width: 124px;">Add Exam:</td>
							<td>
								<input  type="text" name="admission_date" class="ins_input_sm" style="width: 173px;" placeholder="Exam name" required>
							</td>
							<td class="ins_td_sm" style="width: 29%;">% for Final Result:</td>
							<td>
								<input  type="text" name="per" class="ins_input_sm" id = "txtboxToFilter" style="width: 173px;" placeholder="Only numbers [0-9]" required>
								<script src="js/jquery.min.js"></script>
								<script type="text/javascript">
									$(document).ready(function() {
									    $("#txtboxToFilter").keydown(function (e) {
									        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
									            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
									            (e.keyCode >= 35 && e.keyCode <= 40)) {
									                 return;
									        }
									        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
									            e.preventDefault();
									        }
									    });
									});
								</script>
							</td>
						</tr>
					</table>


						<input type="submit" name="head_info_submit"  class="submit_sm" Value="Add" style="left: 78%; top: -47px;">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 52%;">Exam Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">% for Final Result</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `exam_type` ";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$exam_id = $ccsql_get['exam_id'];
						$exam_type = $ccsql_get['exam_type'];
						$per = $ccsql_get['per'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $exam_type;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $per;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='exam_type.php?exam_delete=<?php echo $exam_id;?>'><img class="delete_icon" src="image/delete.png"></a></td>
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
		
		$exam_type = $_POST['admission_date'];
		$per = $_POST['per'];

		$csql="INSERT INTO `exam_type` (`exam_id`, `exam_type`, `per`) VALUES (NULL, '$exam_type', '$per')";

		$csql_run = mysqli_query($con, $csql);
		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('exam_type.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['exam_delete'])){
		$id=$_GET['exam_delete'];

		$not_sql="DELETE FROM `exam_type` WHERE `exam_type`.`exam_id` = '$id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('exam_type.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>