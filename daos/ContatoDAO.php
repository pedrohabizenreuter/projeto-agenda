<?php
require_once 'models/Contato.php';

class ContatoDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM contatos");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $contatos = [];
        foreach ($resultados as $linha) {
            $contatos[] = new Contato($linha['id'], $linha['nome'], $linha['email'], $linha['telefone']);
        }
        return $contatos;
    }

    public function find(int $id): ?Contato {
        $stmt = $this->pdo->prepare("SELECT * FROM contatos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$linha) return null;

        return new Contato($linha['id'], $linha['nome'], $linha['email'], $linha['telefone']);
    }

    public function create(Contato $contato): bool {
        $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        return $stmt->execute([
            ':nome' => $contato->nome,
            ':email' => $contato->email,
            ':telefone' => $contato->telefone
        ]);
    }

    public function update(Contato $contato): bool {
        $stmt = $this->pdo->prepare("UPDATE contatos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
        return $stmt->execute([
            ':nome' => $contato->nome,
            ':email' => $contato->email,
            ':telefone' => $contato->telefone,
            ':id' => $contato->id
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}