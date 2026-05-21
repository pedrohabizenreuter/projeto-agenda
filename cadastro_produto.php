<?php
require_once "config.php";

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');

    $preco = floatval($_POST['preco'] ?? 0);

    $estoque = intval($_POST['estoque'] ?? 0);

    $nomeArquivo = null;

    if ($preco <= 0) {

        $erro = "Preço inválido.";

    } elseif ($estoque < 0) {

        $erro = "Estoque inválido.";

    } else {

        if (!empty($_FILES['imagem']['name'])) {

            $extensao = pathinfo(
                $_FILES['imagem']['name'],
                PATHINFO_EXTENSION
            );

            $permitidos = [
                'jpg',
                'jpeg',
                'png',
                'webp'
            ];

            if (
                !in_array(
                    strtolower($extensao),
                    $permitidos
                )
            ) {

                $erro = "Tipo de imagem não permitido.";

            } else {

                $mime = mime_content_type(
                    $_FILES['imagem']['tmp_name']
                );

                $mimesPermitidos = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!in_array($mime, $mimesPermitidos)) {

                    $erro = "Arquivo inválido.";

                } else {

                    $nomeArquivo =
                        uniqid('prod_') .
                        '.' .
                        $extensao;

                    move_uploaded_file(
                        $_FILES['imagem']['tmp_name'],
                        'uploads/' . $nomeArquivo
                    );
                }
            }
        }

        if (!$erro) {

            $stmt = $pdo->prepare(
                "INSERT INTO produtos
                (nome, descricao, preco, estoque, imagem)
                VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $nome,
                $descricao,
                $preco,
                $estoque,
                $nomeArquivo
            ]);

            header("Location: produtos.php");
            exit;
        }
    }
}

include "views/cabecalho.php";
?>
<a href="index.php" class="btn-voltar">
     Voltar
</a>
<div class="form-container">

<h2>Cadastrar Produto</h2>

<?php if ($erro): ?>
    <p class="erro"><?= $erro ?></p>
<?php endif; ?>

<form
    method="POST"
    enctype="multipart/form-data"
>

    <div class="form-group">
        <label>Nome:</label>

        <input type="text" name="nome">
    </div>

    <div class="form-group">
        <label>Descrição:</label>

        <input type="text" name="descricao">
    </div>

    <div class="form-group">
        <label>Preço:</label>

        <input
            type="number"
            name="preco"
            step="0.01"
        >
    </div>

    <div class="form-group">
        <label>Estoque:</label>

        <input
            type="number"
            name="estoque"
        >
    </div>

    <div class="form-group">
        <label>Imagem:</label>

        <input
            type="file"
            name="imagem"
        >
    </div>

    <button class="btn-cadastrar">
        Cadastrar
    </button>

</form>

</div>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>