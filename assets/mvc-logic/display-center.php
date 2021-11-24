<?php
require_once('require/connect.php'); 
$sql = 'SELECT*FROM products';
$statement = $pdo -> prepare($sql);
$statement -> execute();
$centers = $statement -> fetchAll();

?>