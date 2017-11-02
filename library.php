<?php 
session_start();
 $pagetitle = 'Library'; 
$extra='<link type="text/css" rel="stylesheet" href="css/adminoption.css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
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
						<th style="border: 1px solid #A5A5A5;text-align: center;width:5%">Book ID</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;width: 30%;">Book Name</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;">Class</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;">Subject</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;">Group</th>
						<th style="border: 1px solid #A5A5A5;text-align: center;height: 41px;">Stats</th>
					</tr>
					<?php
						if (isset($_POST['search_button'])) {
							$like = $_POST['search'];
							$sql="SELECT * FROM `library` WHERE  `id` LIKE '%$like%' OR `book_name` LIKE '%$like%' OR `subject` LIKE '%$like%' OR `class` LIKE '%$like%' OR `group_class` LIKE '%$like%'";
						}else{

							$sql="SELECT * FROM `library`";
						}
						$sql_run = mysqli_query($con, $sql);
						while ($sql_get = mysqli_fetch_array($sql_run)) {
							$id =$sql_get['id'];
							$book_name =$sql_get['book_name'];
							$subject =$sql_get['subject'];
							$class =$sql_get['class'];
							$group_class =$sql_get['group_class'];
							$quentity =$sql_get['quentity'];


							?>
						<tr style="border: 1px solid #A5A5A5;text-align: center;">
							<td style="border: 1px solid #A5A5A5;text-align: center;height:43px"><?php echo sprintf("%05d",$id);?></td>
							<td style="border: 1px solid #A5A5A5;text-align: left;padding-left:5px;"><?php echo $book_name;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $subject;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $class;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;"><?php echo $group_class;?></td>
							<td style="border: 1px solid #A5A5A5;text-align: center;width: 14%;"><?php 
								if ($quentity < 1) {
									?>
										<h4 style="background: red none repeat scroll 0% 0%; width: 120px; padding: 5px 10px; margin: 0px auto; color: white; border-radius: 4px ! important; font-weight: bold;">Out of stock</h4>
									<?php
								}else{
									?>
										<h4 style="background: green none repeat scroll 0% 0%; width: 100px; padding: 5px 10px; margin: 0px auto; color: white; border-radius: 4px ! important; font-weight: bold;">Avaiable</h4>
									<?php
								}


							?></td>
							
						</tr>

							<?php
						}
					?>
				</table>
		</div>
	</body>
<html>