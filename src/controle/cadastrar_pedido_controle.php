<?php
include_once __DIR__ . "/../modelo/gerenciar_pedidos_modelo.php";
include_once __DIR__ . "/../modelo/marmita_modelo.php";
include_once __DIR__ . "/../modelo/pedido_modelo.php";

header("Content-Type: application/json");

$payload = file_get_contents("php://input");
$readyPayload = json_decode(json: $payload, associative: true);



$gerenciadorPedido = new GerenciarPedidosModelo(
    pedidoModelo: new PedidoModelo(
        nomeCliente: $readyPayload['nomeCliente'],
        quantidade: $readyPayload['quantidade'],
        marmita: new Marmita(
            id_marmita: $readyPayload['id_marmita']
        )
    )
);

$produtoCriado = $gerenciadorPedido->criarPedidos();

if ($produtoCriado) {
    echo json_encode(["status" => true,]);
    exit;
}
echo json_encode(["status" => false,]);
exit;
