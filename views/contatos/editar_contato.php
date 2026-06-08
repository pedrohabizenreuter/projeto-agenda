<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido.");
}

$contato = ContatoModel::find($pdo, $id);

if (!$contato) {
    die("Contato não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    ContatoModel::update($pdo, $id, [
        'nome'     => $nome,
        'email'    => $email,
        'telefone' => $telefone
    ]);

    header("Location: index.php?pagina=contatos");
    exit;
}
?>
<a href="index.php?pagina=contatos" class="btn-voltar">Voltar</a>
<div class="form-container">
    <h2>Editar contato</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>">
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>">
        </div>
        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>">
        </div>
        <button class="btn-cadastrar" type="submit">Salvar</button>
    </form>
</div>