<?php
// Documentação: Script de Autenticação (includes/auth.php)
// Responsável por verificar se um usuário está logado.
// Ele deve ser incluído no topo de todas as páginas restritas.

// 1. Inclui o db.php, que já inicia a sessão (session_start())
require_once 'db.php';

// 2. Verifica se a variável de sessão 'usuario_id' NÃO está definida.
// Se não estiver, significa que o usuário não fez login.
if (!isset($_SESSION['usuario_id'])) {
    // 3. Se não estiver logado, destrói qualquer resquício de sessão.
    session_destroy();

    // 4. Redireciona o usuário para a página de login.
    header("Location: login.php");
    
    // 5. Interrompe a execução do script para garantir que o conteúdo
    // da página protegida não seja exibido.
    exit();
}
?>