<?php
@session_start();
$uid = $_SESSION['uid'];

?>

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>The Good Samaritan</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script src="js/bootstrap-slider.js"></script>
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
										<a class="nav-link" onclick="help();">Seek Help</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" onclick="view_applications();" href="#">View</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" onclick="needyprofile();">My Profile</a>
									</li>
									<li class="nav-item">
										<a class="main_btn" data-toggle="modal" data-target="#" href="logout.php">Logout</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	
	<div class="col-md-12" id="needy_dashboard_body">
	</div>
	
<script>
$(document).ready(function(){

	$.ajax({
		type: "GET",
		url:"help.php",
		success:function(result){
			$("#needy_dashboard_body").html(result);
		}
	});

});

function needyprofile(){
	$.ajax({
		type: "GET",
		url:"needy_profile.php",
		success:function(result){
			$("#needy_dashboard_body").html(result);
		}
	});
}

function view_applications(){
	$.ajax({
		type: "GET",
		url:"view_applications.php",
		success:function(result){
			$("#needy_dashboard_body").html(result);
		}
	});
}

function help(){
	$.ajax({
		type: "GET",
		url:"help.php",
		success:function(result){
			$("#needy_dashboard_body").html(result);
		}
	});
}

</script>
	
	