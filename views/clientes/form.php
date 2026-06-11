<div class="form-container">
    <h2>Formulário de Cliente</h2>

    <?php if (!empty($erro)): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars(is_object($cliente) ? $cliente->nome : ($cliente['nome'] ?? '')) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars(is_object($cliente) ? $cliente->email : ($cliente['email'] ?? '')) ?>" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="<?= htmlspecialchars(is_object($cliente) ? $cliente->cpf : ($cliente['cpf'] ?? '')) ?>" required>
        </div>

        <button type="submit" class="btn-cadastrar">Salvar Cliente</button>
        <a href="index.php?pagina=clientes" class="btn-voltar">Cancelar</a>
    </form>
</div>