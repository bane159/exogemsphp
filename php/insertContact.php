<?php
session_start();
include("logic.php");


$jsonData = json_decode(file_get_contents("php://input"), true);

$subject = $jsonData["subject"];
$message = $jsonData["message"];


if(empty($subject) || empty($message)) {
    // header("Location: 404.php");
    echo json_encode(array('msg'=> 'Please fillout all fields'));
    exit;
}

require_once("conn.php");
$uid = $_SESSION['user'] -> id;
$res = insertContact($subject, $message, $uid);
if($res) {

    echo json_encode(array('msg'=> ' Successfully contacted admins, please be patiant'));
}
else {
    echo json_encode(array('msg'=> 'There seems to be an error. Try again later.'));
}