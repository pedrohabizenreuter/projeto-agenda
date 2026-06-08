<?php
$id = $_GET['id'] ?? null;

if ($id) {
    ProdutoModel::delete($pdo, $id);
}

header("Location: index.php?pagina=produtos");
exit;
?>