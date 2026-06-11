<?php
$erro = "";
$contato = null; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (!$nome || !$email || !$telefone) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $contatoDAO = new ContatoDAO($pdo);
        $novoContato = new Contato(null, $nome, $email, $telefone);
        $contatoDAO->create($novoContato);

        echo "<script>window.location.href='index.php?pagina=contatos';</script>";
        exit;
    }
}

include 'views/contatos/form.php';
?>