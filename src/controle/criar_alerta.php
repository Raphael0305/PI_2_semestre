<?php
include __DIR__ . "/../modelo/alerta_estoque.php";
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);
$alerta = new AlertaEstoque(
    ID_ingrediente: (int)$data['ID_ingrediente'],
    quantidade_estoque: (float)$data['quantidade_estoque'],
    data_alerta: new DateTime('now'),
);

if ($alerta->criarAlerta($data['quantMin'])) {
    echo json_encode(['status' => true, 'msg' => 'Alerta cadastrado com sucesso']);
} else {
    echo json_encode(['status' => false, 'msg' => 'Alerta nao cadastrado']);
}
