<?php
require 'conn.inc.php';
//error_reporting(0);
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one

}
@ob_start();

$current_file = $_SERVER['SCRIPT_NAME'];
if (isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])) {
	$http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin(){
	if(!empty($_SESSION['student_id'])){
		if(isset($_SESSION['student_id']) && !empty($_SESSION['student_id'])){
			return true;
		}else{
			return false;
		}
	}else{
		if(isset($_SESSION['teacher_id']) && !empty($_SESSION['teacher_id'])){
			return true;
		}else{
			return false;
		}
	}
		
		
}

function admin_loggedin(){
if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
		return true;
	}else{
		return false;
	}
}

function getfield($field){


	include("conn.inc.php");

	if(!empty($_SESSION['student_id'])){
		$student_id = $_SESSION['student_id'];
		$sql = "select $field from student where student_id='$student_id'";
		
		$run_sql = mysqli_query($con, $sql);
		$sql_user = mysqli_fetch_array($run_sql);
		return $user_field = $sql_user[$field];
	}else{
		$teacher_id = $_SESSION['teacher_id'];
		$sql = "select $field from teacher where teacher_id='$teacher_id'";
		
		$run_sql = mysqli_query($con, $sql);
		$sql_user = mysqli_fetch_array($run_sql);
		return $user_field = $sql_user[$field];
	}
								


}
?>