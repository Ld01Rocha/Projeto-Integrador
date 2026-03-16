<?php
// 1. Conexão com o Banco de Dados
// Verifique se o arquivo se chama conexao.php (sem til) como na sua imagem
include_once('conexao.php'); 
session_start();

// Define um ID padrão para testes caso a sessão não esteja ativa
$id_cuidador = $_SESSION['id_usuario'] ?? 1; 

// 2. Lógica para Salvar Novo Alerta (Processamento do Formulário)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_criar_alerta'])) {
    $dependent_id = $_POST['dependent_id'];
    $medication = $_POST['medication'];
    $time = $_POST['time'];
    $priority = $_POST['priority'];
    $notes = $_POST['notes'] ?? '';

    // Ajustado para a tabela 'tb_alarme' que vi no seu phpMyAdmin
    $sql = "INSERT INTO tb_alarme (id_usuario, medicamento, hora_alarme, prioridade, observacoes) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $dependent_id, $medication, $time, $priority, $notes);
    
    if($stmt->execute()) {
        echo "<script>alert('Alerta criado com sucesso!');</script>";
    }
}

// 3. Buscar Alertas Existentes para exibir nos cards
// Fazemos um JOIN para pegar o nome do dependente na tb_usuarios
$query = "SELECT a.*, u.nome as nome_dependente 
          FROM tb_alarme a 
          INNER JOIN tb_usuarios u ON a.id_usuario = u.id_usuario 
          ORDER BY a.hora_alarme ASC";
$result_alertas = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareAlert - Gerenciar Alertas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f5f7fa; color: #333; }
        
        /* Acessibilidade: Foco visível */
        *:focus { outline: 3px solid #88d498; outline-offset: 2px; }

        .container { display: flex; min-height: 100vh; }
        
        /* Sidebar */
        .sidebar { 
            width: 250px; background: linear-gradient(135deg, #114b5f 0%, #1a936f 100%); 
            color: white; padding: 20px 0; position: fixed; height: 100vh; 
        }
        .logo { text-align: center; padding: 0 20px 20px; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .logo span { color: #88d498; }
        
        .nav-menu { list-style: none; }
        .nav-menu li { padding: 12px 20px; transition: all 0.3s; }
        .nav-menu a { color: white; text-decoration: none; display: flex; align-items: center; gap: 10px; width: 100%; }
        .nav-menu li:hover, .nav-menu li.active { background-color: rgba(255, 255, 255, 0.1); border-left: 4px solid #88d498; }

        /* Main Content */
        .main-content { flex: 1; margin-left: 250px; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: white; padding: 15px 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        
        .content-box { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-bottom: 30px; }
        
        .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; }
        .form-group input, .form-group select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; }

        .btn { background: #1a936f; color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-weight: 600; width: fit-content; }
        
        /* Grid de Alertas */
        .alert-cards { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
        .alert-card { background: white; border-radius: 10px; padding: 15px; border-left: 5px solid #ccc; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .priority-high { border-left-color: #e74c3c; }
        .priority-medium { border-left-color: #f39c12; }
        .priority-low { border-left-color: #3498db; }

        @media (max-width: 768px) { .sidebar { width: 70px; } .main-content { margin-left: 70px; } .sidebar span, .logo h1 { display: none; } }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar" role="navigation" aria-label="Menu Principal">
            <div class="logo"><h1>Care<span>Alert</span></h1></div>
            <ul class="nav-menu">
                <li><a href="PaginaInicialCuidador.php"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="medicamento.php"><i class="fas fa-pills"></i> <span>Medicamentos</span></a></li>
                <li><a href="dependentes.php"><i class="fas fa-users"></i> <span>Dependentes</span></a></li>
                <li class="active"><a href="alerta.php" aria-current="page"><i class="fas fa-bell"></i> <span>Alertas</span></a></li>
                <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> <span>Sair</span></a></li>
            </ul>
        </nav>

        <main class="main-content">
            <header class="header">
                <h2>Gerenciar Alertas</h2>
                <div class="notification-bell" role="button" aria-label="Notificações" tabindex="0">
                    <i class="fas fa-bell"></i>
                </div>
            </header>

            <section class="content-box">
                <h3>Criar Novo Alerta</h3><br>
                <form action="alerta.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="dependent_id">Dependente</label>
                            <select id="dependent_id" name="dependent_id" required>
                                <option value="1">Maria Silva</option>
                                <option value="2">José Silva</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="medication">Medicamento</label>
                            <input type="text" id="medication" name="medication" required placeholder="Ex: Paracetamol">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="time">Horário</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="priority">Prioridade</label>
                            <select id="priority" name="priority">
                                <option value="low">Baixa</option>
                                <option value="medium">Média</option>
                                <option value="high">Alta</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="btn_criar_alerta" class="btn"><i class="fas fa-save"></i> Salvar no Banco</button>
                </form>
            </section>

            <section class="content-box">
                <h3>Alertas Ativos</h3><br>
                <div class="alert-cards">
                    <?php if ($result_alertas && $result_alertas->num_rows > 0): ?>
                        <?php while($row = $result_alertas->fetch_assoc()): ?>
                            <article class="alert-card priority-<?php echo $row['prioridade']; ?>" tabindex="0">
                                <strong><?php echo htmlspecialchars($row['medicamento']); ?></strong>
                                <p>Paciente: <?php echo htmlspecialchars($row['nome_dependente']); ?></p>
                                <p><i class="fas fa-clock"></i> <?php echo date("H:i", strtotime($row['hora_alarme'])); ?></p>
                            </article>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>Nenhum alerta encontrado no banco de dados.</p>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>