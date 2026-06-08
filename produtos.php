<?php

require_once "config.php";
require_once "models/ProdutoModel.php";

$produtos = ProdutoModel::findAll($pdo);

include "views/produtos/lista.php";