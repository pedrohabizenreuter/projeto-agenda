<?php

class ProdutoModel
{
    public static function findAll(PDO $pdo)
    {
        $stmt = $pdo->query(
            "SELECT * FROM produtos ORDER BY nome"
        );

        return $stmt->fetchAll();
    }

    public static function find(PDO $pdo, int $id)
    {
        $stmt = $pdo->prepare(
            "SELECT * FROM produtos WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function create(
        PDO $pdo,
        array $dados
    ) {
        $stmt = $pdo->prepare(
            "INSERT INTO produtos
            (nome, descricao, preco, estoque, imagem)
            VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['estoque'],
            $dados['imagem']
        ]);
    }

    public static function update(
        PDO $pdo,
        int $id,
        array $dados
    ) {
        $stmt = $pdo->prepare(
            "UPDATE produtos
             SET nome = ?,
                 descricao = ?,
                 preco = ?,
                 estoque = ?,
                 imagem = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $dados['nome'],
            $dados['descricao'],
            $dados['preco'],
            $dados['estoque'],
            $dados['imagem'],
            $id
        ]);
    }

    public static function delete(
        PDO $pdo,
        int $id
    ) {
        $stmt = $pdo->prepare(
            "DELETE FROM produtos
             WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }
}