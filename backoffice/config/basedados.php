<?php
require 'credentials.php';

$servername = "127.0.0.1";
$username = USERNAME;
$password = PASSWORD;
$dbname = "c14ntecneartbd";
$charset = "utf8";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, $charset);
?>