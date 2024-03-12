<?php
session_start();
header("Content-Type: application/json");
include("logic.php");
require_once("conn.php");

$prodId = post("product_id");
// $jsonData = json_decode(file_get_contents("php://input"), true);

$userId = $_SESSION["user"] -> id;

if(!is_numeric($prodId) || $prodId < 0){
    http_response_code(401);
}
if(!is_numeric($userId) || $userId < 0){
    http_response_code(401);
}




if(hasActiveCart($_SESSION['user'] -> id)){

    $id = getCartId($userId);

    if(alreadyInCart($id -> id, $prodId)){
        updateQtty($id -> id, $prodId);
        http_response_code(208);
    }
    else{
    
        $res = addToCart($id -> id, $prodId);
        // var_dump($res);
        if($res){
            $cart = getCartItems(getCartId($_SESSION['user'] -> id) -> id);
                                //  var_dump($cart);
                                $i = 0;
                                foreach($cart as $item){
                                    $i++;
                                }
                                
                              
            $arr = ["msg" => "Added To Cart", "cartNumber" => "$i"];
            echo json_encode($arr);
            http_response_code(200);
            exit;
            
        }
        else{
            http_response_code(500);
        }
    }
        

}
else{
    createCart($_SESSION['user'] -> id);
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

}



?>