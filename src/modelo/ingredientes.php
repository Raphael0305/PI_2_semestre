<?php

class Ingredientes {
    private String $nome;
    private String $categoria;
    private String $fornecedor;
    private float $quantidade;
    private float $valorUn;
    private String $data_validade;

    public function __construct($nome, $categoria, $fornecedor, $quantidade, $valorUn, $data_validade) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->quantidade = $quantidade;
        $this->valorUn = $valorUn;
        $this->data_validade = $data_validade;
    }

    public function toJson() {
        return get_object_vars($this);
    }
}