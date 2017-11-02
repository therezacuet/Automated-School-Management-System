<?php 
session_start();
 $pagetitle = 'Subject'; 
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
					<table style="width: 66%; margin: 100px auto;">
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Class</td>
							<td>
								<select type="text" name="field3" class="ins_input_xsm" style="width: 94%;" required>
										<option>Choose a Class</option>
										<?php getClass();?>
								</select>
							</td>
							<td style="width: 20%;">

								<input type="submit" name="submit"  class="submit_xsm" Value="Go" style="left: 0;top :3px">

							</td>
						</tr>
					</table>
			</form>

		</div>
	</body>
<html>
<?php
	if (isset($_POST['submit'])) {
		$field3 = $_POST['field3'];
			echo "<script>window.open('subject.php?class=".$field3."','_self')</script>";
	}
?>