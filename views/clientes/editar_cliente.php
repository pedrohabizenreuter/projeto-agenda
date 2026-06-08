<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID inválido.");
}

$cliente = ClienteModel::find($pdo, $id);

if (!$cliente) {
    die("Cliente não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    ClienteModel::update($pdo, $id, [
        'nome'     => $nome,
        'cpf'      => $cpf,
        'email'    => $email,
        'telefone' => $telefone,
        'endereco' => $endereco
    ]);

    header("Location: index.php?pagina=clientes");
    exit;
}
?>
<a href="index.php?pagina=clientes" class="btn-voltar">Voltar</a>
<div class="form-container">
    <h2>Editar cliente</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>">
        </div>
        <div class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>">
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>">
        </div>
        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>">
        </div>
        <div class="form-group">
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>">
        </div>
        <button class="btn-cadastrar" type="submit">Salvar</button>
    </form>
</div>