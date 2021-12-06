<?php require_once('require/header.php'); ?>
<?php require_once('require/connect.php'); ?>
<?php 
    //take info of the user
    $sql = 'SELECT*FROM users WHERE id=:id';
    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(':id', $_SESSION['user']['id']);
    $statement -> execute();
    $user = $statement -> fetch();
?>
    <div class="profile">
        <h1>Основная Информация</h1>
        <p>Полное имя: <?php echo $user['full_name'] ?></p>
        <p>Логин: <?php echo $user['login'] ?></p>
        <p>Телефонный номер: <?php echo $user['phone_number'] ?></p>
        <p>Почта: <?php echo $user['full_name'] ?></p>
    </div>

    <p class="btn btn-sm btn-outline-primary"><a href="profile-edit.php?id=<?php echo $user['id'] ?>">Редактировать профиль</a></p>
    <p class="btn btn-sm btn-outline-warning"><a href="./profile-change-password.php?id=<?php echo $user['id'] ?>">Изменить Пароль</a></p>
</body>
</html>

<?php require_once('require/footer.php'); ?>
