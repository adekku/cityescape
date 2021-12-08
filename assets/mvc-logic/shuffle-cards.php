<?php
require_once('require/connect.php');

//retreive all main products and save in centers variable
$sql = "SELECT*FROM products";
$statement = $pdo->prepare($sql);
$statement -> execute();
$centers = $statement -> fetchAll();
?>