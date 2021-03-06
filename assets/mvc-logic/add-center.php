<?php
//auxiliaries start
require_once('../../require/connect.php');
require_once('../../require/session.php');
//auxiliaries end

//functions start
function post_is_all_set() {
  foreach($_POST as $value) {
    if($value == '') {
      // echo $value;
      return false;
    }
  }
  return true;
}

function get_current_max_id($pdo) {
  $sql = "INSERT INTO products(image_path,name,country,description,body,tags) 
                      VALUES ('','','','','','')";
  $statement = $pdo -> prepare($sql);
  $statement -> execute();

  $sql = "SELECT MAX(id) FROM products";
  $statement = $pdo -> prepare($sql);
  $statement -> execute();
  $result = $statement -> fetch();  
  $current_max_id = intval( $result['MAX(id)'] );

  //if max id = 0, there is no id. Create id+1 in such case but leave no record
  $sql = 'DELETE FROM products WHERE id=:id';
  $statement = $pdo -> prepare($sql);
  $statement -> bindValue(':id', $current_max_id);
  $statement -> execute();

  return $current_max_id;
}

//calculate image folder path
function get_image_folder_path($pdo) {
  $image_folder_path = '../uploaded_images/'. (get_current_max_id($pdo)+2);
  return $image_folder_path;
}

//save image, return null
function save_image($image_folder_path) {
  $current_path = $_FILES['image_tourism_center']['tmp_name'];
  mkdir($image_folder_path);
  $image_path = get_image_path($image_folder_path);

  //error handling
  if (move_uploaded_file($current_path, $image_path)) {
    $_SESSION['message'] = 'Error occured while uploading file';
    header('Location: ../../admin-add.php');
    exit;
  };
}

function get_image_path($image_folder_path) {
  $image_path = $image_folder_path .'/'. $_FILES['image_tourism_center']['name'];
  return $image_path;
}
//functions end

//code start

//error handling
if( !post_is_all_set() ) {
  $_SESSION['message'] = 'fill all values';
  header('Location: ../../admin-add.php');
  exit;
}

save_image(get_image_folder_path($pdo));

$sql = 'INSERT INTO products(image_path,name,country,description,body,tags) 
                    VALUES (:image_path, :name, :country, :description, :body, :tags)';
$statement = $pdo -> prepare($sql);

//associate values before execution
$statement -> bindValue( ':image_path', get_image_path('../uploaded_images/'. (get_current_max_id($pdo)+1)) );
$statement -> bindValue(':name', $_POST['name']);
$statement -> bindValue(':country', $_POST['country']);
$statement -> bindValue(':description', $_POST['description']);
$statement -> bindValue(':body', $_POST['body']);
$statement -> bindValue(':tags', $_POST['tags']);

$statement -> execute();

$_SESSION['message'] = 'Product has been successfully added';

header('Location: ../../admin-add.php');
//code end
?>