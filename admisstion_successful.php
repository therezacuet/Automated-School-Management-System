<?php 
session_start();
 $pagetitle = 'A institute name'; 
$extra='<link href="css/admission.css" rel="stylesheet" type="text/css"/>';
	require 'core.inc.php';
	require 'conn.inc.php';
	include("functions/functions.php");
	if(isset($_GET['fromid'])){
		$reference_number = $_GET['fromid'];
	}
?>

<html>
	<?php include("head.php");?>
	<body>
		<?php include("header.php");?>

		<div class="admission_successful">
			<div class="admission_successful_header">
				আপনার আবেদনটি সফল ভাবে Registry করা হয়েছে।
			</div>
			<div class="admission_successful_body">
				<div class="admission_successful_content" style="font-family: 'Hind Siliguri',sans-serif;text-align: justify;">
					<b>ধাপ ২ঃ </b>আপনার আবেদনটি সফল ভাবে Registry হওয়ার পর আপনাকে একটি Reference Number দেয়া হবে। Reference Number টি লিখে রাখবেন। এই Reference Number দিয়ে আপনাকে পরবর্তীতে Admit Card সংগ্রহ করতে হবে।<br><br>
					আপনার Reference Number টি হলঃ <?php echo "<b>".$reference_number."</b>";?><br><br>
					<b>ধাপ ৩ঃ </b>প্রাপ্ত Reference Number এর সাহায্যে স্কুলের নির্ধারিত bKash নাম্বারে ফর্ম এর জন্যে নির্ধারিত ফি জমা করতে হবে।<br><br>
					<img src="image/bkash.png" class="bkash"><br><br>
					<b>ধাপ ৪ঃ </b>bKash করার পর, bKash থেকে একটি ক্ষুদেবার্তার মাধ্যমে আবেদন ফর্ম পূরণকারী একটি Transaction Number দেওয়া হবে।<br><br>
					<b>ধাপ ৫ঃ </b>Admit Card তৈরী হওয়ার পর আপনার mobile number -এ একটি confirmation message যাবে। অতপর এই <a href="admitcard.php">Link</a> এ গিয়ে প্রাপ্ত Reference Number এবং bKash থেকে প্রাপ্ত Transaction Number এর মাধ্যমে Admit Card টি ডাউনলোড করে নিরে পারবে।
				</div>	
			</div>
		</div>
	</body>
<html>