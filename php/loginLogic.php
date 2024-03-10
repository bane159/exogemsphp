<?php
session_start();
header("Content-Type: application/json");
require_once("conn.php");
include("logic.php");
$email = $_POST["email"];
$password = $_POST["password"];

$regEmail = "/^[a-z]+([\.]?[a-z]*[\d]*)*\@[a-z]+([\.]?[a-z]+)*(\.[a-z]{2,3})+$/";
$regPass = "/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";


$error = 0;
$error += checkReg($password,$regPass);
$error += checkReg($email,$regEmail);

if(isPost()) {
    if($error != 0){
        http_response_code(401);
    }


    if(checkEmailAndPass($email,$password)){

        $_SESSION["user"] = getFullUser($email, $password);

        $cart = getCart($_SESSION["user"] -> id);
        if(!$cart){
            createCart($_SESSION["user"] -> id);
            http_response_code(201);
        }
        else{
            http_response_code(400);
        }


        echo json_encode(array("status"=> "200","message"=> "You have successfully logged in", "user" => $_SESSION["user"]));
        http_response_code(202); //Logged in

    }
    else{

        http_response_code(406); //Account doesnt exist
    }

}
else {

   header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"); //Unexpected error (not post)

}


