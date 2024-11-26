<?php
include_once __DIR__ . "../modelo/marmita_modelo.php";

class Gerenciar_pedidos_modelo
{

    private int $id_pedido;
    private String $nomeCliente;
    private int $quantidade;
    private DateTime $dataEntrega;
    private Marmita $marmita;



    public function toJson(): array
    {
        return [
            "id" => $this->id_pedido,
            "nome" => $this->nomeCliente,
            "quantidade" => $this->quantidade,
            "dataEntrega" => $this->dataEntrega,
            "marmita" => $this->marmita->tojson()
        ];
    }


    public function __construct() {}
}
