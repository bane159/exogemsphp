<?php
session_start();
require_once("php/conn.php");
include("php/logic.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("php/head.php"); ?>
</head>
<body>
	<?php 
      require "php/checkLoginAndActive.php";
    ?>

  <?php include("php/header.php"); ?>
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  

  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table" id="cartItemsHolder">
				  	<thead>
						<tr>           
							<th scope="col">Product</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
    				</thead>
					<tbody>

					<?php 
					  
					//    var_dump($cart);
						$total = 0;					
					   foreach($cart as $item):
						$total += $item -> totalPerProd;
						var_dump($total);
					?>
					<tr>
						<td>
								<div class="media">
									<div class="d-flex">
										<img src="<?= $item -> imgSrc?>" alt="${product.img.alt}">
									</div>
									<div class="media-body">
										<p id="textProduct"><?= $item ->text ?></p>
									</div>
								</div>
						</td>
						<td>
							<h5 id="price"><?= $item -> price ?></h5>
						</td>
						<td>
							<!-- <button class = "btn plus" data-id = "<?=$item -> productId ?>"> <i class ="fa fa-minus"></i></button> -->
							<div class="product_count">
								<!-- <input type="number" value = " $item -> quantity ?>"> -->
								<p><?= $item -> quantity ?></p>
								
							</div>
							<!-- <button class = "btn minus" data-id = "<?=$item -> productId ?>"> <i class ="fa fa-plus"></i></button> -->
						</td>
						<td>
							<?= $item -> totalPerProd?>
						</td>
						<td>
							<form action= "php/delSingleItem.php" method = "POST">
								<button type = "submit"  class="removeItem btn" > <i class="fa-solid fa-x "></i> </button>
								<input type="hidden" value="<?=$item -> productId ?>" name = "product_id"/>
							</form>
						</td>
        		 	</tr>

					<?php endforeach; ?>


					
						<tr class="out_button_area">
                              <td class="">
							  Subtotal --> <?= $total == 0? "/" : "$$total" ?>
                              </td>
                              <td class="">
									
									
                              </td>
                              <td>
								
								
                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="btn btn-info" href="category.php">Continue Shopping</a>
										<form action="php/deleteCartLogic.php" method = "POST">

											<input type="submit" id = "clearCart" class = "btn btn-primary" value="clear cart"/>
											
										</form>
										<?php 
											$cart = getCartItems(getCartId($_SESSION['user'] -> id) -> id);
											//  var_dump($cart);
											$i = 0;
											foreach($cart as $item){
												$i++;
											}
											if($i > 0):
										?>
                                      <a class="primary-btn ml-2" href="checkout.php">Proceed to checkout</a>
									  <?php endif;?>
                                  </div>
                              </td>
                          </tr>
						  </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->



  <!--================ Start footer Area  =================-->	
  <?php include("php/footer.php"); ?>
	<!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/cart.js"></script>
  <script src="js/main.js"></script>
</body>
</html>