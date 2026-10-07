<?php
declare(strict_types=1);
require "conexao.php";

while (true) {
    echo "\n1 - Cadastrar\n2 - Listar\n3 - Sair\n";
    $opcao = trim(readline("Escolha: "));

    if ($opcao === "1") {
        $nome = readline("Nome da ferramenta: ");
        $sql = "INSERT INTO ferramentas (nome, ativo)
                VALUES (:nome, TRUE)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nome' => $nome]);
        echo "Ferramenta cadastrada!\n";
    } elseif ($opcao === "2") {
        $stmt = $pdo->prepare(
            "SELECT * FROM ferramentas WHERE ativo = TRUE"
        );
        $stmt->execute();
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
    } elseif ($opcao === "3") {
        break;
    }
}