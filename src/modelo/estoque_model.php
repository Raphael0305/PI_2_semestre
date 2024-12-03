<?php
include_once __DIR__ . "/classe-conexao.php";
class Estoque
{
    private $conn;

    public function cadastrarItem(array $ingrediente): bool
    {   

        $nome = $ingrediente['nome'];
        $categoria = $ingrediente['categoria'];
        $fornecedor = $ingrediente['fornecedor'];
        $qtde = $ingrediente['quantidade'];
        $valor = $ingrediente['valorUn'];
        $data_validade = $ingrediente['data_validade'];

        $query = "INSERT INTO ingrediente (nome, categoria, fornecedor, quantidade, valorUn, data_validade) 
        VALUES (:nome, :categoria, :fornecedor, :quantidade, :valorUn, :data_validade)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':categoria', $categoria);
        $stmt->bindValue(':fornecedor', $fornecedor);
        $stmt->bindValue(':quantidade', $qtde, PDO::PARAM_INT); 
        $stmt->bindValue(':valorUn', $valor);
        $stmt->bindValue(':data_validade', $data_validade);
        
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao cadastrar item: {$e->getMessage()}";
            return false;
        }
    }

    public function buscarItemPorNome(String $pesquisa): array
    {
        $query = "SELECT * FROM ingrediente WHERE nome LIKE '%$pesquisa%'";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao buscar item, erro: {$e->getMessage()}";
        }
        $payload = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $payload ?? [];
    }

    public function buscarTodosItens()
    {
        $query = "SELECT * FROM ingrediente";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarItemPorId(String $id): array
    {
        $query = "SELECT * FROM ingrediente WHERE ID_ingrediente = {$id}";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao buscar item por id: {$e}";
        }
        $itens  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $itens == [] ? [] : $itens;
    }

    public function atualizarItemPorId(array $payload): bool
    {
        $id = $payload["ID_ingrediente"];
        unset($payload["ID_ingrediente"]);
        $values = [];
        foreach ($payload as $key => $value) {
            if (is_float($value) || is_int($value)) {
                $values[] = "{$key} = {$value}";
            }
            $values[] = "{$key} = '{$value}'";
        }
        $columUpdates = implode(',', $values);
        $query = "UPDATE ingrediente SET {$columUpdates} WHERE ID_ingrediente = {$id}";
        $stmt = $this->conn->prepare($query);


        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar item: {$e}";
            return false;
        }
    }

    public function excluirItem(int $id): bool
    {
        $query = "DELETE FROM ingrediente WHERE id_ingrediente = $id";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar ingrediente: " . $e->getMessage();
            return false;
        }
    }

    public function __construct()
    {
        $database = new ConexaoBanco();
        $this->conn = $database->getConexao();
    }
}
