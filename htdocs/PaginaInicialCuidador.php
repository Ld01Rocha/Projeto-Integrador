<?php
// 1. Inicia a sessão e conecta ao banco
session_start();
include('conexao.php');

// 2. Proteção: Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$id_logado = $_SESSION['usuario_id'];
$nome_logado = $_SESSION['usuario_nome'] ?? 'Cuidador';

// 3. BUSCA DE DADOS REAIS NAS SUAS TABELAS
// Conta medicamentos na tb_medicamentos
$sql_meds = "SELECT COUNT(*) as total FROM tb_medicamentos WHERE id_usuario = '$id_logado'";
$res_meds = mysqli_query($conn, $sql_meds);
$total_meds = mysqli_fetch_assoc($res_meds)['total'] ?? 0;

// Conta dependentes na tb_cuidadores_pacientes
$sql_dep = "SELECT COUNT(*) as total FROM tb_cuidadores_pacientes WHERE id_cuidador = '$id_logado'";
$res_dep = mysqli_query($conn, $sql_dep);
$total_dep = mysqli_fetch_assoc($res_dep)['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHealth - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS simplificado para manter o layout do seu print */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
        body { background-color: #f5f7fa; display: flex; }
        .sidebar { width: 250px; background: #114b5f; color: white; min-height: 100vh; padding: 20px; position: fixed; }
        .main-content { margin-left: 250px; flex: 1; padding: 30px; }
        .user-info { text-align: center; margin-bottom: 30px; }
        .user-avatar { width: 80px; height: 80px; background: #88d498; border-radius: 50%; margin: 0 auto 10px; display: flex; align-items: center; justify-content: center; font-size: 40px; }
        .nav-menu { list-style: none; }
        .nav-menu li { padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .nav-menu a { color: white; text-decoration: none; display: flex; align-items: center; gap: 10px; }
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .card { background: white; padding: 20px; border-radius: 12px; shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .card-value { font-size: 28px; font-weight: bold; color: #114b5f; }
        .header-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="user-info">
            <div class="user-avatar"><i class="fas fa-user-md"></i></div>
            <h3><?php echo $nome_logado; ?></h3>
            <p>Cuidador</p>
        </div>
        <ul class="nav-menu">
            <li><a href="PaginaInicialCuidador.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="medicamento.php"><i class="fas fa-pills"></i> Medicamentos</a></li>
            <li><a href="dependentes.php"><i class="fas fa-users"></i> Dependentes</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-top">
            <h2>Dashboard do Cuidador</h2>
            <span>Olá, <strong><?php echo $nome_logado; ?></strong></span>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <p>Medicamentos Ativos</p>
                <div class="card-value"><?php echo $total_meds; ?></div>
            </div>
            <div class="card">
                <p>Pacientes sob Cuidado</p>
                <div class="card-value"><?php echo $total_dep; ?></div>
            </div>
            <div class="card">
                <p>Alertas Hoje</p>
                <div class="card-value">0</div> </div>
        </div>

        <div style="margin-top: 40px; background: white; padding: 20px; border-radius: 12px;">
            <h3>Próximos Medicamentos</h3>
            <p style="color: #666; margin-top: 10px;">Consulte a aba de medicamentos para gerenciar horários.</p>
        </div>
    </div>

</body>
</html>