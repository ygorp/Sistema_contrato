<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Novo Contrato - Sistema de Contratos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --cor-primaria: #2a4b6a; }
        .bg-primario { background-color: var(--cor-primaria); }
        .text-primario { color: var(--cor-primaria); }
        textarea { height: 150px; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-primario">Gerar Novo Contrato</h1>
            <a href="dashboard.php" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Voltar ao Dashboard</a>
        </div>
        
        <form action="gerar_contrato.php" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            <fieldset class="border-t-4 border-primario p-6 mb-6">
                <legend class="text-xl font-semibold text-primario px-2">Dados do Contratante</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="contratante_razao_social" class="block text-gray-700 font-bold mb-2">Razão Social / Nome</label>
                        <input type="text" name="contratante_razao_social" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div>
                        <label for="contratante_cnpj" class="block text-gray-700 font-bold mb-2">CNPJ / CPF</label>
                        <input type="text" name="contratante_cnpj" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="md:col-span-2">
                        <label for="contratante_endereco" class="block text-gray-700 font-bold mb-2">Endereço Completo</label>
                        <input type="text" name="contratante_endereco" placeholder="Rua, Nº, Bairro, Cidade-UF, CEP" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div>
                        <label for="contratante_representante" class="block text-gray-700 font-bold mb-2">Representante Legal</label>
                        <input type="text" name="contratante_representante" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border-t-4 border-primario p-6 mb-6">
                <legend class="text-xl font-semibold text-primario px-2">Objeto do Contrato</legend>
                <div>
                    <label for="entregaveis" class="block text-gray-700 font-bold mb-2">Entregáveis</label>
                    <textarea name="entregaveis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">Criação de páginas de captação de clientes (Landing Pages) no website do contratante
Criação, edição e atualização de criativos para anúncios online
Atualizações e otimizações nas campanhas do google ads e meta ads,
Criação de campanhas no google e meta Ads e configuração de tags de Conversão.
Gestão das campanhas; análises, atualizações e otimizações diárias ou conforme necessárias.
Atendimento em horário comercial em dias úteis.
Relatórios de funil de vendas e feedbacks semanais.
Reuniões mensais de alinhamento operacional.
Gestão de funil de vendas.
Treinamento e suporte comercial para vendas.</textarea>
                </div>
                <div class="mt-4">
                    <label for="contratacoes_adicionais" class="block text-gray-700 font-bold mb-2">Contratações Adicionais</label>
                    <textarea name="contratacoes_adicionais" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">Qualquer serviço adicional não previsto neste contrato deverá ser previamente negociado entre a CONTRATANTE e o CONTRATADO, por escrito mediante termo aditivo ao presente Contrato, antes de ser iniciado.</textarea>
                </div>
            </fieldset>

            <fieldset class="border-t-4 border-primario p-6 mb-6">
                <legend class="text-xl font-semibold text-primario px-2">Pagamentos e Vigência</legend>
                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                     <div>
                        <label for="valor_primeiro_mes" class="block text-gray-700 font-bold mb-2">Valor 1º Mês (R$)</label>
                        <input type="number" step="0.01" name="valor_primeiro_mes" value="1500.00" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div>
                        <label for="valor_meses_seguintes" class="block text-gray-700 font-bold mb-2">Valor Seguintes (R$)</label>
                        <input type="number" step="0.01" name="valor_meses_seguintes" value="1500.00" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                     <div>
                        <label for="periodo_vigencia_meses" class="block text-gray-700 font-bold mb-2">Vigência (meses)</label>
                        <input type="number" name="periodo_vigencia_meses" value="12" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div>
                        <label for="fidelidade_minima_meses" class="block text-gray-700 font-bold mb-2">Fidelidade (meses)</label>
                        <input type="number" name="fidelidade_minima_meses" value="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                 </div>
                 <div class="mt-4">
                    <label for="forma_pagamentos" class="block text-gray-700 font-bold mb-2">Forma dos Pagamentos</label>
                    <textarea name="forma_pagamentos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">Pela prestação de serviços ora acordada, o CONTRATANTE pagará ao CONTRATADO o valor devido por meio de Pix, transferência bancária, e/ou cartão de crédito.</textarea>
                </div>
            </fieldset>

            <fieldset class="border-t-4 border-primario p-6 mb-6">
                <legend class="text-xl font-semibold text-primario px-2">Testemunhas e Local</legend>
                 <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div class="font-bold text-gray-600 col-span-2 md:col-span-1">Testemunha 1</div>
                    <div class="font-bold text-gray-600 col-span-2 md:col-span-1">Testemunha 2</div>
                    <div>
                        <label for="testemunha1_nome" class="block text-gray-700 mb-1">Nome Completo</label>
                        <input type="text" name="testemunha1_nome" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                     <div>
                        <label for="testemunha2_nome" class="block text-gray-700 mb-1">Nome Completo</label>
                        <input type="text" name="testemunha2_nome" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <div>
                        <label for="testemunha1_cpf" class="block text-gray-700 mb-1">CPF</label>
                        <input type="text" name="testemunha1_cpf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                     <div>
                        <label for="testemunha2_cpf" class="block text-gray-700 mb-1">CPF</label>
                        <input type="text" name="testemunha2_cpf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    </div>
                    <hr class="col-span-2 my-2"/>
                    <div>
                        <label for="local_assinatura" class="block text-gray-700 font-bold mb-2">Local de Assinatura</label>
                        <input type="text" name="local_assinatura" value="Serra – ES" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div>
                        <label for="data_assinatura" class="block text-gray-700 font-bold mb-2">Data de Assinatura</label>
                        <input type="date" name="data_assinatura" value="<?php echo date('Y-m-d'); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                 </div>
            </fieldset>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-primario hover:bg-blue-900 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                    Gerar e Salvar Contrato
                </button>
            </div>
        </form>
    </div>
</body>
</html>