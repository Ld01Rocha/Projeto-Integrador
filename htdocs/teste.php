<?php
// teste.php — Verificando a conexão com o banco

// Você precisa indicar que a conexão está dentro da pasta config.json
include("config.json/conexao.php"); 

if ($conn) {
    echo "<h1>Conectado com sucesso ao banco PharmaHealth!</h1>";
} else {
    echo "Falha na conexão.";
}
?>