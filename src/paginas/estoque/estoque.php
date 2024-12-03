<?php
include_once __DIR__ . '/../../controle/autentica_pagina.php';
$esconderBotaoCadastro = !Autenticador::verificarAcessoAdministrador();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/inventory_page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <script src="https://kit.fontawesome.com/e874ed8d35.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Estoque Fit</title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row vh-100">
        <!-- menu lateral  -->
        <div class="sidebar text-white d-flex flex-column align-items-center py-4 px-3" style="width: 60px;">
            <a href="./../homepage/home_page.php" class="mb-4">
                <img src="../../assets/icons/menu.svg" alt="Menu" width="32">
            </a>
            <a href="../gerenciarPedidos/gerenciar_pedidos.php" class="mb-3">
                <img src="../../assets/icons/comanda.svg" alt="Comanda" width="28">
            </a>
            <a href="../estoque/estoque.php" class="mb-3">
                <img src="../../assets/icons/estoque.svg" alt="Estoque" width="28">
            </a>
            <a href="../marmitas/marmita.php" class="mb-3">
                <img src="../../assets/icons/icons8-cadastro-100.png" alt="Cadastro" width="28">
            </a>
            <?php if (!$esconderBotaoCadastro): ?>
                <a href="../novoUsuario/cadastro.php" class="mb-3">
                    <img src="../../assets/icons/usuario.png" alt="Cadastro" width="28">
                </a>
            <?php endif; ?>
        </div>

        <!-- Parte central -->
        <div class="flex-grow-1">
            <!-- navbar -->
            <nav class="topo navbar shadow-sm py-3">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="./../homepage/home_page.php">
                            <img src="../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45">
                        </a>
                        <span class="ms-2 fs-6 fst-italic">Marmitaria Fit</span>
                    </div>
                    <div>
                        <a href="../../controle/logout.php" class="btn btn-danger btn-sm">Sair</a>
                    </div>
                </div>
            </nav>

            <!-- buttões -->
            <div class="container-fluid p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="search_box">
                        <input id="buscar_item" class="form-control" type="text" placeholder="Buscar Produto" name="pesquisa">
                    </div>
                    <div>
                        <button class="btn-cadastrar-item" onclick="openPopup()">Cadastrar Item</button>
                        <button class="btn-atualizar" onclick="openAtualizarModal()">Atualizar Item</button>
                        <button class="btn-excluir" onclick="openExcluirModal()">Excluir Item</button>
                        <button class="btn-criar-alerta" onclick="abrirCriarAlertaModal()">Criar alerta de baixo nível</button>
                    </div>
                </div>

                <!-- Tabela -->
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-hover" id="table">
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
    </div>

    <!-- Modais eu to cansado chef :/ -->
    <?php
    include_once __DIR__ . '/modais/cadastrar_item_modal.php';
    include_once __DIR__ . '/modais/atualizar_item_modal.php';
    include_once __DIR__ . '/modais/excluir_item_modal.php';
    include_once __DIR__ . '/modais/criar_alerta_estoque_modal.php';
    ?>

</body>

<script src="script/busca_barra_pesquisa.js"></script>
<script src="script/load_table_items.js"></script>
<script src="./script/criar_alerta_btn.js"></script>
<script src="./script/abrir_criar_alerta_modal.js"></script>
<script src="script/cadastrar_popup.js"></script>
<script src="script/atualiza_modal.js"></script>
<script src="script/excluir_modal.js"></script>

</html>
