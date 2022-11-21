<?php
function number_of_orders()
{
    $conn = connection();
    $select_orders = $conn->prepare("SELECT * FROM `orders`");
    $select_orders->execute();
    $number_of_orders = $select_orders->rowCount();
    return $number_of_orders;
}

function number_of_sanpham()
{
    $conn = pdo_get_connection();
    $select_products = $conn->prepare("SELECT * FROM `san_pham`");
    $select_products->execute();
    $number_of_products = $select_products->rowCount();
    return $number_of_products;
}
function number_of_users()
{
    $conn = pdo_get_connection();
    $select_users = $conn->prepare("SELECT * FROM `khach_hang`");
    $select_users->execute();
    $number_of_users = $select_users->rowCount();
    return $number_of_users;
}
function number_of_messages()
{
    $conn = connection();
    $select_messages = $conn->prepare("SELECT * FROM `messages`");
    $select_messages->execute();
    $number_of_messages = $select_messages->rowCount();
    return $number_of_messages;
}

function order_pending(){
    $conn = connection();
    $total_pendings = 0 ;
    $select_pendings = $conn->prepare("SELECT * FROM `orders` where payment_status = ? ");
    $select_pendings->execute(['pending']);
    if($select_pendings->rowCount() > 0){
        while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
            $total_pendings += $fetch_pendings['total_price'];
        }
    }
    return $total_pendings;
}

function order_completes(){
    $conn = connection();
    $total_completes = 0;
    $select_completes = $conn->prepare("SELECT * FROM `orders` where payment_status = ? ");
    $select_completes->execute(['completed']);
    if ($select_completes->rowCount() > 0) {
        while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
            $total_completes += $fetch_completes['total_price'];
        }
    }
    return $total_completes;
}
function number_dm(){
    $conn = pdo_get_connection();
    $select_category = $conn->prepare("SELECT id FROM `loai_san_pham`");
    $select_category->execute();
    $fetch_code = $select_category->rowCount();
    return $fetch_code;
}
function number_comment_clothes(){
    $conn = connection();
    $select_comments = $conn->prepare("SELECT * FROM `comments`");
    $select_comments->execute();
    $numbers_of_comments = $select_comments->rowCount();
    return $numbers_of_comments;
}