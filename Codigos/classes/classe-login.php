<?php
require_once __DIR__ . '/classe-conexao.php';

class Login {
    private $conectar;

    public function __construct() {
        $conexao = NEW ConexaoBanco;
        $this->conectar = $conexao->getConexao();
    }

    public function logar($user, $senha) {
        $sql = $this->conectar->prepare("SELECT id_usuario FROM usuarios WHERE usuario = :u AND senha = :s");
        $sql->bindValue(":u", $user);
        $sql->bindValue(":s", $senha);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        } else {
            return false;
        }
    }

    public function verifLogin(){
        session_start();
        if(!isset($_SESSION['id_usuario'])){
            header("Location: paginaLogin.php");
            exit;
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['id_usuario']);
        header("Location: paginaLogin.php");
        exit;
    }
}


?>
