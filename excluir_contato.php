<?php
require_once "config.php";


$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido.");
}

$stmt = $pdo->prepare(
    "SELECT * FROM contatos WHERE id = ?"
);

$stmt->execute([$id]);

$contato = $stmt->fetch();

if (!$contato) {
    die("Contato não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare(
        "DELETE FROM contatos WHERE id = ?"
    );

    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}
include "views/cabecalho.php";
?>

<div class="form-container">

<h2>Excluir Contato</h2>

<p>
    Tem certeza que deseja excluir:
</p>

<ul>
    <li>
        <strong>Nome:</strong>
        <?= htmlspecialchars($contato['nome']) ?>
    </li>

    <li>
        <strong>E-mail:</strong>
        <?= htmlspecialchars($contato['email']) ?>
    </li>

    <li>
        <strong>Telefone:</strong>
        <?= htmlspecialchars($contato['telefone']) ?>
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