<?php

class Produto {
    public ?int $id;
    public string $nome;
    public string $descricao;
    public string $preco;
    public int $estoque;

    public function __construct(?int $id = null, string $nome = '', string $descricao = '', string $preco = '', int $estoque = 0) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }
}