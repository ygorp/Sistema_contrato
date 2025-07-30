<?php
// Documentação: Script de Logout (logout.php)
// 1. Inicia a sessão para poder manipulá-la.
// 2. Limpa todas as variáveis de sessão.
// 3. Destrói a sessão completamente.
// 4. Redireciona o usuário para a página de login.

session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>