<?php
    $connect=mysqli_connect('localhost', 'root', '', 'apple_city_corps');

    //stop working if db connection is unsuccessful
    if (!$connect){
        die('error connect');
    }
?>