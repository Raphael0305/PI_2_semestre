<?php

class ConexaoBanco{
    private $conexao;

    public function __construct(){
        $this->conectarBanco('marmitaria', 'localhost', 'root', '');
    }

    public function conectarBanco($dbname,$host,$user,$senha){
        try {
            $this->conexao = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro com o banco de dados:".$e->getMessage();
            exit();
        }
    }

    public function getConexao(){
        return $this->conexao;
    }
}



?>