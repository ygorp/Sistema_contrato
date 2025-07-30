<?php
// Documentação: Script para Baixar Contrato (baixar_contrato.php)
// 1. Exige autenticação.
// 2. Pega o ID do contrato da URL (ex: baixar_contrato.php?id=5).
// 3. Busca no banco de dados todas as informações do contrato com aquele ID.
// 4. Se o contrato for encontrado, ele repete o processo de geração do PDF:
//    a. Inclui a biblioteca Mpdf.
//    b. Carrega o template HTML do contrato.
//    c. As variáveis do template são preenchidas com os dados vindos do banco.
//    d. O Mpdf converte o HTML para PDF e força o download.
// 5. Se o contrato não for encontrado, exibe uma mensagem de erro.

require_once 'includes/auth.php';
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($_GET['id'])) {
    die("ID do contrato não fornecido.");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM contratos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $contrato = $result->fetch_assoc();

    // Extrai os dados para variáveis com nomes mais curtos, para usar no template
    extract($contrato);

    // Gera o HTML do contrato usando o template
    ob_start();
    include 'templates/contrato_template.php';
    $html = ob_get_clean();

    // Instancia o Mpdf e gera o PDF
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);

    // Define o nome do arquivo
    $nome_arquivo = "Contrato-Nordicos-Midia-" . str_replace(' ', '-', $contratante_razao_social) . "-{$id}.pdf";
    
    // Força o download no navegador
    $mpdf->Output($nome_arquivo, \Mpdf\Output\Destination::DOWNLOAD);
    
    exit;

} else {
    die("Contrato não encontrado.");
}

$stmt->close();
$conn->close();
?>