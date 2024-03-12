<?php
session_start();
include("php/logic.php");
var_dump(!isAdmin());
if(!isAdmin()){

    header("Location: 404.php");
    exit();
}

require_once("php/conn.php");

    $id = get("id");
    if(is_numeric($id) && $id > 0){

    }
    else{
        exit;
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge"  />
  <title>Aroma Shop - Cart</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css" />
	<link rel="stylesheet" href="vendors/linericon/style.css" />


  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- <div id="spinner-holder">
    <div id="spinner"><i class="fa-solid fa-spinner br-icon"></i></div>
  </div> -->
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
        <h3>Edit users</h3>
    </div>
   </div>

  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">

                <?php 
                
                    // $carts = getHistoryCarts($id);
                
                ?>

                  <table class="table" id="cartItemsHolder">

				  	<thead>
						
					</thead>
                    <tbody>
                        

                                   
						
                    </tbody>
                  </table>
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
  <script src = "js/admin.js"></script>
  <script src="js/main.js"></script>
</body>
</html>