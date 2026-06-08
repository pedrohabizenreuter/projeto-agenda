<?php

$pdo = require 'config/database.php';

require_once 'models/ContatoModel.php';
require_once 'models/clienteModel.php';
require_once 'models/produtoModel.php';

$pagina = $_GET['pagina'] ?? 'contatos';

include 'views/cabecalho.php';

switch ($pagina) {

    // --- ROTAS DE CLIENTES ---
// --- ROTAS DE CLIENTES ---
        case 'clientes':
            $clientes = ClienteModel::findAll($pdo);
            include 'views/clientes/lista.php';
            break;

        case 'cadastro_cliente':
            include 'views/clientes/cadastro_cliente.php';
            break;

        case 'editar_cliente':
            include 'views/clientes/editar_cliente.php';
            break;

        case 'excluir_cliente':
            include 'views/clientes/excluir_cliente.php';
            break;

    // --- ROTAS DE PRODUTOS ---
// --- ROTAS DE PRODUTOS ---
        case 'produtos':
            $produtos = ProdutoModel::findAll($pdo);
            include 'views/produtos/lista.php';
            break;

        case 'cadastro_produto':
            include 'views/produtos/cadastro_produto.php';
            break;

        case 'editar_produto':
            include 'views/produtos/editar_produto.php';
            break;

        case 'excluir_produto':
            include 'views/produtos/excluir_produto.php';
            break;

    // --- ROTAS DE CONTATOS ---
    case 'cadastro_contato':
        include 'views/contatos/cadastro_contato.php';
        break;

    case 'editar_contato':
        include 'views/contatos/editar_contato.php'; // Arquivo na raiz do seu projeto
        break;

    case 'excluir_contato':
        include 'views/contatos/excluir_contato.php'; // Arquivo na raiz do seu projeto
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