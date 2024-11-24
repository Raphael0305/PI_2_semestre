<?php
include_once __DIR__ . '/../modelo/estoque_model.php';
include_once __DIR__ . '/../modelo/ingredientes.php';

header('Content-Type: application/json');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);
$estoque = new Estoque();
$ingredientes = new Ingredientes(
    nome: htmlspecialchars($data['nome']),
    categoria: Ingredientes::getCategoria(htmlspecialchars($data['categoria'])),
    fornecedor: htmlspecialchars($data['fornecedor']),
    quantidade: (float) htmlspecialchars($data['quantidade']),
    valorUn: (float) htmlspecialchars($data['valorUn']),
    data_validade: htmlspecialchars($data['data_validade']),
    quantMin: (float) htmlspecialchars($data['quantMin'])
);



$isProductRegistered = $estoque->cadastrarItem($ingredientes->toJson());
if ($isProductRegistered) {
    echo json_encode([
        "isRegistered" => true
    ]);
} else {
    echo json_encode([
        "isRegistered" => false
    ]);
}
