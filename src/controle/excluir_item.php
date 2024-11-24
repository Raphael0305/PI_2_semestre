<?php
include_once __DIR__ . '/../modelo/query.php';

header("Content-Type: application/json");

$payload = json_decode(file_get_contents("php://input"), true);
$stmt = new Query();

if ($stmt->excluirItem($payload)){
    echo json_encode(['success'=> true,'message'=> 'Item excluido com sucesso']);
}
else{
    echo json_encode(['success'=> false,'message'=> 'Item nao excluido']);
}






?>