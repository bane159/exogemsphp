<?php
session_start();
header("Content-Type: application/json");
require_once("conn.php");
include("logic.php");

$nameRegEx = "/^[A-Z][a-z]{2,10}$/";
$lastnameRegEx = "/^[A-Z][a-z]{2,15}$/";
$numberRegEx = "/^[0-9]{8,14}$/";
$stateRegex = "/^[A-Z][a-z]{2,}$/";
$cityRegex = "/^[A-Za-z -]+$/";
$zipRegex = "/^[0-9]{5,6}$/";
$streetRegex = "/^[A-Za-z0-9 ,.-]+$/";

$jsonData = json_decode(file_get_contents("php://input"), true);

$name = $jsonData["name"];
$lastname = $jsonData["lastname"];
$number = $jsonData["number"];
$state = $jsonData["state"];
$zip = $jsonData["zip"];
$city = $jsonData["city"];
$street =$jsonData["street"];
$tos = $jsonData["tos"];
$message = $jsonData["message"];


$error = 0;

$error += checkReg($name, $nameRegEx);
$error += checkReg($lastname, $lastnameRegEx);
$error += checkReg($number, $numberRegEx);
$error += checkReg($state, $stateRegex);
$error += checkReg($city, $cityRegex);
$error += checkReg($street, $streetRegex);
$error += checkReg($zip, $zipRegex);
if($tos === false) $error ++; //moram da proverim ovako zato sto korisnik moze da posledi sta god hoce i potencijalno moze da prodje da nije stiklirao tos ako ne poredim sa === false
// var_dump( $error );
if($error == 0) {
    $userId = $_SESSION['user'] -> id;
    $cartId = getCartId($userId) -> id;

    $orderId = createOrder($cartId, 9999, $name, $lastname, $street,$city,$state,$zip,$message);

    $res = orderFromCart($userId);

    if($res){
        echo json_encode( array('msg'=> "confirmation.php?id=$orderId"));
        http_response_code(200);
        //send EMAIL HERE IF U WANT TO!

    }
    else {
        echo json_encode( array('msg'=> "an aerror has accurred"));
        http_response_code(500);
    }

}
else{
    http_response_code(500);
}