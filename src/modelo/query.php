<?php

include_once __DIR__ . '/classe-conexao.php';

class Query
{
    public $conectar;
    // ----------------------------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $conexao = new ConexaoBanco();
        $this->conectar = $conexao->getConexao();
    }

    // ----------------------------------------------------------------------------------------------------------------------------------------
    // BUSCAR DE INGREDIENTES**
    public function buscarIngredientesPesquisa($pesquisa)
    {

        $query = $this->conectar->prepare("SELECT * FROM ingredientes WHERE nome LIKE :pesquisa");
        $query->bindValue(':pesquisa', '%' . $pesquisa . '%');
        $query->execute();
        return $query->fetchAll();
    }

    public function cadastrarIngrediente(array $ingrediente): bool
    {
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

    public function buscarTodosIngredientes()
    {
        $query = "SELECT * FROM ingredientes";
        $stmt = $this->conectar->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarItemPorId(String $id)
    {
        $query = "SELECT * FROM ingredientes WHERE id_ingrediente = :id";
        $stmt = $this->conectar->prepare($query);
        $stmt->bindValue(":id", (string)$id);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [
                "Item nao encontrado" => $e->getMessage(),
            ];
        }
    }

    public function atualizarItemPorId(array $payload)
    {
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
            echo "Erro ao atualizar item: " . $e;
            return false;
        }
    }

    public function excluirItem($payload)
    {
        $id = (int)$payload['id_ingrediente'];
        $query = "DELETE FROM ingrediente WHERE ID_ingrediente = {$id}";
        $stmt = $this->conectar->prepare($query);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar ingrediente: " . $e->getMessage();
            return false;
        }
    }

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
