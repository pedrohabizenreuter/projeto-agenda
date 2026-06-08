<a href="index.php?pagina=clientes" class="btn-voltar">
    Voltar
</a>

<div class="form-container">

<h2>Cadastrar Cliente</h2>

<?php if (!empty($erro)): ?>
    <p class="erro"><?= $erro ?></p>
<?php endif; ?>

<form method="POST">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome">
    </div>

    <div class="form-group">
        <label>CPF:</label>
        <input
            type="text"
            name="cpf"
            placeholder="000.000.000-00"
        >
    </div>

    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email">
    </div>

    <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="telefone">
    </div>

    <div class="form-group">
        <label>Endereço:</label>
        <input type="text" name="endereco">
    </div>

    <button class="btn-cadastrar">
        Cadastrar
    </button>

</form>

</div>