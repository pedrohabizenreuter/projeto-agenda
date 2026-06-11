<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $cpf   = trim($_POST['cpf'] ?? '');

    if (!$nome || !$email || !$cpf) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $clienteDAO = new ClienteDAO($pdo);
        $novoCliente = new Cliente(null, $nome, $email, $cpf);
        $clienteDAO->create($novoCliente);

        echo "<script>window.location.href='index.php?pagina=clientes';</script>";
        exit;
    }
}

include 'views/clientes/form.php';
?>