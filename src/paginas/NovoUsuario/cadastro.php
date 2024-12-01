<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cadastro.css?v1.2">
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
                        <a href="../marmitas/marmita.php" class="mb-3">
                <img src="../../assets/icons/icons8-cadastro-100.png" alt="Cadastro" width="28">
            </a>
        </div>

        <!-- Parte central -->

        <div class="flex-grow-1 " >

            <!-- navbar -->
            <nav class="topo navbar  shadow-sm py-3">
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

            <!-- Parte do form  -->
            <div class="container py-5" style="margin: 6% auto;">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body" style="background-color:#A4BB94; border: 3px solid #B1CFA1 ; padding: 20px; border-radius: 10px;">
                                <h2 class="text-center text-uppercase mb-" style="color: #274311;">Cadastro de Usuário</h2>
                                <form id="formCadastro">
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control inputes" id="nome" name="nome" placeholder="Digite o nome completo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control inputes" id="email" name="email" placeholder="Digite o email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control inputes" id="senha" name="senha" placeholder="Digite a senha" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefone" class="form-label ">Telefone</label>
                                        <input type="tel" class="form-control inputes" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nivelAcesso" class="form-label ">Nível de Acesso</label>
                                        <select class="form-select inputes inputes" id="nivelAcesso" name="nivelAcesso" required >
                                            <option value="1">Administrador</option>
                                            <option value="2">Funcionário</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn  w-100 botaoCadastro" id="botaoCadastrar" style="background-color:#5A952D ; color: white; margin-top: 5%;"  onclick="cadastrarUsuario()">Cadastrar Usuário</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script/cadastro.js"></script>
</body>
</html>
