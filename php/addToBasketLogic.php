<?php
session_start();
header("Content-Type: application/json");
include("logic.php");
require_once("conn.php");

$prodId = post("product_id");

$userId = $_SESSION["user"] -> id;

if(!is_numeric($prodId) || $prodId < 0){
    http_response_code(401);
}
if(!is_numeric($userId) || $userId < 0){
    http_response_code(401);
}

$id = getCartId($userId);

if(alreadyInCart($id -> id, $prodId)){
    updateQtty($id -> id, $prodId);
    http_response_code(208);
}
else{

    $res = addToCart($id -> id, $prodId);
    // var_dump($res);
    if($res){
        $arr = ["msg" => "Added To Cart"];
        echo json_encode($arr);
        http_response_code(200);
        exit;
        
    }
    else{
        http_response_code(500);
    }
}
    
?>