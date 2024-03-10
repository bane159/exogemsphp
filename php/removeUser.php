<?php
header("Content-Type: application/json");
include("logic.php");
require_once("conn.php");

$id = post("id");
var_dump(is_numeric($id));
if(is_numeric($id) && $id > 0) {

    $succ = deleteUser($id);
    if($succ){
        echo json_encode(array("message"=> "Uspesno Obrisan user sa id = $id"));
        http_response_code(205);
    }
    else {  
        http_response_code(406);
    }

}
else {
    header("Location: 404.php");
}

