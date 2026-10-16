<?php
if (!isset($_SESSION)) {
  session_start();
}

require 'credentials.php';

function pdo_connect_mysql() {
    $host = '127.0.0.1';
    $db = 'c14ntecneartbd';
    $user = USERNAME;
    $pass = PASSWORD;
    //$charset = 'utf8mb4';
    $charset = 'utf8';
    

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    }

    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>


