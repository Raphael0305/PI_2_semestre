<?php
include 'query.php';

header("Content-Type: application/json");

$id = json_decode(file_get_contents("php://input"), true);
$stmt = new Query();
try {
    $payload = $stmt->buscarItemPorId($id["id_ingrediente"]);
    echo json_encode(["success" => true, "item"=> $payload]);
} catch (PDOException $e) {
    echo json_encode(["success"=> false,"msg"=> $e->getMessage()]);
}





?>