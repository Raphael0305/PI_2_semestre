<?php
include_once __DIR__ . '/../modelo/estoque_model.php';
include_once __DIR__ . '/../modelo/ingredientes.php';

header('Content-Type: application/json');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);
$estoque = new Estoque();
$ingredientes = new Ingredientes(
    nome: htmlspecialchars($data['nome']),
    categoria: htmlspecialchars($data['categoria']),
    fornecedor: htmlspecialchars($data['fornecedor']),
    quantidade: htmlspecialchars($data['quantidade']),
    valorUn: htmlspecialchars($data['valorUn']),
    data_validade: htmlspecialchars($data['data_validade'])
);


$isProductRegistered = $estoque->cadastrarItem($ingredientes->toJson());
if($isProductRegistered){
    echo json_encode([
        "isRegistered" => true
    ]);
    exit;
}else{
    echo json_encode([
        "isRegistered" => false
    ]);
    exit;
}