<?php
$erro = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>window.location.href='index.php?pagina=contatos';</script>";
    exit;
}

$contatoDAO = new ContatoDAO($pdo);
$contato = $contatoDAO->find((int)$id);

if (!$contato) {
    echo "<script>window.location.href='index.php?pagina=contatos';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome || !$email || !$telefone) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $contato->nome = $nome;
        $contato->email = $email;
        $contato->telefone = $telefone;

        $contatoDAO->update($contato);

        echo "<script>window.location.href='index.php?pagina=contatos';</script>";
        exit;
    }
}

include 'views/contatos/form.php';
?>