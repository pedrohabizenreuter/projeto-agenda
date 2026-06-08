<?php
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome      = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco     = floatval($_POST['preco'] ?? 0);
    $estoque   = intval($_POST['estoque'] ?? 0);
    $nomeArquivo = null;

    if ($preco <= 0) {
        $erro = "Preço inválido.";
    } elseif ($estoque < 0) {
        $erro = "Estoque inválido.";
    } else {
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array(strtolower($extensao), $permitidos)) {
                $erro = "Tipo de imagem não permitido.";
            } else {
                $mime = mime_content_type($_FILES['imagem']['tmp_name']);
                $mimesPermitidos = ['image/jpeg', 'image/png', 'image/webp'];

                if (!in_array($mime, $mimesPermitidos)) {
                    $erro = "Arquivo inválido.";
                } else {
                    $nomeArquivo = uniqid('prod_') . '.' . $extensao;
                    move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/' . $nomeArquivo);
                }
            }
        }

        if (!$erro) {
            ProdutoModel::create($pdo, [
                'nome' => $nome,
                'descricao' => $descricao,
                'preco' => $preco,
                'estoque' => $estoque,
                'imagem' => $nomeArquivo
            ]);

            header("Location: index.php?pagina=produtos");
            exit;
        }
    }
}

include 'views/produtos/form.php';
?>