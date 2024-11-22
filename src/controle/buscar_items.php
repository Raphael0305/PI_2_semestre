<?php
include_once __DIR__ . '/../modelo/query.php';
header("Content-Type: application/json");
$stmt = new Query();

echo json_encode($stmt->buscarTodosIngredientes());

?>