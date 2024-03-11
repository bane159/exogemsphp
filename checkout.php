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
  <title>Aroma Shop - Checkout</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css" />
	<link rel="stylesheet" href="vendors/linericon/style.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css" />
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css" />

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
      require "php/checkLoginAndActive.php";
    ?>
  <!--================ Start Header Menu Area =================-->
	<?php include "php/header.php" ?>
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Checkout</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
        


        <!-- <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="button button-coupon" href="#">Apply Coupon</a>
        </div> -->
        <div class="billing_details">

          <?php $user = $_SESSION['user']; ?>
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name" placeholder = "Name" value="<?= $user -> name ?>"/>
                            <span id="nameError"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder = "Lastname" value="<?= $user -> lastname ?>"/>
                            <span id="lastnameError"></span>
                        </div>
                        
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number" placeholder = "Number"  />
                            <span id="numberError"></span>
                        </div>
                        
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City"/>
                            <span id="cityError"></span>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="state" name="state" placeholder="State" />
                            <span id="stateError"></span>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street"/>
                            <span id="streetError"></span>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                            <span id="zipError"></span>
                        </div>
                        
                        <div class="col-md-12 form-group mb-0">
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Order Notes"></textarea>
                        </div>
                    
                      <div class="col-md-12 form-group mb-0">
                              <p id = "error"></p>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                         <li><a href="#"><h4>Product <span>Total</span></h4></a></li>


                        <?php
                          $shipping = 50;
                          $cartId = getCartId($_SESSION['user'] -> id ) -> id;
                          $cart = getCartItems( $cartId );
                          $totalPrice = 0;
                          foreach($cart as $item):
                            $totalPrice += $item -> totalPerProd;


                        ?>


                            
                            <li><a href="#"><?= $item -> productName?> <span class="middle">x <?= $item -> quantity?></span> <span class="last">$<?= $item -> totalPerProd?>
                              </span></a></li>
                            <!-- <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li> -->

                            <?php endforeach; ?>


                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$<?= $totalPrice ?></span></a></li>
                            <li><a href="#">Shipping <span>$<?= $shipping?></span></a></li>
                            <li><a href="#" >Total  $<span id = "total"><?= $totalPrice + $shipping ?> </span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State,
                                Store Postcode.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don`t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="tos" name="tos">
                            <label for="tos">I’ve read and accept the </label>
                            <a href="https://www.youtube.com/watch?v=OVh0bMNSFss&ab_channel=g3ox_em">terms & conditions*</a>
                            <span id = "tosError"></span>
                        </div>
                        <div class="text-center">
                          <!-- <a class="button button-paypal" href="#">Proceed to Paypal</a> -->
                          <button id="orderBtn" class= "btn btn-info w-100"> Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->



  <!--================ Start footer Area  =================-->	
    <?php include "php/footer.php" ?>
	<!--================ End footer Area  =================-->



  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  
  <script src="js/func.js"></script>

  <script src="js/checkout.js"></script>
  

</body>
</html>