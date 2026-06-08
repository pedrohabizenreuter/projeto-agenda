<h2>Contatos</h2>

<a href="?pagina=form" class="btn-novo">
     Novo Contato
</a>

<br><br>

<table>

<tr>
    <th>#</th>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Telefone</th>
    <th>Editar</th>
    <th>Excluir</th>
</tr>

<?php foreach ($contatos as $contato): ?>

<tr>

    <td>
        <?= $contato['id'] ?>
    </td>

    <td>
        <?= $contato['nome'] ?>
    </td>

    <td>
        <?= $contato['email'] ?>
    </td>

    <td>
        <?= $contato['telefone'] ?>
    </td>

    <td>
        <a
            class="btn-editar"
            href="editar_contato.php?id=<?= $contato['id'] ?>"
        >
            Editar
        </a>
    </td>

    <td>
        <a
            class="btn-excluir"
            href="excluir_contato.php?id=<?= $contato['id'] ?>"
        >
            Excluir
        </a>
    </td>

</tr>

<?php endforeach; ?>

</table>