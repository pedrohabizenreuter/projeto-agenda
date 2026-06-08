<?php

require_once "config.php";
require_once "models/ClienteModel.php";

$clientes = ClienteModel::findAll($pdo);

include "views/clientes/lista.php";
echo '
<a href="cadastro_cliente.php" class="btn-novo">
     Novo Cliente
</a>
<br><br>
';


?>

</div>

<footer>
    <p>Rodapé</p>
</footer>

</body>
</html>