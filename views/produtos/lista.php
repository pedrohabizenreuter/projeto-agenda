<a href="index.php?pagina=cadastro_produto" class="btn-novo">
    Novo Produto
</a>

<br><br>

<?php if (empty($produtos)): ?>

    <p>Nenhum produto encontrado.</p>

<?php else: ?>

<table>

    <thead>
        <tr>
            <th>#</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($produtos as $produto): ?>

        <tr>

            <td><?= htmlspecialchars($produto['id']) ?></td>

            <td>
                <?php if (!empty($produto['imagem'])): ?>
                    <img src="uploads/<?= htmlspecialchars($produto['imagem']) ?>" width="50" height="50">
                <?php else: ?>
                    Sem Imagem
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($produto['nome']) ?></td>

            <td><?= htmlspecialchars($produto['descricao']) ?></td>

            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>

            <td><?= htmlspecialchars($produto['estoque']) ?></td>

            <td>
                <a
                    class="btn-editar"
                    href="index.php?pagina=editar_produto&id=<?= $produto['id'] ?>"
                >
                    Editar
                </a>
            </td>

            <td>
                <a
                    class="btn-excluir"
                    href="index.php?pagina=excluir_produto&id=<?= $produto['id'] ?>"
                >
                    Excluir
                </a>
            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php endif; ?>