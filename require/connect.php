<?php
//set DSN = data source name
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','apple_city_corps');
$dsn = 'mysql:host='. DB_HOST .';dbname='. DB_NAME;

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

?>