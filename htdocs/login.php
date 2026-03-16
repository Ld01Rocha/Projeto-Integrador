<?php
// 1. Conexão correta apontando para a sua pasta config.json
include("config.json/conexao.php");
session_start();

$mensagem_erro = "";
$mensagem_sucesso = "";

// 2. Lógica de LOGIN (Ajustada para a coluna 'tipo' do seu banco)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_confirm'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['password']; 
    $tipo_selecionado = $_POST['role']; // 'paciente' ou 'cuidador'

    // Ajustado para buscar na coluna 'tipo' conforme sua imagem do phpMyAdmin
    $sql = "SELECT * FROM tb_usuarios WHERE email = '$email' AND senha = '$senha' AND tipo = '$tipo_selecionado'";
    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $usuario = $query->fetch_assoc();
        $_SESSION['usuario_id'] = $usuario['id']; // Na sua imagem a chave primária é 'id'
        $_SESSION['usuario_nome'] = $usuario['nome'];
        
        if ($tipo_selecionado == 'cuidador') {
            header("Location: PaginaInicialCuidador.html");
        } else {
            header("Location: PaginaInicialPaciente.html");
        }
        exit;
    } else {
        $mensagem_erro = "E-mail, senha ou tipo de conta incorretos!";
    }
}

// 3. Lógica de CADASTRO (Ajustada para a estrutura da sua tb_usuarios)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_confirm'])) {
    $nome = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['password'];
    $tipo = $_POST['role'];

    // Verifica se e-mail já existe
    $check = $conn->query("SELECT id FROM tb_usuarios WHERE email = '$email'");
    if ($check->num_rows > 0) {
        $mensagem_erro = "Este e-mail já está cadastrado!";
    } else {
        // Inserindo conforme as colunas da sua imagem: nome, email, senha, tipo
        $sql_ins = "INSERT INTO tb_usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
        if ($conn->query($sql_ins)) {
            $mensagem_sucesso = "Cadastro realizado com sucesso! Agora você pode entrar.";
        } else {
            $mensagem_erro = "Erro ao cadastrar: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHealth - Login e Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ph-primary': '#10b981',
                        'ph-dark': '#0f766e',
                        'ph-accent': '#047857',
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>
        body { background: linear-gradient(135deg, #0f766e 0%, #11a282 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1rem; }
        .form-content { display: none; }
        .form-content.active { display: block; }
        .tab-button { cursor: pointer; padding-bottom: 0.5rem; border-bottom: 3px solid transparent; transition: 0.2s; }
        .tab-button.active { color: #10b981; border-bottom-color: #10b981; font-weight: 600; }
        .btn-primary { background-color: #10b981; transition: 0.2s; }
        .btn-primary:hover { background-color: #047857; }
    </style>
</head>
<body>

    <div class="bg-white shadow-2xl rounded-xl max-w-4xl w-full flex flex-col md:flex-row overflow-hidden">
        
        <div class="md:w-1/2 p-8 text-white bg-ph-accent bg-opacity-90 flex flex-col justify-center space-y-6">
            <h1 class="text-3xl font-bold">PharmaHealth</h1>
            <p class="opacity-80 italic">Sistema de Gestão de Medicamentos</p>
            <ul class="space-y-3 mt-4">
                <li>🔔 Lembretes inteligentes</li>
                <li>📈 Acompanhamento real</li>
                <li>🧑‍🤝‍🧑 Perfis para todos</li>
            </ul>
        </div>

        <div class="md:w-1/2 p-8 md:p-12 space-y-6">
            <div id="tabs-container" class="flex border-b border-gray-200 mb-4">
                <button class="tab-button active mr-6" onclick="showForm('login', this)">Login</button>
                <button class="tab-button" onclick="showForm('cadastro', this)">Cadastro</button>
            </div>

            <?php if($mensagem_erro): ?>
                <div class="p-3 bg-red-100 text-red-700 rounded-lg text-sm mb-4"><?php echo $mensagem_erro; ?></div>
            <?php endif; ?>
            <?php if($mensagem_sucesso): ?>
                <div class="p-3 bg-green-100 text-green-700 rounded-lg text-sm mb-4"><?php echo $mensagem_sucesso; ?></div>
            <?php endif; ?>

            <form id="form-login" class="form-content active space-y-4" method="POST">
                <input type="hidden" name="login_confirm" value="1">
                <div>
                    <label class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-ph-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:ring-ph-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Entrar como:</label>
                    <select name="role" required class="w-full px-4 py-2 border rounded-lg bg-white">
                        <option value="paciente">Paciente</option>
                        <option value="cuidador">Cuidador</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg shadow-md">Entrar</button>
            </form>

            <form id="form-cadastro" class="form-content space-y-4" method="POST">
                <input type="hidden" name="register_confirm" value="1">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-ph-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-ph-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Senha</label>
                    <input type="password" name="password" minlength="8" required class="w-full px-4 py-2 border rounded-lg focus:ring-ph-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Você será:</label>
                    <select name="role" required class="w-full px-4 py-2 border rounded-lg bg-white">
                        <option value="paciente">Paciente</option>
                        <option value="cuidador">Cuidador</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg">Criar Conta</button>
            </form>
        </div>
    </div>

    <script>
        function showForm(type, btn) {
            document.querySelectorAll('.tab-button').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.form-content').forEach(f => f.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('form-' + type).classList.add('active');
        }
    </script>
</body>
</html>