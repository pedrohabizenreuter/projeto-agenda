<a href="index.php?pagina=cadastro_cliente" class="btn-novo">
    Novo Cliente
</a>

<br><br>

<?php if (empty($clientes)): ?>

    <p>Nenhum cliente encontrado.</p>

<?php else: ?>

<table>

<thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>CPF</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
</thead>

    <tbody>

    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente->id) ?></td>
            <td><?= htmlspecialchars($cliente->nome) ?></td>
            <td><?= htmlspecialchars($cliente->email) ?></td>
            <td><?= htmlspecialchars($cliente->cpf) ?></td>
            <td>
                <a class="btn-editar" href="index.php?pagina=editar_cliente&id=<?= $cliente->id ?>">Editar</a>
            </td>
            <td>
                <a class="btn-excluir" href="index.php?pagina=excluir_cliente&id=<?= $cliente->id ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>

<?php endif; ?>