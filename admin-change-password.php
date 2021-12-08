<?php
//connects a module. The module connects this file to the database
require_once('./require/connect.php');

//take info about the admin from the database
$sql = "SELECT*FROM admin"; //formulate an sql statement
$statement = $pdo -> prepare($sql); //prepare the sql statement
$statement -> execute(); //execute the sql statement
$admin = $statement -> fetch(); //if returns something, store it in admin variable

//check that passwords are not null and old new passwords match
if($_POST['newpassword'] != '' && $_POST['repeatpassword'] != '' && $_POST['currentpassword'] != ''){
  if($admin['password'] === $_POST['currentpassword']) {
    if($_POST['newpassword'] === $_POST['repeatpassword']) {
      $sql = "UPDATE admin SET password=:password"; 
      $statement = $pdo -> prepare($sql); 
      $statement -> bindValue(':password', $_POST['newpassword']); //when executing the prepared sql, replace :password with actual new password
      $statement -> execute();

      header('location: ./admin-login.php'); //automatically redirect to the login page if successful
    }
  }
} else {
  //prepare warning for the admin if unsuccessful
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
  <input class="form-control" type="password" placeholder="exampleusername" required name="currentpassword">

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