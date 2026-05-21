<?php
require_once "config.php";


$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido.");
}

$stmt = $pdo->prepare(
    "SELECT * FROM clientes WHERE id = ?"
);

$stmt->execute([$id]);

$cliente = $stmt->fetch();

if (!$cliente) {
    die("cliente não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        "DELETE FROM clientes WHERE id = ?"
    );

    $stmt->execute([$id]);

    header("Location: clientes.php");
    exit;
}
include "views/cabecalho.php";
?>

<div class="form-container">

<h2>Excluir cliente</h2>

<p>
    Tem certeza que deseja excluir:
</p>

<ul>
    <li>
        <strong>Nome:</strong>
        <?= htmlspecialchars($cliente['nome']) ?>
    </li>

    <li>
        <strong>E-mail:</strong>
        <?= htmlspecialchars($cliente['email']) ?>
    </li>

    <li>
        <strong>Telefone:</strong>
        <?= htmlspecialchars($cliente['telefone']) ?>
    </li>
</ul>

<form method="POST">

    <button class="btn-excluir" type="submit">
        Confirmar Exclusão
    </button>

</form>

</div>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>