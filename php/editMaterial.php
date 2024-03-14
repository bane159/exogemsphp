
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
$id = post("materialId");
$name = post("name");



if(empty($id) || !is_numeric($id)){
    exit;
}
if(empty($name)){
    exit;
}

$res = editMaterial($id ,$name);
var_dump($res);
if($res){
    ob_end_clean();
    header("Location: ../admin-edit-material.php");
}
else
{
    ob_end_clean();
    header("Location: 404.php");
}
