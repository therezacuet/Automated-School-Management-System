<?php 
session_start();

$pagetitle = 'Application'; 
$extra='<link href="css/application.css" rel="stylesheet" type="text/css"/>
<link href="css/application1.css" rel="stylesheet" type="text/css"/>
<link href="font/stylesheet.css" rel="stylesheet" type="text/css"/>
';
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
		<?PHP
			include('print_header.php');
		if (isset($_GET['app_id'])) {
			$app_id = $_GET['app_id'];
			$stu_id = $_GET['stu_id'];
			$app_type = $_GET['app_type'];
		}

		$get_data = "select * from student where `fld2`='$stu_id'";
		$run_data = mysqli_query($con, $get_data);
		$run_data_array = mysqli_fetch_array($run_data);
		$mob=$run_data_array['fld7'];

	$sql = "SELECT * FROM `application` WHERE `app_id` = '$app_id'";
	$sql_get = mysqli_query($con, $sql);
	$sql_run = mysqli_fetch_array($sql_get);
	$body = $sql_run['app_body'];
		?>

		<div class="body">
			<?php echo $body;?>

			<div class="signature_of_headmaster">
				<h2>Signature of Headmaster</h2>
				<h2>Date:</h2>
			</div>

		<form class="no-print" method="POST">
            <input type="submit" name="print" class="print button" value="Print" onClick="window.print()">
            <?php
            	if ($app_type == "T") {
            		?>
        				<a href="tcfillfield.php?stu=<?php echo $stu_id;?>" class="accept button  no-print" target="_blank">Accept</a>
            		<?php
            	}else if ($app_type == "O") {
            		?>
        				<input type="submit"  class="accept button no-print" style="padding: 0px;" value="Accept" name="accept">
        			<?php
            	}
            ?>
        	<input type="submit"  class="reject button no-print" value="Reject" name="reject">
        </form>

		</div>
	</body>
</html>
<?php
	if (isset($_POST['reject'])) {
		$csql="UPDATE `application` SET `app_stats` = '0' WHERE `application`.`app_id` = '$app_id'";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Application is successfully rejected. Now please print out a copy.')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}

	if (isset($_POST['accept'])) {
		$csql="UPDATE `application` SET `app_stats` = '1' WHERE `application`.`app_id` = '$app_id'";

		$csql_run = mysqli_query($con, $csql);

		if ($csql_run) {
			echo "<script>alert('Application is successfully accpted. Now please print out a copy.')</script>";
		}else{
			echo "<script>alert('Failed! Try again leter.')</script>";
		}
	}
?>