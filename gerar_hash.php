<?php
// Documentação: Gerador de Hash de Senha (gerar_hash.php)
// Este é um script de uso único para criar um hash de senha seguro.
// ATENÇÃO: Delete este arquivo do seu servidor após o uso!

// Defina a senha que você quer usar para o login.
$senha_texto_puro = 'admin123';

// Gera o hash usando o algoritmo padrão e mais seguro.
$hash_gerado = password_hash($senha_texto_puro, PASSWORD_DEFAULT);

// Exibe o hash na tela para que você possa copiá-lo.
echo "Senha em texto puro: " . htmlspecialchars($senha_texto_puro) . "<br><br>";
echo "Seu hash seguro é:<br>";
echo "<strong>" . htmlspecialchars($hash_gerado) . "</strong>";

?>