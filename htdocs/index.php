
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaHealth - Login e Cadastro</title>
    <!-- Carrega o Tailwind CSS para o estilo responsivo e moderno -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ph-primary': '#10b981', // Verde primário (esmeralda)
                        'ph-dark': '#0f766e',    // Verde escuro para o fundo
                        'ph-accent': '#047857',  // Verde de destaque
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Estilos personalizados para a cor de fundo com gradiente sutil */
        body {
            background: linear-gradient(135deg, #0f766e 0%, #11a282 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            padding: 1rem; /* Adiciona padding para telas pequenas */
        }
        /* Estilo para a barra de foco (acessibilidade) */
        input:focus, button:focus, a:focus {
            outline: 3px solid #fcd34d; /* Amarelo acessível para foco */
            outline-offset: 2px;
        }
        /* Esconde os formulários não ativos */
        .form-content {
            display: none;
        }
        .form-content.active {
            display: block;
        }
        /* Estilo para as abas */
        .tab-button {
            transition: all 0.2s;
            cursor: pointer;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid transparent;
            font-weight: 500;
        }
        .tab-button.active {
            color: #10b981;
            border-bottom-color: #10b981;
            font-weight: 600;
        }
        /* Estilo para o botão verde */
        .btn-primary {
            background-color: #10b981;
            transition: background-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #047857;
        }
    </style>
</head>
<body>

    <div id="app-card" class="bg-white shadow-2xl rounded-xl max-w-4xl w-full flex flex-col md:flex-row overflow-hidden transform transition duration-500 ease-in-out">

        <!-- Lado Esquerdo (Informações e Branding) -->
        <div class="md:w-1/2 p-8 text-white bg-ph-accent bg-opacity-90 flex flex-col justify-center space-y-6">
            <h1 class="text-3xl font-bold tracking-tight">PharmaHealth</h1>
            <p class="text-sm italic opacity-80">Sistema de Gestão de Medicamentos</p>

            <h2 class="text-2xl font-semibold mt-6">Cuide de quem você ama</h2>
            <p class="text-base leading-relaxed">
                O sistema de alerta de medicamentos que facilita a vida de pacientes e cuidadores,
                garantindo que o tratamento seja seguido corretamente.
            </p>

            <!-- Lista de Benefícios com ênfase na acessibilidade visual -->
            <ul class="space-y-3 pt-4">
                <li class="flex items-start text-lg">
                    <span class="mr-3 text-2xl" role="img" aria-label="Alarme">🔔</span>
                    Lembretes inteligentes de medicamentos
                </li>
                <li class="flex items-start text-lg">
                    <span class="mr-3 text-2xl" role="img" aria-label="Gráfico">📈</span>
                    Acompanhamento em tempo real
                </li>
                <li class="flex items-start text-lg">
                    <span class="mr-3 text-2xl" role="img" aria-label="Perfil">🧑‍🤝‍🧑</span>
                    Perfis para pacientes e cuidadores
                </li>
                <li class="flex items-start text-lg">
                    <span class="mr-3 text-2xl" role="img" aria-label="Histórico">⏳</span>
                    Histórico de dosagens
                </li>
            </ul>
        </div>

        <!-- Lado Direito (Formulários de Login e Cadastro) -->
        <div class="md:w-1/2 p-8 md:p-12 space-y-8">
            <h2 class="text-2xl font-semibold text-gray-800">Faça login em sua conta</h2>

            <!-- Abas de Navegação -->
            <div class="flex border-b border-gray-200">
                <button id="tab-login" class="tab-button active mr-6" onclick="showForm('login')" aria-controls="form-login">Login</button>
                <button id="tab-cadastro" class="tab-button" onclick="showForm('cadastro')" aria-controls="form-cadastro">Cadastro</button>
            </div>

            <!-- Formulário de LOGIN -->
            <form id="form-login" class="form-content active space-y-6" onsubmit="handleLogin(event)">
                
                <div>
                    <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" id="login-email" name="email" placeholder="Seu e-mail cadastrado" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>
                
                <div>
                    <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input type="password" id="login-password" name="password" placeholder="Sua senha" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>

                <div>
                    <label for="login-role" class="block text-sm font-medium text-gray-700 mb-1">Entrar como:</label>
                    <select id="login-role" name="role"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg appearance-none bg-white focus:ring-ph-primary focus:border-ph-primary transition cursor-pointer">
                        <option value="selecionar">Selecionar🔻</option>
                        <option value="cuidador">Cuidador</option>
                        <option value="paciente">Paciente</option>
                    </select>
                </div>

                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-ph-dark focus:ring-opacity-50 transition">
                    Entrar
                </button>

                <div class="flex justify-between text-sm mt-4">
                    <a href=" recuperar_senha.html" class="text-ph-primary hover:text-ph-accent focus:text-ph-accent transition">Esqueci minha senha</a>
                    <button type="button" class="text-ph-primary hover:text-ph-accent focus:text-ph-accent transition" onclick="showForm('cadastro')">
                        Criar uma conta
                    </button>
                </div>

                <div id="login-message" class="text-center mt-4 text-sm font-medium text-red-600 hidden p-2 bg-red-50 rounded-lg"></div>
            </form>

            <!-- Formulário de CADASTRO (Criar Conta) -->
            <form id="form-cadastro" class="form-content space-y-6" onsubmit="handleRegistration(event)">
                
                <div>
                    <label for="register-name" class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                    <input type="text" id="register-name" name="name" placeholder="Seu nome" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>

                <div>
                    <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" id="register-email" name="email" placeholder="Crie seu e-mail de acesso" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>
                
                <div>
                    <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input type="password" id="register-password" name="password" placeholder="Mínimo 8 caracteres" required 
                           minlength="8"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>

                <div>
                    <label for="register-confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
                    <input type="password" id="register-confirm-password" name="confirm_password" placeholder="Repita a senha" required 
                           minlength="8"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-ph-primary focus:border-ph-primary transition">
                </div>

                <div>
                    <label for="register-role" class="block text-sm font-medium text-gray-700 mb-1">Você será:</label>
                    <select id="register-role" name="role" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg appearance-none bg-white focus:ring-ph-primary focus:border-ph-primary transition cursor-pointer">
                        <option value="">Selecione seu perfil</option>
                        <option value="paciente">Paciente (irá receber os alertas)</option>
                        <option value="cuidador">Cuidador (irá gerenciar os alertas)</option>
                    </select>
                </div>

                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-ph-dark focus:ring-opacity-50 transition">
                    Criar Minha Conta
                </button>

                <div class="text-center text-sm mt-4">
                    Já tem uma conta? 
                    <button type="button" class="text-ph-primary hover:text-ph-accent focus:text-ph-accent transition font-medium" onclick="showForm('login')">
                        Faça Login
                    </button>
                </div>

                <div id="registration-message" class="text-center mt-4 text-sm font-medium text-red-600 hidden p-2 bg-red-50 rounded-lg"></div>
            </form>

            <div id="success-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center p-4 z-50">
                <div class="bg-white p-8 rounded-xl shadow-2xl max-w-sm w-full text-center space-y-4">
                    <span class="text-6xl text-ph-primary block">🎉</span>
                    <h3 class="text-xl font-bold text-gray-800">Sucesso!</h3>
                    <p class="text-gray-600">Seu cadastro foi simulado. Você seria redirecionado para a página inicial.</p>
                    <button onclick="closeModal()" class="btn-primary w-full text-white font-semibold py-2 rounded-lg">
                        Entrar na Plataforma
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        /**
         * Função para alternar entre as abas (Login e Cadastro).
         * @param {string} formType 'login' ou 'cadastro'
         */
        function showForm(formType) {
            // Remove a classe 'active' de todas as abas e conteúdos
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.form-content').forEach(form => form.classList.remove('active'));

            // Adiciona a classe 'active' à aba e ao conteúdo corretos
            document.getElementById(`tab-${formType}`).classList.add('active');
            document.getElementById(`form-${formType}`).classList.add('active');
            
            // Foca no primeiro campo do formulário ativo para melhor acessibilidade
            if (formType === 'login') {
                document.getElementById('login-email').focus();
            } else {
                document.getElementById('register-name').focus();
            }

            // Limpa mensagens de erro
            document.getElementById('login-message').classList.add('hidden');
            document.getElementById('registration-message').classList.add('hidden');
        }

        /**
         * Simula o tratamento do formulário de Login.
         */
        function handleLogin(event) {
            event.preventDefault();
            const messageEl = document.getElementById('login-message');
            messageEl.classList.remove('text-green-600', 'text-red-600');
            messageEl.classList.remove('hidden');
            
            // Simulação de validação de back-end (PHP)
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;
            const Entrar = document.getElementById('login-role').value;
            
            
            
            if (email === "lucasdavidrocha13@gmail.com" && password === "@Chiconha00" && Entrar==="cuidador") {
                messageEl.textContent = "Login bem-sucedido! Redirecionando...";
                messageEl.classList.add('text-green-600', 'bg-green-50');
                // Em uma aplicação real, aqui haveria um redirecionamento para o dashboard.
                window.location.href ='PaginaInicialCuidador.html';
                //setTimeout(() => {
                //    document.getElementById('success-modal').classList.remove('hidden');
                //}, 500);
            } 
             
            if (email === "lucas.drocha@sempreceub.com" && password === "@Chiconha00" && Entrar==="paciente") {
                messageEl.textContent = "Login bem-sucedido! Redirecionando...";
                messageEl.classList.add('text-green-600', 'bg-green-50');
                // Em uma aplicação real, aqui haveria um redirecionamento para o dashboard.
                window.location.href ='PaginaInicialPaciente.html';
                //setTimeout(() => {
                //    document.getElementById('success-modal').classList.remove('hidden');
                //}, 500);
            }
            else {
                messageEl.textContent = "Erro: E-mail ou senha inválidos. Tente novamente.";
                messageEl.classList.add('text-red-600', 'bg-red-50');
            }
        }

        /**
         * Simula o tratamento do formulário de Cadastro.
         */
        function handleRegistration(event) {
            event.preventDefault();
            const messageEl = document.getElementById('registration-message');
            messageEl.classList.remove('text-green-600', 'text-red-600');
            messageEl.classList.remove('hidden');

            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('register-confirm-password').value;
            const role = document.getElementById('register-role').value;

            if (password !== confirmPassword) {
                messageEl.textContent = "Erro: As senhas não coincidem. Verifique os campos.";
                messageEl.classList.add('text-red-600', 'bg-red-50');
                return;
            }

            if (role === "") {
                messageEl.textContent = "Erro: Por favor, selecione seu perfil (Paciente ou Cuidador).";
                messageEl.classList.add('text-red-600', 'bg-red-50');
                return;
            }
              
            // Simulação de sucesso (em PHP, aqui os dados seriam salvos no banco de dados)
            messageEl.textContent = "Cadastro realizado com sucesso! Aguarde o login...";
            messageEl.classList.add('text-green-600', 'bg-green-50');
            
            setTimeout(() => {
                // Abre o modal de sucesso
                document.getElementById('success-modal').classList.remove('hidden');
            }, 500);
        }

        /**
         * Fecha o modal de sucesso e retorna à aba de login.
         */
        function closeModal() {
            document.getElementById('success-modal').classList.add('hidden');
            showForm('login');
        }

        // Garante que a aba de login esteja ativa ao carregar a página
        document.addEventListener('DOMContentLoaded', () => {
            showForm('login');
        });
    </script>
</body>
</html>