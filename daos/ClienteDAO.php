<?php
require_once 'models/Cliente.php';

class ClienteDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM clientes");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];
        foreach ($resultados as $linha) {
            $clientes[] = new Cliente($linha['id'], $linha['nome'], $linha['email'], $linha['cpf']);
        }
        return $clientes;
    }

    public function find(int $id): ?Cliente {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$linha) return null;

        return new Cliente($linha['id'], $linha['nome'], $linha['email'], $linha['cpf']);
    }

    public function create(Cliente $cliente): bool {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, email, cpf) VALUES (:nome, :email, :cpf)");
        return $stmt->execute([
            ':nome' => $cliente->nome,
            ':email' => $cliente->email,
            ':cpf' => $cliente->cpf
        ]);
    }

    public function update(Cliente $cliente): bool {
        $stmt = $this->pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, cpf = :cpf WHERE id = :id");
        return $stmt->execute([
            ':nome' => $cliente->nome,
            ':email' => $cliente->email,
            ':cpf' => $cliente->cpf,
            ':id' => $cliente->id
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}