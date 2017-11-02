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
?>

<html>
	<?php include("head.php");?>
	<body>
		<?PHP
			include('print_header.php');
		if (isset($_GET['app_id'])) {
			$app_id = $_GET['app_id'];
		}

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

		<form class="no-print">
            <input type="button"  class="print button" value="Print" onClick="window.print()">
        </form>

		</div>
		<script src="js/jquery-1.10.2.js"></script>
		<script>
			$(".print").click();
		</script>
	</body>
</html>