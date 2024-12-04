<?php
include_once __dir__ . "/../uteis/categoria_enum.php";
class Ingrediente
{
    private int $id_ingrediente;
    private String $nome;
    private Categoria $categoria;
    private String $fornecedor;
    private float $quantidade;
    private float $valorUn;
    private String $data_validade;

    public function __construct(String $nome, Categoria $categoria, String $fornecedor, float $quantidade, float $valorUn, String $data_validade, int $id_ingrediente = 0)
    {
        $this->id_ingrediente = $id_ingrediente;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->quantidade = (float) $quantidade;
        $this->valorUn = (float) $valorUn;
        $this->data_validade = $data_validade;
    }
    public static function factoryIngredienteVazio(): Ingrediente
    {
        return new Ingrediente(
            nome: '',
            categoria: Categoria::OUTROS,
            fornecedor: '',
            quantidade: 0.0,
            valorUn: 0.0,
            data_validade: '',
        );
    }

    static function getCategoria(String $categoria): Categoria

    {
        $categoriaValue = Categoria::cases();

        foreach ($categoriaValue as $value) {
            if ($categoriaValue == $categoria) {
                return Categoria::tryFrom(value: $value->name);
            }
        }
        return Categoria::OUTROS;
    }


    public static function fromArray(array $data): Ingrediente
    {

        return new Ingrediente(
            nome: $data['nome'],
            categoria: self::getCategoria($data['categoria']),
            fornecedor: $data['fornecedor'],
            quantidade: $data['quantidade'],
            valorUn: $data['valorUn'],
            data_validade: $data['data_validade'],
        );
    }

    public function toArray()
    {
        return [

            'nome' => $this->nome ?? '',
            'categoria' => $this->categoria->name ?? '',
            'fornecedor' => $this->fornecedor ?? '',
            'quantidade' => $this->quantidade ?? '',
            'valorUn' => $this->valorUn ?? '',
            'data_validade' => $this->data_validade ?? '',
        ];
    }
}
