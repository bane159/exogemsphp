<?php
session_start();
include("php/logic.php");
var_dump(!isAdmin());
if(!isAdmin()){

    header("Location: 404.php");
    exit();
}

require_once("php/conn.php");

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
  
  

  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table" id="cartItemsHolder">
				  	<thead>
						<tr>
							<th scope="col">Email</th>
							<th scope="col">Username</th>
							<th scope="col">Is Subsribed</th>
							<th scope="col">Unsubscribe</th>
							<th scope="col">Block</th>
						</tr>
					</thead>
                    <tbody>
                        <?php 
                            $subbedUsers = getSubbedUsers();
                            
                            foreach ($subbedUsers as $su):
                        ?>




                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <p id="textProduct"><?=$su -> email ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 id="price"><?=$su -> name ?></h5>
                                </td>
                                <td>
                                    <h5 id="price"><?=$su -> status ? "true" : "false"?></h5>
                                </td>
                                <td>
                                    <?php if($su -> status):?>
                                    <!-- <button data-id = "" class = "btn btn-secondary unsubscribeBtn">Unsubscribe</button> -->
                                    <form action="php/unsubscribeLogic.php" method = "POST">

                                        <button class="btn btn-secondary mr-auto mb-1" id="btn-unsubscribe" type = "submit">Unsubscribe</button>
                                        <input type="hidden" value="<?= $su -> id ?>" name="user_id" />

                                    </form>

                                    <?php else: ?>

                                        <form action="php/subscribeLogic.php" method = "POST">

                                            <button class="btn btn-primary mr-auto mb-1" id="btn-subscribe" type = "submit">Subscribe Now</button>
                                            <input type="hidden" value="<?=$su -> id ?>" name="user_id"/>

                                        </form>

                                    <?php endif; ?>
                                    
                                </td>
                                <td>

                                    <?php if(!didAdminChangeSub($su -> id)): ?>
                                        
                                    <form action="php/blockSubscribeLogic.php" method = "POST">

                                        <button class="btn btn-danger mr-auto mb-1" id="btn-unsubscribe" type = "submit">Block</button>
                                        <input type="hidden" value="<?= $su -> id ?>" name="user_id" />

                                    </form>

                                    <?php else: ?>
                                        <form action="php/UNblockSubscribeLogic.php" method = "POST">

                                            <button class="btn btn-success mr-auto mb-1" id="btn-unsubscribe" type = "submit">Unlock</button>
                                            <input type="hidden" value="<?= $su -> id ?>" name="user_id" />

                                        </form>
                                    <?php endif; ?>
                                    
                                </td>
                                
                            </tr>




                    <?php endforeach;?>
						
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->



  <!--================ Start footer Area  =================-->	
    <?php include "php/footer.php" ?>  
  <!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/func.js"></script>
  <script src="js/admin-subscribe.js"></script>
  <script src="js/main.js"></script>
</body>
</html>