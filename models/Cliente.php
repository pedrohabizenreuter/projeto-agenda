<?php

class Cliente {
    public ?int $id;
    public string $nome;
    public string $email;
    public string $cpf;

    public function __construct(?int $id = null, string $nome = '', string $email = '', string $cpf = '') {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
    }
}