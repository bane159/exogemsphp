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
							<p>Activate your account via email.(if u didnt see the email contact admin) OR</p>
							<a class="btn btn-primary" href="contact.php">Contact administrator to activate your account.</a>
						
					</div>
				</div>
    </div>
    <?php  exit; endif;