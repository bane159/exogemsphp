<?php
session_start();
include("logic.php");
require_once("conn.php");
$prodId = post("product_id");
if(!is_numeric($prodId) || $prodId < 0 ){
    header("Location: 404.php");
}
$cartId = getCartId($_SESSION["user"] -> id);
$res = deleteProdCart($cartId -> id, $prodId);
if($res){
    header("Location: ". $_SERVER["HTTP_REFERER"]);
}
else{
    header("Location: 404.php");
}

?>