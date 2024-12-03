<?php
include_once __DIR__ . '/../modelo/classe-conexao.php';

header("Content-Type: application/json");

$database = new ConexaoBanco();
$conn = $database->getConexao();
$query = "SELECT * FROM marmitas";

$stmt = $conn->prepare($query);

try {
    $stmt->execute();
    $marmitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($marmitas);
} catch (\Throwable $th) {
    echo "Erro ao buscar marmitas" . $th->getMessage();
}
