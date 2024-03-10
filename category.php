<?php
session_start();
require_once("php/conn.php");
include("php/logic.php");

$sorts = [
  1 => "p.unitsSold DESC",
  2 => "pri.price ASC",
  3 => "pri.price DESC",
  4 => "p.created_at DESC"
];

$sortsFront = [
  1 => "Sort by . . .",
  2 => "Price Ascending",
  3 => "Price Descending",
  4 => "Newest"
];


$keyword = get("keyword");
$page = get("page");
$perPage = get("perPage");
$sortBy = get("sortBy");
$categoryId = get("categoryId");
$materialId = get("materialId");




if(!$page || !is_numeric($page)) {
    $page = 1;
}

if(!$perPage || !is_numeric($page)) {
    $perPage = 6;
}

if(!is_numeric($sortBy)) {
    $sortBy = 1;
} else {
    if($sortBy < 1 || $sortBy > 4) {
        $sortBy = 1;
    }
}


//slika cena text ime 
$query = "SELECT p.id as id, mp.material_id as materialId, p.name as name, cat.name as category, pic.path as imgSrc, p.text as text, pri.price as price, p.unitsSold as unitsSold, p.category_id as catId  FROM products p JOIN pictures pic ON p.picture_id = pic.id JOIN category as cat ON p.category_id = cat.id JOIN prices pri ON pri.product_id = p.id JOIN materials_products mp ON mp.product_id = p.id ";

$where = " WHERE 1 = 1 ";

if($keyword) {
  $where .= "AND p.name like '%" . $keyword . "%' OR cat.name like '%" . $keyword . "%'";
  
  // $where .= " OR cat.name like '%" . $keyword . "%')";
}

if($categoryId && is_numeric($categoryId)) {
  $where .= " AND p.category_id = " . $categoryId;
}
if($materialId && is_numeric($materialId)) {
  $where .= " AND mp.material_id = " . $materialId;

}
$countQ = "SELECT Count(*) as ProductCount FROM products p JOIN pictures pic ON p.picture_id = pic.id JOIN category as cat ON p.category_id = cat.id JOIN prices pri ON pri.product_id = p.id JOIN materials_products mp ON mp.product_id = p.id " . $where;

$order = " ORDER BY ". $sorts[$sortBy];


$query .= $where;





$query .= $order;

$query .= " LIMIT " . $perPage;

//Računanje pomeraja
//Strana 1 Po strani 10 -> 0
//Strana 2 Po strani 10 -> 10
//Strana 3 Po strani 10 -> 20
//Strana 9 po strani 10 -> 80

$offset = ($page - 1) * $perPage;

$query .= " OFFSET " . $offset;

// var_dump($query);

// var_dump($countQ);

$countResult = $conn->query($countQ)->fetch();
$products = $conn->query($query)->fetchAll();

//Broj proizvoda u bazi koji odgovaraju kriterijumu
//Na osnovu tog broja i broja proizvoda po strani dolazimo do 
    //-> broja stranica
$countResult->ProductCount;

$pages = ceil($countResult->ProductCount / $perPage);

// var_dump(count($products));

// var_dump($countResult);




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Category</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">


  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="br-modal" id="br-appear-modal">
    <p>Added To Cart!</p>
  </div>

  <!-- <div id="spinner-holder">
    <div id="spinner"><i class="fa-solid fa-spinner br-icon"></i></div>
  </div> -->
 
  <!--================ Start Header Menu Area =================-->
  <?php if(!isLogged()):?>
    <div class="d-flex justify-content-center br-restrict-withoutlog">
        <div class="col-lg-6">
					<div class="">
						
							<h4>You cannot access shop without logging in first!</h4>
							<p>Make sure to loging if you already have an account with us or register if you are new!</p>
							<a class="btn btn-primary" href="login.php">Login</a>
              <a class="btn btn-info" href="register.php">Register Now</a>
						
					</div>
				</div>
    </div>
    <?php
      exit;
    elseif(isInactive()): ?>
      <div class="d-flex justify-content-center br-restrict-withoutlog">
        <div class="col-lg-6">
					<div class="">
						
							<h4>You cannot access shop without activating your account!</h4>
							<p>Contant administrator to activate your profile. OR</p>
							<a class="btn btn-primary" href="login.php">Login with an activarted account aaaaaaaa</a>
						
					</div>
				</div>
    </div>
    <?php  exit; endif;
      
    ?>
	<?php include("php/header.php"); ?>
	<!--================ End Header Menu Area =================-->


 


	<!-- ================ start banner area ================= -->	
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
	<!-- ================ end banner area ================= -->


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                
                  <ul>

                    <li class="filter-list"><input class="pixel-radio" type="radio" id="category-all" name="category" value="0"/>
                      <label for="category-all">All Categories
                        <!-- <span id="category-numberOfProd-span"></span> -->
                      </label>
                    </li>

                      <?php 
                        $categories = getCategories();
                        $checked = '';
                        foreach($categories as $cat):
                          
                          if(get("categoryId") == $cat->id){
                            $checked = "checked = 'checked'";
                          }
                          else{
                            $checked = "";
                          }
                          
                      ?>
                      
                    <li class="filter-list"><input class="pixel-radio" <?=$checked?> type="radio" id="category-<?=$cat->id ?>" name="category" value="<?=$cat->id ?>"/>
                      <label for="category-<?=$cat->id ?>"><?=ucfirst($cat -> name) ?>
                        <!-- <span id="category-numberOfProd-span"></span> -->
                      </label>
                    </li>

                    <?php endforeach;?>

                  </ul>
                
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">Product Materials</div>
            <div class="common-filter">
              <div class="head">Material</div>
             
                <ul>

                    <li class="filter-list">
                      <input class="pixel-radio" type="radio" id="material-all" name="material" value="0"/>
                      <label for="material-all">All Materials
                        <!-- <span id="material"> </span> -->
                      </label>
                    </li>


                <?php 
                      $materials = getMaterials();
                      foreach($materials as $mat):
                        $checked = "";
                        if(get("materialId") == $mat->id){
                          $checked = "checked = 'checked'";
                        }
                        else{
                          $checked = "";
                        }
                    ?>
                    <li class="filter-list">
                      <input class="pixel-radio" <?= $checked?> type="radio" id="material-<?= $mat -> id  ?>" name="material" value="<?= $mat -> id  ?>"/>
                      <label for="material-<?= $mat -> id  ?>"><?= ucfirst($mat -> name)  ?> 
                        <!-- <span id="material"> </span> -->
                      </label>
                    </li>
                    

                    <?php endforeach; ?>


                </ul>
    
            </div>
            
          </div>
          <div class = "d-flex justify-content-center">
            <button class = "btn btn-primary" id = "initSearch"> Search!</button>
          </div>
        </div>





        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->


          <div class="filter-bar d-flex flex-column flex-md-row align-items-center justify-content-between p-2">

            <div class="container d-flex flex-wrap align-items-center">

              
              <div class="mx-2 bg-light-subtle">
                <select class="br-filter" aria-label="Default select example" name="sort" id="sortCriterium">
                  <?php foreach($sorts as $key => $sort):
                    $selected = "";
                    if(get("sortBy") == $key){
                      $selected = "selected";
                    }
                    else{
                      $selected = "";
                    }
                    
                  ?>

                  <option value="<?=$key ?>" <?= $selected ?>><?=$sortsFront[$key] ?></option>
                  

                  <?php endforeach;?>
                </select>
              </div>
              <div class=" mr-auto"> 
                <?php
                  // if(get("sortBy")){

                  // }   
                  
                  
                ?>
                <select class="form-select p-2 br-filter" aria-label="Default select example" id = "perPage">
                <option value="6">Per Page . .</option>
                    <?php
                      $selected = "";
                      for($i = 6; $i < 18; $i += 3):
                        if(get("perPage") == $i){
                          $selected = "selected";
                        }
                        else{
                          $selected = "";
                        }
                    ?>

                  <option value="<?=$i ?>" <?= $selected ?> >  <?= $i ?></option>

                    <?php 
                      endfor;
                    ?>
                  
                </select>
              </div>
              <div>
                <div class="input-group filter-bar-search">
                  <input type="text" placeholder="Search . . ." id="searchBar"/>
                  <div class="input-group-append">
                    <button type="button" id="initSeatchBtn"><i class="ti-search"></i></button>
                  </div>
                </div>
              </div>

              
            </div>
            <!--Ovde idu ikonice za redosled-->
            <!-- <div class="my-3 my-md-0">
                BUTTON IKONICE
            </div> -->

        </div>
        
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->

          
          <section class="lattest-product-area pb-40 category-list ">
            <div class="row " id="shop-products">
          <?php 
            foreach($products as $p):
          ?>

            
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="<?= $p -> imgSrc ?>" alt="<?= $p -> imgSrc ?>">
                    <ul class="card-product__imgOverlay">
                      <li><button class = "addToCard" data-id="<?=$p -> id ?>"><i class="ti-shopping-cart"></i></button></li>
                      <!-- <li><button><i class="ti-heart"></i></button></li> -->
                    </ul>
                  </div>
                  <div class="card-body">
                    <p><?=  ucfirst($p -> category)?></p>
                    <h4 class="card-product__title"><a href="#"><?= $p -> text?></a></h4>
                    <!-- <del class = "card-product__price br-sm-text">999</del> -->
                    <p class="card-product__price">$<?= $p->price ?></p>
                  </div>
                </div>
              </div>  
            
              <?php endforeach;?>
              </div>

              <?php 
                    $qs = "?p=1";
                    if(get("categoryId")) {
                        $qs .= "&categoryId=" . get("categoryId");
                    }
                    if(get("materialId")) {
                      $qs .= "&materialId=" . get("materialId");
                  }

                    if(get("keyword")) {
                        $qs .= "&keyword=" . get("keyword");
                    }

                    if(get("perPage")) {
                        $qs .= "&perPage=" . get("perPage");
                    }

                    if(get("sortBy")) {
                        $qs .= "&sortBy=" . get("sortBy");
                    }
                    
                ?>
                

                  <div class="row">
                    <?php for($i = 0; $i < $pages; $i++): ?>
                          <a class="btn btn-xs mx-1 <?= $i + 1 == get("page") ? "btn-primary": "btn-secondary" ?>" href="category.php<?= $qs . "&page=" . $i + 1 ?>"><?= $i + 1 ?></a>
                  <?php endfor ?>
                  </div>
            



          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
  <?php require_once("php/subscribe.php"); ?>
	<!-- ================ category section end ================= -->		  

			

	<!-- ================ Subscribe section start ================= -->		  
	<!-- ================ Subscribe section end ================= -->		  


  <?php include("php/footer.php"); ?>



  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  
  <script src="js/func.js"></script>
  
  <script src="js/shop.js"></script>

  <!-- <script src="js/main.js"></script> -->
</body>
</html>