<?php
include_once __dir__ . "/../uteis/categoria_enum.php";
class Ingrediente
{
    private String $nome;
    private Categoria $categoria;
    private String $fornecedor;
    private float $quantidade;
    private float $valorUn;
    private String $data_validade;
    private float $quantMin;

    public function __construct(String $nome, Categoria $categoria, String $fornecedor, float $quantidade, float $valorUn, String $data_validade, float $quantMin)
    {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->quantidade = (float) $quantidade;
        $this->valorUn = (float) $valorUn;
        $this->data_validade = $data_validade;
        $this->quantMin = (float) $quantMin;
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


    public static function fromJson(array $data): Ingrediente
    {
        return new Ingrediente(
            $data['nome'],
            self::getCategoria($data['categoria']),
            $data['fornecedor'],
            $data['quantidade'],
            $data['valorUn'],
            $data['data_validade'],
            $data['quantMin']
        );
    }

    public function toJson()
    {
        return [

            'nome' => $this->nome ?? '',
            'categoria' => $this->categoria->name ?? '',
            'fornecedor' => $this->fornecedor ?? '',
            'quantidade' => $this->quantidade ?? '',
            'valorUn' => $this->valorUn ?? '',
            'data_validade' => $this->data_validade ?? '',
            'quantMin' => $this->quantMin ?? ''
        ];
    }
}
