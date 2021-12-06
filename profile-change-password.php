<?php
require_once('./require/connect.php');

//take id of the user
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $_SESSION['message'] = 'error occured while identifying a user';
  header('location: login.php');
}

//take info of the user by id
$sql = "SELECT*FROM users WHERE id=:id";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(':id', $id);
$statement -> execute();
$user = $statement -> fetch();

//check all passwords are not null and new passwords match
if($_POST['newpassword'] != '' && $_POST['repeatpassword'] != '' && $_POST['currentpassword'] != ''){
  if($user['password'] === md5($_POST['currentpassword'])) {
    if($_POST['newpassword'] === $_POST['repeatpassword']) {
      $sql = "UPDATE users SET password=:password";
      $statement = $pdo -> prepare($sql);
      $statement -> bindValue(':password', md5($_POST['newpassword']));
      $statement -> execute();

      header('location: ./login.php');
    }
  }
} else {
  $_SESSION['message'] = 'passwords do not match';
}

?>

<?php require_once('./require/header.php') ?>

<?php
  //ensure that no null values are passed to the system
  if(isset($_SESSION['message'])){
    echo '<p class="alert alert-warning">'.$_SESSION['message'].'</p>';
    unset($_SESSION['message']);
  }
?>
<form action="" method="POST">
  <label for="" class="form-label">Current Password</label>
  <input class="form-control" type="text" placeholder="exampleusername" required name="currentpassword">

  <label for="" class="form-label">New Password</label>
  <input class="form-control" type="password" placeholder="examplenewpassword" required name="newpassword">

  <label for="" class="form-label">Repeat password</label>
  <input class="form-control" type="password" placeholder="examplerepeatpassword" required name="repeatpassword">

  <button class="btn btn-success" type="submit">Change password</button>
        
  <p class="textCenter">
      <a href="./profile-change-password.php">Back</a>
  </p>
</form>

<?php require_once('./require/footer.php') ?>