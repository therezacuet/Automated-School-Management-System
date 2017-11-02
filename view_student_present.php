<?php  
session_start();

$pagetitle = 'Attendence'; 
$extra='<link href="css/student_profile.css" rel="stylesheet" type="text/css"/>
';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");

?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="student_profile_sidemenu">
			<div class="student_profile_width">
				<div class="student_profile_sidemenu_content">
					
					<?php getSM();?>
				</div>
				<div class="chagepass_body">
					<div class="chagepass_body2">
						<div class="student">Attendence</div>
					</div>

				</div>
			</div>
		</div>
	</body>
<html>