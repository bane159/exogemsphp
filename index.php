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
  <title>ExoGems Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png" />
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css" />


  <link rel="stylesheet" href="css/style.css" />
</head>
<body> 


<!-- EDIIIIIIIIIIIIIIIIIIIIIIT -->


<!-- DAKDSAD -->
  <!--================ Start Header Menu Area =================-->
  <!-- <div id="spinner-holder">
    <div id="spinner"><i class="fa-solid fa-spinner br-icon"></i></div>
  </div> -->
  
	<?php include("php/header.php"); ?>


 
	<!--================ End Header Menu Area =================-->

  <main class="site-main">
    
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/home/hero-banner.png" alt="banner" />
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Buy our jewlary</h4>
              <h1>Browse Our Premium Products</h1>
              <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="category.html">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->


    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Best selling Items in the market</p>
          <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
        <div class="row justify-content-around" id="trendingProducts">
          <!-- dynamis js  -->


        <?php 
        $trendingProducts = getTrendingProducts();
        foreach ($trendingProducts as $tp):
        ?>

          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="<?= $tp -> imgSrc?>" alt="" />
                <ul class="card-product__imgOverlay">
                  <li><button class="relocateTrening"><i class="ti-search"></i></button></li>
                </ul>
              </div>
              <div class="card-body">
                <p><?=$tp -> category ?></p>
                <h4 class="card-product__title"><?= $tp -> text ?></h4>
                <p class=" br-sm-text-sellers"><?= $tp -> unitsSold?> Units sold!</p>
                <p class="card-product__price">$<?= $tp->price?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>


        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  



    <!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Barely <span class="section-intro__style">left in Stock</span></h2>
        </div>


        
        <div class="d-flex justify-content-center flex-wrap align-items-center" id="bestSellersHolder">

          <?php 
            $stockItems = getStockItems();
            foreach ($stockItems as $tp):
          ?>
          <div class="card text-center card-product my-1">
            <div class="card-product__img">
              <img class="img-fluid" src="<?= $tp -> imgSrc?>" alt="" />
              <ul class="card-product__imgOverlay">
                <!-- <li><button><i class="ti-search"></i></button></li> -->
                <li><button><i class="ti-shopping-cart"></i></button></li>
                <!-- <li><button><i class="ti-heart"></i></button></li> -->
              </ul>
            </div>
            <div class="card-body">
              <p><?=$tp -> category ?></p>
              <h4 class="card-product__title"><a href="single-product.html"><?= $tp -> text ?></a></h4>
              <p class=" br-sm-text-sellers"><?= $tp -> unitsSold?> sold!</p>
              <p class="  text-success"><?= $tp -> available?> sold!</p>
              <p class="card-product__price">$ <?= $tp -> price?></p>
            </div>

          </div>
          <?php endforeach; ?>

          
        </div>
        <!-- </div> -->
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= --> 


    <!-- ================ Subscribe section start ================= --> 
    <?php require_once("php/subscribe.php"); ?>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>


  <!--================ Start footer Area  =================-->	
	<?php include("php/footer.php"); ?>
	<!--================ End footer Area  =================-->


  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/index.js"></script>

  <script src="js/main.js"></script>
  
</body>
</html>