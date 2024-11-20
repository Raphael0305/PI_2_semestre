<?php
include_once '../modelo/query.php';

header('Content-Type: application/json');
$postData = file_get_contents("php://input");

$data = json_decode($postData, true);

$nome = htmlspecialchars($data['nome']);
$categoria = htmlspecialchars($data['categoria']);
$fornecedor = htmlspecialchars($data['fornecedor']);
$quantidade = htmlspecialchars($data['quantidade']);
$valorUn = htmlspecialchars($data['valorUn']);
$data_validade = htmlspecialchars($data['data_validade']);
$stmt = new Query();

try {
    $isProductRegistered = $stmt->cadastrarIngrediente([
        "nome" => $nome,
        "categoria" => $categoria,
        "fornecedor" => $fornecedor,
        "quantidade" => $quantidade,
        "valorUn" => $valorUn,
        "data_validade" => $data_validade,
    ]);
    echo json_encode([
        "isRegistered" => true
    ]);
    exit;

} catch (PDOException $th) {
    echo json_encode([
        "isRegistered" => false
    ]);
    exit;
}