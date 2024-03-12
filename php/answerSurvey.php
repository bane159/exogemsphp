<?php
session_start();
include("logic.php");
require_once("conn.php");
$userId = $_SESSION["user"] -> id;
$jsonData = json_decode(file_get_contents("php://input"), true);
$first = $jsonData["first"];
// $second = $jsonData["second"];

if(!is_numeric($first) || $first < 0) {
    header("Location: ../404.php");
}



if(!didAnswer($userId)){
    answerSurvey($userId, $first);
    echo json_encode(array("msg" => "Successfully answered"));
}
else {
    echo json_encode(array("msg" => "U already answered to the survey!"));
}



