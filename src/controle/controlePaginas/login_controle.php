<?php
require_once __DIR__ . '/../autenticador.php';

$login = new Autenticador;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $senha = $_POST['password'];  
    
    var_dump($email, $senha); 

    if ($login->logarUsuario($email, $senha)) {
        
        header("Location: /../../paginas/homepage/home_page.php");
        exit(); 
    } else {
        $error = "Senha e/ou usuário estão incorretos";
        header("Location: ../../index.php"); // Redireciona para a página de login
        exit(); 
    }
}
?>
