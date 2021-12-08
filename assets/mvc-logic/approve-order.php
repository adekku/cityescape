<?php
require_once('../../require/connect.php');

//function to convert pending status into approved
function adding ($x, $y) { 
  if ($x === $y) {  
    return $x;
  } else {  
    return adding($x + 1, $y); //recursion 
  }
}

$approved = 0;

var_dump($_GET);
$id = $_GET['id'];
var_dump($id);
$sql = 'UPDATE orders SET approved=:approved WHERE id=:id';
$statement = $pdo -> prepare($sql);

$approved = adding($approved, 1);

$statement -> bindValue(':id', $id);
$statement -> bindValue(':approved', $approved);
$statement -> execute();

header('location: ../../admin-manage-orders.php');

?>