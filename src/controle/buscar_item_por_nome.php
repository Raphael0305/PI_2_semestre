<?php
include_once __DIR__ . "/../modelo/estoque_model.php";
header('Content: application/json');

$data = file_get_contents('php://input');
$estoque = new Estoque();
$pesquisa = json_decode($data, true);
try {
    $itens = $estoque->buscarItemPorNome($pesquisa['nome']);
    echo json_encode(['status' => 'success', 'item' => $itens]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', '' => $e->getMessage()]);
}
