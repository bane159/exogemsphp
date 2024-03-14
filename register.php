<?php
session_start();
require_once("php/conn.php");
include("php/logic.php");
// var_dump($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>ExoGems Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />


  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php  include("php/header.php"); ?>
  
<!-- <div class="br-modal" id="br-appear-modal">
    <p>Added To Cart!</p>
  </div> -->
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li>
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
							<h4>Already have an account?</h4>
							<p>Make sure to loging if you already have an account with us!</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
							<form class="row login_form"  id="register_form">

								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" />
									<span id = "emailError"></span>
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Name" />
									<span id = "nameError"></span>
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" />
									<span id = "lastnameError"></span>
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="adress" name="adress" placeholder="Adress" />
									<span id = "adressError"></span>
								</div>
								<div class="col-md-12 form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" placeholder = 'Password' />
									<span id = "passwordError"></span>
								</div>
								<!-- <div class="col-md-12 form-group">
									<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" 
									placeholder = 'Confirm Password' />
								</div> -->
								<!-- <div class="col-md-12 form-group">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Keep me logged in</label>
									</div>
								</div> -->
								<!-- <div class="col-md-12 form-group">
									<button class="button button-register w-100" id = "sendForm">Register</button>
								</div> -->
							</form>
								<div class="col-md-12 form-group w-80">
									<button class="button button-register w-100" id = "sendForm">Register</button>
								</div>
								<div class="col-md-12 form-group w-80">
									<span id = "registrationMessage"></span>
								</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



 <?php
	include("php/footer.php");
 ?>



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- <script src="vendors/skrollr.min.js"></script> -->
  <!-- <script src="vendors/owl-carousel/owl.carousel.min.js"></script> -->
  <!-- <script src="vendors/nice-select/jquery.nice-select.min.js"></script> -->
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <!-- <script src="vendors/mail-script.js"></script> -->

  <script src = "js/func.js"></script>
  <script src = "js/register.js"></script>

  <script src="js/main.js"></script>
</body>
</html>