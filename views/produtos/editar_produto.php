<?php
$erro = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php?pagina=produtos");
    exit;
}

$produto = ProdutoModel::find($pdo, $id);

if (!$produto) {
    header("Location: index.php?pagina=produtos");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $preco = trim($_POST['preco'] ?? '');

    if (!$nome) {
        $erro = "O campo Nome do Produto é obrigatório.";
    } elseif (!$preco) {
        $erro = "O campo Preço é obrigatório.";
    } else {
        ProdutoModel::update($pdo, $id, [
            'nome'  => $nome,
            'preco' => $preco
        ]);

        header("Location: index.php?pagina=produtos");
        exit;
    }
}

include 'views/produtos/form.php';
?>