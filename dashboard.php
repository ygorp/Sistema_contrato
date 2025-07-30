<?php
require_once 'includes/auth.php'; 

// Busca os contratos do banco
$sql = "SELECT id, contratante_razao_social, contratante_cnpj, criado_em FROM contratos ORDER BY criado_em DESC";
$result = $conn->query($sql);

// Pega a mensagem de sucesso da sessão, se existir
$mensagem_sucesso = '';
if (isset($_SESSION['mensagem'])) {
    $mensagem_sucesso = $_SESSION['mensagem'];
    // Limpa a mensagem da sessão para que não apareça novamente
    unset($_SESSION['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Contratos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --cor-primaria: #2a4b6a; }
        .bg-primario { background-color: var(--cor-primaria); }
        .text-primario { color: var(--cor-primaria); }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-primario">Meus Contratos</h1>
            <div>
                <a href="novo_contrato.php" class="bg-primario hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
                    + Gerar Novo Contrato
                </a>
                <a href="logout.php" class="ml-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Sair
                </a>
            </div>
        </header>

        <?php if (!empty($mensagem_sucesso)): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p><?php echo $mensagem_sucesso; ?></p>
            </div>
        <?php endif; ?>

        <main class="bg-white p-6 rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4">Contratante</th>
                            <th scope="col" class="px-6 py-4">Data de Criação</th>
                            <th scope="col" class="px-6 py-4 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($contrato = $result->fetch_assoc()): ?>
                                <tr class="border-b">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="font-medium"><?php echo htmlspecialchars($contrato['contratante_razao_social']); ?></div>
                                        <div class="text-gray-500"><?php echo htmlspecialchars($contrato['contratante_cnpj']); ?></div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4"><?php echo date("d/m/Y H:i", strtotime($contrato['criado_em'])); ?></td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        <a href="baixar_contrato.php?id=<?php echo $contrato['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-4" title="Baixar PDF" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                                        </a>
                                        <a href="editar_contrato.php?id=<?php echo $contrato['id']; ?>" class="text-yellow-600 hover:text-yellow-800 mr-4" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <a href="excluir_contrato.php?id=<?php echo $contrato['id']; ?>" class="text-red-600 hover:text-red-800" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este contrato? Esta ação não pode ser desfeita.');">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center p-6 text-gray-500">Nenhum contrato gerado ainda.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
<?php $conn->close(); ?>