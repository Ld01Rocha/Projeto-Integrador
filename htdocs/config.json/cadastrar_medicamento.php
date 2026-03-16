<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_paciente = $_POST['id_paciente'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $dosagem = $_POST['dosagem'] ?? '';
    $observacoes = $_POST['observacoes'] ?? '';

    if (empty($id_paciente) || empty($nome) || empty($dosagem)) {
        echo "<script>alert('Preencha todos os campos obrigatórios!'); history.back();</script>";
        exit;
    }

    $sql = "INSERT INTO medicamentos (id_paciente, nome, dosagem, observacoes) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>alert('Erro ao preparar a query.'); history.back();</script>";
        exit;
    }

    $stmt->bind_param("isss", $id_paciente, $nome, $dosagem, $observacoes);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Medicamento cadastrado com sucesso!'); window.location='cadastrar_alarme.php';</script>";
    } else {
        echo "<script>alert('❌ Erro ao cadastrar: " . $stmt->error . "'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastrar Medicamento</title>
<style>
    body {font-family: Arial, sans-serif; background: #e9f7ef; display: flex; justify-content: center; align-items: center; height: 100vh;}
    form {background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);}
    input, textarea, button {width: 100%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc;}
    button {background: #1a936f; color: #fff; border: none; cursor: pointer;}
    button:hover {background: #114b5f;}
</style>
</head>
<body>
<form method="POST">
    <h2>Cadastrar Medicamento</h2>
    <label>ID do Paciente:</label>
    <input type="number" name="id_paciente" required>
    <label>Nome do medicamento:</label>
    <input type="text" name="nome" required>
    <label>Dosagem:</label>
    <input type="text" name="dosagem" required>
    <label>Observações:</label>
    <textarea name="observacoes" rows="3"></textarea>
    <button type="submit">Salvar Medicamento</button>
</form>
</body>
</html>
