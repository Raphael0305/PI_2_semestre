<?php
include_once __DIR__ . '/../modelo/query.php';

header('Content-Type: application/json');

$payload = file_get_contents('php://input');
$stmt = new Query();
$isUpdated = $stmt->atualizarItemPorId((array)json_decode($payload, true));

if( $isUpdated ){
    echo json_encode(["success" => true, "msg" => "Atualizado com sucesso"]);
}else {
    echo json_encode(["success" => false, "msg" => "Nao atualizado"]);

}