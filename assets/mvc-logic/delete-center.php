<?php
require_once('../../require/connect.php');
var_dump($_POST);
$id = $_POST['id'];

//receive all data about the center to be deleted
$sql = 'SELECT*FROM centers WHERE id=:id';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id', $id);
$statement -> execute();
$center = $statement -> fetch();
var_dump($center);

//remove image and folder
$image_path = $center['image_path'];
unlink($image_path);
rmdir('../uploaded_images/'. $id);

//remove records in the database
$sql = 'DELETE FROM centers WHERE id=:id';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id', $id);
$statement -> execute();

header('location: ../../admin.php');
?>