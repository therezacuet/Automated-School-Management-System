<?php
	//$con = mysqli_connect("localhost","ricollegeedu_institute","11rfhkh5ght674","ricollegeedu_institute");
	$con = mysqli_connect("localhost","root","","institute");
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
?>