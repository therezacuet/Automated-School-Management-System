<?php
//$con = mysqli_connect("localhost","ricollegeedu_institute","11rfhkh5ght674","ricollegeedu_institute");
$con = mysqli_connect("localhost","root","","institute");
	function findexts ($filename)  { 
		$filename = strtolower($filename) ; 
		$exts = split("[/\\.]", $filename) ; 
		$n = count($exts)-1; 
		$exts = $exts[$n]; 
		return $exts;  
	}   


function getSlider(){
	global $con;
	$get_slider = "select * from slider";
	$run_slider = mysqli_query($con, $get_slider);
	while($row_slider=mysqli_fetch_array($run_slider)){
		//$slider_id = $row_slider['slider_id'];
		$slider_file = $row_slider['slider_file'];
		$slider_img_text = $row_slider['slider_img_text'];
		echo "<li><img src='image/img/$slider_file' title='$slider_img_text'></li>";
	}
}



function getNotice1(){
	global $con;
	$getright = "SELECT * FROM `notice` WHERE `notice_cat` = '1' ORDER BY `notice`.`notice_id` DESC LIMIT 3 ";
	$getright_run = mysqli_query($con, $getright);
	while($getright_row = mysqli_fetch_array($getright_run)){
		$notice_name = $getright_row['notice_name'];
		$notice_date = $getright_row['notice_date'];
		$notice_path = $getright_row['notice_path'];
		echo "<a href='$notice_path' style='color: rgb(6, 49, 102);'><div class='right'>
						<div class='rname'>
							<h3>$notice_name</h3>
						</div>
						<div class='rdate'>
							Date: $notice_date
						</div>
						
					</div></a>";
	}
}


function getNotice2(){
	global $con;
	$getright = "SELECT * FROM `notice` WHERE `notice_cat` = '2' ORDER BY `notice`.`notice_id` DESC LIMIT 3 ";
	$getright_run = mysqli_query($con, $getright);
	while($getright_row = mysqli_fetch_array($getright_run)){
		$notice_name = $getright_row['notice_name'];
		$notice_date = $getright_row['notice_date'];
		$notice_path = $getright_row['notice_path'];
		echo "<a href='$notice_path' style='color: rgb(6, 49, 102);'><div class='right'>
						<div class='rname'>
							<h3>$notice_name</h3>
						</div>
						<div class='rdate'>
							Date: $notice_date
						</div>
						
					</div></a>";
	}
}

function getNotice3(){
	global $con;
	$getright = "SELECT * FROM `notice` WHERE `notice_cat` = '3' ORDER BY `notice`.`notice_id` DESC LIMIT 3 ";
	$getright_run = mysqli_query($con, $getright);
	while($getright_row = mysqli_fetch_array($getright_run)){
		$notice_name = $getright_row['notice_name'];
		$notice_date = $getright_row['notice_date'];
		$notice_path = $getright_row['notice_path'];
		echo "<a href='$notice_path' style='color: rgb(6, 49, 102);'><div class='right'>
						<div class='rname'>
							<h3>$notice_name</h3>
						</div>
						<div class='rdate'>
							Date: $notice_date
						</div>
						
					</div></a>";
	}
}


function getNotice4(){
	global $con;
	$getright = "SELECT * FROM `notice` WHERE `notice_cat` = '4' ORDER BY `notice`.`notice_id` DESC LIMIT 3 ";
	$getright_run = mysqli_query($con, $getright);
	while($getright_row = mysqli_fetch_array($getright_run)){
		$notice_name = $getright_row['notice_name'];
		$notice_date = $getright_row['notice_date'];
		$notice_path = $getright_row['notice_path'];
		echo "<a href='$notice_path' style='color: rgb(6, 49, 102);'><div class='right'>
						<div class='rname'>
							<h3>$notice_name</h3>
						</div>
						<div class='rdate'>
							Date: $notice_date
						</div>
						
					</div></a>";
	}
}


function getNotice5(){
	global $con;
	$getright = "SELECT * FROM `notice` WHERE `notice_cat` = '5' ORDER BY `notice`.`notice_id` DESC LIMIT 3 ";
	$getright_run = mysqli_query($con, $getright);
	while($getright_row = mysqli_fetch_array($getright_run)){
		$notice_name = $getright_row['notice_name'];
		$notice_date = $getright_row['notice_date'];
		$notice_path = $getright_row['notice_path'];
		echo "<a href='$notice_path' style='color: rgb(6, 49, 102);'><div class='right'>
						<div class='rname'>
							<h3>$notice_name</h3>
						</div>
						<div class='rdate'>
							Date: $notice_date
						</div>
						
					</div></a>";
	}
}

function getClass(){
	global $con;
	$ccsql="SELECT * FROM `class` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['class_name'];
			echo "<option>$class_name</option>";
	}
}


function getSMSGroup(){
	global $con;
	$ccsql="SELECT * FROM `sms_group` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$id = $ccsql_get['id'];
			$class_name = $ccsql_get['group_name'];
			echo "<option value=".$id.">$class_name</option>";
	}
}


function getClassN(){
	global $con;
	$ccsql="SELECT * FROM `class` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['class_name'];
			$numeric_value = $ccsql_get['numeric_value'];
			echo "<option value='".$numeric_value."'>$class_name</option>";
	}
}

function getClassDropDown(){
	global $con;
	$ccsql="SELECT * FROM `class` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['class_name'];
			$numeric_value = $ccsql_get['numeric_value'];
			echo "<li><a href='member_student.php?class=".$class_name."'>Class ".$class_name."</a>";
	}
}

function getShift(){
	global $con;
	$ccsql="SELECT * FROM `shift` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['shift_name'];
			echo "<option>$class_name</option>";
	}
}
function getSection(){
	global $con;
	$ccsql="SELECT * FROM `section` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['sec_name'];
			echo "<option>$class_name</option>";
	}
}

function getExamtype(){
	global $con;
	$ccsql="SELECT * FROM `exam_type` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['exam_type'];
			echo "<option>$class_name</option>";
	}
}
function getGroup(){
	global $con;
	$ccsql="SELECT * FROM `group_type` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['group_name'];
			echo "<option>$class_name</option>";
	}
}

function getAccount(){
	global $con;
	$ccsql="SELECT * FROM `account_info` ";
		$ccsql_run = mysqli_query($con, $ccsql);

		while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
			$class_name = $ccsql_get['ac_number'];
			echo "<option>$class_name</option>";
	}
}




function getGrade($mark){
	if($mark>=80){
		$grade = 'A+';
	}else if($mark<=79&&$mark>=70){
		$grade = 'A';
	}else if($mark<=69&&$mark>=60){
		$grade = 'A-';
	}else if($mark<=59&&$mark>=50){
		$grade = 'B';
	}else if($mark<=49&&$mark>=40){
		$grade = 'C';
	}else if($mark<=39&&$mark>=33){
		$grade = 'D';
	}else if($mark<=32&&$mark>=0){
		$grade = 'F';
	}

	return $grade;
}

function getGradePoint($grade){
	if($grade == 'A+'){
		$point = 5.00;
	}else if($grade == 'A'){
		$point = 4.00;
	}else if($grade == 'A-'){
		$point = 3.50;
	}else if($grade == 'B'){
		$point = 3.00;
	}else if($grade == 'C'){
		$point = 2.00;
	}else if($grade == 'D'){
		$point = 1.00;
	}else if($grade == 'F'){
		$point = 0.00;
	}

	return $point;
}
function getGradeToPoint($mark){
	if($mark>=5){
		$grade = 'A+';
	}else if($mark<5&&$mark>=4){
		$grade = 'A';
	}else if($mark<4&&$mark>=3.5){
		$grade = 'A-';
	}else if($mark<3.5&&$mark>=3){
		$grade = 'B';
	}else if($mark<3&&$mark>=2){
		$grade = 'C';
	}else if($mark<2&&$mark>=1){
		$grade = 'D';
	}else if($mark<1&&$mark>=0){
		$grade = 'F';
	}

	return $grade;
}

function getPersentage($gain, $full){
	$get = ($gain/$full) * 100;
	return $get;
}


function getPosition($num){
	if ($num == 1) {
		$pos = "1st";
	}else if ($num == 2) {
		$pos = "2nd";
	}else if ($num == 3) {
		$pos = "3rd";
	}else if ($num > 3) {
		$pos = $num."th";
	}
	return $pos;
}

function getEvent(){
	global $con;
	$ccsql="SELECT * FROM `event` ";
	$ccsql_run = mysqli_query($con, $ccsql);
$file=" ";
	
	while ($ccsql_get=mysqli_fetch_array($ccsql_run)) {
		$event_id = $ccsql_get['event_id'];
		$event_description = $ccsql_get['event_description'];
		$event_year = $ccsql_get['event_year'];
		$event_month = $ccsql_get['event_month'];
		$event_day = $ccsql_get['event_day'];
		$event_hour = $ccsql_get['event_hour'];
			echo "{title: '', description: '".$event_description."', datetime: new Date(".$event_year.",".$event_month.", ".$event_day.", ".$event_hour.")},";
			
		}
}

function getMonth(){
	echo '<option value="01">January</option>
	<option value="02">February</option>
	<option value="03">March</option>
	<option value="04">April</option>
	<option value="05">May</option>
	<option value="06">June</option>
	<option value="07">July</option>
	<option value="08">August</option>
	<option value="09">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>';
}

function getMonthName($month){
	if ($month == 1) {
		$month_name = "January";
	}else if ($month == 2) {
		$month_name = "February";
	}else if ($month == 3) {
		$month_name = "March";
	}else if ($month == 4) {
		$month_name = "April";
	}else if ($month == 5) {
		$month_name = "May";
	}else if ($month == 6) {
		$month_name = "June";
	}else if ($month == 7) {
		$month_name = "July";
	}else if ($month == 8) {
		$month_name = "August";
	}else if ($month == 9) {
		$month_name = "September";
	}else if ($month == 10) {
		$month_name = "October";
	}else if ($month == 11) {
		$month_name = "November";
	}else if ($month == 12) {
		$month_name = "December";
	}
	return $month_name;
}

function getSM(){
	echo '<ul>
						<li><a href="view_result.php">View Results</a></li>
						<li><a href="view_fee.php">View Fee</a></li>
						<li><a href="application.php?type=other">Online Application</a></li>
						<li><a href="ebook.php">Download ebook</a></li>
						<li><a href="content.php">Download Content</a></li>
						<li><a href="conversations.php">Communicate teacher</a></li>
						<li><a href="notice.php?notice=1">View Notice</a></li>
						<li><a href="application.php?type=tc">Apply For TC</a></li>
						<li><a href="view_student_attendance.php?year='.date("Y").'">View attendance </a></li>
					</ul>';
}
function getTM(){
	echo '<ul>
								<li><a href="view_result.php">View students Results</a></li>
						<li><a href="own_salarysheet.php">View own salarysheet</a></li>
						<li><a href="view_teacher_attendance.php?year='.date("Y").'">View attendance </a></li>
						<li><a href="ebook.php">Download Ebook</a></li>
						<li><a href="conversations.php">Communicate Student</a></li>
						<li><a href="notice.php?notice=1">View Notice</a></li>
						<li><a href="upload_content.php">Upload any content</a></li>
								
							</ul>';
}


function sendShortSMS($sms,$num){
	global $con;
	$sql="SELECT * FROM `sms_config` ";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);

		$username = $sql_get['username'];
		$pass = $sql_get['pass'];
		$sender = $sql_get['sender'];
		$sms = urlencode($sms);

		//$str = file("http://app.itsolutionbd.net/api/sendsms/plain?user=".$username."&password=".$pass."&sender=".$sender."&SMSText=".$sms."&GSM=".$num."");
		//var_dump($str);
}



function sendLongSMS($sms,$num){
	global $con;
	$sql="SELECT * FROM `sms_config` ";
	$sql_run = mysqli_query($con, $sql);
	$sql_get=mysqli_fetch_array($sql_run);

		$username = $sql_get['username'];
		$pass = $sql_get['pass'];
		$sender = $sql_get['sender'];
		$sms = urlencode($sms);

		//$str = file("http://app.itsolutionbd.net/api/v3/sendsms/plain?user=".$username."&password=".$pass."&sender=".$sender."&SMSText=".$sms."&GSM=".$num."&type=longSMS");
		//var_dump($str);
}


function studentP(){
	global $con;
	$d = date("d");
	$m = date("m");
	$Y = date("Y");

	$sql = "SELECT `p_or_a` FROM `student_attendence` WHERE `day`='$d' AND `month` = '$m' AND `year` = '$Y' AND `p_or_a`= 1";
	$sql_run = mysqli_query($con, $sql);
	$p = mysqli_num_rows($sql_run);

	echo $p;		


}

function studentA(){
	global $con;
	$d = date("d");
 $m = date("m");
 $Y = date("Y");


	$sql = "SELECT `p_or_a` FROM `student_attendence` WHERE `day`='$d' AND `month` = '$m' AND `year` = '$Y' AND `p_or_a`= 0";
	$sql_run = mysqli_query($con, $sql);
	$a = mysqli_num_rows($sql_run);

	echo $a;	

}

function studentAtten(){
	global $con;
	$d = date("d");
 $m = date("m");
 $Y = date("Y");
 	$sql = "SELECT `p_or_a` FROM `student_attendence` WHERE `day`='$d' AND `month` = '$m' AND `year` = '$Y' AND `p_or_a`= 1";
	$sql_run = mysqli_query($con, $sql);
	$p = mysqli_num_rows($sql_run);

	$sql = "SELECT `p_or_a` FROM `student_attendence` WHERE `day`='$d' AND `month` = '$m' AND `year` = '$Y' AND `p_or_a`= 0";
	$sql_run = mysqli_query($con, $sql);
	$a = mysqli_num_rows($sql_run);

	echo '{  y: '.$p.', indexLabel: "Present" },
{  y: '.$a.', indexLabel: "Absent" }';	

}

function getPageName($i){

	if($i == 1){ 
		echo "PTA";
	}
	elseif($i == 2){ 
		echo "Board of Directors";
	}
	elseif($i == 3){ 
		echo "Class activities";
	}
	elseif($i == 4){ 
		echo "Annual program";
	}
	elseif($i == 5){ 
		echo "Curriculum";
	}
	elseif($i == 6){ 
		echo "Courses";
	}
	elseif($i == 7){ 
		echo "Documentary";
	}
	elseif($i == 8){ 
		echo "Rules and regulations";
	}
	elseif($i == 9){ 
		echo "Hostel";
	}


}
?>

