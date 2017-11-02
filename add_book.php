<?php 
session_start();
 $pagetitle = 'Library | Add Book'; 
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
		if (!loggedin()  || empty($_SESSION['teacher_id']) || $_SESSION['teacher_id'] != $teid) {
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
				<div class="ins_table" style="width: 85%; margin: 0px 0px 0px 3%;">
					<table>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Add Book:</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Class</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Subject</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Group</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Quentity</td>
						</tr>
						<tr>
							<td style="width: 20%;">
								<input  type="text" name="book_name" class="ins_input_sm" style="width: 94%; margin: 0px;" placeholder="Book name" required>
							</td>
							<td>
								<select type="text" name="class" class="ins_input_xsm" style="width: 94%; margin: 0px;" required>
										<option>Choose a Class</option>
										<?php getClass();?>
										<option>Other</option>
								</select>
							</td>
							<td style="width: 20%;">
								<input  type="text" name="subject" class="ins_input_sm"  style="width: 94%; margin: 0px;" required>
							</td>
							<td>
								<select type="text" name="group_class" class="ins_input_xsm" style="width: 94%; margin: 0px;" required>
										<option>Choose a Group</option>
										<option>General</option>
										<option>Science</option>
										<option>Arts</option>
										<option>Commerce</option>
										<option>Other</option>
								</select>
							</td>
							<td style="width: 20%;">
								<input  type="text" name="quentity" class="ins_input_sm"  style="width: 94%; margin: 0px;"  required>
							</td>
						</tr>
					</table>


						<input type="submit" name="head_info_submit" style="left: 101%; top: -37px; width: 100px;" class="submit_sm" Value="Add">
				</div>
			</form>

			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;width: 96%;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;width: 5%;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 50%;">Book Name</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Class</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Subject</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Group</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 5%;">Quantity</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;width: 5%;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `library`  ORDER BY `library`.`id` DESC";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$id = $ccsql_get['id'];
						$book_name = $ccsql_get['book_name'];
						$subject = $ccsql_get['subject'];
						$class = $ccsql_get['class'];
						$group_class = $ccsql_get['group_class'];
						$quentity = $ccsql_get['quentity'];

						?>





						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo sprintf("%05d",$id);?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px;"><?php echo $book_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $class;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $subject;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $group_class;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: right;padding-right:5px;"><?php echo $quentity;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='<?php echo $current_file?>?delete_book=<?php echo $id;?>'><img class="icon" src="image/delete.png"></a></td>
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
		
		$book_name = $_POST['book_name'];
		$class = $_POST['class'];
		$subject = $_POST['subject'];
		$group_class = $_POST['group_class'];
		$quentity = $_POST['quentity'];

		$csql="INSERT INTO `library` (`id`, `book_name`, `subject`, `class`, `group_class`, `quentity`) VALUES (NULL, '$book_name', '$subject', '$class', '$group_class', '$quentity')";

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
	if(isset($_GET['delete_book'])){
		$cls_id=$_GET['delete_book'];

		$not_sql="DELETE FROM `library` WHERE `library`.`id` = '$cls_id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		
		if($run_not_sql){
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>