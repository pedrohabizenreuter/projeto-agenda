<a href="index.php?pagina=produtos" class="btn-voltar">
    Voltar
</a>

<div class="form-container">

<h2>Cadastrar Produto</h2>

<?php if (!empty($erro)): ?>
    <p class="erro"><?= $erro ?></p>
<?php endif; ?>

<form
    method="POST"
    enctype="multipart/form-data"
>

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome">
    </div>

    <div class="form-group">
        <label>Descrição:</label>
        <input type="text" name="descricao">
    </div>

    <div class="form-group">
        <label>Preço:</label>
        <input
            type="number"
            name="preco"
            step="0.01"
        >
    </div>

    <div class="form-group">
        <label>Estoque:</label>
        <input
            type="number"
            name="estoque"
        >
    </div>

    <div class="form-group">
        <label>Imagem:</label>
        <input
            type="file"
            name="imagem"
        >
    </div>

    <button class="btn-cadastrar">
        Cadastrar
    </button>

</form>

</div>