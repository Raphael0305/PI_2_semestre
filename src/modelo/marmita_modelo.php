<?php
include_once __DIR__ . "/ingrediente.php   ";
class Marmita
{

    private String $id_marmita;
    private String $nomeMarmita;
    private float $preco;
    private array $ingredientes;

    public function __construct(int $id_marmita, String $nomeMarmita, float $preco, array $ingredientes)
    {
        $this->id_marmita = $id_marmita;
        $this->nomeMarmita = $nomeMarmita;
        $this->preco = $preco;
        $this->ingredientes = $ingredientes;
    }

    static public function factoryMarmita(String $id_marmita, String $nomeMarmita, Float $preco, array $ingredientes)
    {
        return new Marmita(
            id_marmita: $id_marmita,
            nomeMarmita: $nomeMarmita,
            preco: $preco,
            ingredientes: $ingredientes
        );
    }

    public function tojson(): array
    {
        $ingredientesJson = array_map(function ($ingrediente) {
            return $ingrediente->tojson();
        }, $this->ingredientes);
        return [
            'nomeMarmita' => $this->nomeMarmita,
            'preco' => $this->preco,
            'ingredientes' => $ingredientesJson
        ];
    }

    public static function fromJson(array $data): Marmita
    {
        $ingredientes = array_map(function ($ingredienteData) {
            return Ingrediente::fromJson($ingredienteData);
        }, array: $data['ingredientes']);

        return new Marmita(
            id_marmita: $data['id_marmita'],
            nomeMarmita: $data['nomeMarmita'],
            preco: $data['preco'],
            ingredientes: $ingredientes
        );
    }
}
