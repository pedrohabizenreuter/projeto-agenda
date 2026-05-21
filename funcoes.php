<?php
// funcoes.php

function obterContatos(
    PDO $pdo,
    string $busca = '',
    int $pagina = 1,
    int $porPagina = 10
): array {

    $offset = ($pagina - 1) * $porPagina;

    $termo = '%' . $busca . '%';

    $stmt = $pdo->prepare(
        "SELECT * FROM contatos
         WHERE nome LIKE ?
         OR email LIKE ?
         ORDER BY nome
         LIMIT ? OFFSET ?"
    );

    $stmt->bindValue(1, $termo, PDO::PARAM_STR);
    $stmt->bindValue(2, $termo, PDO::PARAM_STR);
    $stmt->bindValue(3, $porPagina, PDO::PARAM_INT);
    $stmt->bindValue(4, $offset, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll();
}

function contarContatos(
    PDO $pdo,
    string $busca = ''
): int {

    $termo = '%' . $busca . '%';

    $stmt = $pdo->prepare(
        "SELECT COUNT(*) as total
         FROM contatos
         WHERE nome LIKE ?
         OR email LIKE ?"
    );

    $stmt->execute([$termo, $termo]);

    $resultado = $stmt->fetch();

    return $resultado['total'];
}

/**
 * Renderiza tabela HTML
 */
function exibirTabelaContatos(array $contatos): void {

    if (empty($contatos)) {
        echo "<p>Nenhum contato encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
              </tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";
    
    foreach ($contatos as $contato) {
    
        $id    = htmlspecialchars($contato['id']);
        $nome  = htmlspecialchars($contato['nome']);
        $email = htmlspecialchars($contato['email']);
        $fone  = htmlspecialchars($contato['telefone']);
    
        echo "    <tr>\n";
        echo "      <td>{$id}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$email}</td>\n";
        echo "      <td>{$fone}</td>\n";
    
        echo "      <td>
                        <a class='btn-editar'
                           href='editar_contato.php?id={$id}'>
                           Editar
                        </a>
                    </td>\n";
    
        echo "      <td>
                        <a class='btn-excluir'
                           href='excluir_contato.php?id={$id}'>
                           Excluir
                        </a>
                    </td>\n";
    
        echo "    </tr>\n";
    }
    
    echo "  </tbody>\n";
    echo "</table>\n";
}
