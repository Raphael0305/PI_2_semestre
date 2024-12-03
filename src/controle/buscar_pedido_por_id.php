<?php
include_once __DIR__ . "/../modelo/gerenciar_pedidos_modelo.php";

header("Content-Type: application/json");
$id = json_decode(file_get_contents("php://input"), true);

$gerenciadorPedido = GerenciarPedidosModelo::factoryEmptyValues();

$pedidos = $gerenciadorPedido->atualizarParaPedidoCompleto($id);
echo $pedidos == true ? json_encode(["status" => true]) : json_encode(["status" => false]);
exit;
