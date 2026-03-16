<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHealth - Dashboard do Paciente</title>
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
        
        /* Medication Schedule */
        .medication-schedule {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .schedule-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }
        
        .schedule-item:hover {
            background-color: #e9ecef;
        }
        
        .schedule-time {
            font-size: 18px;
            font-weight: 600;
            color: #114b5f;
            min-width: 80px;
        }
        
        .schedule-details {
            flex: 1;
            margin: 0 15px;
        }
        
        .schedule-details h4 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .schedule-details p {
            font-size: 14px;
            color: #777;
        }
        
        .schedule-actions {
            display: flex;
            gap: 10px;
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
            
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .filters {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .schedule-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .schedule-actions {
                margin-top: 10px;
                width: 100%;
                justify-content: flex-end;
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
                <div class="user-avatar"><i class="fas fa-user"></i></div>
                <h3>Carlos Silva</h3>
                <p>Paciente</p>
            </div>
      <ul class="nav-menu">
<li class="active"><a href="PaginaInicialPaciente.html"> <i class="fas fa-home"></i> <span>Dashboard</span> </a></li>
<li><a href="medicamento.html"> <i class="fas fa-pills"></i> <span>Medicamentos</span> </a></li>
<li><a href="alertas.html"> <i class="fas fa-bell"></i> <span>Alertas</span> </a></li>
<li><a href="historico.html"> <i class="fas fa-history"></i> <span>Histórico</span> </a></li>
<li><a href="configuracoes.html"> <i class="fas fa-cog"></i> <span>Configurações</span> </a></li>
<li><a href="index.html"> <i class="fas fa-sign-out-alt"></i> <span>Sair</span> </a></li>
</ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h2 class="page-title">Dashboard do Paciente</h2>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Pesquisar medicamento..." />
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
                    <div class="card-title">Meus Medicamentos</div>
                    <div class="card-value">8</div>
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
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="card-title">Lembretes Hoje</div>
                    <div class="card-value">5</div>
                </div>
            </div>

            <!-- Próximos Medicamentos -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Próximos Medicamentos</h3>
                    <div class="dependent-selector">
                        <label for="view-dependent">Visualizar:</label>
                        <select id="view-dependent">
                            <option value="self">Meus medicamentos</option>
                            <option value="all">Todos (eu e dependentes)</option>
                            <option value="dependent-1">Maria Silva (filha)</option>
                            <option value="dependent-2">José Silva (pai)</option>
                        </select>
                    </div>
                </div>
                <div class="medication-schedule">
                    <div class="schedule-item">
                        <div class="schedule-time">08:00</div>
                        <div class="schedule-details">
                            <h4>Paracetamol</h4>
                            <p>500mg • 1 comprimido • Para febre</p>
                        </div>
                        <div class="schedule-actions">
                            <button class="btn">Confirmar</button>
                            <button class="btn btn-outline">Adiar</button>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">10:30</div>
                        <div class="schedule-details">
                            <h4>Losartana</h4>
                            <p>50mg • 1 comprimido • Pressão arterial</p>
                        </div>
                        <div class="schedule-actions">
                            <button class="btn">Confirmar</button>
                            <button class="btn btn-outline">Adiar</button>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">12:00</div>
                        <div class="schedule-details">
                            <h4>Insulina</h4>
                            <p>10 unidades • Aplicação subcutânea • Diabetes</p>
                        </div>
                        <div class="schedule-actions">
                            <button class="btn">Confirmar</button>
                            <button class="btn btn-outline">Adiar</button>
                        </div>
                    </div>
                    <div class="schedule-item">
                        <div class="schedule-time">14:00</div>
                        <div class="schedule-details">
                            <h4>Amoxicilina (Maria Silva)</h4>
                            <p>250mg • 1 comprimido • Infecção bacteriana</p>
                        </div>
                        <div class="schedule-actions">
                            <button class="btn">Confirmar</button>
                            <button class="btn btn-outline">Adiar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Medication Form -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Cadastro de Medicamento</h3>
                </div>
                <div class="tabs">
                    <div class="tab active" onclick="showMedicationForm('self')">Para mim</div>
                    <div class="tab" onclick="showMedicationForm('dependent')">Para dependente</div>
                </div>
                <form id="medication-form">
                    <div id="dependent-field" class="form-group" style="display: none;">
                        <label for="med-dependent">Dependente</label>
                        <select id="med-dependent">
                            <option value="">Selecione um dependente</option>
                            <option value="dependent-1">Maria Silva (filha)</option>
                            <option value="dependent-2">José Silva (pai)</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="med-name">Nome do Medicamento</label>
                            <input type="text" id="med-name" placeholder="Ex: Paracetamol" />
                        </div>
                        <div class="form-group">
                            <label for="med-category">Categoria</label>
                            <select id="med-category">
                                <option value="">Selecione uma categoria</option>
                                <option value="analgesico">Analgésico</option>
                                <option value="antibiotico">Antibiótico</option>
                                <option value="anti-inflamatorio">Anti-inflamatório</option>
                                <option value="cardiovascular">Cardiovascular</option>
                                <option value="diabetes">Diabetes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="med-dosage">Dosagem</label>
                            <input type="text" id="med-dosage" placeholder="Ex: 500mg" />
                        </div>
                        <div class="form-group">
                            <label for="med-frequency">Frequência</label>
                            <select id="med-frequency">
                                <option value="">Selecione a frequência</option>
                                <option value="uma-vez">Uma vez ao dia</option>
                                <option value="duas-vezes">Duas vezes ao dia</option>
                                <option value="tres-vezes">Três vezes ao dia</option>
                                <option value="quatro-vezes">Quatro vezes ao dia</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="med-time">Horários</label>
                            <input type="text" id="med-time" placeholder="Ex: 08:00, 14:00, 20:00" />
                        </div>
                        <div class="form-group">
                            <label for="med-start">Data de Início</label>
                            <input type="date" id="med-start" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="med-notes">Observações</label>
                        <textarea id="med-notes" rows="3" placeholder="Informações adicionais sobre o medicamento"></textarea>
                    </div>
                    <button type="button" class="btn" onclick="addMedication()">
                        <i class="fas fa-plus"></i> Adicionar Medicamento
                    </button>
                </form>
            </div>

            <!-- Medication List -->
            <div class="content-box">
                <div class="content-header">
                    <h3 class="content-title">Lista de Medicamentos</h3>
                    <div class="filters">
                        <div class="filter-group">
                            <label for="filter-category">Filtrar por:</label>
                            <select id="filter-category">
                                <option value="all">Todas as categorias</option>
                                <option value="analgesico">Analgésico</option>
                                <option value="antibiotico">Antibiótico</option>
                                <option value="anti-inflamatorio">Anti-inflamatório</option>
                                <option value="cardiovascular">Cardiovascular</option>
                                <option value="diabetes">Diabetes</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="filter-dependent">Dependente:</label>
                            <select id="filter-dependent">
                                <option value="all">Todos</option>
                                <option value="self">Apenas meus</option>
                                <option value="dependent-1">Maria Silva</option>
                                <option value="dependent-2">José Silva</option>
                            </select>
                        </div>
                        <button class="btn" onclick="applyFilters()">
                            <i class="fas fa-filter"></i> Aplicar Filtros
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Medicamento</th>
                                <th>Dosagem</th>
                                <th>Horários</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="medication-list">
                            <!-- Os dados serão carregados via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulação de banco de dados
        let medications = [
            { id: 1, patient: "Carlos Silva", name: "Paracetamol", dosage: "500mg", times: "08:00, 14:00, 20:00", status: "active" },
            { id: 2, patient: "Carlos Silva", name: "Losartana", dosage: "50mg", times: "10:30", status: "active" },
            { id: 3, patient: "Carlos Silva", name: "Insulina", dosage: "10 unidades", times: "12:00, 20:00", status: "active" },
            { id: 4, patient: "Maria Silva", name: "Amoxicilina", dosage: "250mg", times: "08:00, 14:00, 20:00", status: "active" },
            { id: 5, patient: "José Silva", name: "Sinvastatina", dosage: "20mg", times: "22:00", status: "pending" }
        ];
        
        // Função para mostrar formulário para si mesmo ou dependente
        function showMedicationForm(type) {
            const tabs = document.querySelectorAll('.tab');
            const dependentField = document.getElementById('dependent-field');
            
            tabs.forEach(tab => tab.classList.remove('active'));
            
            if (type === 'dependent') {
                document.querySelector('.tab:nth-child(2)').classList.add('active');
                dependentField.style.display = 'block';
            } else {
                document.querySelector('.tab:nth-child(1)').classList.add('active');
                dependentField.style.display = 'none';
            }
        }
        
        // Função para adicionar medicamento
        function addMedication() {
            const name = document.getElementById('med-name').value;
            const dosage = document.getElementById('med-dosage').value;
            const times = document.getElementById('med-time').value;
            
            if (!name || !dosage || !times) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }
            
            // Verificar se é para um dependente
            const isForDependent = document.querySelector('.tab:nth-child(2)').classList.contains('active');
            const patient = isForDependent ? document.getElementById('med-dependent').value : 'Carlos Silva';
            
            if (isForDependent && !patient) {
                alert('Por favor, selecione um dependente.');
                return;
            }
            
            // Adicionar à lista (simulando integração com banco de dados)
            const newMed = {
                id: medications.length + 1,
                patient: isForDependent ? document.getElementById('med-dependent').options[document.getElementById('med-dependent').selectedIndex].text.split(' (')[0] : 'Carlos Silva',
                name,
                dosage,
                times,
                status: 'active'
            };
            
            medications.push(newMed);
            
            // Atualizar a tabela
            updateMedicationList();
            
            // Limpar formulário
            document.getElementById('medication-form').reset();
            
            alert('Medicamento adicionado com sucesso!');
        }
        
        // Função para aplicar filtros
        function applyFilters() {
            const categoryFilter = document.getElementById('filter-category').value;
            const dependentFilter = document.getElementById('filter-dependent').value;
            
            // Filtrar medicamentos (simulação)
            let filteredMeds = medications;
            
            if (dependentFilter !== 'all') {
                if (dependentFilter === 'self') {
                    filteredMeds = filteredMeds.filter(med => med.patient === 'Carlos Silva');
                } else {
                    // Filtrar por dependente específico (simulação)
                    const dependentName = dependentFilter === 'dependent-1' ? 'Maria Silva' : 'José Silva';
                    filteredMeds = filteredMeds.filter(med => med.patient === dependentName);
                }
            }
            
            // Atualizar a tabela com os resultados filtrados
            renderMedicationList(filteredMeds);
        }
        
        // Função para atualizar a lista de medicamentos
        function updateMedicationList() {
            renderMedicationList(medications);
        }
        
        // Função para renderizar a lista de medicamentos
        function renderMedicationList(meds) {
            const tbody = document.getElementById('medication-list');
            tbody.innerHTML = '';
            
            meds.forEach(med => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${med.patient}</td>
                    <td>${med.name}</td>
                    <td>${med.dosage}</td>
                    <td>${med.times}</td>
                    <td><span class="status status-${med.status}">${med.status === 'active' ? 'Ativo' : 'Pendente'}</span></td>
                    <td>
                        <button class="action-btn"><i class="fas fa-edit"></i></button>
                        <button class="action-btn"><i class="fas fa-trash"></i></button>
                    </td>
                `;
                
                tbody.appendChild(row);
            });
        }
        
        // Inicializar a lista de medicamentos
        document.addEventListener('DOMContentLoaded', function() {
            updateMedicationList();
        });
    </script>
</body>
</html>