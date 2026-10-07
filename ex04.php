<?php
declare(strict_types=1);
require "conexao.php";

function registrarMovimentacao(
    int $pecaId, int $quantidade, string $tipo
): bool {
    global $pdo;

    try {
        $pdo->beginTransaction();
        $sql = "SELECT quantidade FROM pecas_industriais
                WHERE id = :id FOR UPDATE";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $pecaId]);
        $saldo = $stmt->fetchColumn();

        if ($saldo === false || $quantidade <= 0) {
            $pdo->rollBack();
            return false;
        }

        $novo = $tipo === 'entrada'
            ? (int)$saldo + $quantidade
            : (int)$saldo - $quantidade;

        if (!in_array($tipo, ['entrada', 'saida'], true) || $novo < 0) {
            $pdo->rollBack();
            return false;
        }

        $stmt = $pdo->prepare(
            "UPDATE pecas_industriais SET quantidade = :q WHERE id = :id"
        );
        $stmt->execute([':q' => $novo, ':id' => $pecaId]);
        $pdo->commit();
        return true;
    } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        return false;
    }
}