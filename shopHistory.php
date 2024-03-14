<?php
session_start();
include("php/logic.php");
// var_dump(!isAdmin());
if(!isLogged()){

    header("Location: 404.php");
    exit();
}

require_once("php/conn.php");

    // $id = get("id");
    // if(!is_numeric($id) || !$id > 0){
    //     exit;
    // }
   
        $id = $_SESSION['user'] -> id;

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "php/head.php"?>
</head>
<body>

  <!--================ Start Header Menu Area =================-->
   


  <?php include "php/header.php"?>
	<!--================ End Header Menu Area =================-->

	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
    <div class = "container">
    <div class="row">
        <h3>User </h3>
    </div>
   </div>

  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">

                <?php 
                
                    $carts = getHistoryCarts($id);
                    $orderNumb = 0;
                    foreach($carts as $cart):
                        ++$orderNumb;
                
                ?>
                    <h3>Order #<?=$orderNumb ?></h3>


                    <?php
                        $cartInfo = getCartItemsWithoutStatus($cart->id);
                        foreach($cartInfo as $cartItem):
                            
                    ?>
                    
                    <table class="table" id="cartItemsHolder">

                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?= $cartItem -> imgSrc?>" alt="alt">
                                        </div>
                                        <div class="media-body">
                                            <p id="textProduct"><?= $cartItem ->text ?></p>
                                        </div>
                                    </div>
                                </td>
                            
                            
                                <td> <?=$cartItem -> totalPerProd ?></td>
                            
                            
                                <td> <?=$cartItem -> totalPerProd * $cartItem -> quantity ?></td>
                            </tr>
                                    
                            
                        </tbody>
                    </table>

                    <?php endforeach; ?>


                  <?php endforeach; ?>


              </div>
          </div>
      </div>
  </section>

  <div class="container ">
    <div class="row justify-content-center my-2">
        <p id = "delMsg" class = "opacity-0"></p>
    </div>
  </div>





  <!--================ Start footer Area  =================-->	
    <?php include "php/footer.php" ?>  
  <!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/func.js"></script>
</body>
</html>