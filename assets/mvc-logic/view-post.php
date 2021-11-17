<?php
require_once('./require/connect.php');
$sql = 'SELECT*FROM centers WHERE id=:id';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id',$_GET['id']);
$statement -> execute();
$center = $statement -> fetch();

?>