<?php
require_once('require/connect.php'); 
//retreive all products and save in centers
$sql = 'SELECT*FROM products';
$statement = $pdo -> prepare($sql);
$statement -> execute();
$centers = $statement -> fetchAll();

?>
