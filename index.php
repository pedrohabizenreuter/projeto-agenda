<?php

$pdo = require 'config/database.php';

require 'models/ContatoModel.php';

$pagina = $_GET['pagina'] ?? 'contatos';

include 'views/cabecalho.php';

switch ($pagina) {

    case 'clientes':
        include 'clientes.php';
        break;

    case 'produtos':
        include 'produtos.php';
        break;

    case 'contatos':
    default:
        $contatos = ContatoModel::findAll($pdo);
        include 'views/contatos/lista.php';
        break;
}
?>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>