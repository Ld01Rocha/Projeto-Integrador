<?php
// conexao.php — Configuração do banco InfinityFree corrigida

// 1. Dados de acesso (Sempre use o Hostname do painel, nunca 127.0.0.1)
$servidor = "sql306.infinityfree.com"; 
$usuario  = "if0_39803719"; 
$senha    = "FsmEMKOLsmtel"; 
$banco    = "if0_39803719_pharmahealth";

// 2. Cria a conexão usando a biblioteca mysqli
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// 3. Define o charset para evitar erros de acentuação nos dados
$conn->set_charset("utf8mb4");

// 4. Verifica se houve erro na conexão
if ($conn->connect_error) {
    // Loga o erro internamente para o servidor
    error_log("Erro de Conexão com o Banco: " . $conn->connect_error); 
    
    // Exibe um alerta visual para você e interrompe o script
    die("<script>alert('Erro ao conectar com o banco: " . $conn->connect_error . "'); history.back();</script>");
}

// Se chegou aqui, a conexão foi um sucesso!
?>