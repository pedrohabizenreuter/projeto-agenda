<?php

class Contato {
    public ?int $id;
    public string $nome;
    public string $email;
    public string $telefone;

    public function __construct(?int $id = null, string $nome = '', string $email = '', string $telefone = '') {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }
}