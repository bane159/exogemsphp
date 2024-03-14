<?php
require_once("php/conn.php");
include("php/logic.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Login</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<!-- <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css"> -->
	<!-- <link rel="stylesheet" href="vendors/linericon/style.css"> -->
  <!-- <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css"> -->
  <!-- <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css"> -->
  <!-- <link rel="stylesheet" href="vendors/nice-select/nice-select.css"> -->
  <!-- <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css"> -->

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--================ Start Header Menu Area =================-->
	<?php include("php/header.php"); ?>
	<!--================ End Header Menu Area =================-->
  
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Login / Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="register.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="#/" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
								<span id = "emailError"></span>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
								<span id = "passwordError"></span>
							</div>
							<!-- <div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div> -->
						</form>
							<div class="col-md-12 form-group">
								<button class="button button-login w-100" id="login" >Log In</button>
								<!-- <a href="#">Forgot Password?</a> -->
							</div>
							<div class="col-md-12 form-group">
								<span id = "loginMessage"></span>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <!--================ Start footer Area  =================-->	
	
  <?php include("php/footer.php"); ?>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>


  <script src= "js/func.js"></script>

  <script src = "js/login.js" ></script>

  <!-- <script src="js/main.js"></script> -->
</body>
</html>