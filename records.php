<?php  
session_start();
$pagetitle = 'Library | Records'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	$sql = "SELECT * FROM `user_manage` WHERE `user_manage`.`name` = 'lib'";
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
<style type="text/css">
 .left{
 	float: left;
 }
.save{

	border: 2px solid #00A9E0;
	color: #00A9E0;
	font-size: 18px;
	padding: 9px;
	text-align: right;
	width: 15%;
	border-radius: 4px;
	background-color: white;
	transition: 0.5s ease;
	background-repeat: no-repeat;

}
.save:hover{
	background-color: #E6EFF2
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
			<form  method="post" enctype="multipart/form-data">
					<table style="float: right;">
						<tr>
							<td><input type="text" name="search" class="ins_input_sm"></td>
							<td><input type="submit" name="search_button" value="Search" class="save" style="width: 124px; text-align: center; padding: 4px; margin: 0px 0px 0px 17px;"></td>
						</tr>
					</table>
				</form>
				<table style="width: 94%; margin: 54px auto 0px;">
					<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
						<th style="border: 1px solid #A5A5A5;text-align: center;">Book ID</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;width: 30%;">Book Name</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;">Borrower ID</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;">Borrower Name</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;width: 5%;">Borrower Type</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 5%;">Borrow Date</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 5%;">Return Date</th>
					</tr>
					<?php
						if (isset($_POST['search_button'])) {
							$like = $_POST['search'];
							$sql="SELECT * FROM `borrow` WHERE  (`book_id` LIKE '%$like%' OR `borrower_type` LIKE '%$like%' OR `borrower_id` LIKE '%$like%' OR `date_borrow` LIKE '%$like%' OR `return_date` LIKE '%$like%') ORDER BY `borrow`.`id` DESC";
						}else{

							$sql="SELECT * FROM `borrow`  ORDER BY `borrow`.`id` DESC";
						}
						$sql_run = mysqli_query($con, $sql);
						while ($sql_get = mysqli_fetch_array($sql_run)) {
							$book_id =$sql_get['book_id'];
							$borrower_type =$sql_get['borrower_type'];
							$borrower_id =$sql_get['borrower_id'];
							$date_borrow =$sql_get['date_borrow'];
							$return_date =$sql_get['return_date'];


							$sql = "SELECT * FROM `library` WHERE `id` = '$book_id'";
							$sql_run = mysqli_query($con, $sql);
							$sql_get = mysqli_fetch_array($sql_run);
								$book_name = $sql_get['book_name'];

							if ($borrower_type == 'student') {
								$sql = "SELECT * FROM `student` WHERE `fld2` = '$borrower_id'";
								$sql_run = mysqli_query($con, $sql);
								$sql_get = mysqli_fetch_array($sql_run);
									$borrower_name = $sql_get['fld1'];
									$type = "Student";
							}else{
								$sql = "SELECT * FROM `teacher` WHERE `tld2` = '$borrower_id'";
								$sql_run = mysqli_query($con, $sql);
								$sql_get = mysqli_fetch_array($sql_run);
									$borrower_name = $sql_get['tld1'];
									$type = "Teacher";
							}


							?>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo $book_id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px;"><?php echo $book_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $borrower_id;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $borrower_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $type;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: right;padding-right:5px;"><?php echo $date_borrow;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: right;padding-right:5px;"><?php echo $return_date;?></td>
							
						</tr>

							<?php
						}
					?>
				</table>
		</div>
	</body>
<html>