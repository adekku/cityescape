<?php require_once('require/header.php'); ?>
<?php require_once('require/connect.php'); ?>

    <!-- form for user registration -->
    <form action="./vendor/signup.php" method="POST" enctype="multipart/form-data">
        <label for="">Полное имя</label>
        <input type="text" name="full_name" placeholder="examplelogin" required>

        <label for="">Имя пользователя</label>
        <input type="text" name="login" placeholder="examplelogin" required>

        <label for="">Номер телефона</label>
        <input type="tel" name="phone_number" placeholder="+77712391337" required>

        <label for="">Электронная почта</label>
        <input type="email" name="email" placeholder="examplemail@gmail.com" required>

        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="examplepassword" required>

        <label for="">Повторите пароль</label>
        <input type="password" name="password_confirm" placeholder="examplepassword" required>

        <button >Регистрация</button>
        
        <p class="textCenter">
            <a href="./login.php">Войти</a>
        </p>

            <?php
                //display errors if any
                if(isset($_SESSION['message'])){
                    echo '<p class="msg">'.$_SESSION['message'].'</p>';
                    unset($_SESSION['message']);
                }

            ?>
    </form>
    
<?php require_once('require/footer.php'); ?>
