<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_medicamento = $_POST['id_medicamento'] ?? '';
    $horario = $_POST['horario'] ?? '';
    $repetir = $_POST['repetir'] ?? 'diario';

    if (empty($id_medicamento) || empty($horario)) {
        echo "<script>alert('Preencha todos os campos obrigatórios!'); history.back();</script>";
        exit;
    }

    $sql = "INSERT INTO alarmes (id_medicamento, horario, repetir) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>alert('Erro ao preparar a query.'); history.back();</script>";
        exit;
    }

    $stmt->bind_param("iss", $id_medicamento, $horario, $repetir);

    if ($stmt->execute()) {
        echo "<script>alert('⏰ Alarme cadastrado com sucesso!'); window.location='cadastrar_medicamento.php';</script>";
    } else {
        echo "<script>alert('❌ Erro ao cadastrar alarme: " . $stmt->error . "'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastrar Alarme</title>
<style>
    body {font-family: Arial, sans-serif; background: #f5f9ff; display: flex; justify-content: center; align-items: center; height: 100vh;}
    form {background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);}
    input, select, button {width: 100%; padding: 10px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc;}
    button {background: #1a73e8; color: #fff; border: none; cursor: pointer;}
    button:hover {background: #0c47a1;}
</style>
</head>
<body>
<form method="POST">
    <h2>Cadastrar Alarme</h2>
    <label>ID do Medicamento:</label>
    <input type="number" name="id_medicamento" required>
    <label>Horário do Alarme:</label>
    <input type="time" name="horario" required>
    <label>Repetição:</label>
    <select name="repetir">
        <option value="diario">Diário</option>
        <option value="semanal">Semanal</option>
        <option value="personalizado">Personalizado</option>
    </select>
    <button type="submit">Salvar Alarme</button>
</form>
</body>
</html>
