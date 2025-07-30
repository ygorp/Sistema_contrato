<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Prestação de Serviços</title>
    <style>
        @page { margin: 25mm 25mm 25mm 25mm; }
        body { font-family: sans-serif; font-size: 11pt; line-height: 1.5; }
        h1, h2, h3 { font-family: sans-serif; text-align: center; font-weight: bold; margin: 20px 0; }
        h1 { font-size: 14pt; }
        h2 { font-size: 12pt; }
        h3 { font-size: 11pt; text-align: left; margin-bottom: 5px; }
        p, li { text-align: justify; }
        ul { list-style-type: disc; padding-left: 20px; }
        .clausula { text-transform: uppercase; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        td { border: 1px solid #777; padding: 8px; vertical-align: top; }
        .label { font-weight: bold; width: 150px; }
        .no-border-table td { border: none; padding: 10px 0; }
    </style>
</head>
<body>
    <h1>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</h1>
    
    <table>
        <tr>
            <td class="label">CONTRATANTE</td>
            <td>
                <b><?php echo htmlspecialchars($contratante_razao_social); ?></b>, Pessoa Jurídica, inscrita no CNPJ sob o nº <b><?php echo htmlspecialchars($contratante_cnpj); ?></b>, Situada na <b><?php echo htmlspecialchars($contratante_endereco); ?></b>.
            </td>
        </tr>
        <tr>
            <td class="label">CONTRATADA</td>
            <td>
                <b>NÓRDICOS MÍDIA</b>, Pessoa Jurídica de Direito Privado, inscrita no CNPJ sob o nº 47.563.421/0001-94, situada em Av. dos Sabiás 182, Morada de Laranjeiras, Serra/ES CEP: 29166-630.
            </td>
        </tr>
    </table>

    <p>As PARTES, no uso de sua liberdade contratual, firmam o presente CONTRATO DE PRESTAÇÃO DE SERVIÇOS, nos termos e disposições adiante delimitados.</p>

    <h2>OBJETO</h2>
    <p><span class="clausula">OBJETO</span> – O presente Contrato tem como OBJETO a prestação de serviços de construção de website e campanhas de publicidade em plataformas de anúncios, com fins de aumento de visibilidade e vendas pelo CONTRATADO à CONTRATANTE, abrangendo os seguintes serviços:</p>
    <h3>Entregáveis:</h3>
    <ul>
        <?php 
            $lista_entregaveis = explode("\n", $entregaveis);
            foreach ($lista_entregaveis as $item) {
                echo "<li>" . htmlspecialchars(trim($item)) . "</li>";
            }
        ?>
    </ul>
    
    <p><span class="clausula">CONTRATAÇÕES ADICIONAIS</span> – <?php echo htmlspecialchars($contratacoes_adicionais); ?></p>

    <h2>PAGAMENTOS</h2>
    <p>Pelo presente instrumento e em contraprestação aos serviços a serem prestados pelo CONTRATADO, conforme estipulado neste contrato, a CONTRATANTE compromete-se a efetuar o pagamento da quantia total de <b>R$<?php echo number_format($valor_primeiro_mes, 2, ',', '.'); ?></b>, no primeiro mês de vigência deste contrato.</p>
    <p>Para os meses subsequentes ao primeiro, a CONTRATANTE obriga-se a pagar ao CONTRATADO a mensalidade fixa de <b>R$<?php echo number_format($valor_meses_seguintes, 2, ',', '.'); ?></b>, correspondente exclusivamente aos serviços de gestão.</p>
    <p>Fica estabelecido que o ciclo de faturamento da mensalidade terá início somente após a completa implementação do projeto pelo CONTRATADO, assegurando que o período contratual de gestão mensal, de 30 (trinta) dias, seja integralmente aproveitado pela CONTRATANTE, independentemente do tempo despendido para a implementação do projeto.</p>
    <p>Esta cláusula visa garantir a justa remuneração pelo escopo dos serviços prestados, assegurando a clareza e a previsibilidade financeira para ambas as partes envolvidas.</p>
    <p><span class="clausula">FORMA DOS PAGAMENTOS</span> – <?php echo htmlspecialchars($forma_pagamentos); ?></p>

    <h2>VIGÊNCIA, PRORROGAÇÃO E RESCISÃO</h2>
    <p><span class="clausula">Vigência:</span> Este Contrato entra em vigor na data de sua assinatura pelas Partes e permanecerá válido por um período de <b><?php echo htmlspecialchars($periodo_vigencia_meses); ?> (<?php // TODO: num to text ?>) meses</b> ("Período de Vigência"), com uma fidelidade mínima de <b><?php echo htmlspecialchars($fidelidade_minima_meses); ?> (<?php // TODO: num to text ?>) meses</b>, a menos que seja rescindido anteriormente conforme as disposições aqui estabelecidas.</p>
    <p><span class="clausula">Rescisão:</span></p>
    <p><span class="clausula">Rescisão por Mútuo Acordo:</span> As Partes podem, a qualquer momento, rescindir este Contrato por mútuo acordo, mediante a assinatura de um termo de rescisão.</p>
    <p><span class="clausula">Rescisão por Inadimplência:</span> Qualquer uma das Partes poderá rescindir este Contrato imediatamente, mediante notificação escrita à outra Parte, no caso de inadimplência substancial de qualquer das obrigações aqui estabelecidas, que não seja sanada dentro de 15 (quinze) dias após recebimento de notificação especificando a natureza da inadimplência.</p>
    <p><span class="clausula">Rescisão Unilateral:</span> Caso o Contratante deseje rescindir unilateralmente o Contrato antes do período de fidelidade de <?php echo htmlspecialchars($fidelidade_minima_meses); ?> (três) meses, será obrigatório o pagamento de todas as mensalidades pendentes até o cumprimento do referido período. Para os meses subsequentes, o Contratante poderá rescindir o Contrato unilateralmente mediante notificação escrita com antecedência mínima de 30 (trinta) dias, sendo obrigatório o pagamento da mensalidade referente ao período de aviso prévio.</p>
    <p><span class="clausula">Aviso Prévio:</span> A rescisão deste Contrato, por qualquer motivo, exigirá aviso prévio por escrito pela Parte que deseja rescindir, conforme estipulado nas cláusulas acima.</p>
    <p><span class="clausula">Consequências da Rescisão:</span> A rescisão deste Contrato não afetará quaisquer direitos ou obrigações que tenham surgido antes da data de rescisão, incluindo o direito de buscar reparação por qualquer violação do Contrato que tenha ocorrido antes de sua rescisão.</p>

    <h2>CONFIDENCIALIDADE E NÃO-CONCORRÊNCIA</h2>
    <p><span class="clausula">CONFIDENCIALIDADE</span> – A CONTRATADA concorda em receber todas e quaisquer informações, dados e documentos (independente da natureza destes) provenientes ou relacionados às atividades desenvolvidas pela CONTRATANTE em caráter de extrema confidencialidade, no que se refere às informações a que tenha tomado conhecimento ou lhe tenha sido dado conhecimento durante a vigência do presente Contrato – obrigando-se a CONTRATADA a guardar segredo sobre tais informações, não podendo utilizá-las em seu próprio benefício, tampouco revelar, ceder, vender, partilhar ou permitir a sua duplicação, uso ou divulgação, no todo ou em parte, a quaisquer terceiros não expressamente autorizados pela CONTRATANTE, somente ficando autorizada a utilizar as referidas informações para o propósito específico pelo qual estas tenham sido ou venham a ser reveladas ou acessadas.</p>
    <p><span class="clausula">EXCEÇÕES À CONFIDENCIALIDADE</span> – As restrições previstas neste Contrato não se aplicam às informações que sejam: publicadas pela CONTRATANTE, seus clientes ou se tornem de domínio público; comprovadamente, de conhecimento prévio da CONTRATADA e já estejam livres de quaisquer obrigações de confidencialidade; obtidas legalmente pela CONTRATADA, de terceiro que tenha direitos legítimos para declará-las; identificadas pela CONTRATANTE, de forma escrita, como não sendo mais confidenciais, restritas ou de sua propriedade.</p>
    
    <h2>CLÁUSULAS GERAIS</h2>
    <p><span class="clausula">CUSTOS</span> – Nos pagamentos realizados pela CONTRATANTE à CONTRATADA estão incluídos todos os custos diretos e indiretos relacionados aos Serviços... [resto do texto da cláusula]</p>
    <p><span class="clausula">TRIBUTOS</span> – As Partes assumirão, cada uma na sua respectiva proporção legal, os tributos... [resto do texto da cláusula]</p>
    <p><span class="clausula">ALTERAÇÃO DAS DISPOSIÇÕES</span> – Este Contrato obriga as Partes e somente poderá ser alterado... [resto do texto da cláusula]</p>
    <p><span class="clausula">NÃO EXERCÍCIO VOLUNTÁRIO DE DIREITOS</span> – O não exercício, pelas Partes, de quaisquer dos direitos... [resto do texto da cláusula]</p>
    <p><span class="clausula">INVALIDADE</span> – No caso de qualquer disposição deste Contrato ser considerada inválida... [resto do texto da cláusula]</p>
    
    <p>E por estarem de acordo, as partes, por meio de seus representantes legais, assinam o presente Contrato em 2 (duas) vias de igual teor e valor, para um só efeito e na presença das testemunhas mencionadas abaixo, produzir os seus efeitos, obrigando as Partes e seus cessionários ou sucessores a qualquer título.</p>
    
    <p style="text-align: right; margin-top: 30px;"><?php echo htmlspecialchars($local_assinatura); ?>, <?php setlocale(LC_TIME, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil'); echo strftime('%d de %B de %Y', strtotime($data_assinatura)); ?>.</p>

    <br><br><br>

    <table class="no-border-table">
        <tr>
            <td style="text-align:center;">
                _____________________________<br>
                <b>CONTRATANTE</b><br>
                (Rep. Por: <?php echo htmlspecialchars($contratante_representante); ?>)
            </td>
            <td style="text-align:center;">
                 _____________________________<br>
                <b>CONTRATADA</b><br>
                (Rep. Por: MORÔNI NASCIMENTO XAVIER)
            </td>
        </tr>
        <tr><td colspan="2" style="padding: 20px;"></td></tr>
        <tr>
            <td style="text-align:center;">
                _____________________________<br>
                <b>TESTEMUNHA 1</b><br>
                NOME: <?php echo htmlspecialchars($testemunha1_nome); ?><br>
                CPF: <?php echo htmlspecialchars($testemunha1_cpf); ?>
            </td>
            <td style="text-align:center;">
                 _____________________________<br>
                <b>TESTEMUNHA 2</b><br>
                NOME: <?php echo htmlspecialchars($testemunha2_nome); ?><br>
                CPF: <?php echo htmlspecialchars($testemunha2_cpf); ?>
            </td>
        </tr>
    </table>
</body>
</html>