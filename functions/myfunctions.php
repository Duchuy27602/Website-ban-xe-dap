<?php
include("../config/dbcon.php");
include('./PHPMailer/class.smtp.php');
include("./PHPMailer/class.phpmailer.php");
function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}
function getByID($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function totalValue($table)
{
    global $conn;
    $query = "SELECT COUNT(*) as `number` FROM $table";
    $totalValue = mysqli_query($conn, $query);
    $totalValue = mysqli_fetch_array($totalValue);
    return $totalValue['number'];
}
function getAllUsers($page = 0)
{
    global $conn;
    $query = "SELECT `users`.*, COUNT(`order_detail`.`id`) AS `total_buy` FROM `users`
            LEFT JOIN `order_detail` ON `users`.`id` = `order_detail`.`user_id`
            GROUP BY `users`.`id`
            ORDER BY `users`.`creat_at` DESC";
    return $query_run = mysqli_query($conn, $query);
}

// order
function getAllOrder($type = -1)
{
    global $conn;
    $getStatus = "1,2,3,4";
    if ($type != -1) {
        $getStatus = $type . "";
    }
    $query =    "SELECT `orders`.*,COUNT(`order_detail`.`id`) as`quantity`,
                `users`.`name`,`users`.`email`,`users`.`phone`,`users`.`address` FROM`orders`
                JOIN `users` ON `orders`.`user_id` = `users`.`id`
                LEFT JOIN `order_detail` ON `order_detail`.`order_id` = `orders`.`id`
                WHERE`orders`.`status` IN($getStatus)
                GROUP BY `orders`.`id`
                ORDER BY `orders`.`id` DESC";
    return $query_run = mysqli_query($conn, $query);
}

function getOrderDetail($order_id)
{
    global $conn;
    $query =    "SELECT `users`.`name`,`users`.`email`,`users`.`phone`,`users`.`address`,
                `products`.`name` as `name_product`, `products`.`selling_price`,`products`.`image`,
                `order_detail`.*  FROM `order_detail` 
                JOIN `users` ON `order_detail`.`user_id` = `users`.`id`
                JOIN `products` ON `products`.`id` = `order_detail`.`product_id`
                WHERE `order_id` = '$order_id'";
    return mysqli_query($conn, $query);
}

function totalPriceGet()
{
    global $conn;
    $query = "SELECT selling_price * quantity as price FROM `order_detail` WHERE `status` = 4";
    $prices = mysqli_query($conn, $query);
    $total_price = 0;
    foreach ($prices as $price) {
        $total_price += $price['price'];
    }
    return $total_price;
}

function totalPriceMonthGet()
{
    global $conn;
    $query = "SELECT selling_price * quantity as price FROM `order_detail` WHERE `status` = 4 AND MONTH(`order_detail`.`created_at`) = MONTH(CURRENT_DATE())";
    $prices = mysqli_query($conn, $query);
    $total_price = 0;
    foreach ($prices as $price) {
        $total_price += $price['price'];
    }
    return $total_price;
}

function topOrderMonthGet()
{
    global $conn;
    $query = "SELECT `order_detail`.`user_id`, SUM(`order_detail`.`quantity`) as `quantity` FROM `order_detail` WHERE `status` = 4 AND MONTH(`order_detail`.`created_at`) = MONTH(CURRENT_DATE()) GROUP BY `order_detail`.`user_id` ORDER BY `quantity` DESC LIMIT 1";
    $topOrderMonth = mysqli_query($conn, $query);
    $topOrderMonth = mysqli_fetch_array($topOrderMonth);
    $query = "SELECT `users`.`name` FROM `users` WHERE `users`.`id` = " . $topOrderMonth['user_id'];
    $topOrderMonth['user_name'] = mysqli_query($conn, $query);
    $topOrderMonth['user_name'] = mysqli_fetch_array($topOrderMonth['user_name']);
    $topOrderMonth['user_name'] = $topOrderMonth['user_name']['name'];
    return $topOrderMonth;
}

function topProductOrderMonthGet()
{
    global $conn;
    $query = "SELECT `order_detail`.`product_id`, SUM(`order_detail`.`quantity`) as `quantity` FROM `order_detail` WHERE `status` = 4 AND MONTH(`order_detail`.`created_at`) = MONTH(CURRENT_DATE()) GROUP BY `order_detail`.`product_id` ORDER BY `quantity` DESC LIMIT 1";
    $topProductOrderMonth = mysqli_query($conn, $query);
    $topProductOrderMonth = mysqli_fetch_array($topProductOrderMonth);
    $query = "SELECT `products`.`name` FROM `products` WHERE `products`.`id` = " . $topProductOrderMonth['product_id'];
    $topProductOrderMonth['product_name'] = mysqli_query($conn, $query);
    $topProductOrderMonth['product_name'] = mysqli_fetch_array($topProductOrderMonth['product_name']);
    $topProductOrderMonth['product_name'] = $topProductOrderMonth['product_name']['name'];
    return $topProductOrderMonth;
}

function totalInventory()
{
    global $conn;
    $query = "SELECT p.id AS product_id, p.name AS product_name, p.qty AS product_quantity_in_stock, IFNULL(SUM(od.quantity), 0) AS total_ordered_quantity, (p.qty - IFNULL(SUM(od.quantity), 0)) AS remaining_quantity_in_stock FROM products p LEFT JOIN order_detail od ON p.id = od.product_id GROUP BY p.id, p.name, p.qty;";
    $total = mysqli_query($conn, $query);
    $totalInventory = 0;
    foreach ($total as $total) {
        $totalInventory += $total['remaining_quantity_in_stock'];
    }
    return $totalInventory;
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header("Location:" . $url);
    exit();
}

function sendMailTo($name, $mailTo, $noidung, $tieude)
{
    global $mail;
    $nFrom = $mail['title'];
    $mFrom = $mail['email'];
    $mPass = $mail['password'];
    $nTo = $name; //Ten nguoi nhan
    $mTo = $mailTo;   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $noidung;   // Noi dung email
    $title = $tieude;   //Tieu de gui mail
    $mail->IsSMTP();
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0; 
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $mFrom;
    $mail->Password   = $mPass;
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($mFrom, $mFrom);
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}

function activateCode($code) {
    global $conn;
    $query = "SELECT * FROM `users` WHERE `code` = '$code'";
    $query_run = mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run) > 0){
        $query = "UPDATE `users` SET `code` = '' WHERE `code` = '$code'";
        $query_run = mysqli_query($conn, $query);
        return true;
    }
    return false;
}