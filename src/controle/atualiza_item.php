<?php
include_once  __DIR__ . '/../modelo/estoque_model.php';

header('Content-Type: application/json');

$payload = file_get_contents('php://input');
$estoque = new Estoque();
$itens = (array)json_decode($payload);
$isUpdated = $estoque->atualizarItemPorId(payload: $itens);

if( $isUpdated ){
    echo json_encode(["success" => true, "msg" => "Atualizado com sucesso"]);
}else {
    echo json_encode(["success" => false, "msg" => "Nao atualizado"]);

}