<?php
require_once __DIR__ . '/query.php';
$consulta = NEW Query;

class Usuario{

    private $idUsuario;
    private $nivelAcesso;
    private $query;

    private function __construct()
    {
        $this->query = NEW Query;
    }

    public function getId() {
        if (isset($_SESSION['id_mestre'])) {
            $this->idUsuario = $_SESSION['id_mestre'];
            return $this->idUsuario;
        } else if (isset($_SESSION['id_usuario'])) {
            $this->idUsuario = $_SESSION['id_usuario'];
            return $this->idUsuario;
        } else {
            return 'Erro ao pegar ID';
        }
    }

    public function getNivelAcesso(){
        if($_SESSION = 'id_mestre'){
            return 'Adimin';
        }else{
            return 'usuario';
        }
    }

    public function nomeUsuario(){
        $dados = $this->query->buscarDadosUsuario($this->getId());
        $nome = $dados['nome_completo'];
        return $nome;
    }

}


?>