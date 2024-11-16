<?php

class ConexaoBanco{
    private $conexao;

    public function __construct(){
        $this->conectarBanco('marmitaria', 'db', 'root', 'Marmita@02');
    }

    public function conectarBanco($dbname,$host,$user,$senha){
        try {
            $this->conexao = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$senha);
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