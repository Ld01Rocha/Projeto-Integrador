<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareAlert - Configurações</title>
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
            display: flex;
            align-items: center;
        }
        
        .back-link {
            margin-right: 15px;
            color: #1a936f;
            font-size: 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            background-color: #e6f7f0;
            transform: translateX(-3px);
        }
        
        .search-bar {
            display: flex;
            align-items: center;
            background: #f5f7fa;
            border-radius: 20px;
            padding: 5px 5px 5px 15px;
            width: 300px;
        }
        
        .search-bar input {
            border: none;
            background: transparent;
            padding: 8px;
            width: 100%;
            outline: none;
        }
        
        .search-btn {
            background: #1a936f;
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-btn:hover {
            background: #114b5f;
            transform: scale(1.05);
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
        
        /* Settings Sections */
        .settings-section {
            margin-bottom: 30px;
        }
        
        .settings-section:last-child {
            margin-bottom: 0;
        }
        
        .settings-section h3 {
            color: #114b5f;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #1a936f;
        }
        
        input:checked + .slider:before {
            transform: translateX(30px);
        }
        
        .toggle-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .toggle-text {
            flex: 1;
        }
        
        .toggle-text h4 {
            color: #114b5f;
            margin-bottom: 5px;
        }
        
        .toggle-text p {
            color: #777;
            font-size: 14px;
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            padding: 20px;
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #777;
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
            
            .toggle-label {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .toggle-switch {
                margin-top: 10px;
            }
        }
        
        /* Estilo para elementos de pesquisa */
        .search-highlight {
            background-color: #ffeb3b;
            padding: 2px 4px;
            border-radius: 3px;
        }
        
        .no-results {
            text-align: center;
            padding: 20px;
            color: #777;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h1>Care<span>Alert</span></h1>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Carlos Silva</h3>
                <p>Cuidador</p>
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
                <h2 class="page-title">
                    <a href="dashboard.html" class="back-link" title="Voltar para o Dashboard">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Configurações do Sistema
                </h2>
                
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Pesquisar configurações...">
                    <button class="search-btn" id="search-button" title="Pesquisar">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                
                <div class="user-actions">
                    <div class="notification-bell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-name">Carlos Silva</div>
                </div>
            </div>
            
            <!-- Tabs de Navegação -->
            <div class="content-box">
                <div class="tabs">
                    <div class="tab active" onclick="changeTab('conta')">Conta</div>
                    <div class="tab" onclick="changeTab('notificacoes')">Notificações</div>
                    <div class="tab" onclick="changeTab('privacidade')">Privacidade</div>
                    <div class="tab" onclick="changeTab('acessibilidade')">Acessibilidade</div>
                </div>
                
                <!-- Seção CONTA -->
                <div id="conta" class="tab-content">
                    <div class="settings-section">
                        <h3>Informações Pessoais</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user-name">Nome Completo</label>
                                <input type="text" id="user-name" value="Carlos Silva">
                            </div>
                            
                            <div class="form-group">
                                <label for="user-email">E-mail</label>
                                <input type="email" id="user-email" value="carlos.silva@exemplo.com">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user-phone">Telefone</label>
                                <input type="tel" id="user-phone" value="(11) 99999-9999">
                            </div>
                            
                            <div class="form-group">
                                <label for="user-role">Função</label>
                                <select id="user-role">
                                    <option value="cuidador" selected>Cuidador</option>
                                    <option value="familiar">Familiar</option>
                                    <option value="profissional">Profissional de Saúde</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Alterar Senha</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="current-password">Senha Atual</label>
                                <input type="password" id="current-password">
                            </div>
                            
                            <div class="form-group">
                                <label for="new-password">Nova Senha</label>
                                <input type="password" id="new-password">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="confirm-password">Confirmar Nova Senha</label>
                                <input type="password" id="confirm-password">
                            </div>
                        </div>
                        
                        <button class="btn">
                            <i class="fas fa-key"></i> Alterar Senha
                        </button>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Preferências de Idioma</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="language">Idioma do Sistema</label>
                                <select id="language">
                                    <option value="pt-br" selected>Português (Brasil)</option>
                                    <option value="en">English</option>
                                    <option value="es">Español</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="timezone">Fuso Horário</label>
                                <select id="timezone">
                                    <option value="-3" selected>Brasília (UTC-3)</option>
                                    <option value="-4">Manaus (UTC-4)</option>
                                    <option value="-5">Rio Branco (UTC-5)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Seção NOTIFICAÇÕES -->
                <div id="notificacoes" class="tab-content" style="display: none;">
                    <div class="settings-section">
                        <h3>Preferências de Notificação</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Notificações por E-mail</h4>
                                <p>Receber alertas e resumos por e-mail</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Notificações por SMS</h4>
                                <p>Receber alertas críticos por SMS</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Notificações Push</h4>
                                <p>Receber notificações no navegador</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Alertas de Medicamentos</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Lembretes de Medicamentos</h4>
                                <p>Notificar sobre horários de medicamentos</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Alertas Sonoros</h4>
                                <p>Emitir som nas notificações de alerta</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Vibração</h4>
                                <p>Dispositivo vibrar para alertas importantes (em dispositivos móveis)</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Frequência de Notificações</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="notification-time">Horário para Resumos Diários</label>
                                <input type="time" id="notification-time" value="19:00">
                            </div>
                            
                            <div class="form-group">
                                <label for="reminder-before">Lembrar antes do horário</label>
                                <select id="reminder-before">
                                    <option value="5">5 minutos</option>
                                    <option value="10">10 minutos</option>
                                    <option value="15" selected>15 minutos</option>
                                    <option value="30">30 minutos</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Seção PRIVACIDADE -->
                <div id="privacidade" class="tab-content" style="display: none;">
                    <div class="settings-section">
                        <h3>Controles de Privacidade</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Compartilhamento de Dados</h4>
                                <p>Permitir compartilhamento anônimo de dados para melhorar o sistema</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Compartilhar com Profissionais</h4>
                                <p>Permitir que profissionais de saúde acessem informações quando necessário</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Modo de Privacidade</h4>
                                <p>Ocultar informações sensíveis quando a tela for compartilhada</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Exportação de Dados</h3>
                        <p>Exporte seus dados para backup ou para compartilhar com profissionais de saúde.</p>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="export-format">Formato de Exportação</label>
                                <select id="export-format">
                                    <option value="pdf">PDF</option>
                                    <option value="csv">CSV</option>
                                    <option value="json">JSON</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="export-range">Período dos Dados</label>
                                <select id="export-range">
                                    <option value="7">Últimos 7 dias</option>
                                    <option value="30">Últimos 30 dias</option>
                                    <option value="90">Últimos 3 meses</option>
                                    <option value="all">Todos os dados</option>
                                </select>
                            </div>
                        </div>
                        
                        <button class="btn">
                            <i class="fas fa-download"></i> Exportar Dados
                        </button>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Exclusão de Conta</h3>
                        <p>A exclusão da conta removerá permanentemente todos os seus dados do sistema. Esta ação não pode ser desfeita.</p>
                        
                        <button class="btn" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);" onclick="openModal('delete-account-modal')">
                            <i class="fas fa-trash"></i> Excluir Minha Conta
                        </button>
                    </div>
                </div>
                
                <!-- Seção ACESSIBILIDADE -->
                <div id="acessibilidade" class="tab-content" style="display: none;">
                    <div class="settings-section">
                        <h3>Preferências de Visualização</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Modo de Alto Contraste</h4>
                                <p>Ativar cores de alto contraste para melhor visualização</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Texto Ampliado</h4>
                                <p>Aumentar o tamanho do texto em toda a aplicação</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Reduzir Animação</h4>
                                <p>Reduzir ou eliminar animações para melhor desempenho</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Leitura de Texto</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Leitor de Tela</h4>
                                <p>Otimizar interface para leitores de tela</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Descrições de Áudio</h4>
                                <p>Fornecer descrições em áudio para elementos visuais</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="settings-section">
                        <h3>Navegação Alternativa</h3>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Navegação por Teclado</h4>
                                <p>Otimizar para navegação usando apenas o teclado</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-label">
                            <div class="toggle-text">
                                <h4>Comandos de Voz</h4>
                                <p>Permitir controle por comandos de voz</p>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="content-header" style="margin-top: 30px;">
                    <button class="btn" onclick="saveSettings()">
                        <i class="fas fa-save"></i> Salvar Configurações
                    </button>
                    
                    <button class="btn btn-outline" onclick="resetSettings()">
                        <i class="fas fa-undo"></i> Restaurar Padrões
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para exclusão de conta -->
    <div class="modal" id="delete-account-modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('delete-account-modal')">&times;</span>
            <h2 style="margin-bottom: 20px; color: #e74c3c;">Excluir Conta</h2>
            
            <div class="form-group">
                <label>Para confirmar a exclusão, digite "EXCLUIR" no campo abaixo:</label>
                <input type="text" id="delete-confirm" placeholder="EXCLUIR">
            </div>
            
            <div class="form-group">
                <label for="delete-reason">Motivo da exclusão (opcional):</label>
                <select id="delete-reason">
                    <option value="">Selecione um motivo</option>
                    <option value="privacy">Preocupações com privacidade</option>
                    <option value="usability">Dificuldade em usar o sistema</option>
                    <option value="alternative">Encontrei uma alternativa melhor</option>
                    <option value="other">Outro motivo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="delete-feedback">Feedback (opcional):</label>
                <textarea id="delete-feedback" rows="3" placeholder="O que poderia ser melhorado?"></textarea>
            </div>
            
            <button class="btn" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);" onclick="deleteAccount()">
                <i class="fas fa-trash"></i> Excluir Conta Permanentemente
            </button>
        </div>
    </div>

    <script>
        // Função para alternar entre abas
        function changeTab(tabName) {
            // Esconder todos os conteúdos de abas
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.style.display = 'none';
            });
            
            // Mostrar apenas a aba selecionada
            document.getElementById(tabName).style.display = 'block';
            
            // Atualizar a navegação de abas
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Ativar a aba clicada
            event.currentTarget.classList.add('active');
        }
        
        // Função para abrir modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }
        
        // Função para fechar modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // Função para salvar configurações
        function saveSettings() {
            // Simulação de salvamento
            alert('Configurações salvas com sucesso!');
            // Aqui você implementaria a lógica real para salvar no backend
        }
        
        // Função para restaurar configurações padrão
        function resetSettings() {
            if (confirm('Tem certeza que deseja restaurar as configurações padrão? Todas as suas personalizações serão perdidas.')) {
                // Simulação de reset
                alert('Configurações restauradas para os valores padrão!');
                // Aqui você implementaria a lógica real para resetar as configurações
            }
        }
        
        // Função para excluir conta
        function deleteAccount() {
            const confirmText = document.getElementById('delete-confirm').value;
            
            if (confirmText !== 'EXCLUIR') {
                alert('Por favor, digite "EXCLUIR" para confirmar a exclusão da conta.');
                return;
            }
            
            if (confirm('ATENÇÃO: Esta ação não pode ser desfeita. Tem certeza que deseja excluir permanentemente sua conta e todos os dados associados?')) {
                // Simulação de exclusão
                alert('Sua conta foi excluída com sucesso. Obrigado por usar o CareAlert.');
                // Aqui você implementaria a lógica real para excluir a conta
                closeModal('delete-account-modal');
            }
        }
        
        // Função para realizar a pesquisa
        function performSearch() {
            const searchTerm = document.getElementById('search-input').value.trim().toLowerCase();
            
            if (searchTerm === '') {
                alert('Por favor, digite um termo para pesquisar.');
                return;
            }
            
            // Remover destaques anteriores
            removeHighlights();
            
            // Pesquisar em todas as abas
            let foundResults = false;
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabContents.forEach(tab => {
                const elements = tab.querySelectorAll('h3, h4, p, label, .toggle-text h4, .toggle-text p');
                
                elements.forEach(element => {
                    const text = element.textContent || element.innerText;
                    
                    if (text.toLowerCase().includes(searchTerm)) {
                        foundResults = true;
                        highlightText(element, searchTerm);
                        
                        // Mostrar a aba onde o resultado foi encontrado
                        const tabId = tab.id;
                        const tabElement = document.querySelector(`.tab[onclick="changeTab('${tabId}')"]`);
                        if (tabElement) {
                            tabElement.click();
                        }
                    }
                });
            });
            
            if (!foundResults) {
                alert('Nenhum resultado encontrado para: ' + searchTerm);
            }
        }
        
        // Função para destacar o texto encontrado
        function highlightText(element, searchTerm) {
            const text = element.innerHTML;
            const regex = new RegExp(`(${searchTerm})`, 'gi');
            const highlightedText = text.replace(regex, '<span class="search-highlight">$1</span>');
            element.innerHTML = highlightedText;
        }
        
        // Função para remover os destaques
        function removeHighlights() {
            const highlights = document.querySelectorAll('.search-highlight');
            highlights.forEach(highlight => {
                const parent = highlight.parentNode;
                parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
                parent.normalize();
            });
        }
        
        // Adicionar evento de clique ao botão de pesquisa
        document.getElementById('search-button').addEventListener('click', performSearch);
        
       