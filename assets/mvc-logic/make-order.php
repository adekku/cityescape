<?php
require_once('../../require/connect.php');
session_start();

var_dump($_GET);
$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];
$product_name = $_GET['product_name'];

$quantity = $_POST['quantity'];
$shipment_location = $_POST['shipment_location'];
$additional_information = $_POST['additional_information'];

$approved = false;

$sql = 'INSERT INTO orders(user_id, product_id, product_name, quantity, shipment_location, additional_information, approved)
        VALUES(:user_id, :product_id, :product_name, :quantity, :shipment_location, :additional_information, :approved)';

$statement = $pdo -> prepare($sql);
$statement -> bindValue(':user_id', $user_id);
$statement -> bindValue(':product_id', $product_id);
$statement -> bindValue(':product_name', $product_name);
$statement -> bindValue(':quantity', $quantity);
$statement -> bindValue(':shipment_location', $shipment_location);
$statement -> bindValue(':additional_information', $additional_information);
$statement -> bindValue(':approved', $approved);
$statement -> execute();

$_SESSION['order_status'] = 'Заказ товара успешен. Ваш запрос поставлен в очередь';

header('location: ../../../post.php?id=' . $product_id);
?>