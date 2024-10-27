<?php

class ConexaoBanco{
    private $conexao, $host, $user,$senha,$dbname;

    public function __construct($dbname,$host,$user,$senha){
        $this->conectarBanco($dbname,$host,$user,$senha);
    }


    public function conectarBanco($dbname,$host,$user,$senha){
        try {
            $this->conexao = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
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