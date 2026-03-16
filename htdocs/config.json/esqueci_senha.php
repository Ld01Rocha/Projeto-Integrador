<?php
include('conexao.php');
include('enviar_email.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);

    $busca = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $busca->bind_param("s", $email);
    $busca->execute();
    $resultado = $busca->get_result();

    if ($resultado->num_rows > 0) {
        $token = bin2hex(random_bytes(16));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $sql = $conn->prepare("UPDATE usuarios SET token_recuperacao=?, token_expira=? WHERE email=?");
        $sql->bind_param("sss", $token, $expira, $email);
        $sql->execute();

        if (enviarEmailRedefinicao($email, $token)) {
            echo "<script>alert('E-mail de redefinição enviado! Verifique sua caixa de entrada.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar e-mail. Tente novamente.');</script>";
        }
    } else {
        echo "<script>alert('E-mail não encontrado.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Esqueci minha senha - PharmaHealth</title>
<style>
body {font-family: Arial, sans-serif; background: #eaf4f4; display: flex; justify-content: center; align-items: center; height: 100vh;}
form {background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);}
input, button {width: 100%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc;}
button {background: #1a936f; color: #fff; border: none; cursor: pointer;}
button:hover {background: #114b5f;}
</style>
</head>
<body>
<form method="POST">
    <h2>Recuperar Senha</h2>
    <p>Digite seu e-mail cadastrado para receber o link de redefinição.</p>
    <input type="email" name="email" placeholder="Seu e-mail" required>
    <button type="submit">Enviar link</button>
</form>
</body>
</html>
