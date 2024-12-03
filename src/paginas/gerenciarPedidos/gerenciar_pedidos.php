<?php
include_once __DIR__ . '/../../controle/autentica_pagina.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/gerenciar_pedidos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <script src="https://kit.fontawesome.com/e874ed8d35.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Estoque Fit</title>
</head>

<body>
    <div class="screen">
        <!-- Barra lateral com botões -->
        <div class="left-side">
            <ol class="menu_list">
                <li>
                    <a href="./../homepage/home_page.php">
                        <img class="menu" src="../../assets/icons/menu.svg" alt="" width="28">
                    </a>
                </li>
                <li>
                    <a href="../estoque/estoque.php">
                        <img src="../../assets/icons/estoque.svg" alt="" width="28">
                    </a>
                </li>
                <li>
                    <a href="../NovoUsuario/cadastro.php">
                        <img src="../../assets/icons/usuario.png" alt="" width="28">
                    </a>
                </li>
                <li>
                    <a href="../marmitas/marmita.php">
                        <img src="../../assets/icons/icons8-cadastro-100.png" alt="" width="28">
                    </a>
                </li>
            </ol>
        </div>

        <!-- Conteúdo da navbar e área útil -->
        <div class="right-side">
            <div class="navbar-position ">
                <nav class="navbar navbar-light">
                    <div class="container-fluid nav-content">
                        <div>
                            <img src="./../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45">
                            <a class="navbar-brand ms-2 fs-6 fst-italic">Marmitaria Fit</a>
                        </div>
                        <div style="display: flex; flex-direction: row; align-items: center; gap: 10px">
                            <div>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadastrar_pedido_modal" onclick="carregarSelectorModalCadastrarPedido()">
                                    Novo Pedido
                                </button>

                            </div>
                            <div>
                                <a href="../../controle/logout.php">
                                    <button style="height: 32px; font-size: 12px;" class="btn btn-danger" type="submit" name="sair">Sair</button>
                                </a>

                            </div>
                        </div>
                </nav>
            </div>
            <div class="page_content">
                <div>
                    <?php
                    include_once __DIR__ . '/componentes/lista_de_pedidos.php';
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once __DIR__ . "/componentes/cadastrar_pedido_modal.php"; ?>


<script src="scripts/cadastrar_pedidos.js"></script>
<script src="scripts/carregar_pedidos.js"></script>
<script src="scripts/concluir_pedido.js"></script>
<script src="scripts/excluir_pedidos.js"></script>

</html>