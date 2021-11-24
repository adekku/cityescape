<?php

require_once('../../require/connect.php');
var_dump($_GET);
$id = $_GET['id'];
var_dump($id);
$sql = 'UPDATE orders SET approved=1 WHERE id=:id';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id', $id);
$statement -> execute();

header('location: ../../admin-manage-orders.php');

?>