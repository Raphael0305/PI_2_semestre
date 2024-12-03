<?php
include __DIR__ . '/../modelo/estoque_model.php';

header("Content-Type: application/json");

$id = json_decode(file_get_contents("php://input"), true);

$estoque = new Estoque();

try {
    $payload = $estoque->buscarItemPorId((int) $id["ID_ingrediente"]);
    echo json_encode(["success" => true, "item" => $payload]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "msg" => $e->getMessage()]);
}
