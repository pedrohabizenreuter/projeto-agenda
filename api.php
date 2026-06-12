<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");

$pdo = require 'config/database.php'; 

require_once 'models/Produto.php';
require_once 'daos/ProdutoDAO.php';

$metodo = $_SERVER['REQUEST_METHOD'];

$produtoDAO = new ProdutoDAO($pdo);

switch ($metodo) {
    case 'GET':
        $produtos = $produtoDAO->findAll();
        
        echo json_encode([
            "status" => "sucesso",
            "quantidade" => count($produtos),
            "dados" => $produtos
        ]);
        break;

    case 'POST':
        $dadosRecebidos = json_decode(file_get_contents("php://input"), true);

        if (!empty($dadosRecebidos['nome']) && !empty($dadosRecebidos['preco'])) {
            
            $novoProduto = new Produto(
                null, 
                $dadosRecebidos['nome'], 
                $dadosRecebidos['descricao'] ?? '', 
                $dadosRecebidos['preco'], 
                (int)($dadosRecebidos['estoque'] ?? 0)
            );

            if ($produtoDAO->create($novoProduto)) {
                http_response_code(201);
                echo json_encode(["status" => "sucesso", "mensagem" => "Produto criado com sucesso!"]);
            } else {
                http_response_code(500);
                echo json_encode(["status" => "erro", "mensagem" => "Erro ao salvar no banco."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["status" => "erro", "mensagem" => "Nome e Preço são obrigatórios."]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["status" => "erro", "mensagem" => "Método não suportado. Use GET ou POST."]);
        break;
}