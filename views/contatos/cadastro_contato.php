<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome) {
        $erro = "O campo Nome é obrigatório.";
    } elseif (!$email) {
        $erro = "O campo E-mail é obrigatório.";
    } else {
        ContatoModel::create($pdo, [
            'nome'     => $nome,
            'email'    => $email,
            'telefone' => $telefone
        ]);

        header("Location: index.php?pagina=contatos");
        exit;
    }
}

include 'views/contatos/form.php';
?>