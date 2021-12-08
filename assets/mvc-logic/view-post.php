<?php
require_once('./require/connect.php');
//get all information about a main product and save in a variable
$sql = 'SELECT*FROM products WHERE id=:id';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id',$_GET['id']);
$statement -> execute();
$center = $statement -> fetch();

?>