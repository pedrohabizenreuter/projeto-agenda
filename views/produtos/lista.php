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
            <td><?= htmlspecialchars($produto->id) ?></td>

            <td>
                <?php 
                $caminhoLocal = "img/produtos/" . $produto->id . ".jpg";
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $caminhoLocal) || file_exists($caminhoLocal)) {
                    $urlImagem = $caminhoLocal;
                } else {
                    $urlImagem = "https://picsum.photos/id/" . (($produto->id % 50) + 10) . "/50/50"; 
                }
                ?>
                <img src="<?= $urlImagem ?>" alt="Foto de <?= htmlspecialchars($produto->nome) ?>" width="50" height="50" style="object-fit: cover; border-radius: 4px; display: block;">
            </td>

            <td><?= htmlspecialchars($produto->nome) ?></td>
            <td><?= htmlspecialchars($produto->descricao) ?></td>
            <td>R$ <?= htmlspecialchars(number_format((float)($produto->preco ?? 0), 2, ',', '.')) ?></td>
            <td><?= htmlspecialchars($produto->estoque) ?></td>

            <td>
                <a class="btn-editar" href="index.php?pagina=editar_produto&id=<?= $produto->id ?>">Editar</a>
            </td>
            <td>
                <a class="btn-excluir" href="index.php?pagina=excluir_produto&id=<?= $produto->id ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>