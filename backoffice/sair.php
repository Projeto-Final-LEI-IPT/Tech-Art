<?php
// Inicia sessões, para assim poder destruí-las 
if (!isset($_SESSION)) {
  session_start();
}
session_destroy(); 
header("Location: login.php"); 
?>