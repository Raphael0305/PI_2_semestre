<?php
include_once __DIR__ . '/../modelo/estoque_model.php';

header("Content-Type: application/json");

$payload = json_decode(file_get_contents("php://input"), true);
$estoque = new Estoque();

if ($estoque->excluirItem($payload['ID_ingrediente'])) {
    echo json_encode(['success' => true, 'message' => 'Item excluido com sucesso']);
} else {
    echo json_encode(['success' => false, 'message' => 'Item nao excluido']);
}
