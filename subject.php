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
	if (isset($_GET['class']) && !empty($_GET['class'])) {
		$cls = $_GET['class'];
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
			<h2 style="font-size: 22px; font-weight: bold; margin: 0px 0px 22px;">Add Subject to Class <?php echo $cls;?></h2>
			<form method="post" enctype="multipart/form-data">
				<div class="ins_table" style="width: 85%;">
					<table>
						<tr>
							<td style="font-size:18px;color:#000; font-weight:bold">Subject name</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Pair/Unpair</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Type</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Full Mark</td>
							<td style="font-size:18px;color:#000; font-weight:bold">Group</td>
							
						</tr>

						<tr>
							<td>
								<input  type="text" name="field1" class="ins_input_xsm" placeholder="Subject name" required>

							</td>
							<td>
								<select type="text" name="field2" class="ins_input_xsm" required>
										<option>Choose pair/unpair</option>
										<option value="1">Pair</option>
										<option value="0">Unpair</option>
								</select>
							</td>
							<td>
								<select type="text" name="type" class="ins_input_xsm" required>
										<option>Choose type</option>
										<option value="1">Compulsory</option>
										<option value="0">Main/Optional</option>
								</select>
							</td>
							<td>
								<script src="js/jquery.min.js"></script>
								<div id="staticParent">
									<input  type="text" name="field3" id="txtboxToFilter" class="ins_input_xsm" placeholder="Only numbers[0-9]" required>
								</div>
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
							<td>
								<select type="text" name="field4" class="ins_input_xsm" required>
										<option>Choose a Group</option>
										<option>General</option>
										<option>Science</option>
										<option>Arts</option>
										<option>Commerce</option>
								</select>
							</td>
						</tr>
					</table>
						<input type="hidden" name="cls" value="<?php echo $cls;?>">

						<input type="submit" name="submit"  class="submit_xsm" Value="Add" style="left: 89%;">
				</div>
			</form>


			<table class="cls_xtab" style="border: 1px solid #A5A5A5;text-align: center;">
				<tr style="border: 1px solid #A5A5A5;text-align: center;background: #EBEBEB;">
					<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">No.</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Subject</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Pair/Unpair</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Type</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Full Marks</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Group</th>
					<th style="border: 1px solid #A5A5A5;text-align: center;">Delete</th>
				</tr>
				<?php
					$ccsql="SELECT * FROM `subject` WHERE `class` = '$cls'";
					$ccsql_run = mysqli_query($con, $ccsql);

					$i=1;
					while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
						$sub_id = $ccsql_get['sub_id'];
						$sub_name = $ccsql_get['sub_name'];
						$pair = $ccsql_get['pair'];
						$type = $ccsql_get['type'];
						$class = $ccsql_get['class'];
						$class_group = $ccsql_get['class_group'];
						$fmark = $ccsql_get['fmark'];

						?>

						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height: 41px;"><?php echo $i;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $sub_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<?php 
								if ($pair==1) {
									echo "Pair Subject";
								}else{
									echo "Unpair Subject";
								}

								?>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;">
								<?php 
								if ($type==1) {
									echo "Compulsory";
								}else{
									echo "Main/Optional";
								}

								?>
							</td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $fmark;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $class_group;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><a href='subject.php?sub_delete=<?php echo $sub_id;?>'><img class="icon" src="image/delete.png"></a></td>
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
	if (isset($_POST['submit'])) {
		$cls = $_POST['cls'];
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$fmark = $_POST['field3'];
		$field4 = $_POST['field4'];
		$type = $_POST['type'];

		$csql="INSERT INTO `subject` (`sub_id`, `sub_name`, `pair`, `type`, `class`, `class_group`, `fmark`) VALUES (NULL, '$field1', '$field2', '$type', '$cls', '$field4', '$fmark')";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Successful!')</script>";
			echo "<script>window.open('subject.php?class=".$cls."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>


<?php
	if(isset($_GET['sub_delete'])){
		$sub_id=$_GET['sub_delete'];

		$not_sql="DELETE FROM `subject` WHERE `subject`.`sub_id` = '$sub_id'";
		$run_not_sql = mysqli_query($con, $not_sql);

		
		if($run_not_sql){
			echo "<script>window.open('subject.php?class=".$cls."','_self')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>