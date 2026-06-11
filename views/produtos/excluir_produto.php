<?php
if (ob_get_level()) ob_clean();

$id = $_GET['id'] ?? null;

if ($id) {
    $produtoDAO = new ProdutoDAO($pdo);
    
    $foto = "img/produtos/" . (int)$id . ".jpg";
    if (file_exists($foto)) {
        unlink($foto);
    }
    
    $produtoDAO->delete((int)$id);
}

echo "<script>window.location.href='index.php?pagina=produtos';</script>";
exit;
?>