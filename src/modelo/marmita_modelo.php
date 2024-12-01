<?php
include_once __DIR__ . "/ingrediente.php";
include_once __DIR__ . "/classe-conexao.php";
class Marmita
{

    private int $id_marmita;
    private String $nomeMarmita;
    private float $preco;
    private array $ingredientes;

    public function __construct(int $id_marmita, String $nomeMarmita, float $preco)
    {
        $todosIngrediente = [];
        $database = new ConexaoBanco();
        $conn = $database->getConexao();
        $query =
            "SELECT i.*
            FROM ingrediente i, marmita_ingredi mi WHERE i.id_ingrediente = mi.id_ingrediente 
            AND mi.id_marmita = {$id_marmita}";
        $stmt = $conn->prepare(query: $query);

        try {
            $stmt->execute();
        } catch (\PDOException $e) {
            echo "Erro ao buscar ingredientes" . $e->getMessage() . "";
        }
        $ingredientesMarmita = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($ingredientesMarmita as $key => $ingrediente) {
            $todosIngrediente[] = Ingrediente::fromArray($ingrediente);
        }
        $this->id_marmita = $id_marmita;
        $this->nomeMarmita = $nomeMarmita;
        $this->ingredientes = $todosIngrediente ?? [Ingrediente::factoryIngredienteVazio()];
        $this->preco = $preco;
    }

    static public function factoryMarmita(int $id_marmita, String $nomeMarmita, Float $preco): Marmita
    {
        return new Marmita(
            id_marmita: $id_marmita,
            nomeMarmita: $nomeMarmita,
            preco: $preco,
        );
    }
    public static function factoryMarmitaVazia(): Marmita
    {
        return new Marmita(
            id_marmita: 0,
            nomeMarmita: '',
            preco: 0.0,
        );
    }

    public function getIdMarmita(): int
    {
        return $this->id_marmita;
    }

    public function toArray(): array
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

    public static function fromArray(array $data): Marmita
    {
        $ingredientes = array_map(function ($ingredienteData) {
            return Ingrediente::fromArray($ingredienteData);
        }, array: $data['ingredientes']);

        return new Marmita(
            id_marmita: $data['id_marmita'],
            nomeMarmita: $data['nomeMarmita'],
            preco: $data['preco'],
        );
    }
}
