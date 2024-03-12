<?php

include("php/logic.php");
$uid = get("id");
$key = get("key");

if(!is_numeric($uid) || $uid <= 0 || !is_numeric($key) || $key <= 0){
    header("Location: 404.php");
    exit;
}
include("php/conn.php");
try {
    activateUser2($uid, $key);
    header("Location: index.php?confirm=1");
}
 catch (PDOException $e) {
    header("Location: 404.php");
}