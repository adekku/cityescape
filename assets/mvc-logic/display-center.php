<?php
require_once('require/connect.php'); 
$sql = 'SELECT*FROM centers';
$statement = $pdo -> prepare($sql);
$statement -> execute();
$centers = $statement -> fetchAll();

?>