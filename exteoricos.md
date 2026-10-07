## 1. Definição de CRUD
CRUD significa Create, Read, Update e Delete. No SQL correspondem a:

Create → INSERT
Read → SELECT
Update → UPDATE
Delete → DELETE

## 2. Anatomia do SQL Injection
Acontece quando o sistema coloca diretamente o conteúdo de um usuário dentro da consulta SQL. O atacante pode inserir comandos ou condições que alteram a lógica original da consulta.

## 3. Mecanismo das Prepared Statements
O prepare() separa a instrução SQL dos dados. Depois, o execute() envia os valores como parâmetros. Assim, o texto digitado pelo usuário é tratado como dado, e não como código SQL.

## 4. Marcadores Nomeados
Marcadores como :sku e :preco deixam a consulta mais organizada e facilitam a identificação de cada parâmetro, principalmente em consultas maiores.

## 5. Diferença entre Bindings
bindValue() vincula o valor imediatamente. Já bindParam() vincula uma variável por referência e utiliza o valor dela no momento da execução da consulta.

## 6. Tipagem no PDO
Se o tipo não for informado, um valor que deveria ser inteiro pode ser tratado de forma inadequada. Usar PDO::PARAM_INT garante que o valor seja enviado como inteiro, evitando erros principalmente em LIMIT e OFFSET.

## 7. Padrão DAO
O DAO separa as operações do banco de dados do restante do sistema. Isso facilita a manutenção e faz com que cada classe tenha uma responsabilidade específica, seguindo o princípio da responsabilidade única do SOLID.

## 9. Impacto da LGPD
Um vazamento de dados pode gerar advertências, multas, bloqueio ou eliminação dos dados, além de prejudicar a reputação da empresa e gerar possíveis responsabilidades por danos causados aos titulares.