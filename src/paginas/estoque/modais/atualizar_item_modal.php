<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="atualizar_item_modal" id="atualizar_item_modal">
        <div class="header">Atualizar Item</div>
        <div class="content">
            <div class="select_item">
                <select name="item_selector" id="item_selector">
                    <option value="">Selecione um item</option>
                </select>
            </div>
            <div class="fields">
                <div class="left_field">
                    <div>
                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" id="nome_item">
                    </div>
                    <div>
                        <label for="categoria">Categoria</label><br>
                        <input type="text" name="categoria" id="categoria_item">
                    </div>
                    <div>
                        <label for="fornecedor">Forncedor</label><br>
                        <input type="text" name="fornecedor" id="fornecedor_item">
                    </div>
                </div>
                <div class="right_field">
                    <div>
                        <label for="quantidade">Quantidade</label><br>
                        <input type="text" name="quantidade" id="quantidade_item">
                    </div>
                    <div>
                        <label for="valorUn">ValorUn</label><br>
                        <input type="text" name="valorUn" id="valorUn_item">
                    </div>
                    <div>
                        <label for="data_validade">Data de Validade</label><br>
                        <input type="date" name="data_validade" id="data_validade_item">
                    </div>
                    <div>
                        <label for="quantMin">Quantidade Minima</label><br>
                        <input type="text" name="quantMin" id="quantMin_item" placeholder="Quantidade Minima" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="fechar_atualizar">
                <button onclick="closeAtualizarModal()">Fechar</button>
            </div>
            <div>
                <button onclick="atualizarItemDatabase()">Atualizar</button>
            </div>
        </div>
    </div>

</body>

</html>