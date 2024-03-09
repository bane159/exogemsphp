<?php




?>


<section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center d-flex justify-content-center flex-column">
          <h3 class="subscribe__title">Get Updates From Us</h3>
          <p>Subscribe to see our newest product info!</p>
          <div id="mc_embed_signup d-flex justify-content-center">
     
              
              <?php 
                
                // var_dump(isSubed($_SESSION["user"] -> id));
                if(isLogged() && !isSubed($_SESSION["user"] -> id)):

              ?>

                <?php if(wasSubbed($_SESSION["user"] -> id) && didAdminChangeSub($_SESSION["user"] -> id)): //was subbed but admin unsubed him so he cannot sub back in! (he blocked this user from subbing) 
                ?> 
                  <p class = "text-danger">Admin Has blocked you.</p> 
                  <?php  else:?>

              <form action="php/subscribeLogic.php" method = "POST">

                <button class="btn btn-primary mr-auto mb-1" id="btn-subscribe" type = "submit">Subscribe Now</button>
                <input type="hidden" value="<?=$_SESSION["user"] -> id ?>" name="user_id"/>
                
              </form>

              <?php endif; ?>
              
              <?php 
                
                if(wasSubbed($_SESSION["user"] -> id) && !didAdminChangeSub($_SESSION["user"] -> id)): // was subbed but admin did not change it!

              ?>

              <?php 
                $subbedDate = getChangedSubbedDate($_SESSION["user"] -> id);
                if($subbedDate){
                  $formattedDate = date("Y-m-d H:i:s", strtotime($subbedDate->updated_at));
                }
              ?>
          
                <p>You unsubscribed at: <span class = "text-success"><?= $formattedDate ?></span> </p>  
                

              <?php endif; ?>






                
              <?php elseif(isLogged() && isSubed($_SESSION["user"] -> id)): ?>

                <form action="php/unsubscribeLogic.php" method = "POST">

                  <button class="btn btn-primary mr-auto mb-1" id="btn-unsubscribe" type = "submit">Unsubscribe</button>
                  <input type="hidden" value="<?=$_SESSION["user"] -> id ?>" name="user_id" />

                </form>
                  <?php
                    if(wasSubbed($_SESSION["user"] -> id)): // ja nemam pojma kojom tehnikom je ovde wasSubbed a ne !!!!wasSubbed ali ajde ako je tako bog propisao da mora onda mora znaci ako je bio ulogovan onda mu prikazi od kad se prvi put subovo ali ovo ne prikaze ovo ispod sto treba ako je bio subovan nego prikaze ovo iz else bloka dole a nije mogao ni da dodje do dole ako nije bio subovan na prvom mestu???? minus sat vremena moga zivota bolje da sam igrao kanter.
                  ?>
                    <?php 
                      $subbedDate = getSubbedDate($_SESSION["user"] -> id);
                      if($subbedDate){
                        $formattedDate = date("Y-m-d H:i:s", strtotime($subbedDate->created_at));
                      }
                    ?>
              
                    <p>Subbed since <span class = "text-success"><?= $formattedDate ?></span> </p>



                  <?php elseif(!wasSubbed($_SESSION["user"] -> id)): ?>
                    <?php
                      $subbedDate = getChangedSubbedDate($_SESSION["user"] -> id);
                      if($subbedDate){
                        $formattedDate = date("Y-m-d H:i:s", strtotime($subbedDate->updated_at));
                      }
                    ?>
          
                <p>You subscribed at: <span class = "text-success"><?= $formattedDate ?></span> </p>

                  <?php endif; ?>





                  
              <?php elseif(!isLogged()): ?>





                <a href="login.php" class = "btn btn-info">Login To Subscribe</a>


              <?php endif; ?>

              
              <?php if(isAdmin()): ?>

                <a href="admin-subscribe-edit.php" class = "btn btn-info">Edit Subsribed members.</a>
              <?php endif; ?>
              <!-- <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="email" id="email-subscribe" placeholder="Enter your email"  />
              <div class="info"> <span id="email-subscribe-error"></span></div>
              </div> -->

          </div>
          
        </div>
      </div>
</section>