<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/marmita.css?v.2">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Marmitaria Fit</title>
</head>

<body class="bg-light">
    <div class="d-flex flex-column flex-md-row vh-100">
        <!-- Sidebar -->
        <div class="sidebar text-white d-flex flex-column align-items-center py-4 px-3" style="width: 60px;">
            <a href="./../homepage/home_page.php" class="mb-4">
                <img src="../../assets/icons/menu.svg" alt="Menu" width="32">
            </a>
            <a href="../comanda/comanda.php" class="mb-3">
                <img src="../../assets/icons/comanda.svg" alt="Comanda" width="28">
            </a>
            <a href="../estoque/estoque.php" class="mb-3">
                <img src="../../assets/icons/estoque.svg" alt="Estoque" width="28">
            </a>
            <a href="../novoUsuario/cadastro.php" class="mb-3">
                <img src="../../assets/icons/usuario.png" alt="Cadastro" width="28">
            </a>
        </div>

        <!-- Parte Central -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="topo navbar shadow-sm py-3">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="./../homepage/home_page.php">
                            <img src="../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45">
                        </a>
                        <span class="ms-2 fs-6 fst-italic">Marmitaria Fit</span>
                    </div>
                    <form method="post">
                        <button class="btn btn-danger btn-sm" type="submit" name="sair">Sair</button>
                    </form>
                </div>
            </nav>

            <!-- Formulário de Cadastro -->
            <form id="formCadastro" class="container py-5" style="margin: auto  auto;">
                <div class="boxCadastro card shadow-sm" style="padding: 20px; border-radius: 10px; background-color:#A4BB94; border: 3px solid #B1CFA1;">
                    <h1 class="titulo text-center" style="color: #274311;">CADASTRO DE MARMITA</h1>

                    <div class="mb-3">
                        <label for="nomeMarmita" class="form-label">Nome da Marmita</label>
                        <input type="text" id="nomeMarmita" name="nomeMarmita" class="form-control" placeholder="Ex.: Marmita Fit de Frango" required>
                    </div>

                    <div class="mb-3">
                        <label for="precoMarmita" class="form-label">Preço da Marmita (R$)</label>
                        <input type="number" id="precoMarmita" name="precoMarmita" class="form-control" placeholder="Ex.: 25.00" min="0" step="0.01" required>
                    </div>

                    <!-- Ingrediente 1 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente1" name="ingrediente1" class="form-select me-2" style="max-width: 250px;" required>
                            <option value="">Escolha o ingrediente 1</option>
                        </select>
                        <input type="number" name="quantidade1" id="quantidade1" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required>
                        <select id="unidade1" name="unidade1" class="form-select ms-2" style="max-width: 80px;" required disabled>
                            <option value="gramas">g</option>
                            <option value="quilos">kg</option>
                        </select>
                    </div>

                    <!-- Ingrediente 2 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente2" name="ingrediente2" class="form-select me-2" style="max-width: 250px;" required>
                            <option value="">Escolha o ingrediente 2</option>
                        </select>
                        <input type="number" name="quantidade2" id="quantidade2" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required>
                        <select id="unidade2" name="unidade2" class="form-select ms-2" style="max-width: 80px;" required disabled>
                            <option value="gramas">g</option>
                            <option value="quilos">kg</option>
                        </select>
                    </div>

                    <!-- Ingrediente 3 -->
                    <div class="d-flex align-items-center mb-2">
                        <select id="ingrediente3" name="ingrediente3" class="form-select me-2" style="max-width: 250px;" required>
                            <option value="">Escolha o ingrediente 3</option>
                        </select>
                        <input type="number" name="quantidade3" id="quantidade3" class="form-control" placeholder="Quantidade" min="1" style="max-width: 120px;" required>
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
