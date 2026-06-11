<div class="form-container">
    <h2>Formulário de Contato</h2>

    <?php if (!empty($erro)): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars(is_object($contato) ? $contato->nome : ($contato['nome'] ?? '')) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars(is_object($contato) ? $contato->email : ($contato['email'] ?? '')) ?>" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars(is_object($contato) ? $contato->telefone : ($contato['telefone'] ?? '')) ?>" required>
        </div>

        <button type="submit" class="btn-cadastrar">Salvar Contato</button>
        <a href="index.php?pagina=contatos" class="btn-voltar">Cancelar</a>

    </form>
</div>