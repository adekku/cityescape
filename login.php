<?php require_once('require/header.php'); ?>
<?php require_once('require/connect.php'); ?>

    <form action="./vendor/signin.php" method="POST">
        <label for="">Имя пользователя</label>
        <input type="text" placeholder="examplelogin" required name="login">

        <label for="">Пароль</label>
        <input type="password" placeholder="examplepassword" required name="password">

        <button type="submit">Войти</button>
        
        <p class="textCenter">
            <a href="./register.php">Регистрация</a>
        </p>

        <?php
            //display error if any
            if(isset($_SESSION['message'])){
                echo '<p class="msg">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
            }
        ?>
    </form>

<?php require_once('require/footer.php'); ?>
