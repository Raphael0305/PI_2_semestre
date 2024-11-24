<?php
include_once __DIR__ . '/../modelo/estoque_model.php';
header("Content-Type: application/json");
$estoque = new Estoque();

echo json_encode($estoque->buscarTodosItens());
