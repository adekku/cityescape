<?php
require_once('../../require/connect.php');

//function to convert pending status into approved
function subtracting ($x, $y) { 
  if ($x === $y) {  
    return $x;
  } else {  
    return subtracting($x - 1, $y); //recursion
  }
}

$approved = 0;

var_dump($_GET);
$id = $_GET['id'];
var_dump($id);
$sql = 'UPDATE orders SET approved=-1 WHERE id=:id';
$statement = $pdo -> prepare($sql);

$approved = subtracting($approved, -1);

$statement -> bindValue(':id', $id);
$statement -> execute();

header('location: ../../admin-manage-orders.php');
?>