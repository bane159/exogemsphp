<?php
session_start();
include("php/logic.php");
// var_dump(!isAdmin());
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
                  <table class="table" id="cartItemsHolder">
				  	<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">email</th>
							<th scope="col">Adress</th>
							<th scope="col">Created</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
                    <tbody>
                        <?php 
                            $users = getAllUsers();
                            
                            foreach ($users as $u):

                        ?>




                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-body">
                                            <p id="textProduct"> <?= $u -> email?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5 id="price"><?= $u -> name?></h5>
                                </td>
                                <td>
                                    <h5 id="price"> <?= $u -> adress?></h5>
                                </td>
                                <td> <?= $u -> created_at?></td>
                                <td><?= $u -> isActive ? "Active" : "Inactive" ?></td>


                                <td>
                                    <?php 
                                        if(!$u -> isActive):
                                    ?>
                                    <form action="php/setToActive.php" method="POST">
                                        <input type="submit" class="btn btn-success" value = "Activate" />
                                        <input type="hidden" value="<?= $u->id ?>" name= "id" />
                                    </form>
                                    <?php else: ?>
                                        <form action="php/setToInactive.php" method="POST">
                                        <input type="submit" class="btn btn-danger" value = "Deactivate" />
                                        <input type="hidden" value="<?= $u->id ?>" name= "id" />
                                    </form>
                                    <?php endif; ?>

                                </td>
                                
                                <td>
                                    
                                    <button class="removeItem btn removeBtn" data-id="<?= $u -> id?>" type="submit"> <i class="fa-solid fa-x "></i> </button>

                                </td>


                                <td>
                                    
                                    <a class="removeItem btn btn-info text-white" href = "admin-view-history.php?id=<?= $u -> id?>">View History </a>

                                </td>
                            </tr>

                                <?php endforeach; ?>

                                   <tr>
                                    <td id="delMsg" class = "text-danger"></td>
                                   </tr>     
						
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

   <!-- <button class = "btn btn-success"> Add user</button> -->
   <div class = "container">
    <div class="row">
        <h3>Add user</h3>
    </div>
   </div>
   <div class="container">
    <div class="row">



    <table class="table" id="cartItemsHolder">
				  	<thead>
						<tr>
							<th scope="col">Name</th>
                            <th scope="col">Lastname</th>
							<th scope="col">email</th>
							<th scope="col">Adress</th>		
                            <th scope="col">Password</th>
					
						</tr>
					</thead>
                    <tbody>
                        




                            <tr>
                                <td>
                                    <div class="media-body">
                                        <input type="text" id = "name" value="" name="name" placeholder="UserName" class = "form-control"/>
                                        <span id = "nameError"></span>
                                    </div>
                                
                                </td>
                                <td>
                                    <div class="media-body">
                                        <input type="text" id = "lastname" value="" name="lastname" placeholder="lastname" class = "form-control"/>
                                        <span id = "lastnameError"></span>
                                    </div>
                                
                                </td>
                                <td>
                                    <div class="media-body">
                                        <input type="email" id = "email" value="" name="email" placeholder="email" class = "form-control"/>
                                        <span id = "emailError"></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <input type="text" id="adress" value="" name="adress" placeholder="Adress" class = "form-control"/>
                                        <span id = "adressError"></span>
                                    </div>  
                                </td>
                                <td>
                                    <div class="media-body">
                                        <input type="password" id="password" value="" name="password" placeholder="Password" class = "form-control"/>
                                        <span id = "passwordError"></span>
                                    </div>
                                </td>
                                
                                <td>
                                    <button id = "addUserBtn" class = "btn-success btn">Add User</button>
                                </td>



                            </tr>

                                
                                    <tr>

                                        <td  id="regMsg" class= "text-center"></td>
                                    </tr>

						
                    </tbody>
                  </table>

    </div>
   </div>

   <div class = "container">
    <div class="row">
        <h3>Contacts</h3>
    </div>
   </div>

    <?php 
    
    $contacts = getContacts();
    if($contacts):
    foreach ($contacts as $c):

        $user = getUser($c -> user_id);
    ?>

   <div class="container">
    <div class="row">
        <h4> <?= $user -> name ?>  <?= $user -> lastname ?>  <?= $user -> email ?></h4>
    </div>
    <div class="row" style="width: 50%;">
        <h5><?= $c -> subject ?></h5>
    </div>
    <div class="row d-flex flex-wrap text-wrap" style="width: 50%;">
        <p><?= $c -> message ?></p>
    </div>
   </div>

   <?php endforeach;?>
   <?php else: ?>

    <div class="row">
        <h4>Currently There Are No Contacts</h4>
    </div>

    <?php endif; ?>

 <!-- ================ Subscribe section start ================= --> 
 <?php require_once("php/subscribe.php"); ?>
    <!-- ================ Subscribe section end ================= --> 
 



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