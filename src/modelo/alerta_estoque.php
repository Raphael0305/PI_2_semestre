<?php
include_once __DIR__ . "/estoque_model.php";
include_once __DIR__ ."/../uteis/status_alerta.php";
class AlertaEstoque {
    private int $idAlerta;
    private int $id_ingrediente;
    private Estoque $estoque;
    private DateTime $data_alerta;
    private StatusAlerta $status_alerta;
    private $conn;


    public function __construct(int $idAlerta, int $id_ingrediente, DateTime $data_alerta, StatusAlerta $status_alerta) {
        $this->idAlerta = $idAlerta;
        $this->id_ingrediente = $id_ingrediente;
        $this->data_alerta = $data_alerta;
        $this->status_alerta = $status_alerta;
        $this->estoque = new Estoque();
        $database = new ConexaoBanco();
        $this->conn = $database->getConexao();
    }

    public function criarAlerta(array $item, int $quantidadeMinima): bool{
        $estaCadastrado = false;
        $colunas = array_keys($item);
        $valoresColunas = array_map(fn($item) => "'{$item}'", $item);
        $insetQuery = "INSERT INTO alertas_estoque (". implode(',', $colunas) .") VALUES (". implode(",", $valoresColunas) .")";
        $stmt = $this->conn->prepare($insetQuery);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir item no banco de dados: {$e->getMessage()}";
        }

        $updateQuery = "UPDATE ingredientes SET quantidade_minima = {$quantidadeMinima} WHERE id_ingrediente = {$item['id_ingrediente']}";
        $stmt = $this->conn->prepare($updateQuery);

        try {
            $stmt->execute();
            $estaCadastrado = !$estaCadastrado;
        } catch (PDOException $e) {
            echo "Erro ao atualizar item {$e->getMessage()}";
        }

        return $estaCadastrado;
    }

    public function excluirAlerta(int $id_ingrediente): bool{
        $estaCadastrado = false;
        $idInt = (int)$id_ingrediente;
        $query = "DELETE FROM alertas_estoque where id_ingrediente = {$idInt}";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
            $estaCadastrado = !$estaCadastrado;
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao deletar o item {$e}";
        }

        return $estaCadastrado;
    }
    
    public function buscarTodosAlertas(){
        $query = "SELECT * FROM alertas_estoque";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        }catch (PDOException $e){
            echo "Ocorreu um erro ao tentar buscar alertas {$e->getMessage()}";
        }

        $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($itens) ? [] : $itens;
    }

    public function buscarAlertaPorId(int $ingredienteId){
        $query = "SELECT * FROM alertas_estoque WHERE id_ingrediente = {$ingredienteId}";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao buscar alerta {$e->getMessage()}";
        }
        $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($itens) ? [] : $itens;
    }

    public function toJson(): array {
        return [
            'id_alerta' => $this->idAlerta,
            'id_ingrediente' => $this->id_ingrediente,
            'data_alerta' => $this->data_alerta->format('Y-m-d'),
            'status_alerta' => $this->status_alerta->value
        ];
    }
}