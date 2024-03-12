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
    <!--================ Start Header Menu Area =================-->
  <!-- <div id="spinner-holder">
    <div id="spinner"><i class="fa-solid fa-spinner br-icon"></i></div>
  </div> -->
  
	<?php include("php/header.php"); ?>
	<!--================ End Header Menu Area =================-->



    <div class="container-fluid d-flex py-4 justify-content-evenly flex-wrap align-items-center">
        <div class="col-12 col-xl-6 br-da" >
            <img src="img/non-template/author.png" class = "img-fluid" alt="ja" />
        </div>
        <div class="col-12 col-xl-6 p-5 d-flex flex-column justify-content-evenly">
            <h2>Branislav Radovanovic 31/22</h2>
            <p class="my-3">I'm Branislav Radovanovic, a versatile software engineer with a passion for web and game development. I'm currently studying ICT at college, and I'm excited to pursue a career in programming. Apart from programming, I have a rich sports background. I played volleyball for 14 years, and I was a part of the junior team that was in the top 8 in the country. Later on, I played with seniors and achieved 1st place in the Serbian league. This experience taught me the importance of teamwork, communication, and hard work, skills that I apply to my programming projects.</p>
            <p>
                I'm

            constantly exploring new technologies and programming languages, and I enjoy creating websites and games that are both functional and visually appealing. My skills include HTML, CSS, JavaScript, React, Node.js, and more. I always strive to improve my skills and keep up with the latest industry trends. In the future, I hope to work on exciting projects that challenge me and allow me to grow as a developer. I believe that with my strong work ethic, dedication, and technical skills, I can make a valuable contribution to any team or project.
            </p>
        </div>
    </div>


 <!-- ================ Subscribe section start ================= --> 
 <?php require_once("php/subscribe.php"); ?>
    <!-- ================ Subscribe section end ================= --> 

    <!--================ Start footer Area  =================-->	
	<?php include("php/footer.php");?>
	<!--================ End footer Area  =================-->


  <script src="https://kit.fontawesome.com/b982b959fc.js" crossorigin="anonymous"></script>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>

  <script src="vendors/jquery.ajaxchimp.min.js"></script>

  <script src="js/index.js"></script>

  <script src="js/main.js"></script>
  
</body>
</html>