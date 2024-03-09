<?php 
require_once("conn.php");
include("logic.php");

$userId = $_POST["user_id"];
if(!is_numeric($userId) || $userId < 1) {
    header("Location: ../404.php");
}

if(wasSubbed($userId)) {

    $successfull = reSubscribeUser($userId);

    if($successfull) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        
    }
    else {
        header('Location: ../404.php');
    }

}
else{




    $successfull = subscribeUser($userId);

    if($successfull) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        
    }
    else {
        header('Location: ../404.php');
    }

}
