<?php
require_once "config.php";
include "views/cabecalho.php";
include_once "funcoes_clientes.php";

$clientes = obterClientes($pdo);

echo '
<a href="cadastro_cliente.php" class="btn-novo">
     Novo Cliente
</a>
<br><br>
';

exibirTabelaClientes($clientes);
?>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>