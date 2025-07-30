<?php
// Documentação: Script para Excluir um Contrato
// 1. Requer autenticação.
// 2. Verifica se um ID foi passado pela URL.
// 3. Prepara e executa uma declaração SQL DELETE para remover o contrato.
// 4. Armazena uma mensagem de sucesso na sessão.
// 5. Redireciona o usuário de volta para o dashboard.

require_once 'includes/auth.php';

// Verifica se o ID foi fornecido e é um número
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepara a declaração para evitar SQL Injection
    $stmt = $conn->prepare("DELETE FROM contratos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Se a exclusão for bem-sucedida, define a mensagem
        $_SESSION['mensagem'] = "Contrato #" . $id . " excluído com sucesso!";
    } else {
        // Se houver um erro, pode definir uma mensagem de erro
        $_SESSION['mensagem'] = "Erro ao excluir o contrato: " . $conn->error;
    }
    $stmt->close();
} else {
    $_SESSION['mensagem'] = "ID do contrato inválido ou não fornecido.";
}

$conn->close();

// Redireciona de volta para a página principal
header("Location: dashboard.php");
exit();
?>