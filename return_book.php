<?php 
session_start();
 $pagetitle = 'Library | Book Borrow'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/calender.css">
';
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

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>
		<div style="width: 1100px; margin: 1px auto 0px;">
			<input action="action" type="button" value="Back" onclick="history.go(-1);"  style="background: green none repeat scroll 0% 0%; border: medium none; padding: 5px 33px; color: white; font-size: 17px; border-radius: 4px;" />
		</div>
		<div class="admin_area">
			<h2 style="position: absolute; font-size: 22px; font-weight: bold;">Book Return</h2>
			<table style="width: 80%; margin: 100px auto;">
				<form method="post" enctype="multipart/form-data">
				<tr>
					<td style="width:20%;font-size:20px;font-weight:bold">Book ID</td>
					<td style="width:20%;font-size:20px;font-weight:bold">Borrower Type</td>
					<td style="width:20%;font-size:20px;font-weight:bold">Borrower ID</td>
					<td style="width:20%;font-size:20px;font-weight:bold">Return Date</td>
					<td style="width:20%;font-size:20px;font-weight:bold"></td>
				</tr>
				<tr>
					<td><input  type="text" name="book_id" class="ins_input_sm"  style="width: 94%; margin: 0px;"  required></td>
					<td>
						<select  type="text" name="borrower_type" class="ins_input_sm"  style="width: 94%; margin: 0px;"  required>
							<option value="student">Student</option>
							<option value="teacher">Teacher</option>
						</select>
					</td>
					<td><input  type="text" name="borrower_id" class="ins_input_sm"  style="width: 94%; margin: 0px;"  required></td>
					<td><input  type="text" name="return_date" class="ins_input_sm" id="datepicker" style="width: 94%; margin: 0px;"  value="<?php echo date('m').'/'.date('d').'/'.date('Y');?>" required></td>
					<td><input  type="submit" name="submit" class="submit_sm"  style="width: 71%; margin: 0px; left: 0px; top: 0px;"  value="Submit" required></td>
				</tr>
				</form>
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
		$book_id = $_POST['book_id'];
		$borrower_type = $_POST['borrower_type'];
		$borrower_id = $_POST['borrower_id'];
		$return_date = $_POST['return_date'];

		$ccsql="SELECT * FROM `library` WHERE `id`='$book_id'";
		$ccsql_run = mysqli_query($con, $ccsql);
		$ccsql_get=mysqli_fetch_array($ccsql_run);
		$quentity = $ccsql_get['quentity'];
		$ccsql="SELECT * FROM `borrow` WHERE `book_id`='$book_id' AND `borrower_type` = '$borrower_type' AND `borrower_id` = '$borrower_id'";
		$ccsql_run = mysqli_query($con, $ccsql);
		$run_row=mysqli_num_rows($ccsql_run);

		$sql_get=mysqli_fetch_array($ccsql_run);
			$id = $sql_get['id'];

		if ($run_row == 1) {
			$new_quentity = $quentity + 1;

			$sql = "UPDATE `library` SET `quentity` = '$new_quentity' WHERE `library`.`id` = '$book_id'";
			$sql_run = mysqli_query($con, $sql);

			$sql="UPDATE `borrow` SET `return_date` = '$return_date' WHERE `borrow`.`id` = '$id'";
			$sql_run = mysqli_query($con, $sql);
			if ($sql_run) {
				echo "<script>alert('Successful!')</script>";
				echo "<script>window.open('".$current_file."','_self')</script>";
			}else{
				echo "<script>alert('Failed! Try again leter.')</script>";
			}
		}else{
			echo "<script>alert('Book ID and Borrower ID does not match.','_self')</script>";
		}

	}
?>