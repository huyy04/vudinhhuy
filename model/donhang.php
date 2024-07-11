<?php
function loadall_donhang()
{
    $sql = "SELECT orders.id, orders.totalMoney, orders.created_at ,orders.status ,users.name as name FROM orders
        LEFT JOIN users ON orders.user_id = users.id";
    $result = pdo_query($sql);
    return $result;
}

function delete_donhang($id)
{
    $sql = "DELETE FROM orders WHERE id = '$id'";
    pdo_execute($sql);
}


function insert_donhang($user_id, $totalMoney, $payment, $date)
{
    $sql = "INSERT INTO orders (user_id, totalMoney, payment, updated_at) VALUES ('$user_id', '$totalMoney', '$payment', '$date')";
    pdo_execute($sql);
    return pdo_query_one('SELECT MAX(id) as id FROM orders');
}

function loadall_order($user_id)
{
    $sql = "SELECT prd.id AS prdId, prd.name, prd.image, prd.price, odt.amount, od.id AS orderId, od.status, od.totalMoney, od.created_at, od.updated_at
    FROM products prd JOIN order_details odt ON prd.id = odt.product_id
    JOIN orders od ON od.id = odt.order_id WHERE od.user_id = $user_id";
    $result = pdo_query($sql);
    return $result;
}

function insert_order_details($order_id, $product_id, $amount)
{
    $order_id = intval($order_id);
    $sql = "INSERT INTO order_details (order_id ,product_id, amount) VALUES ('$order_id' ,'$product_id', '$amount')";
    pdo_execute($sql);
}

function update_order_by_id($order_id){
    $sql= "UPDATE orders SET status = 'đã hủy' WHERE id = $order_id";
    pdo_execute($sql);
}

function loadall_order_details($id){
    $sql = "SELECT prd.id AS prdId, prd.name, prd.image, prd.price, odt.amount, od.id AS orderId, od.status, od.totalMoney, od.created_at, od.updated_at
    FROM products prd JOIN order_details odt ON prd.id = odt.product_id
    JOIN orders od ON od.id = odt.order_id WHERE od.id = '$id'";
    $result = pdo_query($sql);
    return $result;
}

function getOneOrderDetails($id){
    $sql = "SELECT prd.id AS prdId, prd.name, prd.image, prd.price, odt.amount, od.id AS orderId, od.status, od.totalMoney, od.created_at, od.updated_at
    FROM products prd JOIN order_details odt ON prd.id = odt.product_id
    JOIN orders od ON od.id = odt.order_id WHERE od.id = '$id'";
    $result = pdo_query_one($sql);
    return $result;
}

function updateStatus($id, $orderStatus){
    $sql = "UPDATE orders SET status = '$orderStatus' WHERE id = $id";
    pdo_execute($sql);
}
