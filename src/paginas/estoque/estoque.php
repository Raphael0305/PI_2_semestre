<?php
session_start();
require_once __DIR__ . '/../../controle/query.php';
require_once __DIR__ . '/../../controle/autenticador.php';
$consulta = new Query;
$autenticador = new Autenticador;
$autenticador->autenticarUsuario(); 

$pagina = 0;
$limite = 5;
$totalPaginas = $consulta->totalPaginas($limite);



//caso clique no sair 
if (isset($_POST['sair'])) { 
    $autenticador->deslogar();
    header("Location: ../../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/inventory_page.css?v1.5">
    <link rel="stylesheet" href="css/content.css?v1.1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
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
                            <form method="post" style="display: inline;">
                                <button style="height: 32px; font-size: 12px;" class="btn btn-danger" type="submit" name="sair">Sair</button>
                            </form>
                        </div>
                </nav>
            </div>
            <div class="page_content">
                <div class="table_side">
                    <!------------------------------------------------------- PHP  PESQUISA -------------------------->
                    <?php
                        $pagina = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT) ?: 1; // pegar dados para paginação
                        $pagina = max(1, min($pagina, $totalPaginas)); //controle para não passar o total de paginas
                        $pesquisa = isset($_GET['pesquisa']) ? addslashes($_GET['pesquisa']) : ''; // pega dados para pesquisa

                        if(empty($pesquisa)){
                            $dados = $consulta->buscarTodosIngredientes($pagina,$limite);
                        } else {
                            $dados = $consulta->buscarIngredientesPesquisa($pesquisa);
                        }  
                        var_dump($pagina);
                    ?>
                    <form method="get">
                        <div class="search_box">
                            <input class="serach_input" type="text" placeholder="Buscar Produto" name='pesquisa'>
                            <div>
                                <button class="search_btn">
                                    <i class="fa-solid fa-magnifying-glass fa-beat" style="--fa-animation-duration: 2s; color:white;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                        <!-------------------------------------------------- FIM PHP PESQUISA --------------------------->

                        <!-- ----------------------------------------------- INICIO PAGINAÇÃO --------------------------->

                   <div class="paginacao">
                       <a href="?pagina=1" class="pagina">Primeira Página</a>
           
                       <a href="?pagina=<?= $pagina - 1 ?>" class="pagina"><</a>
           
                       <div class="numero" class="pagina"><?= $pagina ?></div>
           
                       <a href="?pagina=<?= $pagina + 1 ?>" class="pagina">></a>
           
                       <a href="?pagina=<?= $totalPaginas ?>" class="pagina">Última Página</a>
                   </div>
                   <!-- FIM PAGINAÇÃO -->

                    <div class="table_box">
                        <table class="tables">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Valor Un.</th>
                                    <th>Data Validade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-------------- PHP CÓDIGOS ------- -->
                                <?php
                                foreach ($dados as $ingredi) {
                                ?>
                                    <tr>
                                        <td><?php echo $ingredi['nome']; ?></td>
                                        <td><?php echo $ingredi['quantidade']; ?></td>
                                        <td><?php echo $ingredi['preco_compra'] . '$'; ?></td>
                                        <td><?php echo $ingredi['data_validade']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- quantidade,preço -->






                <div class="btn_side">
                    <button class="cadastrar">Cadastrar ingrediente</button>
                    <button class="cadastrar">Adicionar item</button>
                    <button class="cadastrar">Retirar item do estoque</button>
                    <button class="cadastrar">Retirada de Estoque</button>
                    <button class="cadastrar">Criar alerta de baixo nível</button>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

