<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/inventory_page.css?v1.5">
    <link rel="stylesheet" href="css/content.css?v1.1">
    <link rel="stylesheet" href="css/cadastrar_popup.css">
    <link rel="stylesheet" href="css/atualizar_item_modal.css">
    <link rel="stylesheet" href="css/excluir_modal.css">
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
                    <a>
                        <img class="menu" src="../../assets/icons/menu.svg" alt="" width="28">
                    </a>
                </li>
                <li>
                    <a href="../comanda/comanda.php">
                        <img src="../../assets/icons/comanda.svg" alt="" width="28">
                    </a>
                </li>
                <li>
                    <a href="../estoque/estoque.php">
                        <img src="../../assets/icons/estoque.svg" alt="" width="28">
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
                            <img src="../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45">
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
                        <input class="search_input" type="text" placeholder="Buscar Produto" name='pesquisa'>
                        <div>
                            <button class="search_btn">
                                <i class="fa-solid fa-magnifying-glass fa-beat" style="--fa-animation-duration: 2s; color:white;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="table_box">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                    <th>Valor Un.</th>
                                    <th>Data Validade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Feijão</td>
                                    <td>N. Perecível</td>
                                    <td>Feijão Premium</td>
                                    <td>5 KG</td>
                                    <td>3,45</td>
                                    <td>15/03/26</td>
                                </tr>
                                <tr>
                                    <td>Feijão</td>
                                    <td>N. Perecível</td>
                                    <td>Feijão Premium</td>
                                    <td>5 KG</td>
                                    <td>3,45</td>
                                    <td>15/03/26</td>
                                </tr>
                                <tr>
                                    <td>Macarrão</td>
                                    <td>Perecível</td>
                                    <td>Macarrão Italiano</td>
                                    <td>1 KG</td>
                                    <td>2,10</td>
                                    <td>30/12/24</td>
                                </tr>
                                <tr>
                                    <td>Açúcar</td>
                                    <td>N. Perecível</td>
                                    <td>Açúcar Cristal</td>
                                    <td>2 KG</td>
                                    <td>1,75</td>
                                    <td>20/08/25</td>
                                </tr>
                                <tr>
                                    <td>Óleo</td>
                                    <td>Perecível</td>
                                    <td>Óleo Vegetal</td>
                                    <td>900 ML</td>
                                    <td>6,50</td>
                                    <td>05/10/24</td>
                                </tr>
                                <tr>
                                    <td>Sal</td>
                                    <td>N. Perecível</td>
                                    <td>Sal Refinado</td>
                                    <td>1 KG</td>
                                    <td>1,20</td>
                                    <td>01/02/27</td>
                                </tr>
                                <tr>
                                    <td>Leite</td>
                                    <td>Perecível</td>
                                    <td>Leite Integral</td>
                                    <td>1 L</td>
                                    <td>4,30</td>
                                    <td>12/06/24</td>
                                </tr>

                            </tbody>
                        </table>
                        <div style="display: flex; flex-direction: row; gap: 20px; justify-content: center; align-items:center; text-align: center;">
                            <button>><button>
                                    <div>
                                        <h5>1</h5>
                                    </div>
                                    <button>></button>
                        </div>
                    </div>

                </div>

                <div class="btn_side">
                    <button class="cadastrar_item" onclick="openPopup()">Cadastrar Item</button>
                    <button class="atualizar_item" onclick="openAtualizarModal()">Atualizar Item</button>
                    <button class="excluir_item" onclick="openExcluirModal()">Excluir Item</button>
                    <button class="exportar_relatorio">Exportar Relatorio</button>
                    <button class="criar_alerta">Criar alerta de baixo nível</button>

                </div>
            </div>
        </div>
    </div>

</body>

<!-- Modais -->
<div id="cadastrar_item_modal" class="cadastrar_item_modal">
    <div class="cadastro">
        <div class="header">
            <h2>Cadastrar Ingredientes</h2>
        </div>


        <div class="content">
            <form method="POST" class="my_form">
                <div>
                    <label for="nome">Nome do Produto</label><br>
                    <input type="text" name="nome" id="nome" placeholder="Nome do Produto" required>
                </div>
                <div>
                    <label for="categoria">Categoria Produto</label><br>
                    <input type="text" name="categoria" id="categoria" placeholder="Categoria do Produto" required>
                </div>
                <div>
                    <label for="fornecedor">Fornecedor</label><br>
                    <input type="text" name="fornecedor" id="fornecedor" placeholder="Fornecedor" required>
                </div>
                <div>
                    <label for="quantidade">Quantidade</label><br>
                    <input type="select" name="quantidade" id="quantidade" placeholder="Quantidade" required>
                </div>
                <div>
                    <label for="valorUn">Valor Unitario</label><br>
                    <input type="select" name="valorUn" id="valorUn" placeholder="Valor Unitario" required>
                </div>
                <div>
                    <label for="data_validade">Data de Validade</label><br>
                    <input type="date" name="data_validade" id="data_validade" required>
                </div>
            </form>
        </div>



        <div class="footer">
            <div class="buttons">
                <button onclick="closeModal()">Fechar</button>
                <button onclick="cadastraItem()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<div class="atualizar_item_modal" id="atualizar_item_modal">
    <div class="header">Atualizar Item</div>
    <div class="content">
        <div class="select_item">
            <select name="item_selector" id="item_selector">
                <option value="">Selecione um item</option>
            </select>
        </div>
        <div class="fields">
            <div class="left_field">
                <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome_item">
            </div>
            <div>
                    <label for="categoria">Categoria</label><br>
                    <input type="text" name="categoria" id="categoria_item">
                </div>
                <div>
                    <label for="fornecedor">Forncedor</label><br>
                    <input type="text" name="fornecedor" id="fornecedor_item">
                </div>
            </div>
            <div class="right_field">
            <div>
                <label for="quantidade">Quantidade</label><br>
                <input type="text" name="quantidade" id="quantidade_item">
            </div>
            <div>
                    <label for="valorUn">ValorUn</label><br>
                    <input type="text" name="valorUn" id="valorUn_item">
                </div>
                <div>
                    <label for="data_validade">Data de Validade</label><br>
                    <input type="date" name="data_validade" id="data_validade_item">
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="fechar_atualizar">
            <button onclick="closeAtualizarModal()">Fechar</button>
        </div>
        <div>
            <button onclick="atualizarItemDatabase()">Atualizar</button>
        </div>
    </div>
</div>

<div id="excluir_item_modal" class="excluir_item_modal">
    <div class="exluir_modal">
        <div class="header"><h5>Excluir Item</h5></div>
        <div class="content">
            <div class="options">
                <label for="item_selector">Selecione um Item</label><br>
                <select name="item_selector" id="item_selector">
                    <option value="">Selecione um item</option>
                </select>
            </div>
        </div>
        <div class="footer">
            <div class="fechar">
                <button onclick="closeEcluirModal()">Fechar</button>
            </div>
            <div class="excluir">
                <button onclick="exluirItem()">Excluir</button>
            </div>
        </div>
    </div>
</div>
<script src="script/cadastrar_popup.js"></script>
<script src="script/atualiza_modal.js"></script>
<script src="script/excluir_modal.js"></script>

</html>