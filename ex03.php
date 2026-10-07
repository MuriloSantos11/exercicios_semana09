<?php
declare(strict_types=1);
require "conexao.php";

$pagina = max(1, (int)($_GET['p'] ?? 1));
$offset = ($pagina - 1) * 5;

$sql = "SELECT * FROM pecas_industriais
        WHERE ativo = TRUE
        ORDER BY id
        LIMIT :limite OFFSET :offset";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limite', 5, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $peca) {
    echo htmlspecialchars((string)$peca['nome']) . "\n";
}