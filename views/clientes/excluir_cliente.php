<?php
$id = $_GET['id'] ?? null;

if ($id) {
    $clienteDAO = new ClienteDAO($pdo);
    $clienteDAO->delete((int)$id);
}

echo "<script>window.location.href='index.php?pagina=clientes';</script>";
exit;
?>