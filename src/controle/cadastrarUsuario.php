<?php
include_once __DIR__ . '/../modelo/query.php';
include_once __DIR__ . './../uteis/manipulador_password.php';
header('Content-Type: application/json');
$dadu = json_decode(file_get_contents("php://input"), true);

if (!$dadu) {
    echo json_encode([
        'status' => 'erro',
        'mensagem' => 'JSON inválido ou não recebido',
        'raw' => file_get_contents("php://input")
    ]);
    exit;
}


$nome = htmlspecialchars($dadu['nome']) ;
$email = htmlspecialchars($dadu['email']);
$senha = htmlspecialchars($dadu['senha']) ;
$telefone = htmlspecialchars($dadu['telefone']);
$nivelAcesso = htmlspecialchars($dadu['nivelAcesso']);

try {
    $query = new Query();

    $hash = ManipuladorPassword::hash_password($senha);

    $query->cadastrarUsuarioProcedure($nome,$email,$hash,$telefone,$nivelAcesso);
    echo json_encode([
        "status" => 'sucesso'
    ]);
    exit;
} catch (PDOException $th) {
    echo json_encode([
        "status" => 'erro', 'menssage' => $th->getMessage()
    ]);
    exit;
}