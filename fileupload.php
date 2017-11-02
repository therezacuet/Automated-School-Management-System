<?php 
session_start();
 $pagetitle = 'Upload Notice'; 
$extra='<link type="text/css" rel="stylesheet" href="css/uploadfile.css"/>

';

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
		<div class="file_upload fix">
				<h1 class="notice_up">Upload File</h1>
				<div class ="mpo_main_filed">
					<form method="POST" enctype="multipart/form-data">
						<select class ="notice_select" name="notice_type" required>
							<option>Select a Notice type</option>
							<option value="1">Notice Board</option>
							<option value="2">Syllabus</option>
							<option value="3">Results</option>
							<option value="4">Class Routines</option>
							<option value="5">Exam Routine</option>
						</select>
						<input type="text" class ="notice_select" name="notice_title" placeholder="Notice Title" required>
						<input type="file" class ="notice_file_select" name="notice_file" style="margin-left:10px" required>
						<input type="submit" name="notice_submit" value="" class="up_submit">
					</form>
				</div>
		</div>

		<div class="admission_aplication">
			<div class="admission_aplication_body">
				<div class="admisstion_search">
					<div class="admisstion_search_by">
						<form method="POST" enctype="multipart/form-data">
							<select class="admisstion_search_by_cat" name="admisstion_search_by_cat">

								<option>Select a Notice type</option>
								<option value="1">Notice Board</option>
								<option value="2">Syllabus</option>
								<option value="3">Results</option>
								<option value="4">Class Routines</option>
								<option value="5">Exam Routine</option>
								<option value="6">Academic Celendar</option>
							</select>
							<input type="text" name="admisstion_search_like" class="admisstion_search_name">
							<!-- <input type="submit" id="search" name="submit" alt="search" value="">
							<div > -->
								<input type="submit" name="admisstion_search_submit" class="admisstion_search_submit">
						
							
						</form>
					</div>
				</div>
				<table class="admission_aplication_table" border="1px">
					<tr>
						<th class="field1">No.</th>
						<th class="field2">Name</th>
						<th class="field3">Type</th>
						<th class="field4">Date</th>
						<th class="field5">Delete</th>
						
					</tr>
					<?php
					$i=0;

					if (isset($_POST['admisstion_search_submit'])) {
						$search_by = $_POST['admisstion_search_by_cat'];
						$search_word = $_POST['admisstion_search_like'];

						$sql = "SELECT * FROM notice WHERE `notice_cat` = $search_by AND `notice_name`LIKE '%$search_word%'";
						$sql_run = mysqli_query($con, $sql);


						while ($sql_get=mysqli_fetch_array($sql_run)) {
						$notice_id=$sql_get['notice_id'];
						$notice_cat=$sql_get['notice_cat'];



						if($notice_cat==1){
							$notice_cat="Notice Board";
						}else if($notice_cat==2){
							$notice_cat="Syllabus";
						}else if($notice_cat==3){
							$notice_cat="Results";
						}else if($notice_cat==4){
							$notice_cat="Class Routines";
						}else if($notice_cat==5){
							$notice_cat="Exam Routine";
						}else if($notice_cat==6){
							$notice_cat="Academic Celendar";
						}




						$notice_name=$sql_get['notice_name'];
						$notice_date=$sql_get['notice_date'];
						$notice_path=$sql_get['notice_path'];
						$i=$i+1;
						?>
						<form method="POST" enctype="multipart/form-data">
							<tr>
								<input type="hidden" name="id" value="<?php echo $admission_id;?>">
								<td><?php echo $i;?></td>
								<td><?php echo $notice_name;?></td>
								<td><?php echo $notice_cat;?></td>
								<td><?php echo $notice_date;?></td>
								<td><a href='fileupload.php?notice_delete=<?php echo $notice_id;?>'><img class="delete_icon" src="image/delete.png"></a></td>
							</tr>
						</form>

						<?php
					}
				}else{
					$sql="SELECT * FROM `notice`";
												$sql_run = mysqli_query($con, $sql);

						
						while ($sql_get=mysqli_fetch_array($sql_run)) {
						$notice_id=$sql_get['notice_id'];
						$notice_cat=$sql_get['notice_cat'];



						if($notice_cat==1){
							$notice_cat="Notice Board";
						}else if($notice_cat==2){
							$notice_cat="Syllabus";
						}else if($notice_cat==3){
							$notice_cat="Results";
						}else if($notice_cat==4){
							$notice_cat="Class Routines";
						}else if($notice_cat==5){
							$notice_cat="Exam Routine";
						}else if($notice_cat==6){
							$notice_cat="Academic Celendar";
						}




						$notice_name=$sql_get['notice_name'];
						$notice_date=$sql_get['notice_date'];
						$notice_path=$sql_get['notice_path'];
						$i=$i+1;
						?>
						<form method="POST" enctype="multipart/form-data">
							<tr>
								<input type="hidden" name="id" value="<?php echo $admission_id;?>">
								<td><?php echo $i;?></td>
								<td><?php echo $notice_name;?></td>
								<td><?php echo $notice_cat;?></td>
								<td><?php echo $notice_date;?></td>
								<td><a href='fileupload.php?notice_delete=<?php echo $notice_id;?>'><img class="delete_icon" src="image/delete.png"></a></td>
							</tr>
						</form>

						<?php
					}

				}
						
				?>
				</table>
			</div>
		</div>




	</body>
</html>

<?php
if (isset($_POST['notice_submit'])) {
		$notice_cat = $_POST['notice_type'];
		$notice_name = $_POST['notice_title'];
		$notice_date = date("d-m-Y");
		

		$notice_file = $_FILES['notice_file']['name'];
		$notice_file_tmp = $_FILES['notice_file']['tmp_name'];
		$exts = findexts ($notice_file) ;  
		$time = date("Ymd").time() ;  
		$time2 = $time.".";  
		$notice_target = "notice/";
		$notice_target = $notice_target . $time2.$exts;
		
		

		$notice_sql = "INSERT INTO `notice` (`notice_id`, `notice_cat`, `notice_name`, `notice_date`, `notice_path`) VALUES (NULL, '$notice_cat', '$notice_name', '$notice_date', '$notice_target')";

		$run_notice_sql = mysqli_query($con, $notice_sql);
		if($run_notice_sql&&move_uploaded_file($notice_file_tmp, $notice_target)){
			echo "<script>alert('Successful! File has been uploaded.')</script>";
			echo "<script>window.open('fileupload.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fileupload.php','_self')</script>";
		}
	}


?>


<?php
	if(isset($_GET['notice_delete'])){
		$not_id=$_GET['notice_delete'];

		$not_sql="SELECT * FROM `notice` WHERE `notice`.`notice_id` = '$not_id'";
		$run_not_sql = mysqli_query($con, $not_sql);
		$row_not=mysqli_fetch_array($run_not_sql);
		$get_not_path = $row_not['notice_path'];

		
		if(unlink($get_not_path)){
			$not_del_sql = "DELETE FROM `notice` WHERE `notice`.`notice_id` = '$not_id'";
			$not_del_sql_run = mysqli_query($con, $not_del_sql);
			echo "<script>window.open('fileupload.php','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
			echo "<script>window.open('fileupload.php','_self')</script>";
		}
	}
?>