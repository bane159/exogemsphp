<?php
// require_once("conn.php");
function isPost() {
    return $_SERVER["REQUEST_METHOD"] == "POST";
}
function post($key) {
    if(!isset($_POST[$key])) {
        return null;
    }

    return $_POST[$key];
}
function get($key) {
    if(!isset($_GET[$key])) {
        return null;
    }
    return $_GET[$key];
}
function addUser($name, $lastname, $email, $password, $adress) {
    global $conn;
    $insertQ = "INSERT INTO users (name, lastname, email, password, adress, role_id) VALUES( :name, :lastname, :email, :password, :adress, 1 )";
        
        $stmt = $conn->prepare($insertQ);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":adress", $adress);
        $res = $stmt->execute();
        return $res;


}
function checkReg($key, $reg) {

    if(preg_match($reg, $key)) 
        return 0;
    else 
        return 1;
}
function mailExists($email) 
{
    global $conn;
    $query = "SELECT * FROM `users` WHERE email = :email ";
    $stmt = $conn->prepare( $query );
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $mail = $stmt->fetch();
    return $mail;
}
function checkEmailAndPass($email, $password){
    global $conn;
    $enc = md5($password);
    $query = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare( $query );
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $enc);
    $stmt->execute();
    return $stmt -> fetch(PDO::FETCH_OBJ);

}
function getFullUser($email, $password){
    global $conn;
    $enc = md5($password);
    $query = "SELECT u.id as id, u.name as name, u.lastname as lastname, u.email as email, u.adress as adress, r.name as roleName FROM users u INNER JOIN role r ON u.role_id = r.id WHERE email = :email AND password = :password";
    $stmt = $conn->prepare( $query );
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $enc);
    $stmt->execute();
    return $stmt -> fetch();

}

function getHeader(){
    global $conn;
    $query = "SELECT * FROM header";
    $rez = $conn -> query($query) ->fetchAll();
    return $rez;
}
function isLogged()
{
    return isset($_SESSION["user"]);

}

function isAdmin(){
    
    return isLogged() && $_SESSION["user"] -> roleName == "admin";
}

function getTrendingProducts(){
    global $conn; //slika kategorija tekst cena
    $query = "SELECT cat.name as category, pic.path as imgSrc, p.text as text, pri.price as price, p.unitsSold as unitsSold  FROM products p JOIN pictures pic ON p.picture_id = pic.id JOIN category as cat ON p.category_id = cat.id JOIN prices pri ON pri.product_id = p.id
    WHERE pri.status = 1 AND p.unitsSold > (SELECT AVG(unitsSold) FROM products)
    ORDER BY p.id";

    $res = $conn -> query($query) -> fetchAll();
    return $res;
}
function getStockItems(){
    global $conn; //slika kategorija tekst cena
    $query = "SELECT cat.name as category, pic.path as imgSrc, p.text as text, pri.price as price, p.unitsSold as unitsSold, p.quantityAvailable as available  FROM products p JOIN pictures pic ON p.picture_id = pic.id JOIN category as cat ON p.category_id = cat.id JOIN prices pri ON pri.product_id = p.id
    WHERE pri.status = 1 AND p.quantityAvailable > (SELECT AVG(quantityAvailable) FROM products)
    ORDER BY p.id";

    $res = $conn -> query($query) -> fetchAll();
    return $res;
}
function getCategories(){
    global $conn;
    $query = "SELECT * FROM category";
    return $conn -> query($query) -> fetchAll();

}
function getMaterials(){
    global $conn;
    $query = "SELECT * FROM materials";
    return $conn -> query($query) -> fetchAll();
}
function isSubed($userId){
    global $conn;
    $query = "SELECT n.id FROM newsletter n JOIN users u ON u.id = n.user_id WHERE n.user_id = $userId AND n.status = 1";


    return $conn -> query($query) -> fetch();
}
function wasSubbed($userId){
    global $conn;
    $query = "SELECT n.id FROM newsletter n JOIN users u ON u.id = n.user_id WHERE n.user_id = $userId AND n.status = 0";


    return $conn -> query($query) -> fetch();

}
function didAdminChangeSub($userId){
    global $conn;
    $query = "SELECT n.id FROM newsletter n JOIN users u ON u.id = n.user_id WHERE n.user_id = $userId AND n.did_admin_change = 1";


    return $conn -> query($query) -> fetch();

}

function getSubbedDate($userId){
    global $conn;
    $query = "SELECT n.created_at FROM newsletter n JOIN users u ON u.id = n.user_id WHERE n.user_id = $userId";


    return $conn -> query($query) -> fetch();
}
function getChangedSubbedDate($userId){
    global $conn;
    $query = "SELECT n.updated_at FROM newsletter n JOIN users u ON u.id = n.user_id WHERE n.user_id = $userId";


    return $conn -> query($query) -> fetch();

}


function subscribeUser($userId){
    global $conn;
    $query = "INSERT INTO newsletter(user_id) VALUES($userId)";
    return $conn -> exec($query);

}
function reSubscribeUser($userId) {
    global $conn;
    $query = "UPDATE `newsletter` SET `status` = 1, updated_at = NOW() WHERE user_id = $userId";
    return $conn -> exec($query);
}
function unsubscribeUser($userId){
    global $conn;
    $query = "UPDATE `newsletter` SET `status` = b'0', updated_at = NOW() WHERE user_id = $userId;";
    return $conn -> exec($query);

}
function blockUser($userId){
    global $conn;
    $query = "UPDATE `newsletter` SET `status` = b'0', updated_at = NOW(), did_admin_change = 1 WHERE user_id = $userId";
    return $conn -> exec($query);
}
function UNblockUser($userId){
    global $conn;
    $query = "UPDATE `newsletter` SET `status` = b'0', updated_at = NOW(), did_admin_change = 0 WHERE user_id = $userId";
    return $conn -> exec($query);
}

function getSubbedUsers(){
    global $conn;
    $query = "SELECT n.updated_at, n.created_at, u.name as `name`, u.email as email, n.status as `status`, u.id as id FROM newsletter n JOIN users u ON u.id = n.user_id";


    return $conn -> query($query) -> fetchAll();
}
