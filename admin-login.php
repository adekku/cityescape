<?php
require_once('./require/connect.php');
require_once('./require/session.php');

$sql = "SELECT*FROM admin";
$statement = $pdo -> prepare($sql);
$statement -> execute();
$admin = $statement -> fetch();

if($admin === $_POST) {
  header('Location: ./admin.php');
} else {
  $_SESSION['message'] = 'username or password is incorrect';
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
  <label for="" class="form-label">Username</label>
  <input class="form-control" type="text" placeholder="exampleusername" required name="username">

  <label for="" class="form-label">Password</label>
  <input class="form-control" type="password" placeholder="examplepassword" required name="password">

  <button class="btn btn-success" type="submit">Sign In</button>
        
  <p class="textCenter">
      <a href="./admin-change-password.php">Change Password</a>
  </p>
</form>

<?php require_once('./require/footer.php') ?>
