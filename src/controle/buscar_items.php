<?php
include '../modelo/query.php';
header("Content-Type: application/json");
$stmt = new Query();

echo json_encode($stmt->buscarTodosIngredientes());

?>