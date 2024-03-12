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
    $ac_key = random_int(0,999999999);
    $insertQ = "INSERT INTO users (name, lastname, email, password, adress, role_id, activation_key) VALUES( :name, :lastname, :email, :password, :adress, 1, :ac_key)";
        
        $stmt = $conn->prepare($insertQ);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":adress", $adress);
        $stmt->bindParam(":ac_key", $ac_key);
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
    $query = "SELECT u.id as id, u.name as name, u.lastname as lastname, u.email as email, u.adress as adress, r.name as roleName, u.isActive as isActive FROM users u INNER JOIN role r ON u.role_id = r.id WHERE email = :email AND password = :password";
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
function isInactive(){
    return isLogged() && $_SESSION["user"] -> isActive == 0;
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
function getAllUsers(){
    global $conn;
    $query = "SELECT * FROM users";
    return $conn -> query($query) -> fetchAll();
}
function activateUser($userId){
    global $conn;   
    $query = "UPDATE users SET isActive = 1 WHERE id = $userId";
    return $conn -> exec($query);

}
function activateUser2($userId, $key){
    global $conn;   
    $query = "UPDATE users SET isActive = 1 WHERE id = $userId AND activation_key = $key";
    return $conn -> exec($query);

}
function deactivateUser($userId){   

    global $conn;
    $query = "UPDATE users SET isActive = 0 WHERE id = $userId";
    return $conn -> exec($query);
}
function deleteUser($userId){
    global $conn;
    $query = "DELETE FROM users WHERE `users`.`id` = $userId";
    return $conn -> exec($query);
}

function getCart($userId){
    global $conn;
    $query = "SELECT id FROM cart WHERE user_id = $userId AND status = 1";
    return $conn -> query($query) -> fetch();
}
function createCart($userId){
    global $conn;
    $query = "INSERT INTO cart(user_id) VALUES($userId)";
    return $conn -> exec($query);
}
function addToCart($basketId, $prodId){
    global $conn;
    $query = "INSERT INTO cart_product(cart_id, product_id, quantity) VALUES($basketId, $prodId, 1)";
    return $conn -> exec($query);
}
function getCartId($uid){
    global $conn;
    $query = "SELECT id FROM cart WHERE user_id = $uid AND status = 1";
    return $conn -> query($query) -> fetch();
}
function getCartIdFromHistory($uid){
    global $conn;
    $query = "SELECT id FROM cart WHERE user_id = $uid AND status = 0 AND created_at = (SELECT MAX(created_at) FROM cart WHERE user_id = $uid AND status = 0)";
    return $conn -> query($query) -> fetch();
}
function alreadyInCart($id, $prodId){
    global $conn;
    $query = "SELECT id FROM cart_product cp WHERE cart_id = $id AND product_id = $prodId";
    return $conn -> query($query) -> fetch();
}
function updateQtty($cartId, $prodId){
    global $conn;
    $query = "UPDATE cart_product SET quantity = quantity + 1 WHERE cart_id = $cartId AND product_id = $prodId";
    return $conn -> query($query) -> fetch();
}
function getCartItems($cartId){

    global $conn;
    $query = "SELECT c.id as cartId, p.id as productId,pic.path as imgSrc, p.name as productName,p.text as `text`, SUM(cp.quantity) as quantity, SUM(cp.quantity) * pri.price as totalPerProd, pri.price as price FROM cart_product cp INNER JOIN products p ON cp.product_id = p.id INNER JOIN cart c ON cp.cart_id = c.id INNER JOIN prices pri ON p.id = pri.product_id INNER JOIN pictures pic ON p.picture_id = pic.id WHERE cp.cart_id = $cartId AND c.status = 1 GROUP BY cp.product_id";
    $rez = $conn -> query($query) -> fetchAll();
    return $rez;
}

function getCartItemsWithoutStatus($cartId){

    global $conn;
    $query = "SELECT c.id as cartId, p.id as productId,pic.path as imgSrc, p.name as productName,p.text as `text`, SUM(cp.quantity) as quantity, SUM(cp.quantity) * pri.price as totalPerProd, pri.price as price FROM cart_product cp INNER JOIN products p ON cp.product_id = p.id INNER JOIN cart c ON cp.cart_id = c.id INNER JOIN prices pri ON p.id = pri.product_id INNER JOIN pictures pic ON p.picture_id = pic.id WHERE cp.cart_id = $cartId GROUP BY cp.product_id";
    $rez = $conn -> query($query) -> fetchAll();
    return $rez;
}



function getCartItemsFROMHISTORY($cartId){

    global $conn;
    $query = "SELECT c.id as cartId, p.id as productId,pic.path as imgSrc, p.name as productName,p.text as `text`, SUM(cp.quantity) as quantity, SUM(cp.quantity) * pri.price as totalPerProd, pri.price as price FROM cart_product cp INNER JOIN products p ON cp.product_id = p.id INNER JOIN cart c ON cp.cart_id = c.id INNER JOIN prices pri ON p.id = pri.product_id INNER JOIN pictures pic ON p.picture_id = pic.id WHERE cp.cart_id = $cartId AND c.status = 0 AND c.created_at = (SELECT MAX(created_at) FROM cart WHERE status = 0 AND cart_id = $cartId) GROUP BY cp.product_id";
    $rez = $conn -> query($query) -> fetchAll();
    return $rez;
}
function deleteProdCart($cartId, $prodId){      
    global $conn;
    global $conn;
    $query = "DELETE cp FROM cart_product cp WHERE cp.cart_id = :id AND ( SELECT status FROM cart WHERE id = :id ) = 1 AND cp.product_id = :prodId";
    $stmt = $conn -> prepare( $query );
    $stmt -> bindParam(":id", $cartId);
    $stmt -> bindParam(":prodId", $prodId);
    return $stmt -> execute();

}

function deleteCart($cartId){
    global $conn;
    $query = "DELETE cp FROM cart_product cp WHERE cp.cart_id = :id AND ( SELECT status FROM cart WHERE id = :id ) = 1";
    $stmt = $conn -> prepare( $query );
    $stmt -> bindParam(":id", $cartId);
    return $stmt -> execute();

}

function orderFromCart($userId){
    global $conn;
    $query = "UPDATE cart SET `status` = 0 WHERE user_id = $userId";
    return $conn -> exec($query);



}

function createOrder($cartId, $total, $username, $lastname, $street, $city, $state, $zip, $message){
    global $conn;
    $orderId = random_int(0,999999999);
    $query = "INSERT INTO `checkout` (`cart_id`,  `total`, `username`, `lastname`, `street`, `city`, `state`, `postal`, `note`, `order_id`) VALUES ( :cartId, :total , :username, :lastname, :street, :city, :state, :zip, :message, $orderId);";
    $stmt = $conn -> prepare( $query );
    $stmt -> bindParam(":cartId",$cartId);
    $stmt -> bindParam(":total", $total);
    $stmt -> bindParam(":username", $username);
    $stmt -> bindParam(":lastname", $lastname);
    $stmt -> bindParam(":street", $street);
    $stmt -> bindParam(":city", $city);
    $stmt -> bindParam(":state", $state);
    $stmt -> bindParam(":zip", $zip);
    $stmt -> bindParam(":message", $message);
    $res = $stmt -> execute();

    return $orderId;
}
function getOrderInfo($orderId){
    global $conn;
    $query = "SELECT * FROM checkout WHERE order_id = $orderId";
 
    return $conn -> query( $query ) -> fetch();

}

function hasActiveCart($userId){
    global $conn;
    $query = "SELECT id FROM cart WHERE user_id = $userId AND status = 1";
    return $conn -> query( $query ) -> fetch();
}
function getUser($userId){

    global $conn;
    $query = "SELECT * FROM users WHERE id = $userId";
    return $conn -> query( $query ) -> fetch();
}

function getHistoryCarts($userId){

    global $conn;
    $query = "SELECT * FROM cart WHERE user_id = $userId AND status = 0";
    return $conn -> query( $query ) -> fetchAll();

}

function getQuestions(){
    global $conn;
    $query = "SELECT * FROM questions";
    return $conn -> query( $query ) -> fetchAll();
}
function getAnswersForQuestion($question){
    global $conn;
    $query = "SELECT * FROM answers WHERE question_id = $question";
    return $conn -> query( $query ) -> fetchAll();
}
function didAnswer($userId){
    global $conn;
    $query = "SELECT id FROM users_survey WHERE user_id = $userId";
    return $conn -> query( $query ) -> fetch();
}
function answerSurvey($userId, $ans){
    global $conn;
    $query = "INSERT INTO users_survey(user_id, question_id, answer_id) VALUES($userId, 1, $ans)";
    return $conn -> exec( $query );
}

function getLatestUser(){
    global $conn;
    $query = "SELECT * FROM users WHERE created_at = (SELECT MAX(created_at) FROM users)";
    return $conn -> query( $query ) -> fetch();
}