<?php
include_once __DIR__ . "/estoque_model.php";
class AlertaEstoque
{
    private int $ID_alerta;
    private int $ID_ingrediente;
    private int $quantidade_estoque;
    private DateTime $data_alerta;
    private $conn;


    public function __construct(int $ID_ingrediente, float $quantidade_estoque, DateTime $data_alerta, int $idAlerta = 0)
    {
        $this->ID_alerta = $idAlerta;
        $this->ID_ingrediente = $ID_ingrediente;
        $this->quantidade_estoque = $quantidade_estoque;
        $this->data_alerta = $data_alerta;
        $database = new ConexaoBanco();
        $this->quantidade_estoque = $this->quantidade_estoque ?? 0;
        $this->conn = $database->getConexao();
    }

    static public function factoryAlertaEstoque(int $ID_ingrediente = 0): AlertaEstoque
    {
        return new AlertaEstoque(
            idAlerta: 0,
            ID_ingrediente: $ID_ingrediente,
            quantidade_estoque: 0,
            data_alerta: new DateTime('now', new DateTimeZone('America/Sao_Paulo')),
        );
    }


    public function criarAlerta($quantidadeMin): bool
    {
        $item = $this->toJson();
        unset($item['ID_alerta']);
        $estaCadastrado = false;
        $colunas = array_keys($item);
        $valoresColunas = array_map(fn($item) => " '{$item}'", $item);
        $insetQuery = "INSERT INTO alerta_estoque_baixo (" . implode(',', $colunas) . ") VALUES (" . implode(",", $valoresColunas) . ")";
        $stmt = $this->conn->prepare($insetQuery);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir item no banco de dados: {$e->getMessage()}";
        }
        $updateQuery = "UPDATE ingrediente SET quantMin = {$quantidadeMin} WHERE ID_ingrediente = {$item['ID_ingrediente']}";
        $stmt = $this->conn->prepare($updateQuery);

        try {
            $stmt->execute();
            $estaCadastrado = !$estaCadastrado;
        } catch (PDOException $e) {
            echo "Erro ao atualizar item {$e->getMessage()}";
        }

        return $estaCadastrado;
    }

    public function excluirAlerta(): bool
    {
        $estaCadastrado = false;
        $idInt = (int)$this->ID_ingrediente;
        $query = "DELETE FROM alerta_estoque_baixo WHERE ID_ingrediente = {$idInt}";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
            $estaCadastrado = !$estaCadastrado;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao deletar o item {$e}";
        }

        return $estaCadastrado;
    }

    public function buscarTodosAlertas()
    {
        $query = "SELECT * FROM alerta_estoque_baixo";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar buscar alertas {$e->getMessage()}";
        }

        $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($itens) ? [] : $itens;
    }

    public function buscarAlertaPorId(int $ingredienteId)
    {
        $query = "SELECT * FROM alerta_estoque_baixo WHERE ID_ingrediente = {$ingredienteId}";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao buscar alerta {$e->getMessage()}";
        }
        $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($itens) ? [] : $itens;
    }

    public function toJson(): array
    {
        return [
            'ID_alerta' => $this->ID_alerta,
            'ID_ingrediente' => $this->ID_ingrediente,
            'quantidade_estoque' => $this->quantidade_estoque,
            'data_alerta' => $this->data_alerta->format('Y-m-d')
        ];
    }
}
