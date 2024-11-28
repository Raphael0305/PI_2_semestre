<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/marmita.css?v.2">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Marmitaria Fit</title>
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
                            <form method="post" style="display: inline;">
                            <a href="../../controle/logout.php" class="btn btn-danger" style="height: 32px; font-size: 12px;" role="button">Sair</a>

                            </form>
                        </div>
                    </div>
                </nav>
            </div>

            <form id="formCadastro">
                <div class="boxCadastro">
                    <h1 class="titulo text-center">CADASTRO DE MARMITA</h1>
            

                    <div class="mb-3">
                        <label for="nomeMarmita" class="form-label la">Nome da Marmita</label>
                        <input type="text" id="nomeMarmita" name="nomeMarmita" class="form-control" placeholder="Ex.: Marmita Fit de Frango" required>
                    </div>
            

                    <div class="mb-3">
                        <label for="precoMarmita" class="form-label la">Preço da Marmita (R$)</label>
                        <input type="number" id="precoMarmita" name="precoMarmita" class="form-control" placeholder="Ex.: 25.00" min="0" step="0.01" required>
                    </div>
            
                    <!-- Ingrediente 1 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente1" name="ingrediente1" class="form-select me-2" style="max-width: 250px;" required aria-label="Selecione o ingrediente 1">
                            <option value="">Escolha o ingrediente 1</option>
                        </select>
                        <input type="number" name="quantidade1" id="quantidade1" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required oninput="atualizarUnidade('quantidade1', 'unidade1')">
                        <select id="unidade1" name="unidade1" class="form-select ms-2" style="max-width: 80px;" required disabled>
                            <option value="gramas">g</option>
                            <option value="quilos">kg</option>
                        </select>
                    </div>

                    <!-- Ingrediente 2 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente2" name="ingrediente2" class="form-select me-2" style="max-width: 250px;" required aria-label="Selecione o ingrediente 2">
                            <option value="">Escolha o ingrediente 2</option>
                        </select>
                        <input type="number" name="quantidade2" id="quantidade2" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required oninput="atualizarUnidade('quantidade2', 'unidade2')">
                        <select id="unidade2" name="unidade2" class="form-select ms-2" style="max-width: 80px;" required disabled>
                            <option value="gramas">g</option>
                            <option value="quilos">kg</option>
                        </select>
                    </div>

                    <!-- Ingrediente 3 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente3" name="ingrediente3" class="form-select me-2" style="max-width: 250px;" required aria-label="Selecione o ingrediente 3">
                            <option value="">Escolha o ingrediente 3</option>
                        </select>
                        <input type="number" name="quantidade3" id="quantidade3" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required oninput="atualizarUnidade('quantidade3', 'unidade3')">
                        <select id="unidade3" name="unidade3" class="form-select ms-2" style="max-width: 80px;" required disabled>
                            <option value="gramas">g</option>
                            <option value="quilos">kg</option>
                        </select>
                    </div>

            
                    <!-- Botão de Enviar -->
                    <div class="text-center">
                       <button type="button" class="btn btn-success" id="botaoCadastrar">CADASTRAR MARMITA</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</body>

<script src="./script/marmita.js"></script>

</html>