<?php
$erro = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>window.location.href='index.php?pagina=produtos';</script>";
    exit;
}

$produtoDAO = new ProdutoDAO($pdo);
$produto = $produtoDAO->find((int)$id);

if (!$produto) {
    echo "<script>window.location.href='index.php?pagina=produtos';</script>";
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
        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->preco = $preco;
        $produto->estoque = (int)$estoque;

        $produtoDAO->update($produto);

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            if (!is_dir('img/produtos')) {
                mkdir('img/produtos', 0777, true);
            }
            $destino = "img/produtos/" . $produto->id . ".jpg";
            move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
        }

        echo "<script>window.location.href='index.php?pagina=produtos';</script>";
        exit;
    }
}

include 'views/produtos/form.php';
?>