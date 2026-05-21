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

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    $stmt = $pdo->prepare(
        "UPDATE contatos
         SET nome = ?, email = ?, telefone = ?
         WHERE id = ?"
    );

    $stmt->execute([
        $nome,
        $email,
        $telefone,
        $id
    ]);

    header("Location: index.php");
    exit;
}
include "views/cabecalho.php";
?>

<div class="form-container">

<h2>Editar Contato</h2>

<form method="POST">

    <div class="form-group">
        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="<?= htmlspecialchars($contato['nome']) ?>"
        >
    </div>

    <div class="form-group">
        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($contato['email']) ?>"
        >
    </div>

    <div class="form-group">
        <label>Telefone:</label>

        <input
            type="text"
            name="telefone"
            value="<?= htmlspecialchars($contato['telefone']) ?>"
        >
    </div>

    <button class="btn-cadastrar" type="submit">
        Salvar
    </button>

</form>

</div>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>