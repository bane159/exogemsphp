<?php
session_start();
header("Content-type: application/json");
include("logic.php");
// var_dump(!isAdmin());
if(!isAdmin()){
    
    header("Location: 404.php");
    exit();
}

require_once("conn.php");

// $cat = post("category");
$jsonData = json_decode(file_get_contents("php://input"), true);

$cat = $jsonData["category"];

if(empty($cat)){
    exit;
}

$res = addCategory($cat);
if($res){
    echo json_encode(array("msg"=> "Successfully added the category"));
}
else
{
    echo json_encode(array("msg"=> "Please Try again later or contact system owner"));
}
