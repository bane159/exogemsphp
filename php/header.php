<?php
if(isset($_SESSION["user"])){
  $user = $_SESSION["user"];
}
$header = getHeader();

?>
<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              
              <?php 
                foreach($header as $item):
                
                  if($item -> name == "Home" || $item -> name == "Shop" || $item -> name == "Contact" || $item -> name == "About"): //Proveri kada udje u shop da li je ulogovan ako nije ulogovan onda mu izbaci poruku da treba da se uloguje
              ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $item -> path?>"><?= $item -> name ?></a></li>
                  <?php 
                  endif; ?>
                  <?php if($item -> name == "Admin" && isset($_SESSION["user"]) && $_SESSION["user"] -> roleName == "admin"): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $item -> path?>"><?= $item -> name ?></a></li>

                  <?php 
                    endif; 
                  endforeach; 
                  ?>
                    
                   
                  
            </ul>

            <ul class="nav-shop d-flex justify-content-evenly my-3 align-items-center">
                <?php
                  foreach($header as $item):
                    if(!isLogged()):
                      if($item -> name =="Log In"):
                ?>
                  <li class='nav-item'><a class='button button-header border-5' href="<?= $item -> path?>"><?= $item -> name ?></a></li>
                  <?php endif; ?>
                  <?php if($item -> name =="Register"): ?>
                    <li class='nav-item'><a class='button button-header' href="<?= $item -> path?>"><?= $item -> name ?></a></li>
                  <?php endif; ?>
                <?php  endif; 
                    if(isLogged() && $item -> name == "Log Out"):
                ?>
                  <li class='nav-item'><a class='button button-header' href="<?= $item -> path?>"><?= $item -> name ?></a></li>
                  <?php endif;
                 endforeach;?>
                 
                <?php if(isLogged()):?>
                  <li class='nav-item'>Logged in as: <b><?=$_SESSION['user']-> name?> <?=$_SESSION['user']-> lastname?></b></li>

                <?php endif?>
              
              <li class="nav-item">
                <button id="cartButton"> 
                  <a href="cart.php">
                    <i class="ti-shopping-cart"></i>
                    <span class="nav-shop__circle" id="cartNumberOfProducts">  
                      <?php 
                        if( isLogged() && !hasActiveCart($_SESSION['user'] -> id)){
                          createCart($_SESSION['user'] -> id);
                        }
                      if(isLogged()){

                                $cart = getCartItems(getCartId($_SESSION['user'] -> id) -> id);
                                //  var_dump($cart);
                                $i = 0;
                                foreach($cart as $item){
                                    $i++;
                                }
                                echo $i;
                              }
                    
                    ?> </span>
                  </a> 
                </button>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>