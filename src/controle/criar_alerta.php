<?php
include __DIR__ . "/../modelo/alerta_estoque.php";
header("Content: application/php");

$data = file_get_contents('php//input');
$alerta = new AlertaEstoque(
    ID_ingrediente: $data['ID_igrediente'],
    quantidade_estoque: $data['quantidade_estoque'],
    data_alerta: DateTime::createFromFormat('Y-m-d', $data['data_alerta']),
);

if ($alerta->criarAlerta()) {
    echo json_encode(['status' => true, 'msg' => 'Alerta cadastrado com sucesso']);
} else {
    echo json_encode(['status' => false, 'msg' => 'Alerta nao cadastrado']);
}






// modelo json
// [
//     'item' => [
//         'ID_ingrediente' => '2',
//         'quantidade_estoque' => '500',
//         'data_alerta' => '2024-11-24',
//     ],
