<?php
require_once 'classes\classe-pedido.php';
require_once 'classes/classe-login.php';
$login = NEW Login;
$login->verifLogin();
$pedido = new Pedido();

// LIDANDO COM GETS DE TROCA DE PAGINA 
$pagina = 0;
$limite = 5;
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
    <link rel="stylesheet" href="css\pedido.css??v=1.3">
    <title>Pedidos</title>
</head>

<body>
    
    <!-- INICIO -->
     <?php
        if(isset($_GET['id_ed'])){
            $id_editar = addslashes($_GET['id_ed']);
            $res = $pedido->buscarDadosPessoa($id_editar);
        }

    ?>
    <div class="estrutura">
        <div class="esquerda">
            <!-- <img src="../img/Marmitaria.png" alt=""> -->
            <form action="" method="post">
                <h2>PONTO DE PEDIDO</h2>

                <label for="opcoes">Escolha o prato</label>
                <select id="opcoes" name="nomeMarmita" required>
                    <option value="marmita 1" <?php if(isset($res) && $res['nome_marmita'] == 'marmita 1') echo 'selected'; ?>>Marmita 1</option>
                    <option value="marmita 2" <?php if(isset($res) && $res['nome_marmita'] == 'marmita 2') echo 'selected'; ?>>Marmita 2</option>
                    <option value="marmita 3" <?php if(isset($res) && $res['nome_marmita'] == 'marmita 3') echo 'selected'; ?>>Marmita 3</option>
                    <option value="marmita 4" <?php if(isset($res) && $res['nome_marmita'] == 'marmita 4') echo 'selected'; ?>>Marmita 4</option>
                    <option value="marmita 5" <?php if(isset($res) && $res['nome_marmita'] == 'marmita 5') echo 'selected'; ?>>Marmita 5</option>
                </select>

                <label for="">Nome do Cliente</label>
                <input type="text" class="inpute" placeholder="Nome" name="NomeCliente" required   
                value="<?php if(isset($res)){echo $res['nome_cliente'];}?>"> 

                <label for="quantidade">Quantidade comprada:</label>
                <input type="number" class="inpute" name="quantidade" required
                value="<?php if(isset($res)){echo $res['quantidade'];}?>">

                <label for="DataEntrega">Data Entrega</label>
                <input type="datetime-local" class="inpute" name="dataEntrega" id=""
                value="<?php if(isset($res)){echo date('Y-m-d\TH:i', strtotime($res['data_entrega']));}?>">

                <input type="submit" value="<?php if(isset($res)){echo "Atualizar";}else{echo "Cadastrar";}?>" class="butEnviar">
                <!-- INICIO PHP -->
                <?php
                
                if (isset($_POST['nomeMarmita'])) { 
                    // CLICOU NO BOTÃO CADASTRAR OU EDITAR  
                    //---------------- EDITAR ---------------------------
                    if(isset($_GET['id_ed']) && !empty($_GET['id_ed'])) {
                        $id_edita = addslashes($_GET['id_ed']); // Corrigido aqui
                        $marmita = addslashes($_POST['nomeMarmita']);
                        $nomeCliente = addslashes($_POST['NomeCliente']);
                        $qtde = addslashes($_POST['quantidade']);
                        $dataEntrega = addslashes($_POST['dataEntrega']);
                
                        $pedido->EditarPedido($id_edita, $marmita, $nomeCliente, $qtde, $dataEntrega);
                        header("Location: pedido.php");
                        exit; 
                    } else {
                        $marmita = addslashes($_POST['nomeMarmita']);
                        $nomeCliente = addslashes($_POST['NomeCliente']);
                        $qtde = addslashes($_POST['quantidade']);
                        $dataEntrega = addslashes($_POST['dataEntrega']);
                
                        if (!$pedido->cadastrarPedido($marmita, $nomeCliente, $qtde, $dataEntrega)) {
                            echo "Erro ao enviar os dados.";
                        }
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
                            <td><?php echo $pedido['nome_marmita']; ?></td>
                            <td><?php echo $pedido['nome_cliente']; ?></td>
                            <td><?php echo $pedido['quantidade']; ?></td>
                            <td><?php echo $pedido['dataEntregaFormatada']; ?></td> 
                            <td class="botoes">
                                <a href="pedido.php?id_ed=<?= $pedido['id_pedido']; ?>" >Editar</a>
                                <a href="pedido.php?id=<?= $pedido['id_pedido']; ?>" class="excluir">Excluir</a>
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

