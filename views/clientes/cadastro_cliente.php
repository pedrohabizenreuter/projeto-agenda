<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');

    if (!$nome) {
        $erro = "O campo Nome é obrigatório.";
    } elseif (!$email) {
        $erro = "O campo E-mail é obrigatório.";
    } elseif (strlen($cpf) != 14) {
        $erro = "CPF inválido. Utilize o formato 000.000.000-00.";
    } else {
        
        ClienteModel::create($pdo, [
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'telefone' => $telefone,
            'endereco' => $endereco
        ]);

        header("Location: index.php?pagina=clientes");
        exit;
    }
}


include 'views/clientes/form.php';
?>