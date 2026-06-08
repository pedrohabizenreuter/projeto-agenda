<?php

class ClienteModel
{
    public static function findAll(PDO $pdo)
    {
        $stmt = $pdo->query(
            "SELECT * FROM clientes ORDER BY nome"
        );

        return $stmt->fetchAll();
    }

    public static function find(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare(
            "SELECT * FROM clientes WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ) {
        $stmt = $pdo->prepare(
            "INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $dados['nome'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['endereco']
        ]);
    }

    public static function update(
        PDO $pdo,
        int $id,
        array $dados
    ) {
        $stmt = $pdo->prepare(
            "UPDATE clientes
             SET nome = ?,
                 cpf = ?,
                 email = ?,
                 telefone = ?,
                 endereco = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $dados['nome'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['endereco'],
            $id
        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ) {
        $stmt = $pdo->prepare(
            "DELETE FROM clientes
             WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }
}