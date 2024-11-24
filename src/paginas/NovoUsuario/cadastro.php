<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cadastro.css">
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Marmitaria Fit</title>
</head>

<body>
    <div class="screen">
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

        <div class="right-side">
            <div class="navbar-position ">
                <nav class="navbar navbar-light">
                    <div class="container-fluid nav-content">
                        <div>
                            <a href="./../homepage/home_page.php"><img src="../../assets/img/logo.png" alt="Marmitaria Fit Logo" width="45"></a>
                            <a class="navbar-brand ms-2 fs-6 fst-italic">Marmitaria Fit</a>
                        </div>
                        <div>
                            <form method="post" style="display: inline;">
                                <button style="height: 32px; font-size: 12px;" class="btn btn-danger" type="submit" name="sair">Sair</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

                <form id="formCadastro" class="elementos">

                    <h1 class="titulo">CADASTRO DE USUÁRIO</h1>

                    <div class="inputs elemento1">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>    
            

                    <div class="inputs">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>

                    <div class="inputs">
                        <label for="senha">Senha</label>
                        <input type="text" name="senha" id="senha" required>
                    </div>

                    <div class="inputs">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone">
                    </div>

                    <div class="inputs inputs2">
                        <select name="nivelAcesso" id="nivelAcesso" >
                            <option value="1">Administrador</option>
                            <option value="2">Funcionário</option>
                        </select>
                    </div>
                    <a href="#" class="enviar" onclick="cadastrarUsuario()">ENVIAR</a>
                </form>
                <?php 
                        if (isset($_SESSION["error"])) { 
                            echo $_SESSION["error"];  
                        } 
                ?>

        </div>
    </div>
</body>
<script src="script/cadastro.js"></script>
</html>
<!-- ------------------------------    CÓDIGO PHP    ---------------------------------- -->