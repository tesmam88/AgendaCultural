<?php
// Controller/LogoutController.php
session_start();

// Limpa todas as variáveis da sessão
session_unset();

// Destrói a sessão atual
session_destroy();

// Redireciona para a página home.php
header("Location: ../View/public/home.php");
exit;
?>