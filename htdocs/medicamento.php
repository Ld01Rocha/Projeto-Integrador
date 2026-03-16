<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHealth - Meus Medicamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #114b5f 0%, #1a936f 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .logo {
            text-align: center;
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .logo h1 {
            font-size: 24px;
            font-weight: 700;
        }
        
        .logo span {
            color: #88d498;
        }
        
        .user-info {
            text-align: center;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #88d498;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }
        
        .nav-menu {
            list-style: none;
        }
        
        .nav-menu li {
            padding: 12px 20px;
            margin: 5px 0;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        .nav-menu li i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .nav-menu li:hover, .nav-menu li.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #88d498;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background-color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        .page-title {
            font-size: 24px;
            color: #114b5f;
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background: #f5f7fa;
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
        }
        
        .search-bar input {
            border: none;
            background: transparent;
            padding: 8px;
            width: 100%;
            outline: none;
        }
        
        .user-actions {
            display: flex;
            align-items: center;
        }
        
        .notification-bell {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .card-title {
            font-size: 16px;
            color: #777;
            margin-bottom: 5px;
        }
        
        .card-value {
            font-size: 24px;
            font-weight: 700;
            color: #114b5f;
        }
        
        /* Content Box */
        .content-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .content-title {
            font-size: 18px;
            color: #114b5f;
        }
        
        .btn {
            background: linear-gradient(135deg, #114b5f 0%, #1a936f 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 147, 111, 0.4);
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid #1a936f;
            color: #1a936f;
        }
        
        /* Form */
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s ease;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: #1a936f;
            outline: none;
            box-shadow: 0 0 0 2px rgba(26, 147, 111, 0.2);
        }
        
        /* Table */
        .table-responsive {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background-color: #f8f9fa;
            color: #114b5f;
            font-weight: 600;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #e6f7f0;
            color: #1a936f;
        }
        
        .status-inactive {
            background-color: #fef0f0;
            color: #e74c3c;
        }
        
        .status-pending {
            background-color: #fef7e6;
            color: #f39c12;
        }
        
        .status-critical {
            background-color: #fef0f0;
            color: #e74c3c;
            font-weight: bold;
        }
        
        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            color: #114b5f;
            font-size: 16px;
        }
        
        /* Filters */
        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-group {
            display: flex;
            align-items: center;
        }
        
        .filter-group label {
            margin-right: 8px;
            font-weight: 500;
            color: #555;
        }
        
        .filter-group select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        /* Tabs */
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            color: #777;
            border-bottom: 3px solid transparent;
        }
        
        .tab.active {
            border-bottom: 3px solid #1a936f;
            color: #114b5f;
            font-weight: bold;
        }
        
        /* Medication Cards */
        .medication-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .medication-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #1a936f;
            position: relative;
        }
        
        .medication-card.critical {
            border-left: 4px solid #e74c3c;
        }
        
        .medication-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .medication-name {
            font-size: 18px;
            font-weight: 600;
            color: #114b5f;
        }
        
        .medication-dosage {
            color: #1a936f;
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .medication-info {
            margin-bottom: 15px;
        }
        
        .medication-info p {
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }
        
        .medication-times {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .time-badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #e6f7f0;
            color: #1a936f;
            border-radius: 15px;
            font-size: 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .time-badge.passed {
            background-color: #f8f9fa;
            color: #999;
            text-decoration: line-through;
        }
        
        .time-badge.next {
            background-color: #fff7e6;
            color: #f39c12;
            font-weight: bold;
        }
        
        .medication-actions {
            display: flex;
            gap: 10px;
        }
        
        /* Dependent Selector */
        .dependent-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        
        .dependent-selector label {
            margin-right: 10px;
            font-weight: 500;
        }
        
        .dependent-selector select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }
            
            .sidebar .logo h1, .sidebar .user-info, .sidebar .nav-menu li span {
                display: none;
            }
            
            .sidebar .nav-menu {
                text-align: center;
            }
            
            .sidebar .nav-menu li i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
            }
            
            .search-bar {
                width: 100%;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .medication-cards {
                grid-template-columns: 1fr;
            }
            
            .filters {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h1>Pharma<span>Health</span></h1>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Carlos Silva</h3>
                <p>Paciente</p>
            </div>
          <ul class="nav-menu">
<li class="active"><a href="PaginaInicialCuidador.html"> <i class="fas fa-home"></i> <span>Dashboard</span> </a></li>
<li><a href="medicamento.html"> <i class="fas fa-pills"></i> <span>Medicamentos</span> </a></li>
<li><a href="dependentes.html"> <i class="fas fa-users"></i> <span>Dependentes</span> </a></li>
<li><a href="alerta.html"> <i class="fas fa-bell"></i> <span>Alertas</span> </a></li>
<li><a href="historico.html"> <i class="fas fa-history"></i> <span>Histórico</span> </a></li>
<li><a href="configuracoes.html"> <i class="fas fa-cog"></i> <span>Configurações</span> </a></li>
<li><a href="index.php"> <i class="fas fa-sign-out-alt"></i> <span>Sair</span> </a></li>
</ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h2 class="page-title"> Meus Medicamentos</h2>
                
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Pesquisar medicamento..." id="search-medication">
                </div>
                
                <div class="user-actions">
                    <div class="notification-bell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-name">Carlos Silva</div>
                </div>
            </div>
            
            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-icon" style="background-color: #e6f7f0; color: #1a936f;">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div class="card-title">Total de Medicamentos</div>
                    <div class="card-value">8</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: #e6f3ff; color: #3498db;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="card-title">Próxima Dose</div>
                    <div class="card-value">08:00</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: #fef0f0; color: #e74c3c;">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="card-title">Medicamentos Críticos</div>
                    <div class="card-value">2</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: #fff7e6; color: #f39c12;">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="card-title">Renovações Pendentes</div>
                    <div class="card-value">1</div>
                </div>
            </div>
            
            <!-- Filtros e Ações -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Gerenciar Medicamentos</h3>
                    <button class="btn" onclick="showMedicationModal()">
                        <i class="fas fa-plus"></i> Novo Medicamento
                    </button>
                </div>
                
                <div class="filters">
                    <div class="filter-group">
                        <label for="filter-category">Categoria:</label>
                        <select id="filter-category">
                            <option value="all">Todas</option>
                            <option value="analgesico">Analgésico</option>
                            <option value="antibiotico">Antibiótico</option>
                            <option value="cardiovascular">Cardiovascular</option>
                            <option value="diabetes">Diabetes</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-status">Status:</label>
                        <select id="filter-status">
                            <option value="all">Todos</option>
                            <option value="active">Ativo</option>
                            <option value="inactive">Inativo</option>
                            <option value="critical">Crítico</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-dependent">Paciente:</label>
                        <select id="filter-dependent">
                            <option value="all">Todos</option>
                            <option value="self">Carlos Silva</option>
                            <option value="dependent-1">Maria Silva</option>
                            <option value="dependent-2">José Silva</option>
                        </select>
                    </div>
                    
                    <button class="btn" onclick="applyFilters()">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                    
                    <button class="btn btn-outline" onclick="clearFilters()">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                </div>
            </div>
            
            <!-- Visualização em Cards -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Meus Medicamentos</h3>
                    <div class="dependent-selector">
                        <label for="view-dependent">Visualizar:</label>
                        <select id="view-dependent" onchange="changeView()">
                            <option value="self">Meus medicamentos</option>
                            <option value="all">Todos (eu e dependentes)</option>
                            <option value="dependent-1">Maria Silva (filha)</option>
                            <option value="dependent-2">José Silva (pai)</option>
                        </select>
                    </div>
                </div>
                
                <div class="medication-cards" id="medication-cards-container">
                    <!-- Card 1 -->
                    <div class="medication-card">
                        <div class="medication-header">
                            <div>
                                <div class="medication-name">Paracetamol</div>
                                <div class="medication-dosage">500mg • 1 comprimido</div>
                            </div>
                            <span class="status status-active">Ativo</span>
                        </div>
                        <div class="medication-info">
                            <p><strong>Categoria:</strong> Analgésico</p>
                            <p><strong>Para:</strong> Febre e dor</p>
                            <p><strong>Início:</strong> 01/06/2023</p>
                        </div>
                        <div class="medication-times">
                            <span class="time-badge passed">08:00</span>
                            <span class="time-badge next">14:00</span>
                            <span class="time-badge">20:00</span>
                        </div>
                        <div class="medication-actions">
                            <button class="btn">Confirmar Dose</button>
                            <button class="btn btn-outline">Editar</button>
                        </div>
                    </div>
                    
                    <!-- Card 2 -->
                    <div class="medication-card">
                        <div class="medication-header">
                            <div>
                                <div class="medication-name">Losartana</div>
                                <div class="medication-dosage">50mg • 1 comprimido</div>
                            </div>
                            <span class="status status-active">Ativo</span>
                        </div>
                        <div class="medication-info">
                            <p><strong>Categoria:</strong> Cardiovascular</p>
                            <p><strong>Para:</strong> Pressão arterial</p>
                            <p><strong>Início:</strong> 15/05/2023</p>
                        </div>
                        <div class="medication-times">
                            <span class="time-badge passed">10:30</span>
                        </div>
                        <div class="medication-actions">
                            <button class="btn">Confirmar Dose</button>
                            <button class="btn btn-outline">Editar</button>
                        </div>
                    </div>
                    
                    <!-- Card 3 - Crítico -->
                    <div class="medication-card critical">
                        <div class="medication-header">
                            <div>
                                <div class="medication-name">Insulina</div>
                                <div class="medication-dosage">10 unidades • Injeção</div>
                            </div>
                            <span class="status status-critical">Crítico</span>
                        </div>
                        <div class="medication-info">
                            <p><strong>Categoria:</strong> Diabetes</p>
                            <p><strong>Para:</strong> Controle glicêmico</p>
                            <p><strong>Início:</strong> 10/04/2023</p>
                        </div>
                        <div class="medication-times">
                            <span class="time-badge passed">12:00</span>
                            <span class="time-badge next">20:00</span>
                        </div>
                        <div class="medication-actions">
                            <button class="btn">Confirmar Dose</button>
                            <button class="btn btn-outline">Editar</button>
                        </div>
                    </div>
                    
                    <!-- Card 4 - Dependente -->
                    <div class="medication-card">
                        <div class="medication-header">
                            <div>
                                <div class="medication-name">Losartana</div>
                                <div class="medication-dosage">60mg • 1 comprimido</div>
                            </div>
                            <span class="status status-active">Ativo</span>
                        </div>
                        <div class="medication-info">
                            <p><strong>Categoria:</strong> Cardiovascular</p>
                            <p><strong>Para:</strong> Pressão Alta</p>
                            <p><strong>Início:</strong> 05/06/2023</p>
                            <p><strong>Término:</strong> 15/06/2023</p>
                        </div>
                        <div class="medication-times">
                            <span class="time-badge passed">08:00</span>
                            <span class="time-badge passed">14:00</span>
                            <span class="time-badge next">20:00</span>
                        </div>
                        <div class="medication-actions">
                            <button class="btn">Confirmar Dose</button>
                            <button class="btn btn-outline">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tabela de Medicamentos (visualização alternativa) -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Lista Completa</h3>
                    <button class="btn btn-outline" onclick="toggleView()">
                        <i class="fas fa-list"></i> Visualização em Lista
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Medicamento</th>
                                <th>Dosagem</th>
                                <th>Frequência</th>
                                <th>Horários</th>
                                <th>Paciente</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Paracetamol</td>
                                <td>500mg</td>
                                <td>3x ao dia</td>
                                <td>08:00, 14:00, 20:00</td>
                                <td>Carlos Silva</td>
                                <td><span class="status status-active">Ativo</span></td>
                                <td>
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Losartana</td>
                                <td>50mg</td>
                                <td>1x ao dia</td>
                                <td>10:30</td>
                                <td>Carlos Silva</td>
                                <td><span class="status status-active">Ativo</span></td>
                                <td>
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Insulina</td>
                                <td>10 unidades</td>
                                <td>2x ao dia</td>
                                <td>12:00, 20:00</td>
                                <td>Carlos Silva</td>
                                <td><span class="status status-critical">Crítico</span></td>
                                <td>
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Amoxicilina</td>
                                <td>250mg</td>
                                <td>3x ao dia</td>
                                <td>08:00, 14:00, 20:00</td>
                                <td>Maria Silva</td>
                                <td><span class="status status-active">Ativo</span></td>
                                <td>
                                    <button class="action-btn"><i class="fas fa-edit"></i></button>
                                    <button class="action-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Função para aplicar filtros
        function applyFilters() {
            const category = document.getElementById('filter-category').value;
            const status = document.getElementById('filter-status').value;
            const patient = document.getElementById('filter-dependent').value;
            
            // Simulação de aplicação de filtros
            alert(`Filtros aplicados:\nCategoria: ${category}\nStatus: ${status}\nPaciente: ${patient}`);
            
            // Aqui você implementaria a lógica real de filtragem
        }
        
        // Função para limpar filtros
        function clearFilters() {
            document.getElementById('filter-category').value = 'all';
            document.getElementById('filter-status').value = 'all';
            document.getElementById('filter-dependent').value = 'all';
            
            alert('Filtros limpos!');
        }
        
        // Função para mudar a visualização
        function changeView() {
            const view = document.getElementById('view-dependent').value;
            alert(`Visualização alterada para: ${view}`);
            
            // Aqui você implementaria a lógica para filtrar os medicamentos
        }
        
        // Função para alternar entre visualização em cards e lista
        function toggleView() {
            const cardsView = document.getElementById('medication-cards-container').parentElement;
            const tableView = cardsView.nextElementSibling;
            
            if (cardsView.style.display === 'none') {
                cardsView.style.display = 'block';
                tableView.style.display = 'none';
            } else {
                cardsView.style.display = 'none';
                tableView.style.display = 'block';
            }
        }
        
        // Função para mostrar modal de novo medicamento
        function showMedicationModal() {
            alert('Abrir modal de cadastro de novo medicamento');
            // Aqui você implementaria a abertura do modal
        }
        
        // Pesquisa em tempo real
        document.getElementById('search-medication').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            console.log('Pesquisando por:', searchTerm);
            
            // Aqui você implementaria a lógica de pesquisa
        });
    </script>
</body>
</html>