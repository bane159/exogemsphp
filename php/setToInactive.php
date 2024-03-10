<?php
 include("logic.php");
 require_once("conn.php");

$id = post("id");
var_dump(is_numeric($id));
if(is_numeric($id) && $id > 0) {

    $succ = deactivateUser($id);
    if($succ){
        header("Location: ../admin.php");
    }
    else {  
        header("Location: 404.php");
    }

}
else {
    header("Location: 404.php");
}

