<?php
session_start();
include("php/logic.php");
$orderId = get("id");



if(!is_numeric($orderId)){
  header("Location: 404.php");
  exit();
}
 mail( $_SESSION['user'] -> email, "Purchase Confirmation Exogems", "Your order has been confirmed with id $orderId. For more information click this link: https://exogemsphp.branislav.dev/confirmation.php?id=$orderId If you didnt purchase anything DO NOT CLICK THIS");

require_once("php/conn.php");



// var_dump($orderId);


$orderInfo = getOrderInfo($orderId);
// var_dump($orderInfo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css" />
	<link rel="stylesheet" href="vendors/linericon/style.css" />


  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <!--================ Start Header Menu Area =================-->
    <?php include "php/header.php" ?>
	<!--================ End Header Menu Area =================-->
  
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Order Confirmation</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Order Details Area =================-->
  <section class="order_details section-margin--small">
    <div class="container">
      <p class="text-center billing-alert">Thank you. Your order has been received.</p>
      <div class="row mb-5 justify-content-between">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Order Info</h3>
            <table class="order-rable">
              

              <tr>
                <td>Order number</td>
                <td><?= $orderInfo -> order_id?></td>
              </tr>

              
              <tr>
                <td>Date</td>
                <td><?=$orderInfo -> created_at ?> </td>
              </tr>
              <tr>
                <td>Total</td>
                <td>$ <?= $orderInfo -> total ?></td>
              </tr>

            </table>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Shipping Address</h3>
            <table class="order-rable">
              <tr>
                <td>Street</td>
                <td><?= $orderInfo -> street?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= $orderInfo -> city?></td>
              </tr>
              <tr>
                <td>State</td>
                <td><?= $orderInfo -> state?></td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td><?= $orderInfo -> postal?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <?php
      
      
      $cartId = getCartIdFromHistory($_SESSION['user'] -> id ) -> id;
      $cart = getCartItemsFROMHISTORY( $cartId );
      // var_dump( $cart );
      $totalPrice = 0;

      ?>

      <div class="order_details_table">
        <h2>Order Details</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($cart as $item):
                 $totalPrice += $item -> totalPerProd;
              ?>
              <tr>
                <td>
                  <p><?= $item -> text?></p>
                </td>
                <td>
                  <h5>x <?= $item -> quantity?></h5>
                </td>
                <td>
                  <p>$<?= $item -> totalPerProd?></p>
                </td>
              </tr>
              
              <?php endforeach; ?>
              <tr>
                <td>
                  <h4>Total</h4>
                </td>
                <td>
                  <h5></h5>
                </td>
                <td>
                  <h4>$<?= $totalPrice  //shipping?></h4>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!--================End Order Details Area =================-->



  <!--================ Start footer Area  =================-->	
  <?php include "php/footer.php"?>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>