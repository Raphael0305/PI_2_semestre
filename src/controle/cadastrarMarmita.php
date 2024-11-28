<?php
include_once  __DIR__ . '/../modelo/query.php';
header('Content-Type: application/json');

$dados = json_decode(file_get_contents("php://input"), true);

if (!$dados) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'não da validado esse dadu não']);
    exit;
}

$nomeMarmita = $dados['nomeMarmita'];
$precoMarmita = (float)$dados['precoMarmita']; 
$ingredientes = $dados['ingredientes'];


foreach ($ingredientes as $ingrediente) {
    $idIngrediente = (int)$ingrediente['id']; 
    $quantidade = (int)$ingrediente['quantidade'];  

    echo "Ingrediente ID: $idIngrediente, Quantidade: $quantidade\n";
}

try {
    $query = new Query();


    $idMarmita = $query->cadastrarMarmita($nomeMarmita, $precoMarmita);
    $query->cadastrarIngredientes($idMarmita, $ingredientes);

    echo json_encode(['status' => 'sucesso', 'ID_marmita' => $idMarmita]);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}

echo json_encode([
    'status' => 'sucesso',
    'nomeMarmita' => $nomeMarmita,
    'precoMarmita' => $precoMarmita,
    'ingredientes' => $ingredientes
]);

?>