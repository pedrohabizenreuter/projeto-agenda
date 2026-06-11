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
    $nome      = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = trim($_POST['preco'] ?? '');
    $estoque   = trim($_POST['estoque'] ?? '');

    if (!$nome) {
        $erro = "O campo Nome do Produto é obrigatório.";
    } elseif (!$preco) {
        $erro = "O campo Preço é obrigatório.";
    } elseif ($estoque === '') {
        $erro = "O campo Estoque é obrigatório.";
    } else {
        ProdutoModel::update($pdo, $id, [
            'nome'      => $nome,
            'descricao' => $descricao,
            'preco'     => $preco,
            'estoque'   => $estoque
        ]);

        header("Location: index.php?pagina=produtos");
        exit;
    }
}

include 'views/produtos/form.php';
?>