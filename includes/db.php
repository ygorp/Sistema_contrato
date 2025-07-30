<?php
// Documentação: Arquivo de Conexão com o Banco de Dados (includes/db.php)
// Responsável por estabelecer a conexão com o MySQL.
// As variáveis devem ser alteradas com suas credenciais do banco de dados.

// Variáveis de conexão
$dbHost = 'localhost'; // Geralmente 'localhost'
$dbUser = 'root';      // Usuário do banco de dados
$dbPass = 'P@checo7292';          // Senha do banco de dados
$dbName = 'sistemacontratos'; // Nome do banco de dados que criamos

// Estabelece a conexão
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    // Se houver um erro, interrompe a execução e exibe a mensagem de erro.
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicia a sessão em todas as páginas que incluírem este arquivo.
// A sessão é usada para manter o usuário logado.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>