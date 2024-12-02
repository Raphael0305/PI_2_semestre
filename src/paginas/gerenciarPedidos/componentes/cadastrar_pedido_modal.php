<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="cadastrar_pedido_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <legend class="modal-title" id="staticBackdropLabel">Cadastrar Pedido</legend>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container-fluid">
                    <form action="">
                        <div class="mb-3">
                            <label for="nomeCliente" class="form-label">Nome do Cliente</label>
                            <input class="form-control" type="text" id="nomeCliente" placeholder="Nome do Cliente">
                        </div>
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input class="form-control" type="number" id="quantidade" placeholder="Quantidade">
                        </div>
                        <div class="mb-3">
                            <label for="selecionarMarmita" class="form-label">Marmita</label><br>
                            <select id="selecionarMarmita" class="form-select" aria-label="Default select example">
                                <option selected>Selecione uma Marmita</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="cadastroPedidoModal" type="button" class=" btn btn-success" onclick="cadastrarPedido()">Cadastrar Pedido</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>