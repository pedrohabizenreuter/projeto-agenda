<div class="form-container">
    <h2>Formulário de Produto</h2>

    <?php if (!empty($erro)): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars($produto['descricao'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="text" name="preco" id="preco" value="<?= htmlspecialchars($produto['preco'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" name="estoque" id="estoque" value="<?= htmlspecialchars($produto['estoque'] ?? '') ?>" required>
        </div>

        <button type="submit" class="btn-cadastrar">Salvar Produto</button>
        <a href="index.php?pagina=produtos" class="btn-voltar">Cancelar</a>

    </form>
</div>