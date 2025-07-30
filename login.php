<?php
// Documentação: Página de Login (login.php)
// 1. Inclui a conexão com o banco de dados.
// 2. Verifica se o formulário foi enviado (método POST).
// 3. Se sim, busca no banco o usuário pelo e-mail fornecido.
// 4. Se o usuário existe, verifica se a senha está correta usando password_verify().
// 5. Se a senha estiver correta, armazena o ID e o e-mail do usuário na sessão
//    e o redireciona para o dashboard.
// 6. Caso contrário, define uma mensagem de erro a ser exibida.

require_once 'includes/db.php';
$erro_login = '';

// Verifica se o usuário já está logado e, em caso afirmativo, redireciona para o dashboard
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        // Verifica a senha enviada com o hash salvo no banco
        if (password_verify($senha, $usuario['senha'])) {
            // Senha correta! Inicia a sessão.
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_email'] = $email;
            header("Location: dashboard.php");
            exit();
        }
    }
    
    // Se chegou até aqui, o login falhou
    $erro_login = "E-mail ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Contratos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --cor-primaria: #2a4b6a; }
        .bg-primario { background-color: var(--cor-primaria); }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <form action="login.php" method="POST" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            <div class="mb-6 text-center">
                <img src="assets/images/logo.png" alt="Logo" class="mx-auto w-96 h-24 mb-4">
                <h1 class="text-2xl font-bold text-gray-700">Acesso ao Sistema</h1>
            </div>

            <?php if (!empty($erro_login)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo $erro_login; ?></span>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    E-mail
                </label>
                <input id="email" name="email" type="email" placeholder="seu@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-6">
                <label for="senha" class="block text-gray-700 text-sm font-bold mb-2">
                    Senha
                </label>
                <input id="senha" name="senha" type="password" placeholder="******************" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-primario hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                    Entrar
                </button>
            </div>
        </form>
    </div>
</body>
</html>