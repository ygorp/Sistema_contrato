<?php
// Documentação: Script para Salvar as Alterações de um Contrato
// 1. Requer autenticação.
// 2. Verifica se a requisição é do tipo POST.
// 3. Coleta todos os dados do formulário, incluindo o ID oculto.
// 4. Constrói e prepara uma declaração SQL UPDATE.
// 5. Vincula todos os parâmetros e executa a atualização.
// 6. Define uma mensagem de sucesso na sessão e redireciona para o dashboard.

require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // --- Coleta de todos os dados do formulário ---
    $id = $_POST['id'];

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

    // --- Constrói a declaração UPDATE ---
    $sql = "UPDATE contratos SET 
                contratante_razao_social = ?, 
                contratante_cnpj = ?, 
                contratante_endereco = ?, 
                contratante_representante = ?, 
                entregaveis = ?, 
                contratacoes_adicionais = ?, 
                forma_pagamentos = ?,
                testemunha1_nome = ?, 
                testemunha1_cpf = ?, 
                testemunha2_nome = ?, 
                testemunha2_cpf = ?,
                valor_primeiro_mes = ?, 
                valor_meses_seguintes = ?, 
                periodo_vigencia_meses = ?, 
                fidelidade_minima_meses = ?,
                local_assinatura = ?, 
                data_assinatura = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    
    // Vincula os parâmetros. A ORDEM E OS TIPOS SÃO MUITO IMPORTANTES!
    // O 'i' do ID (WHERE id = ?) deve vir por último.
    $stmt->bind_param(
        "sssssssssssddiissi", // 17 strings, doubles e integers + 1 integer para o ID
        $contratante_razao_social,
        $contratante_cnpj,
        $contratante_endereco,
        $contratante_representante,
        $entregaveis,
        $contratacoes_adicionais,
        $forma_pagamentos,
        $testemunha1_nome,
        $testemunha1_cpf,
        $testemunha2_nome,
        $testemunha2_cpf,
        $valor_primeiro_mes,
        $valor_meses_seguintes,
        $periodo_vigencia_meses,
        $fidelidade_minima_meses,
        $local_assinatura,
        $data_assinatura,
        $id // O ID do WHERE é o último parâmetro
    );
    
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Contrato #" . $id . " atualizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar o contrato: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();

    header("Location: dashboard.php");
    exit();

} else {
    // Se alguém tentar acessar este arquivo diretamente, redireciona
    header("Location: dashboard.php");
    exit();
}
?>