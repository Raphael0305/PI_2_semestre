<?php

include_once __DIR__ . '/classe-conexao.php';

class Query {
    public $conectar;
// ----------------------------------------------------------------------------------------------------------------------------------------
    public function __construct() {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }
    
// ----------------------------------------------------------------------------------------------------------------------------------------
// BUSCAR DE INGREDIENTES**
    public function buscarIngredientesPesquisa($pesquisa){
            $query = $this->conectar->prepare("SELECT * FROM ingredientes WHERE nome LIKE :pesquisa");
            $query->bindValue(':pesquisa', '%' . $pesquisa . '%');         
            $query->execute();
            return $query->fetchAll();
    }

    public function cadastrarIngrediente(array $ingrediente): bool{
        $query = "INSERT INTO ingredientes (
                    nome, 
                    categoria, 
                    fornecedor, 
                    quantidade, 
                    valorUn, 
                    data_validade
                )
                 VALUES (
                    :nome,
                    :categoria,
                    :fornecedor, 
                    :quantidade, 
                    :valorUn, 
                    :data_validade
                )";

        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":nome", $ingrediente["nome"]);
        $stmt->bindValue(":categoria", $ingrediente["categoria"]);
        $stmt->bindValue(":fornecedor", $ingrediente["fornecedor"]);
        $stmt->bindValue(":quantidade", (float)$ingrediente["quantidade"]);
        $stmt->bindValue(":valorUn", (float)$ingrediente["valorUn"]);
        $stmt->bindValue(":data_validade", $ingrediente["data_validade"]);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao cadastrar item: " . $e;
            return false;
        }
    }

    public function buscarTodosIngredientes(){
        $query = "SELECT * FROM ingredientes";
        $stmt = $this->conectar->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarItemPorId(String $id){
        $query = "SELECT * FROM ingredientes WHERE id_ingrediente = :id";
        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":id", (String)$id);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [
                "Item nao encontrado"=> $e->getMessage(),
            ];
        }
    }

    public function atualizarItemPorId(array $payload){
        $id = $payload["id_ingrediente"];
        unset($payload["id_ingrediente"]);
        $setParts = [];
        foreach ($payload as $key => $value) {
        $setParts[] = "$key = :$key";
        }
        $setClause = implode(', ', $setParts);
        $query = "UPDATE ingredientes SET {$setClause} WHERE id_ingrediente = :id";
        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":id", $id);
        foreach ($payload as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar item: ". $e;
            return false;
        }
    }

    public function verifEmail($email) {
        $query = $this->conectar->prepare("SELECT * FROM usuario WHERE email = :email");
        $query->bindValue(":email", $email);
    
        try {
            $query->execute();
            if ($query->rowCount() > 0) {
                return true; 
            }
            return false; 
        } catch (Exception $th) {
            echo "Erro ao verificar o email: " . $th->getMessage();
            return false;
        }
    }
    

    public function excluirItem($payload) {
        $query = "DELETE FROM ingredientes WHERE id_ingrediente = :id_ingrediente";
        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":id_ingrediente", (int)$payload['id_ingrediente']);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar ingrediente: ". $e->getMessage();
            return false;
        }
    }

    public function totalPaginas($limite){
        $registros = $this->conectar->query("SELECT COUNT(*) FROM ingredientes")->fetchColumn();
        $quantPaginas = ceil($registros / $limite);
        return $quantPaginas;       
    }
    
// ----------------------------------------------------------------------------------------------------------------------------------------    
    // INSERT LOCAL

    public function cadastrarUsuario($nome,$email, $senha, $telefone, $nivelAcesso) {

        $query = "INSERT INTO usuarios (
            nome, 
            email, 
            senha, 
            telefone, 
            nivel_acesso
        ) VALUES (
            :nome,
            :email,
            :senha,
            :telefone,
            :nivelAcesso
        )";
    
        $stmt = $this->conectar->prepare($query);
    
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->bindValue(":telefone", $telefone);
        $stmt->bindValue(":nivelAcesso", $nivelAcesso);
    
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao cadastrar item: " . $e->getMessage();
            return false;
        }
    }
    
}
    
