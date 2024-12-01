<?php
include_once __DIR__ . "/../modelo/gerenciar_pedidos_modelo.php";

header("Content-Type: application/json");

$gerenciadorPedido = GerenciarPedidosModelo::factoryEmptyValues();

$pedidos = $gerenciadorPedido->buscarTodosOsPedidos();

echo json_encode($pedidos);
