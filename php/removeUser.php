<?php
header("Content-Type: application/json");
include("logic.php");
require_once("conn.php");

// $id = post("id");
$jsonData = json_decode(file_get_contents("php://input"), true);

$id = $jsonData["id"];
// var_dump($id);
// var_dump(is_numeric($id));
if(is_numeric($id) && $id > 0) {
    $user = getUser($id);
    $succ = deleteUser($id);

    
    if($succ){
        echo json_encode(array("message"=> "Uspesno Obrisan user sa id = $id  -> ". $user-> name ." ". $user->lastname ." "));
        // http_response_code(205);
    }
    else {  
        http_response_code(406);
    }

}
else {
    header("Location: 404.php");
}

