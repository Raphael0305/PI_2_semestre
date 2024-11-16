<?php
include 'query.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = htmlspecialchars($_POST["email"]);
    $passwd = htmlspecialchars($_POST["passwd"]);
    $query = new Query();

    if ($query->buscarLogin($email, $passwd)){

        session_start();
        $dados = $query->buscarUsuarioPorEmail($email);
        $_SESSION["user_name"] = $dados['id_usuario'];

        header("Location: ../paginas/homepage/home_page.php");
        exit;

    }else{

        header("Location: ../index.php");
        exit;
        
    }
}

?>