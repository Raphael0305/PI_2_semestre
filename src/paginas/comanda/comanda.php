<?php
require_once __DIR__ . '/../../controle/query.php';
$consulta = new Query;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comanda</title>
</head>
<body>
    <h1>Comanda</h1>

    <?php
    // Tenta buscar a estrutura da tabela
    $dados = $consulta->buscarEstruturaTabela();

    // Verifica se a consulta foi bem-sucedida
    if ($dados === false) {
        echo "Erro ao buscar a estrutura da tabela.";
    } else {
        // Exibe os dados retornados pela consulta
        var_dump($dados);
    }
    ?>
</body>
</html>
