<style type="text/css">
.social ul{margin: 75px auto 0;
width: 260px;}
.social ul li{float: left;
list-style: none;
border-radius: 86px;
border: 1px solid #777777;
margin: 5px;
width: 50px;
height: 50px;
transition: .7s ease;
}
.social ul li:last-child{
	margin: 5px 0px 5px 5px;
}
.social ul li:hover{position: relative;}
.social ul li a{text-decoration: none;display: block;}
.social ul li a:hover{display: inline-block;}
.social ul li a img{width: 40px;height: 40px;margin: 5px;display: inline-block;}
.social ul li ul{position: absolute;display: none;}
.social ul li:hover ul{left: -36px;top: -81px;display: block;}
.social ul li:hover ul:hover{left: -186px;transition: .7s ease;}
.social ul li:hover ul li{background: #0B7BB5; border: 1px solid ;width: 230px;cursor: pointer;display: block;}
/*.social ul li:hover ul li:hover{width: 230px;transition: .63s ease;}*/
.social ul li:hover ul li a{color: #fff; padding: 0 10;font-size: 20px }
.social ul li:hover ul li:hover{background: #0B7BB5;}
.s1:hover{
	background-color: #4A6D9D;

}
.s2:hover{
	background-color: #CC181E;

}
.s3:hover{
	background-color: #E14D3A;

}
.s4:hover{
	background-color: #0B7BB5;

}
.hh:hover{
	width: 230px;
	overflow:hidden;
	transition: .63s ease;
}
</style>
		<div class="footer_all">
			<div class="footer">
				<!-- <div class="footer_content">
					<div class="social">
						<a href="<?php echo $ins_fb;?>" target="_blank"><img src="image/socialfoot/facebook.png" alt="" /></a>
						<a href="<?php echo $ins_twe;?>" target="_blank"><img src="image/socialfoot/tweet.png" alt="" /></a>
						<a href="https://www.youtube.com/" target="_blank"><img src="image/socialfoot/youtube.png" alt="" /></a>
						<a href="<?php echo $ins_gp;?>" target="_blank"><img src="image/socialfoot/google.png" alt="" /></a>
					</div> -->
					<div class="social">
								<ul>
									<li class="s1"><a href="<?php echo $ins_fb;?>" target="_blank"><img src="image/facebook.png"> </a> </li>
									<li class="s3"><a href="<?php echo $ins_gp;?>" target="_blank"><img src="image/google copy.png"> </a> </li>
									<li class="s2"><a href="<?php echo $ins_twe;?>" target="_blank"><img src="image/youtube.png"> </a> </li>
									<li class="s4"><a href="tel:<?php echo $ins_phone;?>" target="_blank"><img src="image/call.png"> </a> 
										<ul>
											<li>
												<a href="tel:<?php echo $ins_phone;?>">
													<div class="hh">
														<h1 style="font-size: 28px; line-height: 46px;text-align: center;margin: 0px 50px 0px 0px;"><?php echo $ins_phone;?></h1>	
														<img src="image/call.png" style="width: 40px; height: 40px; float: right; margin: -41px 15px 0px 0px;">
													</div>
													
												</a>
												
											</li>
										</ul>
									</li>
								</ul>
					</div>


					<div class="social2">
						<a href="https://www.infokosh.gov.bd/" target="_blank"><img src="image/e_cos.png" alt="" /></a>
						<a href="https://www.bangladesh.gov.bd" target="_blank"><img src="image/bn.png" alt="" /></a>
					</div>

					<div class="social3">
						<a href="https://www.teachers.gov.bd" target="_blank"><h1>শিক্ষক বাতায়ন</h1><h2>শিক্ষার উৎর্কষ সাধনে শিক্ষক</h2></a>
						<a href="http://www.dshe.gov.bd/" target="_blank"><h3 style="color:red">মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</h2></a>
					</div>

					<div class="social4">
						<!-- <a href="" target="_blank"><img src="image/sms.png" alt="" /></a>
						<a href="" target="_blank"><img src="image/email.png" alt="" /></a> -->

						<script type="text/javascript" src="http://counter5.01counter.com/private/counter.js?c=2cff21044accac3e94b6991c4942532f"></script>
						<h4 style="font-size: 17px;color: rgb(235, 235, 235);text-align: center;margin: 16px -18px 0px 0px;">Total Visitor</h4>
					</div>

				</div>
				<div>
					<p class="foot"><?php echo $name;?> &copy; <?php echo date("Y");?>. All Rights Reserved</P>
					<!-- <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'> -->
					<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
					<P class="foot">Developed by <a href="http://edu-solution.info/" style="color:#FFFFFF" target="_blank"><strong style="font-family: 'Calligraffitti', cursive;">EDU Solution</strong></a>
				</div> 
			</div>
		</div>