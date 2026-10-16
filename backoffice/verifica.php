<?php
// Inicia sessão 
if (!isset($_SESSION)) {
  session_start();
}
// Verifica se existe os dados da sessão de login e se está autenticado
if (!isset($_SESSION["autenticado"])) {
    // Usuário não logado! Redireciona para a página de login 
    header("Location: ../login.php");
    exit;
}
if ($_SESSION["autenticado"] == false) {
    header("Location: ../login.php");
    exit;
}

require "navbar.php";
?>