<?php

require_once __DIR__ . '/classe-conexao.php';

class Query {
    public $conectar;
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }
// ----------------------------------------------------------------------------------------------------------------------------------------
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
// ----------------------------------------------------------------------------------------------------------------------------------------
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
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function buscarDadosUsuario($id){
        $query = $this->conectar->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
        $query->bindValue(":id",$id);
        $query->execute();
        return $query->fetch();
    }
// ----------------------------------------------------------------------------------------------------------------------------------------
// BUSCAR DE INGREDIENTES**
    public function buscarIngredientesPesquisa($pesquisa){

        $query = $this->conectar->prepare("SELECT * FROM ingredientes WHERE nome LIKE :pesquisa");
        $query->bindValue(':pesquisa', '%' . $pesquisa . '%');         
        $query->execute();
        return $query->fetchAll();
    }

    public function buscarTodosIngredientes(){
        $query = $this->conectar->query("SELECT * FROM ingredientes");
        $query->execute();
        return $query->fetchAll();
    }

// ISNERTS 


public function addIngredientes($nome, $categoria, $fornecedor, $quantidade, $valorUn, $dataValidade) {
    try {
        $query = $this->conectar->prepare(
            "INSERT INTO ingredientes (nome, categoria, fornecedor, quantidade, preco_compra, data_validade) 
             VALUES (:nome, :categoria, :fornecedor, :quantidade, :preco_compra, :data_validade)"
        );
        $query->bindValue(':nome', $nome);
        $query->bindValue(':categoria', $categoria);
        $query->bindValue(':fornecedor', $fornecedor);
        $query->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $query->bindValue(':preco_compra', $valorUn, PDO::PARAM_STR);
        $query->bindValue(':data_validade', $dataValidade);

        $query->execute();

        return true;
    } catch (PDOException $e) {
        echo "Erro ao adicionar ingrediente: " . $e->getMessage();
        return false;
    }
}


}
