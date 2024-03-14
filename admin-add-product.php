<?php
session_start();
include("php/logic.php");
var_dump(!isAdmin());
if(!isAdmin()){

    header("Location: 404.php");
    exit();
}

require_once("php/conn.php");

var_dump("RELOADED");
if(isPost()){
    $regName = "/^[A-Z][a-z]{2,10}$/";
    var_dump("POSTT");

    $name = post("name");
    $text = post("text");
    $weight = post("weight");
    $available = post("available");
    $category = post("category");
    $price = post("price");
    $file = $_FILES["image"];
    $allowedMimeTypes = ["image/png", "image/jpg", "image/jpeg"];
    $fileType = $file["type"];
    $material = post("material");
    // var_dump(intval($material));
    $maxFileSize = 2500000;

    $er = 0;
    $er += checkReg($name, $regName);
    if($er > 0){
        // header("Location: 404.php");
        $errors['name'] = "Name is required";
        // exit();
    }
    if(empty($text)){
        $errors["text"] = "Text is a requied field";
       
    }
    if(empty($weight) ||   intval($weight) < 0){
        $errors["weight"] = "Weight has to be above 0 duh";
        
    }
    if(empty($available) || intval($available) < 0){
        $errors["available"] = "Availability is required";
       
    }
    if(empty($category) || intval($category) < 0){
        $errors["category"] = "You must choose a category";
        
    }
    if(empty($price) || intval($price) < 0){
        $errors["price"] = "Price must be inserted";
       
    }
    if(empty($material) || intval($material) < 0){
        $errors["material"] = "You must choose a material, u can add more materials to the product later.";
        
    }
    
    if(!isset($errors["text"]) || !isset($errors["weight"]) || !isset($errors["available"]) || !isset($errors["category"]) || !isset($errors["price"]) || !isset($errors["material"])){
       
    
        if(!in_array($fileType, $allowedMimeTypes)) {
            $errors["image"] = "File type not allowed.";
            
        } else if($file["size"] > $maxFileSize) {
            $errors["image"] = "File size exceeds maximum file size of 2.5mb";
           
        } else{

           
            $extension = pathinfo($file["name"], PATHINFO_EXTENSION);

            $fileName = uniqid() . "_" . time() . "." . $extension;
            if(move_uploaded_file($file["tmp_name"], "img/non-template/product-images/" . $fileName)) {
                //update kolone u bazi (unlink funkcija za brisanje fajla)
                
                $path = "img/non-template/product-images/". $fileName;

                $res = addNewProduct($name, $text, $weight, $available, $category, $price, $path, $material);
                    
               

                if($res) {
                    //header("Location: category.php"); //Header already modified jedino resenje je da refaktorisem ceo ovaj kod -> nemam vremena za to
                    $success['success'] = "Uspesno dodat proizvod";
                    
                } else {
                    unlink("img/non-template/product-images/" . $fileName);
                    $errors["global"] = "There was a server error contact the system owner.";
                }

            } else {
                $errors["images"] = "There was an error uploading file.";
            }


        }

    }
    else{
        //Ne valja unos podataka
    }
}










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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> Admin</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
    <div class="container">

    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">

        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name" id="name" />
        
        <?php if(isset( $errors["name"])):?>
            <div >
               <p class="text-danger"> <?= $errors['name'] ?> </p> 
            </div>
        <?php endif;?>

        <label for="text">Product Description</label>
        <input type="text" class="form-control" name="text" id="text" />
        
        <?php if(isset( $errors["text"])):?>
            <div >
               <p class="text-danger"> <?= $errors['text'] ?> </p> 
            </div>
        <?php endif;?>

        <label for="weight">Product Weight</label>
        <input type="number" class="form-control" name="weight" id="weight" />
        <?php if(isset( $errors["weight"])):?>
            <div >
               <p class="text-danger"> <?= $errors['weight'] ?> </p> 
            </div>
        <?php endif;?>


        <label for="available">Quantity Available</label>
        <input type="number" class="form-control" name="available" id="available" />

        <?php if(isset( $errors["available"])):?>
            <div >
               <p class="text-danger"> <?= $errors['available'] ?> </p> 
            </div>
        <?php endif;?>

        <label for="category">Choose Category</label>
        <select name="category" id="category" class = "form-control">
        <option value="choose"> Choose</option>
        <?php 
            $cats = getCats();
            foreach($cats as $cat):
        ?>
            <option value="<?=$cat -> id?>"> <?= $cat -> name?></option>

            <?php endforeach; ?>

        </select>
        <?php if(isset( $errors["category"])):?>
            <div >
               <p class="text-danger"> <?= $errors['category'] ?> </p> 
            </div>
        <?php endif;?>

        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" />

        <?php if(isset( $errors["price"])):?>
            <div >
               <p class="text-danger"> <?= $errors['price'] ?> </p> 
            </div>
        <?php endif;?>

        <p>Choose Materials</p>

        <select name="material" id = "material" class = "form-control">
        <option value="-50">Choose</option>
         <?php
            $mats = getMaterials();
            foreach($mats as $mat):
        ?>
        <option value="<?=$mat->id ?>"> <?=$mat -> name ?></option>

        <?php endforeach; ?>
        </select>

        <?php if(isset( $errors["material"])):?>
            <div >
               <p class="text-danger"> <?= $errors['material'] ?> </p> 
            </div>
        <?php endif;?>


        
        <div class="form-group">
            <label for="image"> Upload Image</label>
            <input class="form-control" type="file" name="image" />
        <?php if(isset( $errors["image"])):?>
            <p class = "text-danger"><?= $errors['image'] ?></p>
        <?php endif;?>
       

        </div>
            <input type="submit" value="Add Product" class = "btn btn-primary"/>
    </form>

    </div>
    <?php if(isset( $errors["global"])):?>
            <p class = "text-danger"><?= $errors['global'] ?></p>
    <?php endif;?>

    <?php if(isset($success['success'])):?>
            <p class = "text-success"><?= $success['success'] ?></p>
    <?php endif;?>


    
<?php include "php/footer.php"?>
</body>
</html>