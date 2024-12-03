<?php
include_once __DIR__ . "/../modelo/pedido_modelo.php";
include_once __DIR__ . "/../modelo/marmita_modelo.php";
include_once __DIR__ . "/../modelo/classe-conexao.php";


class GerenciarPedidosModelo
{
    private PedidoModelo $pedidoModelo;
    private $conn;

    public function __construct(PedidoModelo $pedidoModelo)
    {
        $this->pedidoModelo = $pedidoModelo;
        $database = new ConexaoBanco();
        $this->conn = $database->getConexao();
    }

    public static function factoryEmptyValues(): GerenciarPedidosModelo
    {
        return new GerenciarPedidosModelo(
            pedidoModelo: new PedidoModelo(
                id_pedido: 0,
                nomeCliente: '',
                quantidade: 0,
                marmita: new Marmita(
                    id_marmita: 0,
                    nomeMarmita: '',
                    preco: 0.0,
                )
            )
        );
    }


    public function criarPedidos(): bool
    {
        $pedido = $this->toJson();
        $query = "INSERT INTO pedidos (
        nomeCliente, 
        quantidade, 
        dataEntrega, 
        ID_marmita,
        completo
        ) VALUES (
        '{$pedido['nomeCliente']}', 
        {$pedido['quantidade']}, 
        '{$pedido['dataEntrega']}', 
        {$pedido['id_marmita']},
        'nao')";
        $stmt = $this->conn->prepare($query);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar pedido: " . $e->getMessage();
            return false;
        }
    }


    public function excluirPedido(): bool|string
    {
        $pedidoId = $this->pedidoModelo->getIdPedido();
        $query = "DELETE FROM pedidos WHERE id_pedido = {$pedidoId}";
        $stmt = $this->conn->prepare($query);


        try {
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            echo "Ocorreu um erro ao excluir o pedido: " . $th->getMessage();
        }

        return false;
    }
    public function buscarTodosOsPedidos(): array
    {
        $query = "SELECT * FROM view_pedido_detalhado";
        $stmt = $this->conn->prepare(query: $query);

        try {
            $stmt->execute();
            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pedidos ?? [];
        } catch (PDOException $e) {
            echo "Ocorreu um erro ao buscar os pedidos: " . $e->getMessage();
            return [];
        }
    }

    // Esse codigo pode ser implementado futuramente para uma barra de pesquisa por exemplo

    // public function buscarPedidoPorId(): array
    // {
    //     $query = "SELECT * FROM pedidos WHERE id_pedido = {$this->id_pedido}";
    //     $stmt = $this->conn->prepare(query: $query);
    //     $payload = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     try {
    //         $stmt->execute();
    //         return $payload ?? [];
    //     } catch (\Throwable $e) {
    //         echo "Ocorreu um erro ao buscar pedido: " . $e->getMessage();
    //         return [];
    //     }
    // }


    // public function buscarPedidoPorNome(): array
    // {
    //     $query = "SELECT * FROM pedido WHERE nomeCliente = {$this->nomeCliente}";
    //     $stmt = $this->conn->prepare(query: $query);
    //     $payload = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     try {
    //         $stmt->execute();
    //         return $payload ?? [];
    //     } catch (\Throwable $e) {
    //         echo "Ocorreu um erro ao buscar pedido: " . $e->getMessage();
    //         return [];
    //     }
    // }

    public function toJson(): array
    {
        $pedido = $this->pedidoModelo;
        $getDate = $pedido->getDataEntrega()->format(format: 'Y-m-d');
        return [
            "id_pedido" => $pedido->getIdPedido(),
            "nomeCliente" => $pedido->getNomeCliente(),
            "quantidade" => $pedido->getQuantidade(),
            "dataEntrega" => $getDate,
            "id_marmita" => $pedido->getMarmita()->getIdMarmita()
        ];
    }
}
