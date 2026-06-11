<?php
$id = $_GET['id'] ?? null;

if ($id) {
    $contatoDAO = new ContatoDAO($pdo);
    $contatoDAO->delete((int)$id);
}

echo "<script>window.location.href='index.php?pagina=contatos';</script>";
exit;
?>