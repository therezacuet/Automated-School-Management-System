<?php
	$ins_sql = "SELECT * FROM `institute_info` ";
	$ins_sql_get = mysqli_query($con, $ins_sql);
	$ins_sql_run = mysqli_fetch_array($ins_sql_get);
	$logo = $ins_sql_run['ins_logo'];
	$name = $ins_sql_run['ins_name'];
	$sub_title = $ins_sql_run['ins_subtitle'];
	$ins_phone = $ins_sql_run['ins_phone'];
	$ins_twe = $ins_sql_run['ins_twe'];
	$ins_fb = $ins_sql_run['ins_fb'];
	$ins_gp = $ins_sql_run['ins_gp'];
	$ins_add = $ins_sql_run['ins_add'];
	$ins_Latitude = $ins_sql_run['ins_Latitude'];
	$ins_Longitude = $ins_sql_run['ins_Longitude'];
	$g_pos = $ins_Latitude.",".$ins_Longitude;
?>

<div class="header" >
			<div class="header_main">
				<div class="logo">
					<a href="index.php"><img src="image/<?php echo $logo;?>" alt=""/></a>
				</div>
				<div class="institute_title">
					<h2><?php echo $name;?></h2>
					<h3><?php echo $sub_title;?></h3>
				</div>
				<div class="head_contact">
					<div class="social_bookmark">
						<a href="<?php echo $ins_gp;?>" target="_blank"><img src="image/social/google.png" alt="" /></a>
						<a href="<?php echo $ins_twe;?>" target="_blank"><img src="image/social/tweet.png" alt="" /></a>
						<a href="<?php echo $ins_fb;?>" target="_blank"><img src="image/social/facebook.png" alt="" /></a>
					</div>
					<div class="hotline"><h1><a href="tel:<?php echo $ins_phone?>" style="color: white;"> <?php echo $ins_phone?></a></h1></div>
				</div>
				<div class="login">
					

					<?php
							if(loggedin()){
								if(!empty($_SESSION['student_id'])){
									$user_name = getfield('fld3');
									$user_pic = getfield('fld0');
									$user_id = $_SESSION['student_id'];
									?>

										
											<div class="login_user_pic">
												<ul>
													<li class="massage_icon">
														<a href="massages.php"><img src="image/mess.png"></a>
													</li>
													<li class="notification_icon">
														<a href=""><img src="image/bell.png"></a>
													</li>
													<li class="profile_option">
													<a href='student_profile.php?id=<?php echo $user_id;?>'><img class="header_pro_pic" src="image/student/<?php echo $user_pic;?>"></a>
													<img class="header_pro_pic_side_arrow"  src="image/arrow_down.png">
														<ul>
															<li><a href="change_password.php">Change Password</a></li>
															<li><a href="student_profile.php?id=<?php echo $user_id;?>">My Profile</a></li>
															<li><a href="student_profile_edit.php">Edit Profile</a></li>
															<li><a href="logout.php">Logout</a></li>
														</ul>
													</li>
												</ul>
												

											</div>
										
									<?php
								}else{
									$user_name = getfield('tld5');
									$user_pic = getfield('tld0');									
									$user_id = $_SESSION['teacher_id'];
									?>

										
											<div class="login_user_pic">
												<ul>
													<li class="massage_icon">
														<a href="massages.php"><img src="image/mess.png"></a>
													</li>
													<li class="notification_icon">
														<a href=""><img src="image/bell.png"></a>
													</li>
													<li class="profile_option">
													<a href='teacher_profile.php?id=<?php echo $user_id;?>'><img class="header_pro_pic" src="image/teacher/<?php echo $user_pic;?>"></a>
													<img class="header_pro_pic_side_arrow"  src="image/arrow_down.png">
														<ul>
															<li><a href="change_password.php">Change Password</a></li>
															<li><a href="teacher_profile.php?id=<?php echo $user_id;?>">My Profile</a></li>
															<li><a href="teacher_profile_edit.php">Edit Profile</a></li>
															<li><a href="logout.php">Logout</a></li>
														</ul>
													</li>
												</ul>
												

											</div>
										
									<?php
								}
							}else if(admin_loggedin()){
								?>
								<div class="login_not">
									<a href='logout.php'>Logout</a><br>
									<a href='admin_change_pass.php'>Change Password</a>
								</div>
								<?php
							}else{
								?>
									<div class="login_not">
										<a href='login.php'>Login</a><br>
										<a href='reg.php'>Registration</a>
									</div>
										
							<?php }

					?>
				</div>
			</div>
		</div>

			
			<div class ="menu_container_all">
				<div class="menu_content">
					<div class="menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Administration</a>
								<ul>
									<li><a href="headmaster.php">Headmaster</a></li>
									<li><a href="asstheadmaster.php">Assistant Headmaster</a></li>
									<li><a href="member_teacher.php">Teachers</a></li>
									<li><a href="officials.php">Officials</a></li>
									<li><a href="pta.php">PTA</a></li>
									<li><a href="directors.php">Board of Directors</a></li>
									<!-- <li><a href="#">Students</a>
										<ul>
											<?php getClassDropDown();?>
										</ul>
									</li> -->	
								</ul>
							</li>
							<li><a href="">Institutional Activities</a>
								<ul>
									<li><a href="class_activities.php">Class activities</a></li>
									<li><a href="annual_program.php">Annual program</a></li>
									<li><a href="curriculum.php">Curriculum</a></li>
									<li><a href="courses.php">Courses</a></li>
									<li><a href="documentary.php">Documentary</a></li>
								</ul>
							</li>
							<li><a href="photo_gallery.php">Gallery</a></li>
							<li><a href="#">Other information</a>
								<ul>
									<li><a href="school_history.php">School History</a></li>
									<li><a href="rule.php">Rules and regulations</a></li>
									<li><a href="library.php">Library</a></li>
									<li><a href="hostel.php">Hostel</a></li>
								</ul>
							</li>
							<li><a href="view_result.php">Exam Result</a></li>
							<li><a href="admission.php">Admission</a>
								<ul>
									<li><a href="admission.php">Online Admission</a></li>
									<li><a href="admitcard.php">Download Admit Card</a></li>
								</ul>
							</li>
							
							<li><a href="academic_calendar.php">Academic Calendars</a></li>
							
							
								
						</ul>
					</div>
				</div>
			</div>