<?php



class PedidoModelo
{
    private int $id_pedido;
    private String $nomeCliente;
    private int $quantidade;
    private DateTime $dataEntrega;
    private Marmita $marmita;

    public function __construct(int $id_pedido, string $nomeCliente, int $quantidade, DateTime $dataEntrega, Marmita $marmita)
    {
        $this->id_pedido = $id_pedido;
        $this->nomeCliente = $nomeCliente;
        $this->quantidade = $quantidade;
        $this->dataEntrega = $dataEntrega;
        $this->marmita = $marmita;
    }
    public function getIdPedido(): int
    {
        return $this->id_pedido;
    }

    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getDataEntrega(): DateTime
    {
        return $this->dataEntrega;
    }

    public function getMarmita(): Marmita
    {
        return $this->marmita;
    }

    public function toArray(): array
    {
        return [
            "id_pedido" => $this->id_pedido,
            "nomeCliente" => $this->nomeCliente,
            "quantidade" => $this->quantidade,
            "dataEntrega" => $this->dataEntrega,
            "marmita" => $this->marmita->getIdMarmita()
        ];
    }
}
