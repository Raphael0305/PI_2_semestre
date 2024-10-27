<?php
require_once '/xampp/htdocs/MarmitariaProj/classes/classe-login.php';
$login = new Login('marmitaria', 'localhost', 'root', '');
$login->verifLogin();

require_once 'classes\classe-pedido.php';
$pedido = new Pedido($login->getConexaLogin());



// LIDANDO COM GETS DE TROCA DE PAGINA 
$pagina = 0;
$limite = 7;
$pagina = filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT) ?: 1;
$totalPaginas = $pedido->totalPaginas($limite);
$pagina = max(1, min($pagina, $totalPaginas));

// LIDANDO COM O GET DE EXCLUIR PEDIDO 
if (isset($_GET['id'])) {
    $id_Excluir = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
    if ($id_Excluir) {
        $pedido->excluirPessoa($id_Excluir);
    }
}

// LIDANDO COM O GET DE LOGOUT
if (isset($_GET['sair'])) {
    $login->logout();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\pedido.css??v=1.2">
    <title>Pedidos</title>
</head>

<body>
    
    <!-- INICIO -->

    <div class="estrutura">
        <div class="esquerda">
            <!-- <img src="../img/Marmitaria.png" alt=""> -->
            <form action="" method="post">
                <h2>PONTO DE PEDIDO</h2>
                <label for="opcoes">Escolha o prato</label>

                <select id="opcoes" name="nomeMarmita" required>
                    <option value="marmita 1">Marmita 1</option>
                    <option value="marmita2">Marmita 2</option>
                    <option value="marmita3">Marmita 3</option>
                    <option value="marmita4">Marmita 4</option>
                    <option value="marmita5">Marmita 4</option>
                </select>

                <label for="">Nome do Clinete</label>
                <input type="text" placeholder="Nome" name="NomeCliente" required>

                <label for="quantidade">Quantidade comprada:</label>
                <input type="number" name="quantidade" required>

                <label for="DataEntrega">Data Entrega</label>
                <input type="datetime-local" name="dataEntrega" id="">

                <button type="submit">ENVIAR</button>
                <!-- INICIO PHP -->
                <?php
                
                if (isset($_POST['nomeMarmita'])) {   
                    $marmita = addslashes($_POST['nomeMarmita']);
                    $nomeCliente = addslashes($_POST['NomeCliente']);
                    $qtde = addslashes($_POST['quantidade']);
                    $dataEntrega = addslashes($_POST['dataEntrega']);
                    if (!$pedido->cadastrarPedido($marmita, $nomeCliente, $qtde, $dataEntrega)) {
                        echo "Erro ao enviar os dados.";
                    }
                }

                ?>
                <!-- FIM PHP  -->
            </form>
            <div class="voltar">
                <a href="?sair=true">VOLTAR</a> <!-- Botão de Logout -->
            </div>
        </div>

        <div class="direita">
        <!-- PHP NAVEGAÇÃO -->
        <div class="paginacao">
            <a href="?pagina=1">Primeira Página</a>

            <a href="?pagina=<?= $pagina - 1 ?>"><</a>

            <div class="numero"><?= $pagina ?></div>

            <a href="?pagina=<?= $pagina + 1 ?>">></a>

            <a href="?pagina=<?= $totalPaginas ?>">Última Página</a>

        </div>
        <!-- FIM PHP NAVEGAÇÃO -->
            <table>
                <thead>
                    <tr id="titulo">
                        <td>Marmita</td>
                        <td>Nome Cliente</td>
                        <td>Quantidade</td>
                        <td>Data Entrega</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- INICIO PHP JOGAR DADOS NA TELA-->
                    <?php   

                    $dados = $pedido->buscarDados($pagina,$limite);
                    if (count($dados) > 0) {
                        foreach ($dados as $pedido) {
                    ?>
                         <tr class="dados">
                            <td><?php echo $pedido['Nome_Marmita']; ?></td>
                            <td><?php echo $pedido['Nome_Cliente']; ?></td>
                            <td><?php echo $pedido['quantidade']; ?></td>
                            <td><?php echo $pedido['dataEntregaFormatada']; ?></td> 
                            <td class="botoes">
                                <a href="">Editar</a> 
                                <a href="pedido.php?id=<?php echo $pedido['id_pedido']; ?>" class="excluir">Excluir</a>
                            </td>
                        </tr>
                    <?php         
                        }
                    } else {
                        ?>
                        <div class="NadaCadastro">
                           Não tem nada cadastrado
                        </div>
                        <?php
                    }
                        ?>
                        <!-- FIM PHP DADOS NA TELA-->
                            </tr>
                </tbody>
            </table>
        </div>
  
    </div>


</body>

</html>

