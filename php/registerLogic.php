<?php
session_start();
header("Content-Type: application/json");
require_once("conn.php");
include("logic.php");
// $email = post("email");
// $password = post("password");
// $name = post("name");
// $lastname = post("lastname");
    $regFirstName = "/^[A-Z][a-z]{2,10}$/";
    $regLastName = "/^[A-Z][a-z]{2,15}$/";
    $regEmail = "/^[a-z]+([\.]?[a-z]*[\d]*)*\@[a-z]+([\.]?[a-z]+)*(\.[a-z]{2,3})+$/";
    $regPass = "/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";

    

if(isPost()){

    try {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $adress = $_POST["adress"];

        $errors = 0;
        $errors += checkReg($email, $regEmail);
        $errors += checkReg($password, $regPass);
        $errors += checkReg($name, $regFirstName);
        $errors += checkReg($lastname, $regLastName);
        if($errors == 0){
            $passEnc = md5($password);
            if(mailExists($email)){
                http_response_code(401);
            }
            else{
                $res = addUser($name, $lastname, $email, $passEnc, $adress);
                if($res){
                    echo json_encode(array("succes"=> $res, "message" => "U have succesfully registered"));
                    http_response_code(201);
                }
                
            }
            

        }


    }
    catch(PDOException $exception){
        http_response_code(500);
    }


}   
else{
    header("location: https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley");
}