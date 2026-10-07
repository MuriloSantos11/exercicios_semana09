<?php
declare(strict_types=1);
require "conexao.php";


function buscarVulneravel(string $termo): void {
    global $pdo;
    $sql = "SELECT * FROM pecas_industriais WHERE nome = '$termo'";
    echo "Consulta vulnerável: $sql\n";
    $dados = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    print_r($dados);
}

function buscarProtegido(string $termo): void {
    global $pdo;
    $stmt = $pdo->prepare(
        "SELECT * FROM pecas_industriais WHERE nome = :nome"
    );
    $stmt->execute([':nome' => $termo]);
    print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
}

$termo = "' OR '1'='1";
buscarVulneravel($termo);
buscarProtegido($termo);