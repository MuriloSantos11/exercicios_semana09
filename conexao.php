<?php
declare(strict_types=1);

$pdo = new PDO(
    "pgsql:host=192.168.10.99;port=5432;dbname=almoxarifado",
    "postgres",
    "Mu_2#*#$"
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);