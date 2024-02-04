<?php
include("functions.php");
$db = new DB_FUNCTIONS();

if(isset($_POST['register_submit'])){
	$username = $_POST["username"];
	$emailid = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	$type = 'donor';
		if($password == $confirm_password)
		{
			$register_user = $db->register_user($username,$type,$password);
		}
		else
		{
			echo "Passwords Do Not Match!";
		}
	
}

if(isset($_POST['needy_register_submit'])){
	$username = $_POST["needy_username"];
	$emailid = $_POST["needy_email"];
	$password = $_POST["needy_password"];
	$confirm_password = $_POST["needy_confirm_password"];
	
	$type = 'needy';
		if($password = $confirm_password)
		{
			$register_user = $db->register_user($username,$type,$password);
		}
		else
		{
			echo "Passwords Do Not Match!";
		}
	
}

if(isset($_POST['login_submit']))
{
	$login_username = $_POST['login_username'];
	$login_password = $_POST['login_password'];
	$login_donor = $db->login_donor($login_username,$login_password);
	if($login_donor)
	{
		@session_start();
		$_SESSION['uid'] = $login_donor['id'];
		echo "<script>document.location='donor_dashboard.php'</script>";
		
	}
}

if(isset($_POST['needy_login_submit']))
{
	$login_username = $_POST['needy_login_username'];
	$login_password = $_POST['needy_login_password'];
	$login_needy = $db->login_needy($login_username,$login_password);
	if($login_needy)
	{
		@session_start();
		$_SESSION['uid'] = $login_needy['id'];
		echo "<script>document.location='needy_dashboard.php'</script>";
	}
}

if(isset($_POST['admin_submit']))
{
	$login_username = $_POST['admin_username'];
	$login_password = $_POST['admin_password'];
	$login_admin = $db->login_admin($login_username,$login_password);
	if($login_admin)
	{
		@session_start();
		$_SESSION['uid'] = $login_admin['id'];
		echo "<script>document.location='admin_dashboard.php'</script>";
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>The Good Samaritan</title>
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>

<body>


	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php">
						<div style="float:left;">
						<img src="img/angel10.png" alt=""><span style="font-family: Arial,Helvetica Neue,Helvetica,sans-serif; font-weight:bold;color:black;font-size:26px;"padding-top:10px;>Good Samaritan</span>
						</div>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="index.php">home</a>
									</li>
									
									<li class="nav-item ">
										<a class="nav-link" href="#campaign_div">Our Campaigns</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link" data-toggle="modal" data-target="#needy_form" href="#campaign_div">Need Help?</a>
									</li>
									
									<li class="nav-item">
										<a class="main_btn" data-toggle="modal" data-target="#donate_form" href="donation.html">donate now</a>
									</li>
									<a href="#" data-toggle="modal" title="Admin Login" data-target="#admin_form" style="color:black;"> <i class="fa fa-power-off" style="font-size:24px;padding-top:35px;"></i></>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	
	<div class="modal fade" id="donate_form" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title" style="text-align:center;">Donor Authentication</h4>
        </div>
        <div class="modal-body col-md-12">
				<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="login_username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="login_password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="index.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register_submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
	</div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="needy_form" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title" style="text-align:center;">User Authentication</h4>
        </div>
        <div class="modal-body col-md-12">
				<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link-abc">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link-abc">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form-abc" action="index.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="needy_login_username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="needy_login_password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="needy_login_submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form-abc" action="index.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="needy_username" id="needy_username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="needy_email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="needy_password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="needy_confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="needy_register_submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
	</div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="modal fade" id="admin_form" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title" style="text-align:center;">Admin Login</h4>
        </div>
        <div class="modal-body col-md-12">
				<div class="col-md-12">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active">Login</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="index.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="admin_username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="admin_password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="admin_submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
	</div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>
  
  
	<!--================Header Menu Area =================-->

	<!--================ Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<img class="img-fluid" src="img/banner/text-img.png" alt="">
						<p>Every good act is charity. A man's true wealth hereafter is the good that he does in this world to his fellows.</p>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->


	<!--================ Start important-points section =================-->
	<section class="donation_details pad_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home1.png" alt="">
					<h4>Total Donation</h4>
					<p>
						The total amount of donations received by the organization.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home2.png" alt="">
					<h4>Fund Raised</h4>
					<p>
						The amount of donations reaching the needy.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home3.png" alt="">
					<h4>Highest Donation</h4>
					<p>
						The highest donation in hand that was drafted by the donor.
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="img/icons/home4.png" alt="">
					<h4>Success story</h4>
					<p>
						Some satisfying tales about the organization.
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->

	<!--================ Start Our Major Cause section =================-->
	<div id="campaign_div"> 
	<section class="our_major_cause section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Our Major Causes</h1>
					<p>
						Some interesting campaigns and initiatives taken by the organization.
					</p>
				</div>
			</div>

			<div class="row">
				<div id="our-major-cause" class="owl-carousel">
					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d1.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
									<span>Funded 48%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 48,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Non Violent Peaceforce</h4>
								<p class="card-text">Nonviolent Peaceforce is to promote and develop unarmed civilian peacekeeping to reduce violence and protect civilians in situations of violent conflict.
								</p>
								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d2.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									<span>Funded 60%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 60,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Girls Education</h4>
								<p class="card-text">It takes care of girls education, gender discrimination, health and nourishment, girls rights, etc. 
								</p>
								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d3.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">
									<span>Funded 29%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 29,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Child Nutrition</h4>
								<p class="card-text">They work to end and eradicate child hunger, and also check if malnutrition still exists.
								</p>
								
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d2.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
									<span>Funded 76%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: $7,689</span> / $10,000
								</div>
								<h4 class="card-title">Did not find your Package</h4>
								<p class="card-text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace that’s why it’s crucial.
								</p>
								<a href="#" class="main_btn2">donate here</a>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d3.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
									<span>Funded 76%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: $7,689</span> / $10,000
								</div>
								<h4 class="card-title">Did not find your Package</h4>
								<p class="card-text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace that’s why it’s crucial.
								</p>
								<a href="#" class="main_btn2">donate here</a>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d1.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
									<span>Funded 76%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: $7,689</span> / $10,000
								</div>
								<h4 class="card-title">Did not find your Package</h4>
								<p class="card-text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace that’s why it’s crucial.
								</p>
								<a href="#" class="main_btn2">donate here</a>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d2.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
									<span>Funded 76%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: $7,689</span> / $10,000
								</div>
								<h4 class="card-title">Did not find your Package</h4>
								<p class="card-text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace that’s why it’s crucial.
								</p>
								<a href="#" class="main_btn2">donate here</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
	<!--================ Ens Our Major Cause section =================-->

	<!--================ Start Make Donation Area =================-->
	
	<!--================ End Make Donation Area =================-->

	<!--================ Start Clients Logo Area =================-->
	
	<!--================ End Clients Logo Area =================-->

	<!--================ Support Campaign Area =================-->
	
	<!--================ End Support Campaing Area =================-->

	<!--================ Start Experience Area =================-->
	
	<!--================ End Experience Area =================-->

	<!--================ Start Footer Area  =================-->
	
	<!--================ End Footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<!-- <script src="vendors/counter-up/jquery.waypoints.min.js"></script> -->
	<!-- <script src="vendors/flipclock/timer.js"></script> -->
	<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
	<script src="js/mail-script.js"></script>
	<script src="js/custom.js"></script>
</body>
<script>
	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	
$('#login-form-link-abc').click(function(e) {
		$("#login-form-abc").delay(100).fadeIn(100);
 		$("#register-form-abc").fadeOut(100);
		$('#register-form-link-abc').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link-abc').click(function(e) {
		$("#register-form-abc").delay(100).fadeIn(100);
 		$("#login-form-abc").fadeOut(100);
		$('#login-form-link-abc').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
</html>