<?php

$pdo = require 'config/database.php';

require 'models/ContatoModel.php';

$pagina = $_GET['pagina'] ?? 'lista';

if (
    $pagina === 'form'
    &&
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {

    ContatoModel::create($pdo, [

        'nome' => $_POST['nome'],

        'email' => $_POST['email'],

        'telefone' => $_POST['telefone']

    ]);

    header('Location: index.php');

    exit;
}

include 'views/cabecalho.php';

switch ($pagina) {

    case 'form':

        include
            'views/contatos/form.php';

        break;

    default:

        $contatos =
            ContatoModel::findAll($pdo);

        include
            'views/contatos/lista.php';
}
?>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>