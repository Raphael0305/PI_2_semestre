<?php

require_once __DIR__ . '/classe-conexao.php';

class Query {
    public $conectar;

    public function __construct() {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }

    public function buscarUsuarioPorEmail($email) {
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE email = :e");
        $query->bindValue(":e", $email);
        $query->execute();
    
        if ($query->rowCount() > 0) {
            return $query->fetch();
        } else {
            return false; 
        }
    }

    public function buscarLogin($email, $senha) {
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
        $query->bindValue(":e", $email);
        $query->bindValue(":s", $senha);
        $query->execute();

        if($query->rowCount() > 0){
            return $query->fetch();
        }else{
            return false;
        }
    }

    public function buscarDadosUsuario($id){
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
        $query->bindValue(":id",$id);
        $query->execute();
        return $query->fetch();
    }
}
