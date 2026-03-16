<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - PharmaHealth</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f766e;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #047857;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            background: #10b981;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #047857;
        }

        .mensagem {
            margin-top: 15px;
            font-weight: bold;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #047857;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Recuperar Senha</h2>

    <form id="formRecuperar">

        <!-- Primeira etapa: apenas o e-mail -->
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

        <!-- Segunda etapa: ocultada no início -->
        <input type="password" id="novaSenha" placeholder="Nova senha" style="display:none;">
        <input type="password" id="confirmarSenha" placeholder="Confirmar nova senha" style="display:none;">

        <button type="submit" id="btnAcao">Enviar link de recuperação</button>
    </form>

    <p class="mensagem" id="mensagem"></p>

    <a href="login.html">Voltar ao Login</a>
</div>

<script>
    let etapa = 1; // 1 = enviar e-mail | 2 = nova senha

    document.getElementById("formRecuperar").addEventListener("submit", function(e) {
        e.preventDefault();

        const msg = document.getElementById("mensagem");

        // ETAPA 1 → Usuário envia o e-mail
        if (etapa === 1) {
            const email = document.getElementById("email").value;

            fetch("recuperar_senha.php", {
                method: "POST",
                body: new URLSearchParams({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                msg.textContent = data.mensagem;
                msg.style.color = data.sucesso ? "green" : "red";

                if (data.sucesso) {
                    etapa = 2;

                    // Mostrar campos de senha
                    document.getElementById("novaSenha").style.display = "block";
                    document.getElementById("confirmarSenha").style.display = "block";

                    // Trocar texto do botão
                    document.getElementById("btnAcao").textContent = "Salvar nova senha";
                }
            })
            .catch(() => {
                msg.textContent = "Erro ao enviar solicitação.";
                msg.style.color = "red";
            });
        }

        // ETAPA 2 → Usuário cria nova senha
        else {
            const novaSenha = document.getElementById("novaSenha").value;
            const confirmar = document.getElementById("confirmarSenha").value;
            const email = document.getElementById("email").value;

            if (novaSenha !== confirmar) {
                msg.textContent = "As senhas não coincidem!";
                msg.style.color = "red";
                return;
            }

            fetch("salvar_nova_senha.php", {
                method: "POST",
                body: new URLSearchParams({
                    email: email,
                    senha: novaSenha
                })
            })
            .then(response => response.json())
            .then(data => {
                msg.textContent = data.mensagem;
                msg.style.color = data.sucesso ? "green" : "red";

                if (data.sucesso) {
                    document.getElementById("btnAcao").disabled = true;
                }
            })
            .catch(() => {
                msg.textContent = "Erro ao salvar nova senha.";
                msg.style.color = "red";
            });
        }
    });
</script>

</body>
</html>
