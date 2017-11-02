<?php 
session_start();
$pagetitle = 'Academic Calendar'; 
$extra='
<link rel="stylesheet" href="css/jquery.e-calendar.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery.e-calendar.js"></script>

';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

			<div id="calendar"></div>
	<script>
		$('#calendar').eCalendar({

		 weekDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        textArrows: {previous: '<', next: '>'},
        eventTitle: 'Events',
        url: '',
        events: [
            <?php getEvent();?>
        ]});

	</script>	
	</body>
<html>