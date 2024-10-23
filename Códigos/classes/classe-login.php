<?php
class Login {
    private $pdo; 

    public function __construct($dbname, $host, $user, $senha) {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
            exit();
        }
    }

    public function logar($user, $senha) {
        $sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE usuario = :u AND senha = :s");
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
        if(!isset($_SESSION['id_usuario'])){
            header("Location: paginaLogin.php");
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['id_usuario']);
        header("Location: paginaLogin.php");
    }
}


?>
