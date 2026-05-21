<?php
require_once "config.php";


$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome || !$email) {

        $erro = "Nome e e-mail são obrigatórios.";

    } else {

        $stmt = $pdo->prepare(
            'INSERT INTO contatos (nome, email, telefone)
             VALUES (?, ?, ?)'
        );

        $stmt->execute([$nome, $email, $telefone]);

        header('Location: index.php');
        exit;
    }
}
include "views/cabecalho.php";
?>
<a href="index.php" class="btn-voltar">
     Voltar
</a>
<div class="form-container">

<h2>Cadastrar Contato</h2>

<?php if ($erro): ?>
    <p class="erro">
        <?= $erro ?>
    </p>
<?php endif; ?>

<form action="" method="POST">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome">
    </div>

    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email">
    </div>

    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone">
    </div>

    <button type="submit" class="btn-cadastrar">
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