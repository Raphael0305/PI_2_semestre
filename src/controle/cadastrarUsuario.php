<?php
include_once __DIR__ . '/../modelo/query.php';
include_once __DIR__ . './../uteis/manipulador_password.php';
header('Content-Type: application/json');
$postData = file_get_contents("php://input");

session_start();

$data = json_decode($postData, true);

$nome = htmlspecialchars($data['nome']) ;
$email = htmlspecialchars($data['email']);
$senha = htmlspecialchars($data['senha']) ;
$telefone = htmlspecialchars($data['telefone']);
$nivelAcesso = (int) htmlspecialchars($data['nivelAcesso']) ;

$stmt = new Query();

if($stmt->verifEmail($email)){
    $_SESSION['error'] = "email já cadastrado!";
    echo json_encode([
        "isRegistered" => false
    ]);
    exit;
}

$hash = ManipuladorPassword::hash_password($senha);

try {
    $isProductRegistered = $stmt->cadastrarUsuario($nome,$email,$hash,$telefone,$nivelAcesso);
    echo json_encode([
        "isRegistered" => true
    ]);
    exit;
} catch (PDOException $th) {
    echo json_encode([
        "isRegistered" => false
    ]);
    exit;
}