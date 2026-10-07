<?php
declare(strict_types=1);

require "conexao.php";

function excluir(int $id): void
{
    global $pdo;

    $sql = "UPDATE pecas
            SET ativo = FALSE
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
function listarTodos(): array
{
    global $pdo;

    $sql = "SELECT * FROM pecas
            WHERE ativo = TRUE
            ORDER BY id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

excluir(1);

print_r(listarTodos());