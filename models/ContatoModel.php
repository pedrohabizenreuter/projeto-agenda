<?php

class ContatoModel {

    public static function findAll(
        PDO $pdo
    ): array {

        $stmt = $pdo->query(
            "SELECT * FROM contatos
             ORDER BY nome"
        );

        return $stmt->fetchAll();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ): void {

        $stmt = $pdo->prepare(
            "INSERT INTO contatos
            (nome, email, telefone)
            VALUES (?, ?, ?)"
        );

        $stmt->execute([
            $dados['nome'],
            $dados['email'],
            $dados['telefone']
        ]);
    }
}