<?php
require_once __DIR__ . '/../../controle/class-estoque.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $estoque = new Estoque;

    $nome = htmlspecialchars($_POST['nome']);
    $categoria = htmlspecialchars($_POST['categoria']);
    $fornecedor = htmlspecialchars($_POST['fornecedor']);
    $quantidade = (int)$_POST['quantidade'];
    $valorUn = (float)$_POST['valorUn'];
    $dataValidade = htmlspecialchars($_POST['data_validade']);

    ($estoque->EstoqueAdicionarIngred($nome, $categoria, $fornecedor, $quantidade, $valorUn, $dataValidade)); 


    header('Location: ./../../paginas/estoque/estoque.php'); 
    exit();
} else {
    header('Location: ./../../paginas/estoque/estoque.php');
    exit();
}
