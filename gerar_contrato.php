<?php

require_once 'includes/db.php';
require_once 'includes/auth.php'; // Descomente quando a tela de login estiver pronta
require_once __DIR__ . '/../vendor/autoload.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta de todos os dados do formulário
    $usuario_id = 1; // Substituir por $_SESSION['usuario_id'] quando o login estiver ativo
    
    // Dados do Contratante
    $contratante_razao_social = $_POST['contratante_razao_social'];
    $contratante_cnpj = $_POST['contratante_cnpj'];
    $contratante_endereco = $_POST['contratante_endereco'];
    $contratante_representante = $_POST['contratante_representante'];
    
    // Objeto do Contrato
    $entregaveis = $_POST['entregaveis'];
    $contratacoes_adicionais = $_POST['contratacoes_adicionais'];
    
    // Pagamentos e Vigência
    $valor_primeiro_mes = $_POST['valor_primeiro_mes'];
    $valor_meses_seguintes = $_POST['valor_meses_seguintes'];
    $periodo_vigencia_meses = $_POST['periodo_vigencia_meses'];
    $fidelidade_minima_meses = $_POST['fidelidade_minima_meses'];
    $forma_pagamentos = $_POST['forma_pagamentos'];

    // Testemunhas e Local
    $testemunha1_nome = $_POST['testemunha1_nome'];
    $testemunha1_cpf = $_POST['testemunha1_cpf'];
    $testemunha2_nome = $_POST['testemunha2_nome'];
    $testemunha2_cpf = $_POST['testemunha2_cpf'];
    $local_assinatura = $_POST['local_assinatura'];
    $data_assinatura = $_POST['data_assinatura'];

    // Salvar no banco de dados com os novos campos
    $sql = "INSERT INTO contratos (
                usuario_id, contratante_razao_social, contratante_cnpj, contratante_endereco, contratante_representante,
                entregaveis, contratacoes_adicionais, forma_pagamentos,
                testemunha1_nome, testemunha1_cpf, testemunha2_nome, testemunha2_cpf,
                valor_primeiro_mes, valor_meses_seguintes, periodo_vigencia_meses, fidelidade_minima_meses,
                local_assinatura, data_assinatura
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isssssssssssddiiss", // Os tipos de dados correspondentes a cada '?'
        $usuario_id, $contratante_razao_social, $contratante_cnpj, $contratante_endereco, $contratante_representante,
        $entregaveis, $contratacoes_adicionais, $forma_pagamentos,
        $testemunha1_nome, $testemunha1_cpf, $testemunha2_nome, $testemunha2_cpf,
        $valor_primeiro_mes, $valor_meses_seguintes, $periodo_vigencia_meses, $fidelidade_minima_meses,
        $local_assinatura, $data_assinatura
    );
    $stmt->execute();
    $contrato_id = $stmt->insert_id;
    $stmt->close();

    // Gerar o HTML do contrato
    ob_start();
    include 'templates/contrato_template.php'; 
    $html = ob_get_clean();

    // Instanciar o Mpdf e gerar o PDF
    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/vendor/mpdf/mpdf/tmp']);
    $mpdf->WriteHTML($html);
    
    $nome_arquivo = "Contrato-Nordicos-Midia-" . str_replace(' ', '-', $contratante_razao_social) . "-{$contrato_id}.pdf";
    $mpdf->Output($nome_arquivo, \Mpdf\Output\Destination::DOWNLOAD);
    
    exit;
}
?>