<?php
require_once('./require/connect.php');

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
  <label for="" class="form-label">Имя пользователя</label>
  <input class="form-control" type="text" placeholder="tatyana1995" required name="username">

  <label for="" class="form-label">Пароль</label>
  <input class="form-control" type="password" placeholder="tommythecat" required name="password">

  <button class="btn btn-success" type="submit">Войти</button>
        
  <p class="textCenter">
      <a href="./admin-change-password.php">Изменить Пароль</a>
  </p>
</form>

<?php require_once('./require/footer.php') ?>
