<?php
    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    //authorize when passwords match
    if ($password==$password_confirm){
        $password = md5($password);
        mysqli_query($connect,"INSERT INTO users (id, full_name, login, phone_number, email, password) 
                               VALUES (NULL, '{$full_name}', '{$login}', '{$phone_number}', '{$email}', '{$password}') ");

        $_SESSION['message'] = 'Registration is completed successfuly';
        
        header('Location: ../login.php');
    }else{
        $_SESSION['message'] = 'Passwords do not match';
        header('Location: ../register.php');
    }
?>

<pre>
    <?php
        print_r($_FILES);
    ?>
</pre>
