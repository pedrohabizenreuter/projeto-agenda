<?php
require_once 'models/Produto.php';

class ProdutoDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM produtos");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produtos = [];
        foreach ($resultados as $linha) {
            $produtos[] = new Produto(
                $linha['id'], 
                $linha['nome'], 
                $linha['descricao'] ?? '', 
                $linha['preco'], 
                (int)$linha['estoque']
            );
        }
        return $produtos;
    }

    public function find(int $id): ?Produto {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$linha) return null;

        return new Produto(
            $linha['id'], 
            $linha['nome'], 
            $linha['descricao'] ?? '', 
            $linha['preco'], 
            (int)$linha['estoque']
        );
    }

    public function create(Produto $produto): bool {
        $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque) VALUES (:nome, :descricao, :preco, :estoque)");
        return $stmt->execute([
            ':nome' => $produto->nome,
            ':descricao' => $produto->descricao,
            ':preco' => $produto->preco,
            ':estoque' => $produto->estoque
        ]);
    }

    public function update(Produto $produto): bool {
        $stmt = $this->pdo->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, estoque = :estoque WHERE id = :id");
        return $stmt->execute([
            ':nome' => $produto->nome,
            ':descricao' => $produto->descricao,
            ':preco' => $produto->preco,
            ':estoque' => $produto->estoque,
            ':id' => $produto->id
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}