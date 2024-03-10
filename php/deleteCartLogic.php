<?php
session_start();
include("logic.php");
require_once("conn.php");

$cartId = getCartId($_SESSION["user"] -> id);
$res = deleteCart($cartId -> id);
if($res){
    header("Location: ". $_SERVER["HTTP_REFERER"]);
}
else{
    header("Location: 404.php");
}

?>