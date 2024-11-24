<?php
include_once __DIR__ . '/../modelo/autenticador.php';
include_once __DIR__ . '/../modelo/usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $user = new Usuario(email: $email,  senha: $passwd);
    $auth = new Autenticador();
    $isLogged = $auth->logarUsuario($user);

    if ($isLogged) {
        header("Location: ../paginas/homepage/home_page.php");
    } else {
        header("Location: ../index.php");
        exit;
        
    }
}
