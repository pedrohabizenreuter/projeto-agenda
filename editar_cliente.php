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

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    $stmt = $pdo->prepare(
        "UPDATE clientes
         SET nome = ?, cpf = ?, email = ?, telefone = ?, endereco = ?
         WHERE id = ?"
    );
    
    $stmt->execute([
        $nome,
        $cpf, 
        $email,
        $telefone,
        $endereco, 
        $id
    ]);

    header("Location: clientes.php");
    exit;
}
include "views/cabecalho.php";
?>

<div class="form-container">

<h2>Editar cliente</h2>

<form method="POST">

    <div class="form-group">
        <label>Nome:</label>

        <input
            type="text"
            name="nome"
            value="<?= htmlspecialchars($cliente['nome']) ?>"
        >
    </div>
    <div class="form-group">
    <label>CPF:</label>

    <input
        type="text"
        name="cpf"
        value="<?= htmlspecialchars($cliente['cpf']) ?>"
    >
</div>

    <div class="form-group">
        <label>E-mail:</label>

        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($cliente['email']) ?>"
        >
    </div>

    <div class="form-group">
        <label>Telefone:</label>

        <input
            type="text"
            name="telefone"
            value="<?= htmlspecialchars($cliente['telefone']) ?>"
        >
    </div>


<div class="form-group">
    <label>Endereço:</label>

    <input
        type="text"
        name="endereco"
        value="<?= htmlspecialchars($cliente['endereco']) ?>"
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