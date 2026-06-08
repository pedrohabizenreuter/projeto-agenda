<?php
require_once "config.php";


$erro = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $cpf = trim($_POST['cpf'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (!$nome) {
        $erro = "O campo Nome é obrigatório.";
    } elseif (!$email) {
        $erro = "O campo E-mail é obrigatório.";
    } elseif (strlen($cpf) != 14) {
        $erro = "CPF inválido. Utilize o formato 000.000.000-00.";
    } else {
   
    

        $stmt = $pdo->prepare(
            "INSERT INTO clientes
            (nome, cpf, email, telefone, endereco)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $nome,
            $cpf,
            $email,
            $telefone,
            $endereco
        ]);

        header("Location: clientes.php");
        exit;
    }
}
include "views/cabecalho.php";
?>
<a href="index.php" class="btn-voltar">
     Voltar
</a>
<div class="form-container">

<h2>Cadastrar Cliente</h2>

<?php if ($erro): ?>
    <p class="erro"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome">
    </div>

    <div class="form-group">
        <label>CPF:</label>
        <input
            type="text"
            name="cpf"
            placeholder="000.000.000-00"
        >
    </div>

    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email">
    </div>

    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone">
    </div>

    <div class="form-group">
        <label>Endereço:</label>
        <input type="text" name="endereco">
    </div>

    <button class="btn-cadastrar">
        Cadastrar
    </button>

</form>

</div>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>