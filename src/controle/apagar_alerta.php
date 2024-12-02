<?php
include_once __DIR__ . "/../modelo/alerta_estoque.php";
header("Content: application/json");

$alertaID = file_get_contents("php//input");
$alerta = AlertaEstoque::factoryAlertaEstoque($alertaID);
$alertaEcluido = $alerta->excluirAlerta();

if ($alertaEcluido) {
    echo json_encode(['status' => true, 'msg' => 'Alerta apagado com sucesso']);
} else {
    echo json_encode(['status' => false, 'msg' => 'Alerta nao apagado']);
}
