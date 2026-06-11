<a href="index.php?pagina=cadastro_contato" class="btn-novo">
    Novo Contato
</a>

<br><br>

<?php if (empty($contatos)): ?>

    <p>Nenhum contato encontrado.</p>

<?php else: ?>

<table>

    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?= htmlspecialchars($contato->id) ?></td>
            <td><?= htmlspecialchars($contato->nome) ?></td>
            <td><?= htmlspecialchars($contato->email) ?></td>
            <td><?= htmlspecialchars($contato->telefone) ?></td>
            <td>
                <a class="btn-editar" href="index.php?pagina=editar_contato&id=<?= $contato->id ?>">Editar</a>
            </td>
            <td>
                <a class="btn-excluir" href="index.php?pagina=excluir_contato&id=<?= $contato->id ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>

<?php endif; ?>