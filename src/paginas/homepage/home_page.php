
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home_page.css">
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
                                <button style="height: 32px; font-size: 12px;" class="btn btn-danger" type="submit" name="sair">Sair</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="page-content">

                <p style="text-align: center;">Seja Bem Vindo,<br>Fulano</p>
            </div>
        </div>
    </div>
</body>

</html>