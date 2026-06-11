<?php
$erro = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>window.location.href='index.php?pagina=clientes';</script>";
    exit;
}

$clienteDAO = new ClienteDAO($pdo);
$cliente = $clienteDAO->find((int)$id);

if (!$cliente) {
    echo "<script>window.location.href='index.php?pagina=clientes';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf   = trim($_POST['cpf'] ?? '');

    if (!$nome || !$email || !$cpf) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $cliente->nome = $nome;
        $cliente->email = $email;
        $cliente->cpf = $cpf;

        $clienteDAO->update($cliente);

        echo "<script>window.location.href='index.php?pagina=clientes';</script>";
        exit;
    }
}

include 'views/clientes/form.php';
?>