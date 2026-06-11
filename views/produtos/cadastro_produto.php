<?php
$erro = "";
$produto = null; 

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
        $produtoDAO = new ProdutoDAO($pdo);
        $novoProduto = new Produto(null, $nome, $descricao, $preco, (int)$estoque);
        
        $produtoDAO->create($novoProduto);
        
        $novoId = $pdo->lastInsertId();

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            if (!is_dir('img/produtos')) {
                mkdir('img/produtos', 0777, true);
            }
            
            $destino = "img/produtos/" . $novoId . ".jpg";
            move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
        }

        echo "<script>window.location.href='index.php?pagina=produtos';</script>";
        exit;
    }
}

include 'views/produtos/form.php';
?>