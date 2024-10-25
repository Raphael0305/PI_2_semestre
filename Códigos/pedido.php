<?php
require_once 'classes\classe-pedido.php';

$pedido = NEW Pedido('marmitaria', 'localhost', 'root', '');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\pedido.css">
    <title>Document</title>
</head>
<body>

    <div class="esquerda">
        <!-- <img src="../img/Marmitaria.png" alt=""> -->
        <form action="" method="post">
            <h2>PONTO DE PEDIDO</h2>
            <label for="opcoes">Escolha o prato</label>
            <select id="opcoes" name="nomeMarmita">
              <option value="marmita 1">Marmita 1</option>
              <option value="marmita2">Marmita 2</option>
              <option value="marmita3">Marmita 3</option>
              <option value="marmita4">Marmita 4</option>
              <option value="marmita5">Marmita 4</option>
            </select>      
            
            <label for="">Nome do Clinete</label>
            <input type="text" placeholder="Nome" name="NomeCliente">

            <label for="quantidade">Quantidade comprada:</label>
            <input type="number"  name="quantidade" min="1" max="10" step="1">

            <label for="DataEntrega">Data Entrega</label>
            <input type="datetime-local" name="dataEntrega" id="">

            <button type="submit">ENVIAR</button>
            <?php
            if(isset($_POST['nomeMarmita'])){
                $marmita = addslashes($_POST['nomeMarmita']);
                $nomeCliente = addslashes($_POST['NomeCliente']);
                $qtde = addslashes($_POST['quantidade']);
                $dataEntrega = addslashes($_POST['dataEntrega']);
                if (empty($marmita) || empty($nomeCliente) || empty($qtde) || empty($dataEntrega)) {
                ?>
                    <div class="msgErro">
                        Preencha todos os campos dog!
                    </div> 
                   <?php 
                } else {
                    if (!$pedido->cadastrarPedido($marmita, $nomeCliente, $qtde, $dataEntrega)) {
                        echo "Erro ao enviar os dados.";
                    }
                }
            }
            ?>
        </form>
    </div>

    <div class="direita">
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
                <?php
                $dados = $pedido->buscarDados();
                    if(count($dados) > 0){
                        for ($i=0; $i < count($dados) ; $i++) {
                            ?>
                            <tr class="dados">
                            <?php    
                            foreach ($dados[$i] as $key => $value) {
                                if($key != "id_pedido"){
                                  echo  "<td>".$value."</td>";
                                }
                            }
                           echo '<td class="botoes"><a href="">Editar</a> <a href="" class="excluir">Excluir</a></td>';
                         }
                    }else{
                        echo "Não tem nada cadastrado";
                    }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>