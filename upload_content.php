<?php  
session_start();

$pagetitle = 'Upload Content'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if (!loggedin() || empty($_SESSION['teacher_id'])) {
		header("Location: 404.html"); 
		exit();
	}

?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					
					<?php getTM();?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2" style="height: 650px;">
						<div class="student" style="width: 21%;">Upload Content</div>

							<table style="width: 80%; margin: 30px auto 0px;">
						<form method="post" enctype="multipart/form-data">

								<tr>
									<td class="ins_td_sm" style="width: 25%;">Title:</td>
									<td style="width: 75%;">
										<input  type="text" name="title" class="ins_input_sm" style="width: 100%;" required>
									</td>
								</tr>
								<tr>

									<td class="ins_td_sm" style="width: 25%;">Description:</td>
									<td style="width: 75%;">
										<textarea  type="text" name="description" class="ins_input_sm" style="width: 100%;height: 275px;"></textarea>
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 25%;">File:</td>
									<td style="width: 75%;">
										<input  type="file" name="file" >
									</td>
								</tr>
								<tr>
									<td class="ins_td_sm" style="width: 25%;"></td>
									<td style="width: 75%;">
										<input type="submit" name="submit" style="left:0%; top: 0px;margin: 22px 0px 0px;" class="submit_sm" Value="Upload">
									</td>
								</tr>

						</form>

							</table>
					</div>

				</div>
			</div>
		</div>
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</body>
<html>

<?php

	if (isset($_POST['submit'])) {
		$title = mysqli_real_escape_string($con, $_POST['title']);
		$description = mysqli_real_escape_string($con, $_POST['description']);


		if (empty($_FILES['file']['name'])) {
			$file = "empty";
		}else{
			$file_name = $_FILES['file']['name'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$ext = findexts ($file_name) ;  
			$ran = date("Ymd").time() ;  
			$ran2 = $ran.".";  
			$target = "content/";
			$target = $target . $ran2.$ext;
			$file=$target;
			move_uploaded_file($file_tmp, $target);
		}

		$t_name = getfield('tld1');

		$sql = "INSERT INTO `content` (`id`, `t_name`, `title`, `das`, `file`) VALUES (NULL, '$t_name', '$title', '$description', '$file')";
		$sql_run = mysqli_query($con, $sql);

		if ($sql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('".$current_file."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}

?>
