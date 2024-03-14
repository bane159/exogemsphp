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


  <section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shop Category</h1>
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

  <div class = "container my-5">
    <div class="row">
        <h3>Add a category</h3>
    </div>
   </div>
    <div class="container">

        <div class="row" style = "width: 50%;">

            <label for = "categoryInput">Insert Category Name</label>

            <input type="text" value="" class="form-control" id = "categoryInput"/>
        
            <input type="button" value = "Add!" class = "btn btn-success my-3" id = "editCat"/> 

        </div>
        <span id = "categoryError"> </span>
    </div>

    <div class = "container my-5">
    <div class="row">
        <h3>Add a category</h3>
    </div>
   </div>
    <div class="container">

        <div class="row" style = "width: 50%;">
          <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Delete</th>
                  
              </tr>
              </thead>
              <tbody>
                <?php 
                  $cats = getCats();
                  foreach($cats as $cat):
                ?>
                <tr>
                  <td> <?= $cat -> name ?></td>
                  <td>

                    <form action="php/deleteCategory.php" method="POST">

                      <button class = "btn btn-danger">Delete</button> 
                      <input type="hidden" name="id" id="id" value = "<?= $cat -> id ?>"/>

                    
                     </form>
                  </td>
                  
                </tr>

                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>


      <div class = "container my-5">
    <div class="row">
        <h3>Edit a category</h3>
    </div>
   </div>
        
   
        <div class="container">
          <div class="row">
            <form action="php/editCategory.php" method = "POST">
                <select name="categoryId" id="categorySlct" class = "form-control" >
                  <?php
                    $cats = getCats();
                    foreach($cats as $cat):
                  ?>
                      <option value="<?= $cat -> id ?>"><?= $cat -> name ?></option>

                  <?php endforeach?>
                </select>
                <div>
                  <label for="editCat"> Edit name for the selected category</label>
                </div>
          </div>
          <div class="row">
            <input type="text" placeholder="Edit the name" value = "" id = "editCat" name = "name"/>
            <input type="submit" class="btn btn-info" value="Edit!"/>

          </div>
            </form>
          </div>
                  
          
        </div>







  <?php include "php/footer.php"?>
</body>

<script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>
<script src="js/edit-category.js"></script>
</html>