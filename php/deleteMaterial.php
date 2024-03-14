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
$id = post("id");

if(empty($id)){
    exit;
}

$res = removeMaterial($id);
var_dump($res);
if($res){
    ob_end_clean();
    header("Location: ../admin.php");
}
else
{
    ob_end_clean();
    header("Location: 404.php");
}
