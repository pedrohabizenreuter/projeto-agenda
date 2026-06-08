<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ContatoModel::delete($pdo, $id);
    header("Location: index.php?pagina=contatos");
    exit;
}

$contato = ContatoModel::find($pdo, $id);
if (!$contato) {
    die("Contato não encontrado.");
}
?>
<div class="form-container">
    <h2>Excluir contato</h2>
    <p>Tem certeza que deseja excluir:</p>
    <ul>
        <li><strong>Nome:</strong> <?= htmlspecialchars($contato['nome']) ?></li>
        <li><strong>E-mail:</strong> <?= htmlspecialchars($contato['email']) ?></li>
    </ul>
    <form method="POST">
        <button class="btn-excluir" type="submit">Confirmar Exclusão</button>
    </form>
</div>