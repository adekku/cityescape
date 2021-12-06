<?php
require_once('./require/connect.php');

//take info about the admin from the database
$sql = "SELECT*FROM admin";
$statement = $pdo -> prepare($sql);
$statement -> execute();
$admin = $statement -> fetch();

//check that passwords are not null and old new passwords match
if($_POST['newpassword'] != '' && $_POST['repeatpassword'] != '' && $_POST['currentpassword'] != ''){
  if($admin['password'] === $_POST['currentpassword']) {
    if($_POST['newpassword'] === $_POST['repeatpassword']) {
      $sql = "UPDATE admin SET password=:password";
      $statement = $pdo -> prepare($sql);
      $statement -> bindValue(':password', $_POST['newpassword']);
      $statement -> execute();

      header('location: ./admin-login.php');
    }
  }
} else {
  //prepare warning for the user
  $_SESSION['message'] = 'An error occurred while processing data';
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
  <label for="" class="form-label">Используемый пароль</label>
  <input class="form-control" type="text" placeholder="exampleusername" required name="currentpassword">

  <label for="" class="form-label">Новый Пароль</label>
  <input class="form-control" type="password" placeholder="examplenewpassword" required name="newpassword">

  <label for="" class="form-label">Повторите новый пароль</label>
  <input class="form-control" type="password" placeholder="examplerepeatpassword" required name="repeatpassword">

  <button class="btn btn-success" type="submit">Поменять пароль</button>
        
  <p class="textCenter">
      <a href="./admin-login.php">Вернуться к Авторизации</a>
  </p>
</form>

<?php require_once('./require/footer.php') ?>