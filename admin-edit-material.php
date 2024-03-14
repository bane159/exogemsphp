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
   <?php include "php/head.php"?>
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
					<h1>Material</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Material</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>

  <div class = "container my-5">
    <div class="row">
        <h3>Add a material</h3>
    </div>
   </div>
    <div class="container">

        <div class="row" style = "width: 50%;">

            <label for = "materialInput">Insert Material Name</label>

            <input type="text" value="" class="form-control" id = "materialInput"/>
        
            <input type="button" value = "Add!" class = "btn btn-success my-3" id = "editCat"/> 

        </div>
        <span id = "materialError"> </span>
    </div>

    <div class = "container my-5">
    <div class="row">
        <h3>Delete the material</h3>
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
                  $mats = getMaterials();
                  foreach($mats as $mat):
                ?>
                <tr>
                  <td> <?= $mat -> name ?></td>
                  <td>

                    <form action="php/deleteMaterial.php" method="POST">

                      <button class = "btn btn-danger">Delete</button> 
                      <input type="hidden" name="id" id="id" value = "<?= $mat -> id ?>"/>

                    
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
        <h3>Edit a Material</h3>
    </div>
   </div>
        
   
        <div class="container">
            <div class="row">
                <form action="php/editMaterial.php" method = "POST">
                    <select name="materialId" id="materialSlct" class = "form-control" >
                    <?php
                        $mats = getMaterials();
                        foreach($mats as $mat):
                    ?>
                        <option value="<?= $mat -> id ?>"><?= $mat -> name ?></option>

                    <?php endforeach?>
                    </select>
                    <div>
                    <label for="editCat"> Edit name for the selected category</label>
                    </div>
            </div>
            <div class="row">
                
                <input type="text" placeholder="Edit the name" value = "" id = "editMat" name = "name"/>
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
<script src="js/edit-material.js"></script>
</html>