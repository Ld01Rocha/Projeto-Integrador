<?php
/**
 * processar_cadastro.php
 * Script para registro de novos usuários do sistema PharmaHealth
 */

// Inicia a sessão
session_start();

// Configurações de segurança
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Inclui a conexão com o banco de dados
require_once 'conexao.php';

/**
 * Função para enviar resposta JSON
 */
function enviarResposta($sucesso, $mensagem, $dados = []) {
    $resposta = [
        'sucesso' => $sucesso,
        'mensagem' => $mensagem
    ];
    
    if (!empty($dados)) {
        $resposta['dados'] = $dados;
    }
    
    echo json_encode($resposta, JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Função para limpar e validar entrada
 */
function limparEntrada($dado) {
    return htmlspecialchars(strip_tags(trim($dado)), ENT_QUOTES, 'UTF-8');
}

/**
 * Valida força da senha
 */
function validarForcaSenha($senha) {
    $erros = [];
    
    if (strlen($senha) < 8) {
        $erros[] = 'A senha deve ter no mínimo 8 caracteres';
    }
    
    if (!preg_match('/[A-Z]/', $senha)) {
        $erros[] = 'A senha deve conter pelo menos uma letra maiúscula';
    }
    
    if (!preg_match('/[a-z]/', $senha)) {
        $erros[] = 'A senha deve conter pelo menos uma letra minúscula';
    }
    
    if (!preg_match('/[0-9]/', $senha)) {
        $erros[] = 'A senha deve conter pelo menos um número';
    }
    
    return $erros;
}

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    enviarResposta(false, 'Método não permitido');
}

// Verifica se a conexão com o banco existe
if (!isset($conn)) {
    enviarResposta(false, 'Erro de conexão com o banco de dados');
}

// Recebe e limpa os dados do formulário
$nome = limparEntrada($_POST['name'] ?? '');
$email = limparEntrada($_POST['email'] ?? '');
$senha = $_POST['password'] ?? '';
$confirmar_senha = $_POST['confirm_password'] ?? '';
$tipo_perfil = limparEntrada($_POST['role'] ?? '');

// Validação básica de campos vazios
if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha) || empty($tipo_perfil)) {
    enviarResposta(false, 'Preencha todos os campos obrigatórios');
}

// Valida o nome (mínimo 3 caracteres)
if (strlen($nome) < 3) {
    enviarResposta(false, 'O nome deve ter no mínimo 3 caracteres');
}

// Valida o formato do e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    enviarResposta(false, 'Formato de e-mail inválido');
}

// Valida o tamanho da senha
if (strlen($senha) < 8) {
    enviarResposta(false, 'A senha deve ter no mínimo 8 caracteres');
}

// Valida se as senhas coincidem
if ($senha !== $confirmar_senha) {
    enviarResposta(false, 'As senhas não coincidem');
}

// Valida força da senha (opcional - pode ser descomentado)
/*
$erros_senha = validarForcaSenha($senha);
if (!empty($erros_senha)) {
    enviarResposta(false, implode('. ', $erros_senha));
}
*/

// Valida o tipo de perfil
$perfis_validos = ['cuidador', 'paciente'];
if (!in_array($tipo_perfil, $perfis_validos)) {
    enviarResposta(false, 'Tipo de perfil inválido');
     if($row['perfil'] == 'cuidador') {
            header("Location: paginaInicialCuidador.html");
              } else {
            header("Location: PaginaInicialPaciente.html");
              }
            } else {
             echo "Senha incorreta ou perfil incompatível.";
            }
}

try {
    // Verifica se o e-mail já está cadastrado
    $sql_verifica = "SELECT id FROM usuario WHERE email = ? LIMIT 1";
    $stmt_verifica = $conn->prepare($sql_verifica);
    
    if (!$stmt_verifica) {
        throw new Exception('Erro ao preparar consulta de verificação');
    }
    
    $stmt_verifica->bind_param("s", $email);
    $stmt_verifica->execute();
    $resultado_verifica = $stmt_verifica->get_result();
    
    if ($resultado_verifica->num_rows > 0) {
        $stmt_verifica->close();
        enviarResposta(false, 'Este e-mail já está cadastrado no sistema');
    }
    
    $stmt_verifica->close();
    
    // Hash da senha usando bcrypt (seguro)
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
    // Prepara a inserção do novo usuário
    $sql_insert = "INSERT INTO usuario (nome, email, senha, tipo_perfil, ativo, data_cadastro) VALUES (?, ?, ?, ?, 1, NOW())";
    
    $stmt_insert = $conn->prepare($sql_insert);
    
    if (!$stmt_insert) {
        throw new Exception('Erro ao preparar consulta de inserção');
    }
    
    $stmt_insert->bind_param("ssss", $nome, $email, $senha_hash, $tipo_perfil);
    
    if (!$stmt_insert->execute()) {
        throw new Exception('Erro ao executar inserção: ' . $stmt_insert->error);
    }
    
    $novo_usuario_id = $stmt_insert->insert_id;
    $stmt_insert->close();
    
    // Registra log de cadastro (opcional)
    $log_sql = "INSERT INTO log_cadastros (usuario_id, data_hora, ip_address) VALUES (?, NOW(), ?)";
    $log_stmt = $conn->prepare($log_sql);
    if ($log_stmt) {
        $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'desconhecido';
        $log_stmt->bind_param("is", $novo_usuario_id, $ip_address);
        $log_stmt->execute();
        $log_stmt->close();
    }
    
    // Envia e-mail de boas-vindas (opcional)
    /*
    $assunto = "Bem-vindo ao PharmaHealth";
    $mensagem = "Olá $nome,\n\nSeu cadastro foi realizado com sucesso!\n\nTipo de perfil: " . ucfirst($tipo_perfil);
    $headers = "From: noreply@pharmahealth.com";
    mail($email, $assunto, $mensagem, $headers);
    */
    
    // Sucesso
    enviarResposta(true, 'Cadastro realizado com sucesso! Você já pode fazer login.', [
        'usuario_id' => $novo_usuario_id,
        'nome' => $nome,
        'email' => $email,
        'tipo_perfil' => $tipo_perfil
    ]);
    
} catch (Exception $e) {
    // Log do erro
    error_log("Erro no cadastro: " . $e->getMessage());
    
    // Não expor detalhes do erro ao usuário
    enviarResposta(false, 'Erro ao processar cadastro. Tente novamente mais tarde.');
    
} finally {
    // Fecha a conexão com o banco de dados
    if (isset($conn)) {
        $conn->close();
    }
}
?>