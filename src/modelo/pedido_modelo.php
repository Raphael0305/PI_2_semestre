<?php



class PedidoModelo
{
    private int $id_pedido;
    private String $nomeCliente;
    private int $quantidade;
    private DateTime $dataEntrega;
    private Marmita $marmita;

    public function __construct(string $nomeCliente, int $quantidade, Marmita $marmita, int $id_pedido = 0)
    {
        $this->id_pedido = $id_pedido;
        $this->nomeCliente = $nomeCliente;
        $this->quantidade = $quantidade;
        $this->dataEntrega = new DateTime('now');
        $this->marmita = $marmita;
    }

    public static function factoryOnlyID(int $id): PedidoModelo
    {
        return new PedidoModelo(
            id_pedido: $id,
            nomeCliente: '',
            quantidade: 0,
            marmita: Marmita::factoryMarmitaVazia()
        );
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
            "id_pedido" => $this->id_pedido ?? 0,
            "nomeCliente" => $this->nomeCliente,
            "quantidade" => $this->quantidade,
            "dataEntrega" => $this->dataEntrega,
            "marmita" => $this->marmita->getIdMarmita()
        ];
    }
}
