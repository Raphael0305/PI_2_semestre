<?php
include_once __DIR__ . '/../../controle/autentica_pagina.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/inventory_page.css?v1.5">
    <link rel="stylesheet" href="css/content.css?v1.1">
    <link rel="stylesheet" href="css/cadastrar_popup.css">
    <link rel="stylesheet" href="css/atualizar_item_modal.css">
    <link rel="stylesheet" href="css/excluir_modal.css">
    <link rel="stylesheet" href="modais/criarAlertaItemModal/css/cadastrar_item_modal_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <script src="https://kit.fontawesome.com/e874ed8d35.js" crossorigin="anonymous"></script>
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
                    <a href="../comanda/comanda.php">
                        <img src="../../assets/icons/comanda.svg" alt="" width="28">
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
                            <a href="./../homepage/home_page.php"><img src="../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45"></a>
                            <a class="navbar-brand ms-2 fs-6 fst-italic">Marmitaria Fit</a>
                        </div>
                        <div>
                            <a href="../../controle/logout.php">
                                <button style="height: 32px; font-size: 12px;" class="btn btn-danger" type="submit" name="sair">Sair</button>
                            </a>

                        </div>
                </nav>
            </div>
            <div class="page_content">

                <div class="table_side">
                    <div class="search_box">
                        <input id="buscar_item" class="search_input" type="text" placeholder="Buscar Produto" name='pesquisa'>
                        <div>
                            <button class="search_btn">
                                <i class="fa-solid fa-magnifying-glass fa-beat" style="--fa-animation-duration: 2s; color:white;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="table_box" style="overflow-y: auto;">
                        <div class="table-responsive-sm" style="height: 30px;">

                            <table class="table" id="table" style="padding-right: 0px 20px;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Fornecedor</th>
                                        <th>Quantidade</th>
                                        <th>Valor Un.</th>
                                        <th>Data Validade</th>
                                        <th>Quantidade Minima</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="btn_side">
                    <button class="cadastrar_item" onclick="openPopup()">Cadastrar Item</button>
                    <button class="atualizar_item" onclick="openAtualizarModal()">Atualizar Item</button>
                    <button class="excluir_item" onclick="openExcluirModal()">Excluir Item</button>
                    <button class="exportar_relatorio">Exportar </button>
                    <button class="criar_alerta" onclick="abrirCriarAlertaModal()">Criar alerta de baixo nível</button>

                </div>
            </div>
        </div>
    </div>
    <?php

    include_once __DIR__ . '/modais/cadastrar_item_modal.php';
    include_once __DIR__ . '/modais/atualizar_item_modal.php';
    include_once __DIR__ . '/modais/excluir_item_modal.php';
    include_once __DIR__ . '/modais/criarAlertaItemModal/criar_alerta_estoque_modal.php';

    ?>

</body>

<script src="script/busca_barra_pesquisa.js"></script>
<script src="script/load_table_items.js"></script>
<script src="modais/criarAlertaItemModal/scripts/abrir_criar_alerta_modal.js"></script>
<script src="modais/criarAlertaItemModal/scripts/criar_alerta_btn.js"></script>
<script src="script/cadastrar_popup.js"></script>
<script src="script/atualiza_modal.js"></script>
<script src="script/excluir_modal.js"></script>

</html>