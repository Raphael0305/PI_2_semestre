<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="cadastrar_item_modal" class="cadastrar_item_modal">
        <div class="cadastro">
            <div class="header">
                <h2>Cadastrar Ingredientes</h2>
            </div>


            <div class="content">
                <form method="POST" class="my_form">
                    <div>
                        <label for="nome">Nome do Produto</label><br>
                        <input type="text" name="nome" id="nome" placeholder="Nome do Produto" required>
                    </div>
                    <div>
                        <label for="categoria">Categoria Produto</label><br>
                        <input type="text" name="categoria" id="categoria" placeholder="Categoria do Produto" required>
                    </div>
                    <div>
                        <label for="fornecedor">Fornecedor</label><br>
                        <input type="text" name="fornecedor" id="fornecedor" placeholder="Fornecedor" required>
                    </div>
                    <div>
                        <label for="quantidade">Quantidade</label><br>
                        <input type="select" name="quantidade" id="quantidade" placeholder="Quantidade" required>
                    </div>
                    <div>
                        <label for="valorUn">Valor Unitario</label><br>
                        <input type="select" name="valorUn" id="valorUn" placeholder="Valor Unitario" required>
                    </div>
                    <div>
                        <label for="quantMin">Quantidade Minima</label><br>
                        <input type="text" name="quantMin" id="quantMin" placeholder="Quantidade Minima" required>
                    </div>
                    <div>
                        <label for="data_validade">Data de Validade</label><br>
                        <input type="date" name="data_validade" id="data_validade" required>
                    </div>
                </form>
            </div>



            <div class="footer">
                <div class="buttons">
                    <button onclick="closeModal()">Fechar</button>
                    <button onclick="cadastraItem()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>