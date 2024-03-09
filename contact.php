<?php
session_start();
require_once("php/conn.php");
include("php/logic.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Aroma Shop - Contact</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css" />
	<link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />

  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <!--================ Start Header Menu Area =================--> 
	<?php include("php/header.php"); ?>
	<!--================ End Header Menu Area =================-->


	<!-- ================ start banner area ================= -->
	<section class="blog-banner-area" id="contact">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Contact Us</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

	<!-- ================ contact section start ================= -->
  <section class="section-margin--small">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 500px;">
        
        
          <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2002.1625906535073!2d20.46790548609919!3d44.79129366738908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDTCsDQ3JzI3LjAiTiAyMMKwMjgnMDIuNSJF!5e0!3m2!1ssr!2srs!4v1708022133747!5m2!1ssr!2srs" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="height: 100%; width: 100%; border: none;" >
          
          </iframe>
        
        
        
        </div>
        
        
      </div>


      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Belgrade Serbia</h3>
              <p>Dalmatinska 123</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">+38161234567</a></h3>
              <p>Mon to Fri 9am to 5pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@ict.edu.rs">support@ict.edu.rs</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="index.html" class="form-contact contact_form"  method="post" id="contactForm" >
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" />
                  <span class="text-danger mx-3 d-none" id="nameError"> Name is entered increctly</span>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address" />
                  <span class="text-danger mx-3 d-none"  id="emailError"> Invalid Email adress</span>
                </div>
                <div class="form-group">
                  <!-- <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject" /> -->
                  <select class="form-select br-filter " aria-label="Default select example" id="country">
                    <option value="Choose"> Choose Country...</option>
                    <option value="Serbia"> Serbia</option>
                    <option value="Croatia"> Croatia</option>
                    <option value="Romania">Romania</option>
                    <option value="Germany">Germany</option>
                    <option value="Ukraine">Ukraine</option>
                  </select>
                  <span class="text-danger mx-3 d-none" id="countryError">Chose atleast one option</span>
                </div>
                <div class="form-check form-group form-check-inline mx-2">
                  <input class="form-check-input" type="radio" id="maleSex" value="M" name="sex"/>
                  <label class="form-check-label" for="maleSex">Male</label>
                </div>
                <div class="form-check form-group form-check-inline">
                  <input class="form-check-input" type="radio" id="femaleSex" value="F"  name="sex"/>
                  <label class="form-check-label" for="femaleSex">Female</label>
                  
                </div>
                <div class="form-group">
                  <span class="text-danger mx-3 d-none" id="sexError">Choose sex ( ͡° ͜ʖ ͡°)</span>
                </div>
                
                
              
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" id="submitBtn" class="button button--active button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
  
  <?php require_once("php/subscribe.php"); ?>

  <!--================ Start footer Area  =================-->	
	<?php include("php/footer.php"); ?>
	<!--================ End footer Area  =================-->


  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.form.js"></script>
  <script src="vendors/jquery.validate.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/contact.js"></script>
  <script src="js/main.js"></script>
</body>
</html>