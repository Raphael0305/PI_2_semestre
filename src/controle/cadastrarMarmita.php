<?php
include_once  __DIR__ . '/../modelo/query.php';
header('Content-Type: application/json');

$dados = json_decode(file_get_contents("php://input"), true);


if (!$dados) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
    exit;
}

$nomeMarmita = $dados['nomeMarmita'];
$precoMarmita = (float)$dados['precoMarmita']; 
$ingredientes = $dados['ingredientes'];


try {
    $query = new Query();

    $idMarmita = $query->cadastrarMarmita($nomeMarmita, $precoMarmita);


    $query->cadastrarIngredientes($idMarmita, $ingredientes);


    echo json_encode([
        'status' => 'sucesso',
        'ID_marmita' => $idMarmita,
        'nomeMarmita' => $nomeMarmita,
        'precoMarmita' => $precoMarmita,
        'ingredientes' => $ingredientes
    ]);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => $e->getMessage()]);
}
?>
