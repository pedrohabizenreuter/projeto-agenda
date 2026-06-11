<?php

$pdo = require 'config/database.php';

require_once 'models/Contato.php'; 
require_once 'daos/ContatoDAO.php';
require_once 'models/Cliente.php';
require_once 'daos/ClienteDAO.php';
require_once 'models/Produto.php';
require_once 'daos/ProdutoDAO.php';

$pagina = $_GET['pagina'] ?? 'contatos';

include 'views/cabecalho.php';

switch ($pagina) {


        case 'clientes':
            $clienteDAO = new ClienteDAO($pdo); 
            $clientes = $clienteDAO->findAll(); 
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

        case 'produtos':
            $produtoDAO = new ProdutoDAO($pdo);
            $produtos = $produtoDAO->findAll(); 
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


        case 'cadastro_contato':
            include 'views/contatos/cadastro_contato.php';
            break;

        case 'editar_contato':
            include 'views/contatos/editar_contato.php';
            break;

        case 'excluir_contato':
            include 'views/contatos/excluir_contato.php';
            break;

        case 'contatos':
        default:
            $contatoDAO = new ContatoDAO($pdo); 
            $contatos = $contatoDAO->findAll(); 
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