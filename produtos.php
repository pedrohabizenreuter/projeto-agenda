<?php
require_once "config.php";
include "views/cabecalho.php";
include_once "funcoes_produtos.php";

$produtos = obterProdutos($pdo);

echo '
<a href="cadastro_produto.php" class="btn-novo">
     Novo Produto
</a>
<br><br>
';

exibirTabelaProdutos($produtos);
?>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>