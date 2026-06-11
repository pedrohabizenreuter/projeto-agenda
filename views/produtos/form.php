<div class="form-container">
    <h2>Formulário de Produto</h2>

    <?php if (!empty($erro)): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars(isset($produto) && is_object($produto) ? $produto->nome : '') ?>" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars(isset($produto) && is_object($produto) ? $produto->descricao : '') ?>">
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="text" name="preco" id="preco" value="<?= htmlspecialchars(isset($produto) && is_object($produto) ? $produto->preco : '') ?>" required>
        </div>

        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" name="estoque" id="estoque" value="<?= htmlspecialchars(isset($produto) && is_object($produto) ? $produto->estoque : '') ?>" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto do Produto (JPEG/JPG):</label>
            <input type="file" name="foto" id="foto" accept="image/jpeg, image/jpg">
            <?php if (isset($produto) && is_object($produto)): ?>
                <p style="font-size: 12px; color: #666;">Se selecionar uma nova foto, ela substituirá a atual.</p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn-cadastrar">Salvar Produto</button>
        <a href="index.php?pagina=produtos" class="btn-voltar">Cancelar</a>

    </form>
</div>