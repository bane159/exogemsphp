<?php 
require_once("conn.php");
include("logic.php");

$userId = $_POST["user_id"];
if(!is_numeric($userId) || $userId < 1) {
    header("Location: ../404.php");
}
$successfull = blockUser($userId);

if($successfull) {

    ob_end_clean();
    header("Location: " . $_SERVER['HTTP_REFERER']);
    
}
else {
    // header('Location: ../404.php');
   // var_dump($successfull);
}

